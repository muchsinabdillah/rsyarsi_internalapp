<?php

namespace App\Http\Service;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller; 
use App\Http\Repository\PricelistRepositoryImpl; 
use App\Models\Merchant;
use Illuminate\Support\Str;

class PricelistService extends Controller
{

    private $pricelistRepository;

    public function __construct(PricelistRepositoryImpl $pricelistRepository)
    {
        $this->pricelistRepository = $pricelistRepository;
    }

    public function createPricelist(Request $request)
    {
        // validate 
        $request->validate([
            "name_provinces_start" => "required",
            "id_provinces_start" => "required",
            "name_regencies_start" => "required",
            "id_regencies_start" => "required",
            "name_provinces_end" => "required",
            "id_provinces_end" => "required",
            "name_regencies_end" => "required",
            "id_regencies_end" => "required",
            "id_packet" => "required",
            "price" => "required",
            "price_asuransi" => "required",
            "id_jenis_pengiriman" => "required", 
            "status" => "required",
        ]);
        try {
            // Db Transaction
            DB::beginTransaction(); 
            $this->pricelistRepository->insertData($request);
            DB::commit();
            return  $this->sendResponse([], "Data Pricelist Berhasil ditambahkan !");
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return $this->sendError($e->getMessage(),[]);
        }
    }
    public function getDatabyId($id)
    {
        return $this->pricelistRepository->showDatabyId($id);
    }
    public function editPricelist(Request $request)
    {
        // validate 

        $request->validate([
            "name_provinces_start" => "required",
            "id_provinces_start" => "required",
            "name_regencies_start" => "required",
            "id_regencies_start" => "required",
            "name_provinces_end" => "required",
            "id_provinces_end" => "required",
            "name_regencies_end" => "required",
            "id_regencies_end" => "required",
            "id_packet" => "required",
            "price" => "required",
            "price_asuransi" => "required",
            "id_jenis_pengiriman" => "required",
            "status" => "required",
        ]);

        try {
            // Db Transaction
            DB::beginTransaction();
            $this->pricelistRepository->updateData($request);
            DB::commit();

            return redirect('dashboard/pricelist/view/' . $request->id)->with('success', 'Data Pricelist Berhasil diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/pricelist/view/' . $request->id)->with('failed', $e->getMessage());
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
