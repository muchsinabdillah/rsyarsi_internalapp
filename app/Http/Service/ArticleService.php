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
use App\Http\Repository\ArticleRepositoryImpl;
use Illuminate\Support\Facades\Storage;
use Aws\Exception\MultipartUploadException;
use App\Http\Repository\PatientRepositoryImpl;
use App\Http\Repository\MerchantRepositoryImpl;
use App\Http\Repository\CenterOfExcellentRepositoryImpl;
use App\Traits\AwsTrait;

class ArticleService extends Controller
{
    use AwsTrait;
    private $ArticleRepository;

    public function __construct(ArticleRepositoryImpl $ArticleRepository)
    {
        $this->ArticleRepository = $ArticleRepository;
    }
    public function createArticle(Request $request)
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
            /// AWS
            // Create an S3Client
            $tujuan_upload = 'img/articles/';
            $awsImages = $this->UploadtoAWS($request, $tujuan_upload);
            $this->ArticleRepository->insertData($request, $awsImages);
            DB::commit();
            return redirect('dashboard/articles/create')->with('success', 'Data Berhasil ditambahkan ! ');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/articles/create')->with('failed', 'Data Gagal ditambahkan !' . $e->getMessage());
        }
    }
    public function getDatabyId($id)
    {
        return $this->ArticleRepository->showDatabyId($id);
    }
    public function editArticle(Request $request)
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
                $tujuan_upload = 'img/articles/';
                $awsImages = $this->UploadtoAWS($request, $tujuan_upload);
                $this->ArticleRepository->updateData($request, $awsImages);
            } else {
                $this->ArticleRepository->updateDataWithOutImage($request);
            }
            DB::commit();
            return redirect('dashboard/articles/view/' . $request->id)->with('success', 'Data Berhasil diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/articles/view/' . $request->id)->with('failed', 'Data Gagal diedit !');
        }
    }
}
