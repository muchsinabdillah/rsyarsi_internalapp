<?php

namespace App\Http\Controllers;

use App\Http\Repository\PatientRepositoryImpl;
use App\Http\Service\PatientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaternalInformationController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.information.materna.infomaternarekap', [
            'posts' =>  []
        ]);
    }
    public function processdatamaternarekap(Request $request)
    {
       
        return view('dashboard.information.materna.infomaternarekap', [
            'posts' =>  DB::table('v_info_materna_rekap') 
                ->whereBetween('v_info_materna_rekap.Tgl_Lahiran', [$request->date1, $request->date2])
                ->paginate(100)
        ]);
    }
    public function create()
    {
        //
        return view('dashboard.patient.create');
    }
    public function insert(Request $request)
    {
        //
        $patientRepository = new PatientRepositoryImpl();
        $patientService = new PatientService($patientRepository);
        $patienti =  $patientService->createPatient($request);
        return $patienti;
    }

}
