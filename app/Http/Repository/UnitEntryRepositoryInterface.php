<?php

namespace App\Http\Repository;

interface UnitEntryRepositoryInterface
{
    public function UpdateUnitEntry($request);
    public function createUnitEntry($request);
    public function showDatabyId($id);
}
