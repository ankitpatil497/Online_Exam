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

    public function delete_category($id){
        $data=Oex_category::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit_category($id){
        
        return view('admin.edit_category')->with('cat',Oex_category::find($id));
    }

    public function update_category($id){
        $data=Oex_category::find($id);
        $data->name=request()->name;
        $data->update();
        $arr=['status'=>'true','msg'=>'Edit sucess','reload'=>route('exam/category')];
        return json_encode($arr);
    }
}
