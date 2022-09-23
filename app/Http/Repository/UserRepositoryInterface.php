<?php

namespace App\Http\Repository;

interface UserRepositoryInterface
{
    public function insertData($request); 
    public function updateData($request); 
    public function showDatabyId($id);
}
