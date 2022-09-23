<?php

namespace App\Http\Repository;

use App\Models\centerofexcelent;
use App\Models\facilitie;
use App\Models\indikatormutumaster;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Merchant;

class IndikatorMutuRepositoryImpl  implements IndikatorMutuRepositoryInterface
{
    public function insertData($request,$DimensiMutu,$DimensiMutu2,$DimensiMutu3,$DimensiMutu4,$DimensiMutu5,$DimensiMutu6
                            ,$CaraAmbilSample,$CaraAmbilSample2,$CaraAmbilSample3,$CaraAmbilSample4,$PenyajianData2,$PenyajianData3
                            ,$PeriodePengumpulanData,$PeriodePengumpulanData2)
    {
     
        $facilitie = new indikatormutumaster(); 
        $facilitie->GroupIndikator = $request->GroupIndikator;
        $facilitie->JudulIndikator = $request->JudulIndikator;
        $facilitie->Department = $request->Department;
        $facilitie->DasarPemikiran = $request->DasarPemikiran;
        $facilitie->DimensiMutu = $DimensiMutu; 
        $facilitie->DimensiMutu2 = $DimensiMutu2;
        $facilitie->DimensiMutu3 = $DimensiMutu3;
        $facilitie->DimensiMutu4 = $DimensiMutu4;
        $facilitie->DimensiMutu5 = $DimensiMutu5;
        $facilitie->DimensiMutu6 = $DimensiMutu6;
        $facilitie->CaraAmbilSample = $CaraAmbilSample; 
        $facilitie->CaraAmbilSample2 = $CaraAmbilSample2;
        $facilitie->CaraAmbilSample3 = $CaraAmbilSample3;
        $facilitie->CaraAmbilSample4 = $CaraAmbilSample4; 
        $facilitie->PenyajianData2 = $PenyajianData2; 
        $facilitie->PenyajianData3 = $PenyajianData3; 
        $facilitie->PeriodePengumpulanData = $PeriodePengumpulanData;  
        $facilitie->PeriodePengumpulanData2 = $PeriodePengumpulanData2;  
        $facilitie->Tujuan = $request->Tujuan; 
        $facilitie->DefinisiOperasional = $request->DefinisiOperasional; 
        $facilitie->JenisIndikator = $request->JenisIndikator; 
        $facilitie->SatuanPengukuran = $request->SatuanPengukuran; 
        $facilitie->Numerator = $request->Numerator; 
        $facilitie->Denominator = $request->Denominator; 
        $facilitie->TargetPencapaian = $request->TargetPencapaian; 
        $facilitie->Kriteria = $request->Kriteria; 
        $facilitie->MetodePengumpulanData = $request->MetodePengumpulanData; 
        $facilitie->SumberData = $request->SumberData; 
        $facilitie->InstrumenPengambilanData = $request->InstrumenPengambilanData; 
        $facilitie->BesarSample = $request->BesarSample; 
        $facilitie->CaraPengambilanSample = $request->CaraPengambilanSample; 
        $facilitie->WaktuPengumpulanData = $request->WaktuPengumpulanData; 
        
        $facilitie->PeriodeAnalisa = $request->PeriodeAnalisa; 
        $facilitie->PenaggungJawab = $request->PenaggungJawab;  
        $facilitie->save(); 
        return $facilitie;
    }
    public function showDatabyId($id)
    {

        $dt =  indikatormutumaster::find($id);
        return $dt;
    }
    public function updateData($request,$DimensiMutu,$DimensiMutu2,$DimensiMutu3,$DimensiMutu4,$DimensiMutu5,$DimensiMutu6
                            ,$CaraAmbilSample,$CaraAmbilSample2,$CaraAmbilSample3,$CaraAmbilSample4,$PenyajianData2,$PenyajianData3
                            ,$PeriodePengumpulanData,$PeriodePengumpulanData2)
    {
       
        $updates = indikatormutumaster::where('ID', $request->ID)->update([

            'GroupIndikator' => $request->GroupIndikator,
            'JudulIndikator' => $request->JudulIndikator,
            'Department' => $request->Department,
            'DasarPemikiran' => $request->DasarPemikiran,
            'DimensiMutu' => $DimensiMutu, 
            'DimensiMutu2' => $DimensiMutu2,
            'DimensiMutu3' => $DimensiMutu3,
            'DimensiMutu4' => $DimensiMutu4,
            'DimensiMutu5' => $DimensiMutu5,
            'DimensiMutu6' => $DimensiMutu6,
            'CaraAmbilSample' => $CaraAmbilSample, 
            'CaraAmbilSample2' => $CaraAmbilSample2,
            'CaraAmbilSample3' => $CaraAmbilSample3,
            'CaraAmbilSample4' => $CaraAmbilSample4,
            'PenyajianData3' => $PenyajianData3,
            'PenyajianData2' => $PenyajianData2,
            'PeriodePengumpulanData' => $PeriodePengumpulanData,
            'PeriodePengumpulanData2' => $PeriodePengumpulanData2,
            'Tujuan' => $request->Tujuan, 
            'DefinisiOperasional' => $request->DefinisiOperasional, 
            'JenisIndikator' => $request->JenisIndikator, 
            'SatuanPengukuran' => $request->SatuanPengukuran, 
            'Numerator' => $request->Numerator, 
            'Denominator' => $request->Denominator, 
            'TargetPencapaian' => $request->TargetPencapaian, 
            'Kriteria' => $request->Kriteria, 
            'MetodePengumpulanData' => $request->MetodePengumpulanData, 
            'SumberData' => $request->SumberData, 
            'InstrumenPengambilanData' => $request->InstrumenPengambilanData, 
            'BesarSample' => $request->BesarSample, 
            'CaraPengambilanSample' => $request->CaraPengambilanSample, 
            'WaktuPengumpulanData' => $request->WaktuPengumpulanData,  
            'PeriodeAnalisa' => $request->PeriodeAnalisa, 
            'PenaggungJawab' => $request->PenaggungJawab,  
        ]);
        return $updates;
    }
    public function updateDataWithOutImage($request)
    {

        $updates = facilitie::where('ID', $request->ID)->update([
            'name' => $request->name,
            'shortdescription' => $request->shortdescription,
            'longdescription' => $request->longdescription, 
            'publish' => $request->publish,
            'slug' => $request->slug,
        ]);
        return $updates;
    }
}
