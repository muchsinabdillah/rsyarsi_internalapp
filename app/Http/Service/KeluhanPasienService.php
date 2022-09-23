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
use App\Http\Repository\CenterOfExcellentRepositoryImpl;
use App\Http\Repository\FasilitasRepositoryImpl;
use App\Http\Repository\KeluhanPasienRepositoryImpl;
use App\Http\Repository\PatientRepositoryImpl;
use App\Http\Repository\MerchantRepositoryImpl;

class KeluhanPasienService extends Controller
{

    private $fasRepository;

    public function __construct(KeluhanPasienRepositoryImpl $fasRepository)
    {
        $this->fasRepository = $fasRepository;
    }
    public function getDatabyId($id)
    {
        return $this->fasRepository->showDatabyId($id);
    }
    public function editKeluhanPasien(Request $request)
    {
        // validate 

        try {
            // Db Transaction
            DB::beginTransaction();

            $request->validate([
                "ID" => "required",
                "publish" => "required", 
                "noteapproved" => "required"
            ]);

                $this->fasRepository->updateData($request);
            
            DB::commit();
            return redirect('dashboard/keluhan/view/' . $request->ID)->with('success', 'Data Keluhan Berhasil di Update ke Pasien !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/keluhan/view/' . $request->ID)->with('failed', $e->getMessage());
        }
    }
    
}
