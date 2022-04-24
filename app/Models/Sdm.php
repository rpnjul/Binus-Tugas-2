<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sdm extends Model
{
    protected $table = 'sdm';
    protected $primaryKey = 'id';
    protected $fillable = ['role_id','username','email','password','created_at','updated_at'];
}
