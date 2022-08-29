<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
class AdminController extends Controller
{
    public function login(Request $request){
        // dd(Hash::make(1));
        if($request->isMethod('post')){
            $data=$request->all();
            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                return redirect('/admin/dashboard');
            }else{
                return redirect()->back()->with('error_message', 'Somethings Wrong!');
            }
        }
        return View('backend.login');
    }
    public function dashboard(){
        return View('backend.index');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
    public function account(Request $request){
        $admin=Auth::guard('admin')->user();
        // dd(Hash::make(1));
        if($request->isMethod('post')){
            $data=$request->all();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $reimage = time() . '.' . $image->getClientOriginalExtension();
                $dest = public_path('/images');
                $image->move($dest, $reimage);
                $data['image']='images/'.$reimage;
                if(empty($data['password'])&&empty($data['confirm_password'])){
                    $data['password']=$admin['password'];
                    Admin::find($admin['id'])->update($data);
                }else{
                    if($data['password']==$data['confirm_password']){
                        Admin::find($admin['id'])->update($data);
                    }else{
                        return redirect()->back()->with('error_message', 'Password and Confirm Password not same');
                    }
                }
            }else{
                if(empty($data['password'])&&empty($data['confirm_password'])){
                    $data['password']=$admin['password'];
                    Admin::find($admin['id'])->update($data);
                }else{
                    if($data['password']==$data['confirm_password']){
                        Admin::find($admin['id'])->update($data);
                    }else{
                        return redirect()->back()->with('error_message', 'Password and Confirm Password not same');
                    }
                }
            }
            return redirect()->back()->with('success_message', 'Updated Profile Successfully');
        }
        return View('backend.account', compact('admin'));
    }
    public function checkPassword(Request $request){
        if($request->ajax()){
            $data=$request->all();
            if(Hash::check($data['password'], Auth::guard('admin')->user()->password)){
                return response()->json(['status'=>true]);
            }else{
                return response()->json(['status'=>false]);
            }
        }
    }
}
