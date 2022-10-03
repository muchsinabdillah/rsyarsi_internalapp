<?php

namespace App\Http\Repository;

interface MasterLogBookRepositoryInterface
{
    public function UpdateLogBook($request);
    public function createLogBook($request);
    public function showDatabyId($id);
}
