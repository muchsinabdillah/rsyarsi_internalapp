<?php

namespace App\Http\Service;

use Exception;
use Aws\S3\S3Client;
use App\Models\Merchant;
use App\Models\maternalday;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\maternalprogram;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Aws\Exception\MultipartUploadException;
use App\Http\Repository\PatientRepositoryImpl;
use App\Http\Repository\MerchantRepositoryImpl;
use App\Http\Repository\CenterOfExcellentRepositoryImpl;
use App\Traits\AwsTrait;
class CenterOfExcellentService extends Controller
{
    use AwsTrait;
    private $COERepository;

    public function __construct(CenterOfExcellentRepositoryImpl $COERepository)
    {
        $this->COERepository = $COERepository;
    }
    public function createCOE(Request $request)
    {
        // validate 
        $request->validate([
            "name" => "required",
            "description" => "required",
            'image' => 'image|file|max:4000'
        ]);
        try {
            // Db Transaction
            DB::beginTransaction();
            /// AWS
            // Create an S3Client
            $tujuan_upload = 'img/coe/';
            $awsImages = $this->UploadtoAWS($request, $tujuan_upload);
            $this->COERepository->insertData($request, $awsImages);
            DB::commit();
            return redirect('dashboard/coe/create')->with('success', 'Data Berhasil ditambahkan ! ');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/coe/create')->with('failed', 'Data Gagal ditambahkan !' . $e->getMessage());
        }
    }
    public function getDatabyId($id)
    {
        return $this->COERepository->showDatabyId($id);
    }
    public function editCoe(Request $request)
    {
        // validate 
        $request->validate([
            "ID" => "required",
            "name" => "required",
            "description" => "required",
            'image' => 'image|file'
        ]);
        try {
            // Db Transaction
            DB::beginTransaction();
            if ($request->file('image')) { 
                $tujuan_upload = 'img/coe/';
                $awsImages = $this->UploadtoAWS($request, $tujuan_upload);
                $this->COERepository->updateData($request, $awsImages);
            } else {
                $this->COERepository->updateDataWithOutImage($request);
            } 
            DB::commit();
            return redirect('dashboard/coe/view/' . $request->ID)->with('success', 'Data Berhasil diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/coe/view/' . $request->ID)->with('failed', 'Data Gagal diedit !');
        }
    }
     
}
