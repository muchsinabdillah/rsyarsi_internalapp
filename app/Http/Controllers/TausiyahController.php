<?php

namespace App\Http\Controllers;

use App\Http\Repository\FirebaseRepositoryImpl;
use App\Http\Repository\TausiyahRepositoryImpl;
use App\Http\Service\TausiyahService;
use App\Models\tausiah;
use Illuminate\Http\Request;

class TausiyahController extends Controller
{
    //
    public function index(){
        return view('dashboard.tausiah.index', [
            'posts' => tausiah::latest()->paginate(10)->withQueryString()
        ]);
    }
    public function create()
    {
        //
        return view('dashboard.tausiah.create');
    }
    public function prosesCreate(Request $request)
    {
        //
        $tausiyahRepository = new TausiyahRepositoryImpl();
        $firebaseRepository = new FirebaseRepositoryImpl();
        $tausiyahService = new TausiyahService($tausiyahRepository, $firebaseRepository);
        $fasAdd =  $tausiyahService->createTausiyah($request);
        return $fasAdd;
    }
    public function show($id)
    {
        $tausiyahRepository = new TausiyahRepositoryImpl();
        $firebaseRepository = new FirebaseRepositoryImpl();
        $tausiyahService = new TausiyahService($tausiyahRepository, $firebaseRepository);
        $dtcoe =  $tausiyahService->getDatabyId($id);
        return view('dashboard.tausiah.show', [
            'merchant' => $dtcoe
        ]);
    }
    public function prosesUpdate(Request $request)
    {
        //
        $tausiyahRepository = new TausiyahRepositoryImpl();
        $firebaseRepository = new FirebaseRepositoryImpl();
        $tausiyahService = new TausiyahService($tausiyahRepository, $firebaseRepository);
        $coeAdd =  $tausiyahService->editTausiyah($request);

        return $coeAdd;
    }
}
