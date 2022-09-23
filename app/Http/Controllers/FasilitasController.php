<?php

namespace App\Http\Controllers;

use App\Http\Repository\FasilitasRepositoryImpl;
use App\Http\Service\FasilitasService;
use App\Models\facilitie;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class FasilitasController extends Controller
{
    //a
    public function index()
    {
        return view('dashboard.fasilitas.index', [
            'posts' => facilitie::latest()->paginate(10)->withQueryString()
        ]);
    }
    public function create()
    {
        //
        return view('dashboard.fasilitas.create');
    }
    public function prosesCreate(Request $request)
    {
        //
        $fasRepository = new FasilitasRepositoryImpl();
        $fasService = new FasilitasService($fasRepository);
        $fasAdd =  $fasService->createFas($request);
        return $fasAdd;
    }
    public function show($id)
    {
        $fasRepository = new FasilitasRepositoryImpl();
        $fasService = new FasilitasService($fasRepository);
        $dtcoe =  $fasService->getDatabyId($id);
        return view('dashboard.fasilitas.show', [
            'merchant' => $dtcoe
        ]);
    }
    public function prosesUpdate(Request $request)
    {
        //
        $fasRepository = new FasilitasRepositoryImpl();
        $fasService = new FasilitasService($fasRepository);
        $coeAdd =  $fasService->editFas($request);
 
        return $coeAdd;
    }
    public function checkSlug(Request $request)
    {
        $slug =  SlugService::createSlug(facilitie::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
