<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_paypal extends Model
{
    use HasFactory;
    protected $table = "Tbl_paypal";
    protected $primarykey = "id";
}
