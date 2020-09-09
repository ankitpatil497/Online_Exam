<?php

namespace App\Http\Controllers;

use App\Oex_exam_master;
use App\Oex_student;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PoratlOpeartion extends Controller
{
    public function  dashnorad(){
        if(!Session::get('portal_session')){
            return redirect()->route('portal.login');
        }
        return view('portal.dashboard')->with('exam',Oex_exam_master::orderBy('id','desc')
                                       ->where('status','1')->get());
    }

    public function exam_form($id){
        return view('portal.exam_form')->with('exam',Oex_exam_master::find($id));
    }

    public function exam_form_submit(){
        $validator = Validator::make(request()->all(),[
            'name'=>'required',
            'email'=>'required',
            'mobile_no'=>'required|digits:10',
            'dob'=>'required',
            'password'=>'required|min:6'
            
        ] );
        if($validator->passes()){
            $data=new Oex_student();
            $data->name=request()->name;
            $data->email=request()->email;
            $data->mobile_no=request()->mobile_no;
            $data->dob=request()->dob;
            $data->password=request()->password;
            $data->oex_exam_master_id=request()->id;
            $data->status=0;
            $data->save();
            // print_r($data);
            $arr=['status'=>'true','msg'=>'sucess','reload'=>route('portal.print.form',$data->id)];
        }
        else{
            $arr=['status'=>'true','msg'=>$validator->errors()->all(),'reload'=>route('portal.exam_form',request()->id)];
        }
        // print_r(request()->all());
        return json_encode($arr);
    }

    public function form_print($id){
        return view('portal.print_form')->with('student',Oex_student::find($id));
    }
}
