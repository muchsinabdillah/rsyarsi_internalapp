<?php

namespace App\Http\Repository;

use App\Models\Merchant;
use App\Models\Transactiondeliverie;
use App\Models\Transactiondeliveryhistorie;
use App\Models\User;

class UserRepositoryImpl  implements UserRepositoryInterface
{
    public function insertData($request)
    {

        $create =  User::create([
            'name' => $request->name,
            'merchant_name' => $request->merchant_name,
            'merchant_id' => $request->merchant_id,
            'email' => $request->email,
            'level' => $request->level,
            'username' => $request->username,
            'status' => $request->status, 
            'id_provinces' => $request->id_provinces,
            'name_provinces' => $request->name_provinces,
            'name_regencies' => $request->name_regencies,
            'id_regencies' => $request->id_regencies,
            'name_distrits' => $request->name_distrits,
            'id_distrits' => $request->id_distrits,
            'name_villages' => $request->name_villages,
            'id_villages' => $request->id_villages,

            'user_update' => auth()->user()->username,
            'password' => bcrypt($request->password)
        ]);
        return $create;
    } 
    public function showDatabyId($id)
    {

        $dt =  User::find($id);
        return $dt;
    }
    public function updateData($request)
    {
        $updates = User::where('id', $request->id)->update([
            'name' => $request->name,
            'level' => $request->level,
            'status' => $request->status,
            'id_provinces' => $request->id_provinces,
            'name_provinces' => $request->name_provinces,
            'name_regencies' => $request->name_regencies,
            'id_regencies' => $request->id_regencies,
            'name_distrits' => $request->name_distrits,
            'id_distrits' => $request->id_distrits,
            'name_villages' => $request->name_villages,
            'id_villages' => $request->id_villages,
        ]);
        return $updates;
    } 
}
