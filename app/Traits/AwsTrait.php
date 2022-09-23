<?php

namespace App\Traits;

use Aws\S3\S3Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseRequisition;
use Illuminate\Support\Facades\Storage;

trait AwsTrait
{
    //Your Function Here
    public function UploadtoAWS($request, $tujuan_upload)
    {
        $awsImages = '';
        $file = $request->file('image');
        if ($request->file('image')) {
            $nama_file = Str::uuid() . '.' . $file->getClientOriginalExtension();
            // isi dengan nama folder tempat kemana file diupload 
            $source =  $file->move($tujuan_upload, $nama_file);
            $s3Client = new S3Client([
                'version' => 'latest',
                'region'  => env('AWS_DEFAULT_REGION'),
                'http'    => ['verify' => false],
                'credentials' => [
                    'key'    => env('AWS_ACCESS_KEY_ID'),
                    'secret' => env('AWS_SECRET_ACCESS_KEY')
                ]
            ]);
            $file_name = $tujuan_upload . $nama_file;
            $source =   $file_name;
           
            if ($tujuan_upload == "img/fas/") {
                $keyaws = 'app/webs/fas/';
            } elseif ($tujuan_upload == "img/coe/") {
                $keyaws = 'app/webs/coe/';
            } elseif ($tujuan_upload == "img/articles/") {
                $keyaws = 'app/webs/articles/';
            } elseif ($tujuan_upload == "img/promos/") {
                $keyaws = 'app/webs/promo/';
            } elseif ($tujuan_upload == "img/hospitalpackets/") {
                $keyaws = 'app/webs/hospitalpackets/';
            }
            $bucket = env('AWS_BUCKET');
            $key = basename($file_name);
            $result = $s3Client->putObject([
                'Bucket' => $bucket,
                'Key'    => $keyaws . $key,
                'Body'   => fopen($source, 'r'),
                'ACL'    => 'public-read', // make file 'public', 
            ]);
            $awsImages = $result->get('ObjectURL');
            Storage::delete($file_name);
            
        } else {
            $nama_file =  '';
            $source = '';
        }
        return $awsImages;
    } 
}
