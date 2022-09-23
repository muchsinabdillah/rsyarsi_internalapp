<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Service\MerchantService;
use App\Http\Service\RegisterService;
use App\Http\Repository\MerchantRepositoryImpl;
use App\Http\Repository\RegisterRepositoryImpl;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.registration.verification', [

            'posts' =>  DB::table('registers')  
                ->whereIn('registers.status', array('Unconfirmed', 'Confirmed', 'Waiting', 'Generating') ) 
                ->orderByDesc('registers.id')
                ->orderByDesc('registers.status') 
                ->paginate(10)
        ]);
    }
    public function history()
    {
        //
        return view('dashboard.registration.verificationfinish', [

            'posts' =>  DB::table('registers')
                ->whereIn('registers.status', array('Finished'))
                ->orderByDesc('registers.id')
                ->orderByDesc('registers.status')
                ->paginate(10)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // ddd($request);
        $registerRepository = new RegisterRepositoryImpl();
        $registerService = new RegisterService($registerRepository);
        $reg =  $registerService->confirmationRegister($request);
        return $reg;
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
        $registerRepository = new RegisterRepositoryImpl(); 
        $registerService = new RegisterService($registerRepository);
        $reg =  $registerService->createRegister($request);
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
        return view('homepage.verificationreg', [
            'idreg' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //  
        $registerRepository = new RegisterRepositoryImpl();
        $registerService = new RegisterService($registerRepository);
        $reg =  $registerService->confirmationRegistrationFinish($request);
        return $reg;
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
        // dd($request);
        $registerRepository = new RegisterRepositoryImpl();
        $registerService = new RegisterService($registerRepository);
        $reg =  $registerService->finishedRegistration($request);
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
