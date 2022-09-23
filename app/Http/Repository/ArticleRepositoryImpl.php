<?php

namespace App\Http\Repository;

use App\Models\Article;
use App\Models\centerofexcelent;
use Carbon\Carbon;

class ArticleRepositoryImpl  implements ArticleRepositoryInterface
{
    public function insertData($request, $imgPath)
    {
        $articles = new Article();
        $articles->title = $request->title;
        $articles->shortdescription = $request->shortdescription;
        $articles->longdescription = $request->longdescription;
        $articles->slug = $request->slug;
        $articles->images = $imgPath;
        $articles->publish = $request->publish;
        $articles->author = auth()->user()->name;
        $articles->save();
        return $articles;
    }
    public function showDatabyId($id)
    {

        $dt =  Article::find($id);
        return $dt;
    }
    public function updateData($request, $imgPath)
    {
        $updates = Article::where('ID', $request->id)->update([
            'title' => $request->title,
            'shortdescription' => $request->shortdescription,
            'longdescription' => $request->longdescription,
            'slug' => $request->slug,
            'images' => $imgPath,
            'publish' => $request->publish
        ]);
        return $updates;
    }
    public function updateDataWithOutImage($request)
    {
        $updates = Article::where('ID', $request->id)->update([
            'title' => $request->title,
            'shortdescription' => $request->shortdescription,
            'longdescription' => $request->longdescription,
            'slug' => $request->slug,
            'publish' => $request->publish
        ]);
        return $updates;
    }
}
