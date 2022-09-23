<?php

namespace App\Http\Controllers;

use App\Http\Repository\IndikatorMutuRepositoryImpl;
use App\Http\Service\IndikatorMutuService;
use App\Models\indikatormutumaster;
use Illuminate\Http\Request;

class IndikatorMutuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.indikatormutumaster.index', [
            'posts' => indikatormutumaster::latest()->paginate(10)->withQueryString()
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
        return view('dashboard.indikatormutumaster.create');
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
        $fasRepository = new IndikatorMutuRepositoryImpl();
        $fasService = new IndikatorMutuService($fasRepository);
        $coeAdd =  $fasService->createFas($request);
 
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
        $fasRepository = new IndikatorMutuRepositoryImpl();
        $fasService = new IndikatorMutuService($fasRepository);
        $dtcoe =  $fasService->getDatabyId($id);
        return view('dashboard.indikatormutumaster.show', [
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
        $fasRepository = new IndikatorMutuRepositoryImpl();
        $fasService = new IndikatorMutuService($fasRepository);
        $coeAdd =  $fasService->editFas($request);
 
        return $coeAdd;
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
