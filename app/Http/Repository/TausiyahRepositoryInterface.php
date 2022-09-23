<?php

namespace App\Http\Repository;

interface TausiyahRepositoryInterface
{
    public function insertData($request);
    public function updateData($request);
    public function showDatabyId($id);
}
