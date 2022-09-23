<?php

namespace App\Http\Controllers;

use App\Http\Repository\KeluhanPasienRepositoryImpl;
use App\Http\Service\KeluhanPasienService;
use App\Models\sick;
use Illuminate\Http\Request;

class KeluhanPasienController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.keluhan.index', [
            'posts' => sick::latest()->paginate(10)->withQueryString()
        ]);
    }
    public function show($id)
    {
        $fasRepository = new KeluhanPasienRepositoryImpl();
        $fasService = new KeluhanPasienService($fasRepository);
        $dtcoe =  $fasService->getDatabyId($id);
        return view('dashboard.keluhan.show', [
            'merchant' => $dtcoe
        ]);
    }
    public function prosesUpdate(Request $request)
    { 
        $fasRepository = new KeluhanPasienRepositoryImpl();
        $fasService = new KeluhanPasienService($fasRepository);
        $dtcoe =  $fasService->editKeluhanPasien($request);
        return  $dtcoe ;
    }
}
