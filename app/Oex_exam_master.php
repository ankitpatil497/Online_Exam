<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_exam_master extends Model
{
    protected $primaryKey='id';
    protected $fillable=['title','oex_category_id','exam_date','status'];  

    public function oex_category(){
        return $this->belongsTo(Oex_category::class);
    }

    public function oex_student(){
        return $this->hasMany(Oex_student::class);
    }
}
