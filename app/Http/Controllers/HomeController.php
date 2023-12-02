<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\doctor;
use App\Models\appointment;




class HomeController extends Controller
{
public function Home(){
    if(Auth::id()){
        if(Auth::user()->user_type=='0'){
            $doctor=doctor::all();
            return view('user.home',compact('doctor'));
        }else{
            return view('admin.home');
        }
    }
}
public function index(){
    if(Auth::id()){
        return redirect('Home');
    }else{
        $doctor=doctor::all();
        return view('user.home',compact('doctor'));
    }

}
public function appointment(Request $request){
$data=new appointment;
    $data->name=$request->name;
    $data->email=$request->email;
    $data->phone=$request->phone;
    $data->date=$request->date;
    $data->status='in process';
    $data->department=$request->departement;
    $data->massage=$request->message;
    if(Auth::id()){
     $data->user_id=Auth::user()->id;
    }
    $data->save();
    return redirect()->back();

}
public function myappointment(){
    if(Auth::id()){
        if(Auth::user()->user_type==0){
            $userid=Auth::user()->id;
            $appiontment=appointment::where('user_id',$userid)->get();
            return view('user.myappointment',compact('appiontment'));
        }

    }else{
        return redirect('login');
    }

}
public function cancel($id){
$appiontment=appointment::find($id);
$appiontment->delete();
return back();
}

}
