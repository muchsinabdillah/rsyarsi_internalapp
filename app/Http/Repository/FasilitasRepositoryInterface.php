<?php

namespace App\Http\Repository;

interface FasilitasRepositoryInterface
{
    public function insertData($request, $imgPath);
    public function updateData($request, $nama_file);
    public function showDatabyId($id);
}
