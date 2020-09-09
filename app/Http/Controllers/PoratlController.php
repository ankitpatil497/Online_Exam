<?php

namespace App\Http\Controllers;

use Session;
use App\Oex_portal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PoratlController extends Controller
{
    public function signupPortal(){
        if(Session::get('portal_session')){
            return redirect()->route('portal.dashboard');
        }
        return view('portal.signup');
    }
    
    public function signUpstore_portal(){
        $validator = Validator::make(request()->all(),[
            'name'=>'required',
            'email'=>'required',
            'mobile_no'=>'required|digits:10',
            'password'=>'required|min:6'
            
        ] );
        if($validator->passes()){
            $data=Oex_portal::where('email',request()->email)->get()->toArray();
            if($data){
                print_r($data);
                $arr=['status'=>'true','msg'=>'Email is alredy taken.','reload'=>route('porat.signup')];
            }
            else{
                Oex_portal::create([
                    'name'=>request()->name,
                    'email'=>request()->email,
                    'mobile_no'=>request()->mobile_no,
                    'status'=>0,
                    'password'=>request()->password,
                ]);
                $arr=['status'=>'true','msg'=>'sucess','reload'=>route('portal.login')];
            }
            
        }
        else{
            $arr=['status'=>'true','msg'=>$validator->errors()->all(),'reload'=>route('porat.signup')];
        }
    
        return json_encode($arr);
    }

    public function login_portal_view(){
        if(Session::get('portal_session')){
            return redirect()->route('portal.dashboard');
        }
        return view('portal.login');
    }

    public function login_check_potal(){
        $validator = Validator::make(request()->all(),[
            'email'=>'required',
            'password'=>'required'
            
        ] );
        if($validator->passes()){
            $data=Oex_portal::where('email',request()->email)->where('password',request()->password)->get()->toArray();
            
            if($data[0]['status']==0){
                
                $arr=['status'=>'true','msg'=>'Wating for admin conformation.','reload'=>route('portal.login')];
            }
            else{
                if($data){
                    request()->session()->put('portal_session',$data[0]['id']);
                    $arr=['status'=>'true','msg'=>'sucess','reload'=>route('portal.dashboard')];
                }
                else{
                    $arr=['status'=>'flase','msg'=>'Email and password is wrong','reload'=>route('')];
                }
            }
            
        }
        else{
            $arr=['status'=>'true','msg'=>$validator->errors()->all(),'reload'=>route('porat.signup')];
        }
    
        return json_encode($arr);
    }
}
