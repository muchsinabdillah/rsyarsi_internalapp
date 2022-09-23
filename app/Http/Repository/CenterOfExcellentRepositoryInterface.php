<?php

namespace App\Http\Repository;

interface CenterOfExcellentRepositoryInterface
{
    public function insertData($request, $imgPath);
    public function updateData($request, $imgPath);
    public function showDatabyId($id);
}
