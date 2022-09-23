<?php

namespace App\Http\Service;

use Exception; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Repository\CourierRepositoryImpl;

class InformationRevenueService extends Controller
{

    private $courierRepository;

    public function __construct(CourierRepositoryImpl $courierRepository)
    {
        $this->courierRepository = $courierRepository;
    }

    public function createCourier(Request $request)
    {
        // validate 
        $request->validate([
            "Name" => "required",
            "phone_number" => "required",
            "address" => "required",
            "status" => "required",
            "id_regencies" => "required",
            "name_regencies" => "required",
        ]);

        try {
            // Db Transaction
            DB::beginTransaction();
            $autonumber = $this->genAuto();
            $this->courierRepository->insertData($request, $autonumber);
            DB::commit();
            return redirect('dashboard/courier/create')->with('success', 'Data Courier Berhasil ditambahkan !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/courier/create')->with('failed', 'Data Courier Gagal ditambahkan !');
        }
    } 
}
