<?php

namespace App\Http\Repository;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Merchant;
use App\Models\tausiah;

class TausiyahRepositoryImpl  implements TausiyahRepositoryInterface
{
    public function insertData($request)
    {
        $user = new tausiah(); 
        $user->judul = $request->judul;
        $user->shortdescription = $request->shortdescription;
        $user->description = $request->description; 
        $user->save(); 
        return $user;
    }
    public function showDatabyId($id)
    {

        $dt =  tausiah::find($id);
        return $dt;
    }
    public function updateData($request)
    {
        $updates = tausiah::where('id', $request->ID)->update([
            'judul' => $request->judul,
            'shortdescription' => $request->shortdescription,
            'description' => $request->description, 
        ]);
        return $updates;
    }
}
