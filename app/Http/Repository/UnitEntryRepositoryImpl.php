<?php

namespace App\Http\Repository;

use App\Models\Article;
use App\Models\centerofexcelent;
use App\Models\masterloogbook;
use App\Models\unitentry;
use App\Models\transaksilogbookdetails;
use Carbon\Carbon;
use \Datetime;

class UnitEntryRepositoryImpl  implements UnitEntryRepositoryInterface
{
    public function createUnitEntry($request)
    {
        $promos = new unitentry();
        $promos->ID = $request->ID;
        $promos->ID_SIMRS = $request->ID_SIMRS;
        $promos->Nama_Unit = $request->Nama_Unit;
        $promos->save();
        return $promos;
    }

    public function showDatabyId($id)
    {

        $dt =  unitentry::find($id);
        return $dt;
    }
    public function UpdateUnitEntry($request)
    {
        $updates = unitentry::where('ID', $request->ID)->update([
            'ID' => $request->ID,
            'ID_SIMRS' => $request->ID_SIMRS,
            'Nama_Unit' => $request->Nama_Unit
        ]);
        return $updates;
    }
}
