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
use App\Http\Repository\FirebaseRepositoryImpl;
use App\Http\Repository\PatientRepositoryImpl;
use App\Http\Repository\MerchantRepositoryImpl;
use App\Http\Repository\TausiyahRepositoryImpl;

class TausiyahService extends Controller
{

    private $tausiyahRepository;
    private $firebaseRepository;

    public function __construct(
        TausiyahRepositoryImpl $tausiyahRepository,
        FirebaseRepositoryImpl $firebaseRepository)
    {
        $this->tausiyahRepository = $tausiyahRepository;
        $this->firebaseRepository = $firebaseRepository;
    }

    public function createTausiyah(Request $request)
    {
        // validate 
        $request->validate([
            "judul" => "required",
            "shortdescription" => "required",
            "description" => "required" 
        ]);

        try {
            // Db Transaction
            DB::beginTransaction();
            $data = $this->tausiyahRepository->insertData($request);
            if ($data){
                $this->firebaseRepository->blastBroadCast($request);
            }
            DB::commit();
            return redirect('dashboard/tausiyah/create')->with('success', 'Data Berhasil ditambahkan !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/tausiyah/create')->with('failed', $e->getMessage());
        }
    }
    public function getDatabyId($id)
    {
        return $this->tausiyahRepository->showDatabyId($id);
    }
    public function editTausiyah(Request $request)
    {
        // validate 

        $request->validate([
            "judul" => "required",
            "shortdescription" => "required",
            "description" => "required" 
        ]);

        try {
            // Db Transaction
            DB::beginTransaction();
            $this->tausiyahRepository->updateData($request); 
            DB::commit();

            return redirect('dashboard/tausiyah/view/' . $request->ID)->with('success', 'Data Berhasil diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/tausiyah/view/' . $request->ID)->with('failed', 'Data Gagal diedit !');
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
