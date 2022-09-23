<?php

namespace App\Http\Controllers;

use App\Http\Repository\HospitalPacketRepositoryImpl;
use App\Http\Service\HospitalPacketService;
use App\Models\hospitalpacket;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.hospitalpacket.index', [
            'posts' => hospitalpacket::latest()->paginate(10)->withQueryString()
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
        return view('dashboard.hospitalpacket.create');
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
        $Repository = new HospitalPacketRepositoryImpl();
        $Service = new HospitalPacketService($Repository);
        $coeAdd =  $Service->createHospitalPacket($request);
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
        $Repository = new HospitalPacketRepositoryImpl();
        $Service = new HospitalPacketService($Repository);
        $dtcoe =  $Service->getDatabyId($id);
        return view('dashboard.hospitalpacket.show', [
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
        $Repository = new HospitalPacketRepositoryImpl();
        $Service = new HospitalPacketService($Repository);
        $articleAdd =  $Service->editHospitalPacket($request);
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
