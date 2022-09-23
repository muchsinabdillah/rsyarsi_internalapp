<?php

namespace App\Http\Repository;

interface KeluhanPasienRepositoryInterface
{ 
    public function updateData($request);
    public function showDatabyId($id);
}
