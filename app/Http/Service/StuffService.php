<?php

namespace App\Http\Service;

use Exception;
use App\Models\courier;
use App\Models\Merchant;
use Illuminate\Support\Str; 
use App\Http\Controllers\Controller; 

class StuffService extends Controller
{

    
    public function genAutoCourier()
    {
        $AWAL = 'COU';
        $noUrutAkhir = courier::max('id_register');
        $bulanRomawi = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $no = 1;
        if ($noUrutAkhir) {
            $numberx =  $AWAL  .   sprintf("%015s", Str::substr($noUrutAkhir, 3, 15) + 1);
        } else {
            $numberx =   $AWAL  . sprintf("%015s", $no);
        }
        return $numberx;
    }
    public function genAutoMitra()
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
    public function encryptPassword($password){
        return  bcrypt($password);
    }
}
