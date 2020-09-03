<?php

namespace App\Http\Controllers;

use App\Oex_category;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function exam_category(){
        return view('admin.category')->with('cat',Oex_category::all());
    }

    public function store_category(){
        $validator=request()->validate([
            'name'=>'required'
        ]);
        if($validator){
            Oex_category::create([
                'name'=>request()->name,
                'status'=>1,
            ]);
            $arr=['status'=>'true','msg'=>'sucess','reload'=>route('exam/category')];
        }
        else{
            $arr=['status'=>'true','msg'=>'opps... Somthing is wrong'];
        }
        return json_encode($arr);
    }
}
