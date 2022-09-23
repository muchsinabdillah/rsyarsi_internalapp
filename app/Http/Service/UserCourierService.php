<?php

namespace App\Http\Service;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Repository\UserRepositoryImpl;

class UserCourierService extends Controller
{

    private $UserRepository;

    public function __construct(UserRepositoryImpl $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function createUser(Request $request)
    {
        // validate 
        $request->validate([
            "name" => "required",
            "merchant_name" => "required",
            "merchant_id" => "required",
            "email" => "required",
            "level" => "required",
            "username" => "required|unique:users",
            "status" => "required",
            "password" => "required",
            "id_provinces" => "required",
            "name_provinces" => "required",
            "name_regencies" => "required",
            "id_regencies" => "required",
            "name_distrits" => "required",
            "id_distrits" => "required",
            "name_villages" => "required",
            "id_villages" => "required",
            //]
            // ,[
            //     'name.required' =>'Nama Salah',
        ]);

        try {
            // Db Transaction
            DB::beginTransaction();
            $this->UserRepository->insertData($request);
            DB::commit();
            return redirect('dashboard/userlogincourier/create')->with('success', 'Data User Courier Berhasil ditambahkan !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/userlogincourier/create')->with('failed', $e->getMessage());
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

            return redirect('dashboard/userlogincourier/view/' . $request->id)->with('success', 'Data User Courier Berhasil diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/userlogincourier/view/' . $request->id)->with('failed', 'Data User Courier Gagal diedit !');
        }
    }
}
