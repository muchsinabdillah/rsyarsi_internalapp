<?php

namespace App\Http\Repository;

use App\Models\centerofexcelent;
use App\Models\facilitie;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Merchant;

class FasilitasRepositoryImpl  implements FasilitasRepositoryInterface
{
    public function insertData($request, $imgPath)
    {
        $facilitie = new facilitie(); 
        $facilitie->name = $request->name;
        $facilitie->shortdescription = $request->shortdescription;
        $facilitie->longdescription = $request->longdescription;
        $facilitie->slug = $request->slug;
        $facilitie->images = $imgPath;
        $facilitie->publish = $request->publish; 
        $facilitie->save(); 
        return $facilitie;
    }
    public function showDatabyId($id)
    {

        $dt =  facilitie::find($id);
        return $dt;
    }
    public function updateData($request, $nama_file)
    {
       
        $updates = facilitie::where('ID', $request->ID)->update([
            'name' => $request->name,
            'shortdescription' => $request->shortdescription,
            'longdescription' => $request->longdescription,
            'slug' => $request->slug,
            'images' => $nama_file,
            'publish' => $request->publish, 
        ]);
        return $updates;
    }
    public function updateDataWithOutImage($request)
    {

        $updates = facilitie::where('ID', $request->ID)->update([
            'name' => $request->name,
            'shortdescription' => $request->shortdescription,
            'longdescription' => $request->longdescription, 
            'publish' => $request->publish,
            'slug' => $request->slug,
        ]);
        return $updates;
    }
}
