<?php

namespace App\Http\Repository;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Merchant;

class PatientRepositoryImpl  implements PatientRepositoryInterface
{
    public function insertData($request)
    {
        $user = new User();
        $tgllahiran_nifas = Carbon::parse($request->tgllahiran)
            ->addDay('40')
            ->format('Y-m-d');
        $xpassword = Carbon::parse($request->password)
            ->format('dmY');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->nomr = $request->nomr;
        $user->maternaprogram = $request->maternaprogram;
        $user->tgllahiran = $request->tgllahiran;
        $user->tgllahiran_nifas = $tgllahiran_nifas;
        $user->days_nifas = '40';
        $user->level = 'patient';
        $user->username = $request->nomr;
        $user->days_nifas_complete = '0';
        $user->password  = bcrypt($xpassword);
        $user->save();

        
        return $user;
    }
    public function showDatabyId($id)
    {

        $dt =  User::find($id);
        return $dt;
    }
    public function updateData($request)
    {
        // $updates = Merchant::where('id', $request->id)->update([
        //     'merchant_name' => $request->merchant_name,
        //     'phone_number' => $request->phone_number,
        //     'merchant_type' => $request->merchant_type,
        //     'merchant_person' => $request->merchant_person,
        //     'address' => $request->address,
        //     'status' => $request->status,
        //     'email' => $request->email,
        //     'id_regencies' => $request->id_regencies,
        //     'name_regencies' => $request->name_regencies,
        // ]);
        // return $updates;
    }
}
