<?php

namespace App\Http\Repository;

interface UserEntryRepositoryInterface
{
    public function UpdateUserEntry($request);
    public function createUserEntry($request);
    public function showDatabyId($id);
}
