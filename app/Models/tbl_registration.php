<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Yajra\DataTables\Facades\DataTables;
class Tbl_registration extends Model
{
    use HasFactory;
    protected $table = "tbl_registration";
    protected $primarykey = "id";
    public $timestamps = false;

    public function setFirstNameLastNameAttribute($value) 
    {
        $this->attributes['first_name'] = ucwords($value);
        $this->attributes['last_name'] = ucwords($value);
    }
    
}

