<?php

namespace App\Http\Service;

use Exception;
use Aws\S3\S3Client; 
use App\Traits\AwsTrait; 
use Illuminate\Support\Str;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller; 
use App\Http\Repository\FasilitasRepositoryImpl;
use App\Http\Repository\IndikatorMutuRepositoryImpl;

class IndikatorMutuService extends Controller
{
    use AwsTrait;
    private $imutRepository;

    public function __construct(IndikatorMutuRepositoryImpl $imutRepository)
    {
        $this->imutRepository = $imutRepository;
    }

    public function createFas(Request $request)
    {
        // validate 
        $request->validate([
            "JudulIndikator" => "required",
            // "Department" => "required",
            // "DasarPemikiran" => "required",
            // "Tujuan" => "required",
            // "DefinisiOperasional" => "required",  
            // "JenisIndikator" => "required",  
            // "SatuanPengukuran" => "required",  
            // "Numerator" => "required",
            // "PeriodePengumpulanData" => "required",
            // "Denominator" => "required",
            // "TargetPencapaian" => "required",
            // "Kriteria" => "required",
            // "MetodePengumpulanData" => "required",
            // "SumberData" => "required",
            // "InstrumenPengambilanData" => "required",
            // "BesarSample" => "required",
            // "CaraPengambilanSample" => "required", 
            // "PenyajianData" => "required",
            // "PeriodeAnalisa" => "required",
            // "PenaggungJawab" => "required" 
            
        ]);
   
        try {
            // Db Transaction
            DB::beginTransaction();  
 
            if($request->has('DimensiMutu')){ $DimensiMutu = 1; }else{ $DimensiMutu = 0; }
            if($request->has('DimensiMutu2')){ $DimensiMutu2 = 1; }else{ $DimensiMutu2 = 0; }
            if($request->has('DimensiMutu3')){ $DimensiMutu3 = 1; }else{ $DimensiMutu3 = 0; }
            if($request->has('DimensiMutu4')){ $DimensiMutu4 = 1; }else{ $DimensiMutu4 = 0; }
            if($request->has('DimensiMutu5')){ $DimensiMutu5 = 1; }else{ $DimensiMutu5 = 0; }
            if($request->has('DimensiMutu6')){ $DimensiMutu6 = 1; }else{ $DimensiMutu6 = 0; }
            
            if($request->has('CaraAmbilSample')){ $CaraAmbilSample = 1; }else{ $CaraAmbilSample = 0; }
            if($request->has('CaraAmbilSample2')){ $CaraAmbilSample2 = 1; }else{ $CaraAmbilSample2 = 0; }
            if($request->has('CaraAmbilSample3')){ $CaraAmbilSample3 = 1; }else{ $CaraAmbilSample3 = 0; }
            if($request->has('CaraAmbilSample4')){ $CaraAmbilSample4 = 1; }else{ $CaraAmbilSample4 = 0; }


       
            if($request->has('PenyajianData3')){ $PenyajianData3 = 1; }else{ $PenyajianData3 = 0; }
            if($request->has('PenyajianData2')){ $PenyajianData2 = 1; }else{ $PenyajianData2 = 0; }
            
            if($request->has('PeriodePengumpulanData')){ $PeriodePengumpulanData = 1; }else{ $PeriodePengumpulanData = 0; }
            if($request->has('PeriodePengumpulanData2')){ $PeriodePengumpulanData2 = 1; }else{ $PeriodePengumpulanData2 = 0; }
          
            $this->imutRepository->insertData($request,$DimensiMutu,$DimensiMutu2,$DimensiMutu3,$DimensiMutu4,$DimensiMutu5,$DimensiMutu6
                    ,$CaraAmbilSample,$CaraAmbilSample2,$CaraAmbilSample3,$CaraAmbilSample4,$PenyajianData2,$PenyajianData3
                    ,$PeriodePengumpulanData,$PeriodePengumpulanData2
                    );

            DB::commit();
            return redirect('dashboard/indikatormutu/create')->with('success', 'Data Master Indikator Mutu Berhasil ditambahkan !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/indikatormutu/create')->with('failed', 'Data Master Indikator Mutu Gagal ditambahkan ! '. $e->getMessage() );
        }
    }
    public function getDatabyId($id)
    {
        return $this->imutRepository->showDatabyId($id);
    }
    public function editFas(Request $request)
    {
        // validate 
        
        try {
            // Db Transaction
            DB::beginTransaction();

            $request->validate([
                "JudulIndikator" => "required",
                // "Department" => "required",
                // "DasarPemikiran" => "required",
                // "Tujuan" => "required",
                // "DefinisiOperasional" => "required",  
                // "JenisIndikator" => "required",  
                // "SatuanPengukuran" => "required",  
                // "Numerator" => "required",
                // "PeriodePengumpulanData" => "required",
                // "Denominator" => "required",
                // "TargetPencapaian" => "required",
                // "Kriteria" => "required",
                // "MetodePengumpulanData" => "required",
                // "SumberData" => "required",
                // "InstrumenPengambilanData" => "required",
                // "BesarSample" => "required",
                // "CaraPengambilanSample" => "required", 
                // "PenyajianData" => "required",
                // "PeriodeAnalisa" => "required",
                // "PenaggungJawab" => "required" 
                
            ]);
       
 
            if($request->has('DimensiMutu')){ $DimensiMutu = 1; }else{ $DimensiMutu = 0; }
            if($request->has('DimensiMutu2')){ $DimensiMutu2 = 1; }else{ $DimensiMutu2 = 0; }
            if($request->has('DimensiMutu3')){ $DimensiMutu3 = 1; }else{ $DimensiMutu3 = 0; }
            if($request->has('DimensiMutu4')){ $DimensiMutu4 = 1; }else{ $DimensiMutu4 = 0; }
            if($request->has('DimensiMutu5')){ $DimensiMutu5 = 1; }else{ $DimensiMutu5 = 0; }
            if($request->has('DimensiMutu6')){ $DimensiMutu6 = 1; }else{ $DimensiMutu6 = 0; }
            
            if($request->has('CaraAmbilSample')){ $CaraAmbilSample = 1; }else{ $CaraAmbilSample = 0; }
            if($request->has('CaraAmbilSample2')){ $CaraAmbilSample2 = 1; }else{ $CaraAmbilSample2 = 0; }
            if($request->has('CaraAmbilSample3')){ $CaraAmbilSample3 = 1; }else{ $CaraAmbilSample3 = 0; }
            if($request->has('CaraAmbilSample4')){ $CaraAmbilSample4 = 1; }else{ $CaraAmbilSample4 = 0; }


       
            if($request->has('PenyajianData3')){ $PenyajianData3 = 1; }else{ $PenyajianData3 = 0; }
            if($request->has('PenyajianData2')){ $PenyajianData2 = 1; }else{ $PenyajianData2 = 0; }
            
            if($request->has('PeriodePengumpulanData')){ $PeriodePengumpulanData = 1; }else{ $PeriodePengumpulanData = 0; }
            if($request->has('PeriodePengumpulanData2')){ $PeriodePengumpulanData2 = 1; }else{ $PeriodePengumpulanData2 = 0; }

                $this->imutRepository->updateData($request,$DimensiMutu,$DimensiMutu2,$DimensiMutu3,$DimensiMutu4,$DimensiMutu5,$DimensiMutu6
                ,$CaraAmbilSample,$CaraAmbilSample2,$CaraAmbilSample3,$CaraAmbilSample4,$PenyajianData2,$PenyajianData3
                ,$PeriodePengumpulanData,$PeriodePengumpulanData2); 
         
            DB::commit(); 
            return redirect('dashboard/indikatormutu/view/' . $request->ID)->with('success', 'Data Fasilitas Berhasil diedit !');
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect('dashboard/indikatormutu/view/' . $request->ID)->with('failed',$e->getMessage());
        }
    } 
}
