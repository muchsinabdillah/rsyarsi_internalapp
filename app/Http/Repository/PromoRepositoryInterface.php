<?php

namespace App\Http\Repository;

interface PromoRepositoryInterface
{
    public function insertData($request, $imgPath);
    public function updateData($request, $imgPath);
    public function showDatabyId($id);
}
