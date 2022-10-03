<?php

namespace App\Http\Controllers;

use App\Http\Repository\MasterLogBookRepositoryImpl;
use App\Http\Service\MasterLogBookService;
use App\Models\masterloogbook;
use Illuminate\Http\Request;

class LogBookPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.masterdata.logbook.index', [
            'posts' => masterloogbook::latest()->paginate(30)->withQueryString()
        ]);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.masterdata.logbook.create');
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
        $mstrLogbookRepository = new MasterLogBookRepositoryImpl();
        $registerService = new MasterLogBookService($mstrLogbookRepository);
        $reg =  $registerService->createLogBook($request);
        return $reg;
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
        $fasRepository = new MasterLogBookRepositoryImpl();
        $fasService = new MasterLogBookService($fasRepository);
        $dtcoe =  $fasService->getDatabyId($id);
        return view('dashboard.masterdata.logbook.show', [
            'mstrlogbook' => $dtcoe
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
        $mstrLogbookRepository = new MasterLogBookRepositoryImpl();
        $registerService = new MasterLogBookService($mstrLogbookRepository);
        $reg =  $registerService->updateLogBook($request);
        return $reg;
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
