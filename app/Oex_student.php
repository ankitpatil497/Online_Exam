<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_student extends Model
{
    protected $primaryKey='id';
    protected $fillable=['name','email','mobile_no','dob','oex_exam_master_id','password','status'];
    
    public function oex_exam_master(){
        return $this->belongsTo(Oex_exam_master::class);
    }
}
