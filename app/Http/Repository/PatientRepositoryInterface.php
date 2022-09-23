<?php

namespace App\Http\Repository;

interface PatientRepositoryInterface
{
    public function insertData($request);
    public function updateData($request);
    public function showDatabyId($id);
}
