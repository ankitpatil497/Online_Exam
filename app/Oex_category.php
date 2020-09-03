<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_category extends Model
{
    protected $primaryKey='id';
    protected $fillable=['name','status'];  
}
