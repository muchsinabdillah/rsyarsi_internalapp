<?php

namespace App\Http\Service;

use Exception;
use App\Models\Merchant;
use App\Models\maternalday;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\maternalprogram;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Repository\CenterOfExcellentRepositoryImpl;
use App\Http\Repository\FasilitasRepositoryImpl;
use App\Http\Repository\KeluhanPasienRepositoryImpl;
use App\Http\Repository\MasterLogBookRepositoryImpl;
use App\Http\Repository\PatientRepositoryImpl;
use App\Http\Repository\MerchantRepositoryImpl;

class MasterLogBookService extends Controller
{

    private $mstrLogBook;

    public function __construct(MasterLogBookRepositoryImpl $mstrLogBook)
    {
        $this->mstrLogBook = $mstrLogBook;
    }

    public function createLogBook(Request $request)
    {
        // validate 
        $request->validate([
            "Nama_LogBook" => "required",
            "Status" => "required",
        ]);
        try {
            // Db Transaction
            DB::beginTransaction();
            $this->mstrLogBook->createLogBook($request);
            DB::commit();
            return redirect('dashboard/logbookpegawai/create')->with('success', 'Data Berhasil ditambahkan ! ');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/logbookpegawai/create')->with('failed', 'Data Gagal ditambahkan !' . $e->getMessage());
        }
    }
    public function updateLogBook(Request $request)
    {
        // validate 
        $request->validate([
            "Nama_LogBook" => "required",
            "Status" => "required",
        ]);
        try {
            // Db Transaction
            //dd($request);
            DB::beginTransaction();
            $this->mstrLogBook->UpdateLogBook($request);
            DB::commit();
            return redirect('dashboard/logbookpegawai/view/' . $request->ID)->with('success', 'Data Berhasil diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/logbookpegawai/view/' . $request->ID)->with('failed', $e->getMessage());
        }
    }
    public function getDatabyId($id)
    {
        return $this->mstrLogBook->showDatabyId($id);
    }
}
