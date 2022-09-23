<?php

namespace App\Http\Controllers;

use App\Http\Repository\UserRepositoryImpl;
use App\Http\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.userlogin.index', [
        'posts' =>  DB::table('users')
            ->join('merchants', 'users.merchant_id','=', 'merchants.id_register') 
            ->select('users.id', 'users.merchant_id', 'users.name', 'users.email', 'merchants.merchant_name','users.status',
                'merchants.name_regencies')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.a
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.userlogin.create');
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
        $userRepository = new UserRepositoryImpl();
        $userService = new UserService($userRepository);
        $user = $userService->createUser($request);
        return $user;
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
        $userRepository = new UserRepositoryImpl();
        $userService = new UserService($userRepository);
        $data =  $userService->getDatabyId($id);
        return view('dashboard.userlogin.show', [
            'user' => $data
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
        $userRepository = new UserRepositoryImpl();
        $userService = new UserService($userRepository);
        $user = $userService->editUser($request);
        return $user;
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
