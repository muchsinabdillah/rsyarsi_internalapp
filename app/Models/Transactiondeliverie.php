<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactiondeliverie extends Model
{
    use HasFactory;

    protected $table = "transactiondeliveries";

    protected $guarded = ['id'];
}
