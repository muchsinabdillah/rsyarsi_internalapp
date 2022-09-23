<?php

namespace App\Http\Controllers;

use App\Http\Repository\PromoRepositoryImpl;
use App\Http\Service\PromoService;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.promo.index', [
            'posts' => Promo::latest()->paginate(10)->withQueryString()
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
        return view('dashboard.promo.create');
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
        $articleRepository = new PromoRepositoryImpl();
        $articleService = new PromoService($articleRepository);
        $coeAdd =  $articleService->createPromo($request);
        return $coeAdd;
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
        $articleRepository = new PromoRepositoryImpl();
        $articleService = new PromoService($articleRepository);
        $dtcoe =  $articleService->getDatabyId($id);
        return view('dashboard.promo.show', [
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
    public function update(Request $request)
    {
        //
        $articleRepository = new PromoRepositoryImpl();
        $articleService = new PromoService($articleRepository);
        $articleAdd =  $articleService->editPromo($request);
        return $articleAdd;
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
}
