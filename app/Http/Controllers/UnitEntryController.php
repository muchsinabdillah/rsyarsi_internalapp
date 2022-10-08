<?php

namespace App\Http\Controllers;

use App\Http\Repository\UnitEntryRepositoryImpl;
use App\Http\Service\UnitEntryService;
use App\Models\unitentry;
use Illuminate\Http\Request;

class UnitEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.unitentry.index', [
            'posts' => unitentry::latest()->paginate(50)->withQueryString()
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
        return view('dashboard.unitentry.create', [
            'postss' => unitentry::latest()->paginate(50)->withQueryString()
        ]);
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
        $unitentryRepository = new UnitEntryRepositoryImpl();
        $registerService = new UnitEntryService($unitentryRepository);
        $reg =  $registerService->createUnitEntry($request);
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
        $unitentryRepository = new UnitEntryRepositoryImpl();
        $fasService = new UnitEntryService($unitentryRepository);
        $dtcoe =  $fasService->getDatabyId($id);
        return view('dashboard.unitentry.show', [
            'unitEntry' => $dtcoe, 'postss' => unitentry::latest()->paginate(50)->withQueryString()
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
        $unitentryRepository = new UnitEntryRepositoryImpl();
        $registerService = new UnitEntryService($unitentryRepository);
        $reg =  $registerService->UpdateUnitEntry($request);
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
