<?php

namespace App\Http\Repository;

interface RegisterRepositoryInterface
{
    public function insertData($request);
    public function updateconfirmData($request);
    public function updateGenerateDataMitra($request, $genauto,$now, $password);
    public function updateGenerateDataKurir($request, $genauto,$now, $password);
    public function updateFinishData($request, $genauto);
    public function updateCancelData($request);
    public function updateconfirmRegistrationFinal($request); 
    public function generateUserLogin($request, $genauto, $now, $password);
}
