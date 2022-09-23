<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactiondeliveryhistorie extends Model
{
    use HasFactory;

    protected $table = "transactiondeliveryhistories";

    protected $guarded = ['id'];
}
