<?php

namespace App\Http\Repository;

use App\Models\Article;
use App\Models\centerofexcelent;
use App\Models\masterloogbook;
use App\Models\userentry;
use App\Models\transaksilogbookdetails;
use Carbon\Carbon;
use \Datetime;

class UserEntryRepositoryImpl  implements UserEntryRepositoryInterface
{
    public function createUserEntry($request)
    {
        $promos = new userentry();
        $promos->name = $request->name;
        $promos->Unit = $request->Unit;
        $promos->email = $request->email;
        $promos->password = bcrypt($request->password);
        $promos->username = $request->username;
        $promos->level = $request->level;
        $promos->save();
        return $promos;
    }

    public function showDatabyId($id)
    {

        $dt =  userentry::find($id);
        return $dt;
    }
    public function UpdateUserEntry($request)
    {
        $updates = userentry::where('id', $request->id)->update([
            'id' => $request->id,
            'name' => $request->name,
            'username' => $request->username,
            'Unit' => $request->Unit,
            'email' => $request->email,
            'level' => $request->level,
        ]);
        return $updates;
    }
}
