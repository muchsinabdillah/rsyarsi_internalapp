<?php

namespace App\Http\Controllers;

use App\Http\Repository\CenterOfExcellentRepositoryImpl;
use App\Http\Service\CenterOfExcellentService;
use App\Models\centerofexcelent;
use Illuminate\Http\Request;
use App\Traits\AwsTrait;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CenterOfExcellentController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.coe.index', [
            'posts' => centerofexcelent::latest()->paginate(10)->withQueryString()
        ]);
    }
    public function create()
    {
        //
        return view('dashboard.coe.create');
    }
    public function prosesCreate(Request $request)
    {
        //
        $coeRepository = new CenterOfExcellentRepositoryImpl();
        $coeService = new CenterOfExcellentService($coeRepository);
        $coeAdd =  $coeService->createCOE($request);
        return $coeAdd;
        
    }
    public function show($id)
    {
        $coeRepository = new CenterOfExcellentRepositoryImpl();
        $coeService = new CenterOfExcellentService($coeRepository);
        $dtcoe =  $coeService->getDatabyId($id);
        return view('dashboard.coe.show', [
            'merchant' => $dtcoe
        ]);
    }
    public function prosesUpdate(Request $request)
    {
        //
        $coeRepository = new CenterOfExcellentRepositoryImpl();
        $coeService = new CenterOfExcellentService($coeRepository);
        $coeAdd =  $coeService->editCoe($request);
        return $coeAdd;
    }
    public function checkSlug(Request $request){
        $slug =  SlugService::createSlug(centerofexcelent::class, 'slug', $request->name);
        
        return response()->json(['slug' =>$slug]);

    }
}
