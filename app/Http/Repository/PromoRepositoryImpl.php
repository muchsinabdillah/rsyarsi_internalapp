<?php

namespace App\Http\Repository;

use App\Models\Article;
use App\Models\centerofexcelent;
use App\Models\Promo;
use Carbon\Carbon;

class PromoRepositoryImpl  implements ArticleRepositoryInterface
{
    public function insertData($request, $imgPath)
    {
        $promos = new Promo();
        $promos->title = $request->title;
        $promos->shortdescription = $request->shortdescription;
        $promos->longdescription = $request->longdescription;
        $promos->slug = $request->slug;
        $promos->images = $imgPath;
        $promos->publish = $request->publish;
        $promos->startdate = $request->startdate;
        $promos->enddate = $request->enddate;
        $promos->author = auth()->user()->name;
        $promos->save();
        return $promos;
    }
    public function showDatabyId($id)
    {

        $dt =  Promo::find($id);
        return $dt;
    }
    public function updateData($request, $imgPath)
    {
        $updates = Promo::where('ID', $request->id)->update([
            'title' => $request->title,
            'shortdescription' => $request->shortdescription,
            'longdescription' => $request->longdescription,
            'slug' => $request->slug,
            'images' => $imgPath,
            'publish' => $request->publish,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate
        ]);
        return $updates;
    }
    public function updateDataWithOutImage($request)
    {
        $updates = Promo::where('ID', $request->id)->update([
            'title' => $request->title,
            'shortdescription' => $request->shortdescription,
            'longdescription' => $request->longdescription,
            'slug' => $request->slug, 
            'publish' => $request->publish,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate
        ]);
        return $updates;
    }
}
