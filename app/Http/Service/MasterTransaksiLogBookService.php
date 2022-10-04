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
use App\Http\Repository\MasterTransaksiLogBookRepositoryImpl;
use App\Http\Repository\PatientRepositoryImpl;
use App\Http\Repository\MerchantRepositoryImpl;
use DateTime;

class MasterTransaksiLogBookService extends Controller
{
    private $mstrTransaksiLogbook;

    public function __construct(MasterTransaksiLogBookRepositoryImpl $mstrTransaksiLogbook)
    {
        $this->mstrTransaksiLogbook = $mstrTransaksiLogbook;
    }
    public function createTransaksiLogBook(Request $request)
    {
        // validate 
        $request->validate([
            "Tanggal_LogBook" => "required",
            "Nama_LogBook" => "required",
            "Unit" => "required",
            "Nama_LogBook" => "required",
        ]);
        try {
            // dd($request);
            // Db Transaction
            DB::beginTransaction();
            $date = new DateTime();
            if (!($request->Tanggal_LogBook > $date->format('Y-m-d'))) {
                $cekdata = $this->mstrTransaksiLogbook->showdatabyDate($request)->count();
                if ($cekdata > 0) {
                    $this->mstrTransaksiLogbook->UpdateTransaksiLogBookToHeaders($request);
                    $this->mstrTransaksiLogbook->createTransaksiLogBookToDetail($request);
                } else {
                    $this->mstrTransaksiLogbook->createTransaksiLogBookToHeaders($request);
                }
                DB::commit();
                return redirect('dashboard/transactionLogbook/create')->with('success', 'Data Berhasil Ditambahkan ! ');
            } else {
                return redirect('dashboard/transactionLogbook/create')->with('failed', 'Tanggal Harus Hari Ini atau Sebelumnya !');
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/transactionLogbook/create')->with('failed', 'Data Gagal Ditambahkan !' . $e->getMessage());
        }
    }
    public function UpdateLogBook(Request $request)
    {
        // validate 
        $request->validate([
            "Tanggal_LogBook" => "required",
            "Nama_LogBook" => "required",
        ]);
        try {
            // Db Transaction
            DB::beginTransaction();
            // $this->mstrTransaksiLogbook->UpdateTransaksiLogBookToHeaders($request);
            $this->mstrTransaksiLogbook->UpdateLogBook($request);
            DB::commit();
            return redirect('dashboard/transactionLogbook/view/' . $request->ID)->with('success', 'Data Berhasil Diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/transactionLogbook/view/' . $request->ID)->with('failed', $e->getMessage());
        }
    }
    public function getDatabyId($id)
    {
        return $this->mstrTransaksiLogbook->showDatabyId($id);
    }
}
