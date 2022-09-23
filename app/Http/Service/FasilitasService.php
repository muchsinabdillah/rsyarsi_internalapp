<?php

namespace App\Http\Service;

use Exception;
use Aws\S3\S3Client;
use App\Models\Merchant;
use App\Traits\AwsTrait;
use App\Models\maternalday;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\maternalprogram;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Repository\PatientRepositoryImpl;
use App\Http\Repository\MerchantRepositoryImpl;
use App\Http\Repository\FasilitasRepositoryImpl;
use App\Http\Repository\CenterOfExcellentRepositoryImpl;

class FasilitasService extends Controller
{
    use AwsTrait;
    private $fasRepository;

    public function __construct(FasilitasRepositoryImpl $fasRepository)
    {
        $this->fasRepository = $fasRepository;
    }

    public function createFas(Request $request)
    {
        // validate 
        $request->validate([
            "name" => "required",
            "shortdescription" => "required",
            "longdescription" => "required",
            'image' => 'image|file'
        ]);

        try {
            // Db Transaction
            DB::beginTransaction(); 
            $tujuan_upload = 'img/fas/';
            $awsImages = $this->UploadtoAWS($request, $tujuan_upload);
            $this->fasRepository->insertData($request, $awsImages);

            DB::commit();
            return redirect('dashboard/fasilitas/create')->with('success', 'Data Fasilitas Berhasil ditambahkan !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/coe/create')->with('failed', 'Data Fasilitas Gagal ditambahkan ! '. $e->getMessage() );
        }
    }
    public function getDatabyId($id)
    {
        return $this->fasRepository->showDatabyId($id);
    }
    public function editFas(Request $request)
    {
        // validate 
        
        try {
            // Db Transaction
            DB::beginTransaction();

            $request->validate([
                "name" => "required",
                "shortdescription" => "required",
                "longdescription" => "required",
                'image' => 'image|file'
            ]);
 
            if ($request->file('image')) { 
                $tujuan_upload = 'img/fas/';
                $awsImages = $this->UploadtoAWS($request, $tujuan_upload);
                $this->fasRepository->updateData($request, $awsImages);
            } else { 
                $this->fasRepository->updateDataWithOutImage($request);
            } 
            DB::commit(); 
            return redirect('dashboard/fasilitas/view/' . $request->ID)->with('success', 'Data Fasilitas Berhasil diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/fasilitas/view/' . $request->ID)->with('failed',$e->getMessage());
        }
    } 
}
