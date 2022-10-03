<?php

namespace App\Http\Repository;

interface MasterTransaksiLogBookRepositoryInterface
{
    public function createTransaksiLogBookToHeaders($request);
    public function showdatabyDate($request);
    public function showDatabyId($id);
    public function UpdateLogBook($request);
}
