<?php

namespace App\Http\Service;

use Exception;
use App\Models\courier;
use App\Models\Merchant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourierController;
use Illuminate\Support\Facades\Mail;
use App\Http\Repository\UserRepositoryImpl;
use App\Http\Repository\RegisterRepositoryImpl;
use Carbon\Carbon;

class RegisterService extends Controller
{

    private $registerRepository;

    public function __construct(
        RegisterRepositoryImpl $registerRepository )
    {
        $this->registerRepository = $registerRepository;
    }

    public function createRegister(Request $request)
    {
        // validate 
        $request->validate([
            "fullname" => "required",
            "email" => "required|unique:registers|email:dns",
            "handphone" => "required",
            "address" => "required",
            "name_provinces" => "required",
            "id_provinces" => "required",
            "name_regencies" => "required",
            "id_regencies" => "required",
            "name_distrits" => "required",
            "id_distrits" => "required",
            "name_villages" => "required",
            "id_villages" => "required",
            "typemember" => "required", 
            'captcha' => ['required', 'captcha'],
            //]
            // ,[
            //     'name.required' =>'Nama Salah',
        ]);

        try {
            // Db Transaction
            DB::beginTransaction();
            if($request->typemember == "mitra" ){
                if ($request->merchant_name == null) {
                    return redirect('register')->with('error', "Silahkan Masukan Mitra Name.");
                }
                if ($request->merchant_person == null) {
                    return redirect('register')->with('error', "Silahkan Masukan Contact Person Mitra.");
                }
            }   
                $this->registerRepository->insertData($request);
                DB::commit();
                $details = $request; 
                Mail::to($request->email)->send(new \App\Mail\RegisterMail($details));
                return redirect('registersuccess')->with('success', 'Your Application under Process for Varification. !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('register')->with('failed', $e->getMessage());
        }
    }
    public function getDatabyId($id)
    {
        return $this->UserRepository->showDatabyId($id);
    }
    public function editUser(Request $request)
    {
        // validate 
        $request->validate([
            "name" => "required",
            "level" => "required",
            "status" => "required",
        ]);

        try {
            // Db Transaction
            DB::beginTransaction();
            $this->UserRepository->updateData($request);
            DB::commit();

            return redirect('dashboard/userlogin/view/' . $request->id)->with('success', 'Data User Berhasil diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/userlogin/view/' . $request->id)->with('failed', 'Data User Gagal diedit !');
        }
    }
    public function confirmationRegister(Request $request)
    {
        // validate 
        $request->validate([
            "id" => "required", 
            //]
            // ,[
            //     'name.required' =>'Nama Salah',
        ]);

        try {
            // Db Transaction
            DB::beginTransaction();
            if($request->stauses <> "Unconfirmed"){
                return redirect('dashboard/verification')->with('failed', 'Id : ' . $request->id .', Status Sudah tidak Unconfirmed, Edit dibatalkan !');
            }else{
                $this->registerRepository->updateconfirmData($request);
                DB::commit();
                $details = $request;
                Mail::to($request->emails)->send(new \App\Mail\ConfirmationMail($details));
                return redirect('dashboard/verification')->with('success', 'Application Confirmed successfully !!!');
                
            }
            
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/verification')->with('failed', $e->getMessage());
        }
    }
    public function confirmationRegistrationFinish(Request $request){
        $request->validate([
            "id_f" => "required",
            "identitasid" => "required",
            "dobplace" => "required",
            "dob" => "required",
            "nama_bank" => "required",
            "no_rekening" => "required", 
            "name_rekening_owner" => "required",
            'filektp' => 'required|image|file',
            'filestnk' => 'required|image|file',
            'filesk' => 'required|image|file', 
        ]);

        try {
            // Db Transaction
                DB::beginTransaction(); 
                $this->registerRepository->updateconfirmRegistrationFinal($request);
                DB::commit(); 
                return redirect('verificationregistration/' . $request->id_f)->with('success', 'Application Send  successfully !!!'); 
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('verificationregistration/'. $request->id_f)->with('failed', $e->getMessage());
        }
    }
    public function finishedRegistration(Request $request)
    {
        // validate 
        $request->validate([
            "id_f" => "required", 
            //]
            // ,[
            //     'name.required' =>'Nama Salah',
        ]);

        try {
            // Db Transaction
            DB::beginTransaction();
            if ($request->stauses_f <> "Generating") {
                return redirect('dashboard/verification')->with('failed', 'Id : ' . $request->id . ', Status Sudah tidak Generating, Edit dibatalkan !');
            } else { 
                $stuff = new StuffService;
                $genauto = $stuff->genAutoMitra();
                $genautoKurir = $stuff->genAutoCourier();
                $password = $stuff->encryptPassword('123456');
                $now = Carbon::now(); 
                if ($request->type_f == "mitra") {
                    $this->registerRepository->updateGenerateDataMitra($request, $genauto, $now, $password);
                    $this->registerRepository->generateUserLogin($request, $genauto, $now, $password);
                }else if($request->type_f == "driver"){
                    $this->registerRepository->updateGenerateDataKurir($request, $genautoKurir, $now, $password);
                    $this->registerRepository->generateUserLogin($request, $genautoKurir, $now, $password);
                } 
                $this->registerRepository->updateFinishData($request, $genauto);
                DB::commit();  
                if ($request->type_f == "mitra") {
                    $details = $request;
                    Mail::to($request->emails_f)->send(new \App\Mail\FinishedMitraEmail($details));
                } 
                if ($request->type_f == "driver") {
                    $details = $request;
                    Mail::to($request->emails_f)->send(new \App\Mail\FinishedCourierEmail($details));
                }
                
                return redirect('dashboard/verification')->with('success', 'Registration Member Mitra/Kurir Complete !');
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/verification')->with('failed', $e->getMessage());
        }
    } 
}
