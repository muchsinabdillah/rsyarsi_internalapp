<?php

namespace App\Http\Controllers;

use App\Http\Repository\UserEntryRepositoryImpl;
use App\Http\Service\UserEntryService;
use App\Models\userentry;
use App\Models\unitentry;
use Illuminate\Http\Request;

class UserEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.userentry.index', [
            'posts' => userentry::latest()->paginate(50)->withQueryString(),
            'postsss' => unitentry::latest()->paginate(50)->withQueryString()
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
        return view('dashboard.userentry.create', [
            'postss' => userentry::latest()->paginate(50)->withQueryString(),
            'postsss' => unitentry::latest()->paginate(50)->withQueryString()
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
        $userentryRepository = new UserEntryRepositoryImpl();
        $registerService = new UserEntryService($userentryRepository);
        $reg =  $registerService->createUserEntry($request);
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
        $fasRepository = new UserEntryRepositoryImpl();
        $fasService = new UserEntryService($fasRepository);
        $dtcoe =  $fasService->getDatabyId($id);
        return view('dashboard.userentry.show', [
            'userEntry' => $dtcoe, 'postss' => userentry::latest()->paginate(50)->withQueryString(),
            'postsss' => unitentry::latest()->paginate(50)->withQueryString()
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
        $userentryRepository = new UserEntryRepositoryImpl();
        $registerService = new UserEntryService($userentryRepository);
        $reg =  $registerService->UpdateUserEntry($request);
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
