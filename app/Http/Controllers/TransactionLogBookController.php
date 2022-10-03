<?php

namespace App\Http\Controllers;

use App\Http\Repository\MasterTransaksiLogBookRepositoryImpl;
use App\Http\Service\MasterTransaksiLogBookService;
use App\Models\formlistlogbook;
use App\Models\masterloogbook;
use App\Models\transaksilogbookdetail;
use App\Models\transaksilogbookheader;
use Illuminate\Http\Request;

class TransactionLogBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.masterdata.transaksiLogBook.index', [
            'posts' => transaksilogbookheader::latest()->paginate(30)->withQueryString(),
            'postss' => masterloogbook::latest()->paginate(30)->withQueryString(),
        ]);
    }
    /*
    public function formlist()
    {
        //
        return view('dashboard.masterdata.transaksiLogBook.formlist.index', [
            'postsss' => formlistlogbook::latest()->paginate(10)->withQueryString()
        ]);
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.masterdata.transaksiLogBook.create', [
            'postss' => masterloogbook::latest()->paginate(30)->withQueryString()
        ]);
    }
    /*
    public function createformlist()
    {
        //
        return view('dashboard.masterdata.transaksiLogBook.formlist.create', [
            'postsss' => formlistlogbook::latest()->paginate(10)->withQueryString()
        ]);
    }*/


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $mstrTransaksiLogBookRepository = new MasterTransaksiLogBookRepositoryImpl();
        $registerService = new MasterTransaksiLogBookService($mstrTransaksiLogBookRepository);
        $reg =  $registerService->createTransaksiLogBook($request);
        return $reg;
    }
    /*
    public function storeformlist(Request $request)
    {
        //
        $formListLogBookRepository = new MasterTransaksiLogBookRepositoryImpl();
        $registerService = new MasterTransaksiLogBookService($formListLogBookRepository);
        $reg =  $registerService->createFormListLogBook($request);
        return $reg;
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $fasRepository = new MasterTransaksiLogBookRepositoryImpl();
        $fasService = new MasterTransaksiLogBookService($fasRepository);
        $dtcoe =  $fasService->getDatabyId($id);
        return view('dashboard.masterdata.transaksilogbook.show', [
            'mstrTransaksiLogbook' => $dtcoe, 'postss' => masterloogbook::latest()->paginate(30)->withQueryString()
        ]);
    }
    /*
    public function showformlist($id)
    {
        //
        $fasRepository = new MasterTransaksiLogBookRepositoryImpl();
        $fasService = new MasterTransaksiLogBookService($fasRepository);
        $dtcoe =  $fasService->getDatabyId($id);
        return view('dashboard.masterdata.transaksilogbook.show', [
            'mstrTransaksiLogbook' => $dtcoe, 'postss' => formlistlogbook::latest()->paginate(10)->withQueryString()
        ]);
    }*/

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
        $mstrTransaksiLogbookRepository = new MasterTransaksiLogBookRepositoryImpl();
        $registerService = new MasterTransaksiLogBookService($mstrTransaksiLogbookRepository);
        $reg =  $registerService->UpdateLogBook($request);
        return $reg;
    }
    /*
    public function updateformlist(Request $request)
    {
        //
        $mstrTransaksiLogbookRepository = new MasterTransaksiLogBookRepositoryImpl();
        $registerService = new MasterTransaksiLogBookService($mstrTransaksiLogbookRepository);
        $reg =  $registerService->updateTransaksiLogBook($request);
        return $reg;
    }*/

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
