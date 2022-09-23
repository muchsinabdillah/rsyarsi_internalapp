<?php

namespace App\Http\Repository;

use App\Models\Article;
use App\Models\centerofexcelent;
use Carbon\Carbon; 

class CenterOfExcellentRepositoryImpl  implements CenterOfExcellentRepositoryInterface
{
    public function insertData($request, $imgPath)
    {
        $centerofexcelent = new Article();
        $centerofexcelent->name = $request->name;
        $centerofexcelent->description = $request->description;
        $centerofexcelent->slug = $request->slug;
        $centerofexcelent->images = $imgPath;
        $centerofexcelent->publish = $request->publish;
        $centerofexcelent->save(); 
        return $centerofexcelent;
    }
    public function showDatabyId($id)
    {

        $dt =  centerofexcelent::find($id);
        return $dt;
    }
    public function updateData($request, $imgPath)
    {
        $updates = centerofexcelent::where('ID', $request->ID)->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->slug,
            'images' => $imgPath,
            'publish' => $request->publish,
        ]);
        return $updates;
    }
    public function updateDataWithOutImage($request)
    {
        $updates = centerofexcelent::where('ID', $request->ID)->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->slug, 
            'publish' => $request->publish,
        ]);
        return $updates;
    }
}
