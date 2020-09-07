<?php

namespace App\Http\Controllers;

use App\Oex_category;
use App\Oex_exam_master;
use App\Oex_portal;
use App\Oex_student;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function exam_category(){
        return view('admin.category')->with('cat',Oex_category::all());
    }

    public function store_category(){
        $validator = Validator::make(request()->all(),[
            'name'=>'required',            
        ] );
        if($validator->passes()){
            Oex_category::create([
                'name'=>request()->name,
                'status'=>1,
            ]);
            $arr=['status'=>'true','msg'=>'sucess','reload'=>route('exam/category')];
        }
        else{
            $arr=['status'=>'true','msg'=>$validator->errors()->all(),'reload'=>route('exam/category')];
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

    public function status_category($id){
        $data=Oex_category::find($id);
        if($data->status==1){
            $data->status=0;
            $data->save();
        }
        else{
            $data->status=1;
            $data->save();
        }
    }

    public function manage_exam_index(){
        return view('admin.manage_exam')->with('cat',Oex_category::all()->where('status','1'))
                                        ->with('exam',Oex_exam_master::orderBy('id','desc')->get());
    }

    public function store_exam(){
        
        $validator = Validator::make(request()->all(),[
            'title'=>'required',
            'exam_date'=>'required',
            'category'=>'required'
            
        ] );
       
        if($validator->passes()){
            Oex_exam_master::create([
                'title'=>request()->title,
                'exam_date'=>request()->exam_date,
                'oex_category_id'=>request()->category,
                'status'=>1,
            ]);
            $arr=['status'=>'true','msg'=>'sucess','reload'=>route('admin.manage_exam')];
        }
        else{
            $arr=['status'=>'true','msg'=>$validator->errors()->all(),'reload'=>route('admin.manage.exam')];
        }
        // print_r(request()->all());
        return json_encode($arr);
    }

    public function delete_exam($id){
        $data=Oex_exam_master::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function status_exam($id){
        $data=Oex_exam_master::find($id);
        if($data->status==1){
            $data->status=0;
            $data->save();
        }
        else{
            $data->status=1;
            $data->save();
        }
    }

    public function edit_exam($id){
        return view('admin.edit_exam')->with('cat',Oex_category::where('status','1')->get())
                                      ->with('exam',Oex_exam_master::find($id));
    }

    public function update_exam($id){
        $data=Oex_exam_master::find($id);
        $data->title=request()->title;
        $data->exam_date=request()->exam_date;
        $data->oex_category_id=request()->category;
        $data->update();
        $arr=['status'=>'true','msg'=>'Edit sucess','reload'=>route('admin.manage_exam')];
        return json_encode($arr);
    }

    public function manage_student_index(){
        return view('admin.manage_student')->with('exam',Oex_exam_master::where('status','1')->get())
                                           ->with('student',Oex_student::orderBy('id','desc')->get());
    }

    public function store_student(){

        $validator = Validator::make(request()->all(),[
            'name'=>'required',
            'email'=>'required',
            'mobile_no'=>'required|digits:10',
            'dob'=>'required',
            'exam'=>'required',
            'password'=>'required|min:6'
            
        ] );
        if($validator->passes()){
            Oex_student::create([
                'name'=>request()->name,
                'email'=>request()->email,
                'mobile_no'=>request()->mobile_no,
                'dob'=>request()->dob,
                'password'=>request()->password,
                'oex_exam_master_id'=>request()->exam,
                'status'=>1,
            ]);
            $arr=['status'=>'true','msg'=>'sucess','reload'=>route('admin.manage.student')];
        }
        else{
            $arr=['status'=>'true','msg'=>$validator->errors()->all(),'reload'=>route('admin.manage.student')];
        }
        // print_r(request()->all());
        return json_encode($arr);
    }

    public function status_student($id){
        $data=Oex_student::find($id);
        print_r($data);
        if($data->status==1){
            $data->status=0;
            $data->save();
        }
        else{
            $data->status=1;
            $data->save();
        }
    }

    public function delete_student($id){
        $data=Oex_student::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit_student($id){
        return view('admin.edit_student')->with('exam',Oex_exam_master::where('status','1')->get())
                                         ->with('student',Oex_student::find($id));
    }

    public function update_student($id){
        $data=Oex_student::find($id);
        
        $data->name=request()->name;
        $data->email=request()->email;
        $data->mobile_no=request()->mobile_no;
        $data->dob=request()->dob;
        $data->oex_exam_master_id=request()->exam;
        $data->update();
        
        $arr=['status'=>'true','msg'=>'Edit sucess','reload'=>route('admin.manage.student')];
        return json_encode($arr);
    }

    public function manage_portal_index(){
        return view('admin.portal')->with('portal',Oex_portal::orderBy('id','desc')->get());
    }

    public function store_portal(){

        $validator = Validator::make(request()->all(),[
            'name'=>'required',
            'email'=>'required',
            'mobile_no'=>'required|digits:10',
            'password'=>'required|min:6'
            
        ] );
        if($validator->passes()){
            Oex_portal::create([
                'name'=>request()->name,
                'email'=>request()->email,
                'mobile_no'=>request()->mobile_no,
                'password'=>request()->password,
                'status'=>1,
            ]);
            $arr=['status'=>'true','msg'=>'sucess','reload'=>route('admin.manage.portal')];
        }
        else{
            $arr=['status'=>'true','msg'=>$validator->errors()->all(),'reload'=>route('admin.manage.portal')];
        }
    
        return json_encode($arr);
    }

    public function status_portal($id){
        $data=Oex_portal::find($id);
        
        if($data->status==1){
            $data->status=0;
        
            $data->save();
        }
        else{
            $data->status=1;
            $data->save();
        }
        echo ($id);
    }

    public function delete_portal($id){
        $data=Oex_portal::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit_portal($id){
        return view('admin.edit_portal')->with('portal',Oex_portal::find($id));
    }

    public function update_portal($id){
        $data=Oex_portal::find($id);
        
        $data->name=request()->name;
        $data->email=request()->email;
        $data->mobile_no=request()->mobile_no;

        $data->update();
        
        $arr=['status'=>'true','msg'=>'Edit sucess','reload'=>route('admin.manage.student')];
        return json_encode($arr);
    }
}
