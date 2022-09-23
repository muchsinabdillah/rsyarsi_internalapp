<?php

namespace App\Http\Service;

use Exception;
use App\Models\Merchant;
use App\Models\maternalday;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\maternalprogram;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Repository\PatientRepositoryImpl;
use App\Http\Repository\MerchantRepositoryImpl;

class PatientService extends Controller
{

    private $patientRepository;

    public function __construct(PatientRepositoryImpl $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function createPatient(Request $request)
    { 
        // validate 
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "phone_no" => "required", 
            "nomr" => "required|unique:users", 
            "password" => "required",
            "tgllahiran" => "required"
        ]);

        try {
            // Db Transaction
            DB::beginTransaction(); 
            
            $this->patientRepository->insertData($request);

            if ($request->maternaprogram == "1") {
                // Insert Task Day
                $insertDays = [];
                $days = maternalday::get();
                $no = 1;
                foreach ($days as $day) {

                    $count = maternalprogram::where('day', '=', $day->id)->count();
                    $insertDays[] = [
                        'nomr' => $request->nomr,
                        'Day' => $day->id,
                        'Tgl_Lahiran' => $request->tgllahiran,
                        'Tgl_NifasKe' => date_add(date_create($request->tgllahiran), date_interval_create_from_date_string($no . " days")),
                        'DayDescription' => $day->description,
                        'TotalTask' => $count,
                        'CompleteTask' => "0",
                        'StatusTask' => "0"
                    ];
                    $no++;
                }
                DB::table('maternalprogramhdrtasks')->insert($insertDays);

                // // Insert Task Detail
                $inserts = [];
                $getdatataskhdr = DB::table('maternalprogramhdrtasks')->where('nomr', '=', $request->nomr)->get();

                foreach ($getdatataskhdr as $maternadr) {
                    $daysMaternaPorg = maternalprogram::where('day', '=', $maternadr->Day)->get();
                    foreach ($daysMaternaPorg as $day3) {
                        $inserts[] = [
                            'nomr' => $request->nomr,
                            'Tgl_Lahiran' => $request->tgllahiran,
                            'IdTaskHdr' => $maternadr->id,
                            'MpID' => $day3->id,
                            'Day' => $day3->day,
                            'IsVoid' => '0',
                            'MpDescription' => $day3->description,
                            'LinkMedia' => $day3->LinkMedia
                        ];
                    }
                }
                DB::table('maternalprogramtasks')->insert($inserts);
            }
            DB::commit();
            return redirect('dashboard/infomaternarekap')->with('success', 'Data Merchant Berhasil ditambahkan !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/patient/create')->with('failed', 'Data Merchant Gagal ditambahkan !');
        }
    }
    public function getDatabyId($id)
    {
        return $this->merchantRepository->showDatabyId($id);
    }
    public function editMerchant(Request $request)
    {
        // validate 

        $request->validate([
            "merchant_name" => "required",
            "phone_number" => "required",
            "merchant_type" => "required",
            "merchant_person" => "required",
            "address" => "required",
            "status" => "required",
            "id_regencies" => "required",
            "name_regencies" => "required",
        ]);

        try {
            // Db Transaction
            DB::beginTransaction();
            $this->merchantRepository->updateData($request);
            DB::commit();

            return redirect('dashboard/merchant/view/' . $request->id)->with('success', 'Data Merchant Berhasil diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/merchant/view/' . $request->id)->with('failed', 'Data Merchant Gagal diedit !');
        }
    }
    public function genAuto()
    {
        $AWAL = 'JKL';
        $noUrutAkhir = Merchant::max('id_register');
        $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $no = 1;
        if ($noUrutAkhir) {
            $numberx =  $AWAL . date('n')  . date('Y') . '-' . sprintf("%06s", Str::substr($noUrutAkhir, 9, 6) + 1);
        } else {
            $numberx =   $AWAL  . date('n')  . date('Y') . '-' . sprintf("%06s", $no);
        }
        return $numberx;
    }
}
