<?php

namespace App\Http\Repository;

interface IndikatorMutuRepositoryInterface
{
    public function insertData($request,$DimensiMutu,$DimensiMutu2,$DimensiMutu3,$DimensiMutu4,$DimensiMutu5,$DimensiMutu6
                                ,$CaraAmbilSample,$CaraAmbilSample2,$CaraAmbilSample3,$CaraAmbilSample4,$PenyajianData,$PenyajianData2
                                ,$PeriodePengumpulanData,$PeriodePengumpulanData2);
    public function updateData($request,$DimensiMutu,$DimensiMutu2,$DimensiMutu3,$DimensiMutu4,$DimensiMutu5,$DimensiMutu6
                                ,$CaraAmbilSample,$CaraAmbilSample2,$CaraAmbilSample3,$CaraAmbilSample4,$PenyajianData,$PenyajianData2
                                ,$PeriodePengumpulanData,$PeriodePengumpulanData2);
    public function showDatabyId($id);
}
