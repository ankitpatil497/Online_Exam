<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_portal extends Model
{
    protected $primaryKey='id';
    protected $fillable=['name','email','mobile_no','password','status'];  
}
