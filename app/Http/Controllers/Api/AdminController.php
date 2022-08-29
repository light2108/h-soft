<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $admin = Auth::guard('admin')->user();
            $success['token'] = $admin->createToken('MyApp')->accessToken;
            return response()->json(['data' => $success, 'status' => 1, 'message' => 'Login Successfully']);
        } else {
            return response()->json(['error' => 'Unauthorised', 'status' => 0]);
        }
    }
    public function dashboard(){
        return View('backend.index');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return response()->json(['message'=>'Logout Successfully', 'status'=>1]);
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
                        return response()->json(['message'=>'Somethings wrong!', 'status'=>0]);
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
                        return response()->json(['message'=>'Somethings wrong!', 'status'=>0]);
                    }
                }
            }
            return response()->json(['message'=>'Updated Profile Successfully', 'status'=>1]);
        }
        return View('backend.account', compact('admin'));
    }
    public function checkPassword(Request $request){
        // if($request->ajax()){
            $data=$request->all();
            if(Hash::check($data['password'], Auth::guard('admin')->user()->password)){
                return response()->json(['status'=>true]);
            }else{
                return response()->json(['status'=>false]);
            }
        // }
    }
}
