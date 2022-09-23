<?php

namespace App\Http\Service;

use Exception; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Repository\HospitalPacketRepositoryImpl; 
use App\Traits\AwsTrait;

class HospitalPacketService extends Controller
{
    use AwsTrait;
    private $HospitalPacketRepository;

    public function __construct(HospitalPacketRepositoryImpl $HospitalPacketRepository)
    {
        $this->HospitalPacketRepository = $HospitalPacketRepository;
    }
    public function createHospitalPacket(Request $request)
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
            $tujuan_upload = 'img/hospitalpackets/';
            $awsImages = $this->UploadtoAWS($request, $tujuan_upload);
            $this->HospitalPacketRepository->insertData($request, $awsImages);
            DB::commit();
            return redirect('dashboard/hospitalpacket/create')->with('success', 'Data Berhasil ditambahkan ! ');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/hospitalpacket/create')->with('failed', 'Data Gagal ditambahkan !' . $e->getMessage());
        }
    }
    public function getDatabyId($id)
    {
        return $this->HospitalPacketRepository->showDatabyId($id);
    }
    public function editHospitalPacket(Request $request)
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
                $tujuan_upload = 'img/hospitalpackets/';
                $awsImages = $this->UploadtoAWS($request, $tujuan_upload);
                $this->HospitalPacketRepository->updateData($request, $awsImages);
            } else {
                $this->HospitalPacketRepository->updateDataWithOutImage($request);
            }
            DB::commit();
            return redirect('dashboard/hospitalpacket/view/' . $request->id)->with('success', 'Data Berhasil diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/hospitalpacket/view/' . $request->id)->with('failed', 'Data Gagal diedit !' . $e->getMessage());
        }
    }
}
