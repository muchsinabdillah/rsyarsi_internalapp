<?php

namespace App\Http\Repository;

use App\Models\Article;
use App\Models\centerofexcelent;
use App\Models\mastertransaksilogbook;
use App\Models\transaksilogbookdetails;
use App\Models\Promo;
use App\Models\transaksilogbookheaders;
use App\Models\masterloogbook;
use App\Http\Service\MasterTransaksiLogBookService;
use App\Models\formlistlogbook;
use App\Models\transaksilogbookdetail;
use App\Models\transaksilogbookheader;
use \Datetime;
use Carbon\Carbon;

class MasterTransaksiLogBookRepositoryImpl  implements MasterTransaksiLogBookRepositoryInterface
{
    public function createTransaksiLogBookToHeaders($request)
    {
        $trshdr = new transaksilogbookheader();
        $trshdr->ID_Pegawai = $request->ID_Pegawai;
        $a = $request->Nama_LogBook;
        $postst = masterloogbook::latest()->paginate(30)->withQueryString();
        foreach ($postst as $postt) {
            if ($postt['Nama_LogBook'] == $request->Nama_LogBook) {
                $trshdr->ID_LogBook = $postt['ID'];
            }
        }
        $trshdr->Unit = $request->Unit;
        $trshdr->Tanggal = $request->Tanggal_LogBook;
        $trshdr->$a = 1;
        $trshdr->save();
        return $trshdr;
    }
    public function createTransaksiLogBookToDetail($request)
    {
        $trshdr = new transaksilogbookdetail();
        $trshdr->Tanggal = $request->Tanggal_LogBook;
        $poststt = masterloogbook::latest()->paginate(30)->withQueryString();
        foreach ($poststt as $postt) {
            if ($postt['Nama_LogBook'] == $request->Nama_LogBook) {
                $trshdr->ID_LogBook = $postt['ID'];
            }
        }
        $trshdr->save();
        return $trshdr;
    }
    public function showDatabyId($id)
    {
        $dt =  transaksilogbookheader::find($id);
        return $dt;
    }
    public function showdatabyDate($request)
    {
        return transaksilogbookheader::where('Tanggal', $request->Tanggal_LogBook)->get();
    }
    public function UpdateTransaksiLogBookToHeaders($request)
    {
        $poststt = masterloogbook::latest()->paginate(30)->withQueryString();
        foreach ($poststt as $postt) {
            if ($postt['Nama_LogBook'] == $request->Nama_LogBook) {
                $z = $postt['ID'];
            }
        }
        $postst = transaksilogbookheader::latest()->paginate(30)->withQueryString();
        foreach ($postst as $postt) {
            $promosss = transaksilogbookheader::where('ID_Pegawai', $request->ID_Pegawai)->update([
                $request->Nama_LogBook => 1,
                'ID_LogBook' => $z
            ]);
        }
        return $promosss;
    }
    public function UpdateLogBook($request)
    {
        $fasRepository = new MasterTransaksiLogBookRepositoryImpl();
        $fasService = new MasterTransaksiLogBookService($fasRepository);
        $dtcoe =  $fasService->getDatabyId($request->ID);
        $a = $request->Nama_LogBook;

        //$now = new DateTime(); 
        $postss = masterloogbook::latest()->paginate(30)->withQueryString();
        foreach ($postss as $postt) {
            if ($postt['Nama_LogBook'] == $a) {
                $z = $postt['Nama_LogBook'];
            }
        }
        $s = $z;
        $postst = transaksilogbookheader::latest()->paginate(30)->withQueryString();
        foreach ($postst as $postt) {
            if ($postt['ID'] == $request->ID && $postt['Tanggal'] == $request->Tanggal_LogBook) {
                $updatesss = transaksilogbookheader::where('ID', $request->ID)->update([
                    $s => $postt[$s] = 0,
                    'ID_LogBook' => 1
                ]);
                return $updatesss;
            }
        }
        $updatess = transaksilogbookheader::where('ID', $request->ID)->update([]);
        return $updatess;
    }
}
