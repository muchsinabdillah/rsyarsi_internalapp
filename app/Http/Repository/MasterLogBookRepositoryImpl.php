<?php

namespace App\Http\Repository;

use App\Models\Article;
use App\Models\centerofexcelent;
use App\Models\masterloogbook;
use App\Models\Promo;
use App\Models\transaksilogbookdetails;
use Carbon\Carbon;
use \Datetime;

class MasterLogBookRepositoryImpl  implements MasterLogBookRepositoryInterface
{
    public function createLogBook($request)
    {
        $promos = new masterloogbook();
        $promos->ID = $request->ID;
        $promos->Nama_LogBook = $request->Nama_LogBook;
        $promos->Status = $request->Status;
        $promos->save();
        return $promos;
    }

    public function showDatabyId($id)
    {

        $dt =  masterloogbook::find($id);
        return $dt;
    }
    public function UpdateLogBook($request)
    {
        $updates = masterloogbook::where('ID', $request->ID)->update([
            'ID' => $request->ID,
            'Status' => $request->Status,
            'Nama_LogBook' => $request->Nama_LogBook,
        ]);
        return $updates;
    }
}
