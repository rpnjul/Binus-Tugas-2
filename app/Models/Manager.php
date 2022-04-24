<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'manager';
    protected $primaryKey = 'id';
    protected $fillable = ['role_id','username','email','password','created_at','updated_at'];
}
