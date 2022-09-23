<?php

namespace App\Http\Repository;
 
use App\Models\register;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class RegisterRepositoryImpl  implements RegisterRepositoryInterface
{
    public function insertData($request)
    {
        $genuser =   "Unconfirm".Carbon::now()->minute . Carbon::now()->second;
        $create =  register::create([ 
            'fullname' => $request->fullname,
            'email' => $request->email,
            'handphone' => $request->handphone,
            'address' => $request->address,
            'name_provinces' => $request->name_provinces,
            'id_provinces' => $request->id_provinces,
            'name_regencies' => $request->name_regencies,
            'id_regencies' => $request->id_regencies,
            'name_distrits' => $request->name_distrits,
            'id_distrits' => $request->id_distrits,
            'typemember' => $request->typemember,
            'id_villages' => $request->id_villages,
            'name_villages' => $request->name_villages,
            'username' => $genuser,
            'merchant_type' => $request->typemember,
            'merchant_name' => $request->merchant_name,
            'merchant_person' => $request->merchant_person,
            'status' => "Unconfirmed"
        ]);
        return $create;
        
    } 
    public function updateconfirmData($request)
    {
        $updates = register::where('id', $request->id)->update([
            'status' => "Confirmed"
        ]);
        return $updates;
    }
    public function updateconfirmRegistrationFinal($request)
    {
        $filektp = $request->file('filektp');
        $filestnk = $request->file('filestnk');
        $filesk = $request->file('filesk');

        /// Jika mau kirim ke aws
        // $s3Client = new S3Client([
        //     'version' => 'latest',
        //     'region'  => 'ap-southeast-1',
        //     'http'    => ['verify' => false],
        //     'credentials' => [
        //         'key'    => env('AWS_ACCESS_KEY_ID'),
        //         'secret' => env('AWS_SECRET_ACCESS_KEY')
        //     ]
        // ]);

        $nama_file_baru_ktp = Uuid::uuid4()->toString() . '.' . $filektp->extension();
        $tujuan_upload = 'img/ktp/';
        $filektp->move($tujuan_upload, $nama_file_baru_ktp);

        $nama_file_baru_stnk = Uuid::uuid4()->toString() . '.' . $filestnk->extension();
        $tujuan_upload = 'img/stnk/';
        $filestnk->move($tujuan_upload, $nama_file_baru_stnk);

        $nama_file_baru_sk = Uuid::uuid4()->toString() . '.' . $filesk->extension();
        $tujuan_upload = 'img/sk/';
        $filesk->move($tujuan_upload, $nama_file_baru_sk);
        
        // $file_name = 'img/delivered/' . $nama_file_baru;
        // $source =   $file_name;
        // $awsImages = '';

        // $bucket = env('AWS_BUCKET');
        // $key = basename($file_name);
        // $result = $s3Client->putObject([
        //     'Bucket' => $bucket,
        //     'Key'    => 'identitas/' . $key,
        //     'Body'   => fopen($source, 'r'),
        //     'ACL'    => 'public-read', // make file 'public', 
        // ]);
        // $awsImages = $result->get('ObjectURL');
        // unlink($file_name);

        $updates = register::where('id', $request->id_f)->update([
            'id_identitas' => $request->identitasid,
            'dob' => $request->dob,
            'dob_place' => $request->dobplace,
            'status' => "Generating",
            'foto_ktp' => $nama_file_baru_ktp,
            'foto_stnk' => $nama_file_baru_stnk,
            'foto_sk' => $nama_file_baru_sk,
            
            'nama_bank' => $request->nama_bank,
            'no_rekening' => $request->no_rekening,
            'name_rekening_owner' => $request->name_rekening_owner
        ]);
        return $updates; 
    }
    public function updateGenerateDataMitra($request, $genauto, $now, $password)
    { 
        
        $select = register::where('id', $request->id_f) 
                ->select(array('merchant_name',
                                'handphone',
                                'merchant_type',
                                'merchant_person',
                                'address',
                                DB::raw("'Active' as status"),
                                'email',
                                DB::raw("'$genauto' as id_register"),
                                'id_regencies',
                                'name_regencies',
                                DB::raw("'$now' as created_at"),
                                DB::raw("'$now' as updated_at")));
        $bindings = $select->getBindings();
        $insertQuery = 'INSERT into merchants (merchant_name,
                                phone_number,
                                merchant_type,
                                merchant_person,
                                address,
                                status,
                                email,
                                id_register,
                                id_regencies,
                                name_regencies,
                                created_at,
                                updated_at) '
                        . $select->toSql();
        $updates = DB::insert($insertQuery, $bindings); 
        return $updates;
    }
    public function updateGenerateDataKurir($request, $genauto, $now, $password)
    {
       
        $select = register::where('id', $request->id_f)
            ->select(array(
                'fullname',
                'handphone',  
                'address',
                DB::raw("'Active' as status"),
                'email',
                DB::raw("'$genauto' as id_register"),
                'id_regencies',
                'name_regencies',
                'name_provinces',
                'id_provinces',
                'name_distrits',
                'id_distrits',
                'name_villages',
                'id_villages',
                DB::raw("'$now' as created_at"),
                DB::raw("'$now' as updated_at")
            ));
        $bindings = $select->getBindings();
        $insertQuery = 'INSERT into couriers (
                                Name,
                                phone_number,  
                                address,
                                status,
                                email,
                                id_register,
                                id_regencies,
                                name_regencies,
                                name_provinces,
                                id_provinces,
                                name_distrits,
                                id_distrits,
                                name_villages,
                                id_villages,
                                created_at,
                                updated_at) '
        . $select->toSql();
        $updates = DB::insert($insertQuery, $bindings);
        return $updates;
    }
    public function generateUserLogin($request, $genauto, $now, $password)
    {
        $genuser= 'JOKI-' . Str::lower(Str::random(4)) . Carbon::now()->minute . Carbon::now()->second;
        $select = register::where('id', $request->id_f)
            ->select(array(
                'fullname',  
                DB::raw("'Active' as status"),
                'email',
                DB::raw("'$genauto' as id_register"),
                'merchant_name', 
                'id_regencies',
                
                'name_regencies',
                'name_provinces',
                'id_provinces',
                'name_distrits',
                'id_distrits',
                'name_villages',
                'id_villages',
                DB::raw("'$now' as created_at"),
                DB::raw("'$now' as updated_at"),
                'typemember',
                DB::raw("'$genuser' as username"), 
                DB::raw("'$password' as password"),
                DB::raw("'admin' as user_update")
            ));
        $bindings = $select->getBindings();
        $insertQuery = 'INSERT into users (
                                name,  
                                status,
                                email,
                                merchant_id,
                                merchant_name, 
                                id_regencies,
                                name_regencies,
                                name_provinces,
                                id_provinces,
                                name_distrits,
                                id_distrits,
                                name_villages,
                                id_villages,
                                created_at,
                                updated_at,
                                level,
                                username,
                                password,
                                user_update ) '
        . $select->toSql();
        $updates = DB::insert($insertQuery, $bindings);
        return $updates;
    }
    public function updateFinishData($request, $genauto)
    {
        $updates = register::where('id', $request->id_f)->update([
            'status' => "Finished",
            'merchant_id' => $genauto,
        ]);
        return $updates;
    }
    public function updateCancelData($request)
    {
        $updates = register::where('id', $request->id)->update([
            'status' => "Cancelled"
        ]);
        return $updates;
    }
}
