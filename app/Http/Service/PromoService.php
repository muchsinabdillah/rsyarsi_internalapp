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
use App\Http\Repository\PromoRepositoryImpl;
use Illuminate\Support\Facades\Storage;
use Aws\Exception\MultipartUploadException;
use App\Http\Repository\PatientRepositoryImpl;
use App\Http\Repository\MerchantRepositoryImpl;
use App\Http\Repository\CenterOfExcellentRepositoryImpl;
use App\Traits\AwsTrait;

class PromoService extends Controller
{
    use AwsTrait;
    private $PromoRepository;

    public function __construct(PromoRepositoryImpl $PromoRepository)
    {
        $this->PromoRepository = $PromoRepository;
    }
    public function createPromo(Request $request)
    {
        // validate 
        $request->validate([
            "title" => "required",
            "shortdescription" => "required",
            "longdescription" => "required",
            "slug" => "required",
            "publish" => "required",
            "startdate" => "required",
            "enddate" => "required",
            'image' => 'image|file|max:4000'
        ]);
        try {
            // Db Transaction
            DB::beginTransaction();
            /// AWS
            // Create an S3Client
            $tujuan_upload = 'img/promos/';
            $awsImages = $this->UploadtoAWS($request, $tujuan_upload);
            $this->PromoRepository->insertData($request, $awsImages);
            DB::commit();
            return redirect('dashboard/promos/create')->with('success', 'Data Berhasil ditambahkan ! ');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/promos/create')->with('failed', 'Data Gagal ditambahkan !' . $e->getMessage());
        }
    }
    public function getDatabyId($id)
    {
        return $this->PromoRepository->showDatabyId($id);
    }
    public function editPromo(Request $request)
    {
        // validate 
        $request->validate([
            "title" => "required",
            "shortdescription" => "required",
            "longdescription" => "required",
            "slug" => "required",
            "publish" => "required",
            'image' => 'image|file|max:4000'
        ]);
        try {
            // Db Transaction
            DB::beginTransaction();
            if ($request->file('image')) {
                $tujuan_upload = 'img/promos/';
                $awsImages = $this->UploadtoAWS($request, $tujuan_upload);
                $this->PromoRepository->updateData($request, $awsImages);
            } else {
                $this->PromoRepository->updateDataWithOutImage($request);
            }
            DB::commit();
            return redirect('dashboard/promos/view/' . $request->id)->with('success', 'Data Berhasil diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/promos/view/' . $request->id)->with('failed', 'Data Gagal diedit !' . $e->getMessage());
        }
    }
}
