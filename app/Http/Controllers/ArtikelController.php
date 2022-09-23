<?php

namespace App\Http\Controllers;

use App\Http\Repository\ArticleRepositoryImpl;
use App\Http\Service\ArticleService;
use App\Models\Article;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.article.index', [
            'posts' => Article::latest()->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $articleRepository = new ArticleRepositoryImpl();
        $articleService = new ArticleService($articleRepository);
        $dtcoe =  $articleService->getDatabyId($id);
        return view('dashboard.article.show', [
            'merchant' => $dtcoe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function prosesUpdate(Request $request)
    {
        //
        $articleRepository = new ArticleRepositoryImpl();
        $articleService = new ArticleService($articleRepository);
        $articleAdd =  $articleService->editArticle($request);
        return $articleAdd;
    }
    public function prosesCreate(Request $request)
    {
        //
        $articleRepository = new ArticleRepositoryImpl();
        $articleService = new ArticleService($articleRepository);
        $coeAdd =  $articleService->createArticle($request);
        return $coeAdd;
    }
}
