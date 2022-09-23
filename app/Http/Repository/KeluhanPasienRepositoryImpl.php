<?php

namespace App\Http\Repository;

use App\Models\centerofexcelent;
use App\Models\facilitie;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Merchant;
use App\Models\sick;

class KeluhanPasienRepositoryImpl  implements KeluhanPasienRepositoryInterface
{
     
    public function showDatabyId($id)
    {

        $dt =  sick::find($id);
        return $dt;
    }
    public function updateData($request)
    {

        $updates = sick::where('ID', $request->ID)->update([
            'userapproved' => auth()->user()->name ,
            'dateapproved' => Carbon::now(),
            'noteapproved' => $request->noteapproved,
            'status' => $request->publish
        ]);
        return $updates;
    }
     
}
