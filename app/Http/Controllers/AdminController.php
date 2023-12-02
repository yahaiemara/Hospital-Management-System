<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\doctor;
use App\Models\appointment;


class AdminController extends Controller
{
   public function add(){
    if(Auth::id()){
        return view('admin.add_doctor');
    }else{
        return redirect('login');
    }

   }
   public function Add_Doctor(Request $REQUEST){
$doctor=new doctor;
$image=$REQUEST->image;
$imagename=time().'.'.$image->getClientoriginalExtension();
$REQUEST->image->move('doctorimage',$imagename);
$doctor->image=$imagename;
$doctor->name=$REQUEST->name;
$doctor->specialty=$REQUEST->select;
$doctor->phone=$REQUEST->phone;
$doctor->room=$REQUEST->room;
$doctor->save();
return back()->with('massege','Add Doctor sucessfully');
   }
public function show_appoint(){
$appoint=appointment::get();
return view('admin.appoint',compact('appoint'));
}
public function approved($id){
    $data=appointment::find($id);
    $data->status='Approved';
    $data->save();
    return back();
}
public function cancelled($id){
    $data=appointment::find($id);
    $data->status='Cancelled';
    $data->save();
    return back();
}
public function show_doctor(){
    if(auth::id()){
        if(Auth::user()->user_type==1){
            $data=doctor::get();
            return view('admin.doctor',compact('data'));
        }else{
            return back();
        }
    }else{
        return redirect('login');
    }


}
public function delete($id){
    $data=doctor::find($id);
    $data->delete();
    return back();
}
public function update($id){
    $data=doctor::find($id);
    return view('admin.editdoctor',compact('data'));
}
public function edit(Request $request, $id){
    $data=doctor::find($id);
    $data->name=$request->name;
    $data->phone=$request->phone;
    $data->specialty=$request->select;
    $data->room=$request->room;
    $image=$request->image;
    if($image){

        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->image->move('doctorimage',$imagename);
        $data->image=$imagename;
    }
 $data->save();
 return back()->with('massege','Update Successfuly');
}
}
