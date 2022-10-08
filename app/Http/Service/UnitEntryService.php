<?php

namespace App\Http\Service;

use Exception;
use App\Models\Merchant;
use App\Models\maternalday;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Repository\UnitEntryRepositoryImpl;

class UnitEntryService extends Controller
{

    private $unitEntry;

    public function __construct(UnitEntryRepositoryImpl $unitEntry)
    {
        $this->unitEntry = $unitEntry;
    }

    public function createUnitEntry(Request $request)
    {
        // validate 
        $request->validate([
            "ID_SIMRS" => "required",
            "Nama_Unit" => "required"
        ]);
        try {
            // Db Transaction
            DB::beginTransaction();
            $this->unitEntry->createUnitEntry($request);
            DB::commit();
            return redirect('dashboard/unitentry/create')->with('success', 'Data Berhasil Ditambahkan ! ');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/unitentry/create')->with('failed', 'Data Gagal Ditambahkan !' . $e->getMessage());
        }
    }
    public function UpdateUnitEntry(Request $request)
    {
        // validate 
        $request->validate([
            "ID_SIMRS" => "required",
            "Nama_Unit" => "required"
        ]);
        try {

            // Db Transaction
            //dd($request);
            DB::beginTransaction();
            $this->unitEntry->UpdateUnitEntry($request);
            DB::commit();
            return redirect('dashboard/unitentry/view/' . $request->ID)->with('success', 'Data Berhasil Diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/unitentry/view/' . $request->ID)->with('failed', $e->getMessage());
        }
    }
    public function getDatabyId($id)
    {
        return $this->unitEntry->showDatabyId($id);
    }
}
