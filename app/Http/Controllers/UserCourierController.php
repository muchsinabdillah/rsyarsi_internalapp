<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\UserService;
use Illuminate\Support\Facades\DB;
use App\Http\Service\UserCourierService;
use App\Http\Repository\UserRepositoryImpl;

class UserCourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.userlogincourier.index', [
            'posts' =>  DB::table('users')
            ->join('couriers', 'users.merchant_id', '=', 'couriers.id_register')
            ->select(
                'users.id',
                'users.merchant_id',
                'users.name',
                'users.email',
                'users.name_regencies',
                'couriers.Name',
                'users.status'
            )->paginate(10)
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
        return view('dashboard.userlogincourier.create');
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
        $userService = new UserCourierService($userRepository);
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
        return view('dashboard.userlogincourier.show', [
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
        $userService = new UserCourierService($userRepository);
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
