<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_student extends Model
{
    protected $primaryKey='id';
    protected $fillable=['name','email','mobile_no','category','exam','password','status'];  
}
