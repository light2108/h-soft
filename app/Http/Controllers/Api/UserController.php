<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function index(Request $request){
        return response()->json(['users'=>User::all(), 'status'=>1]);
    }
    public function user(Request $request, $id){
        if(!empty(User::find($id))){
            return response()->json(['user'=>User::find($id), 'status'=>1]);
        }else{
            return response()->json(['message'=>'Dont find id', 'status'=>0]);
        }
    }
    public function create(Request $request){
        $data = $request->all();
            $validator = Validator::make($data, [
                'image' => 'image|mimes:png,jpg,jpeg',
            ]);
            if ($validator->fails()) {
                return response()->json(['message'=>'Somethings wrong', 'status'=>0]);
            } else {
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $reimage = time() . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('/images');
                    $image->move($dest, $reimage);
                    $data['image'] = 'images/' . $reimage;
                    User::find(Auth::user()->id)->update($data);
                    return response()->json(['message'=>'Created User', 'status'=>1]);
                }else{
                    User::find(Auth::user()->id)->update($data);
                    return response()->json(['message'=>'Created User', 'status'=>1]);
                }
            }
    }
    public function edit(Request $request){
        $user = User::find(Auth::user()->id);
        $data=$request->all();
            $validator = Validator::make($data, [
                'image' => 'image|mimes:png,jpg,jpeg',
            ]);
            if ($validator->fails()) {
                return response()->json(['message'=>'Somethings wrong', 'status'=>0]);
            } else {
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $reimage = time() . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('/images');
                    $image->move($dest, $reimage);
                    $data['image'] = 'images/' . $reimage;
                    $user->update($data);
                    return response()->json(['message'=>'Created User', 'status'=>1]);
                }else{
                    $user->update($data);
                    return response()->json(['message'=>'Created User', 'status'=>1]);
                }
            }
    }
    // public function changeProfile(Request $request){
    //     $data=$request->all();
    //     User::find(Auth::user()->id)->update($data);
    //     return response()->json(['message'=>'Update Profile Successfully', 'status'=>1]);
    // }
    public function register(Request $request)
    {
        $data = $request->all();
        if ($data['password'] == $data['confirm_password']) {
            $data['password'] = Hash::make($data['password']);
            User::create($data);
            return response()->json(['message'=>'Register Successfully', 'status'=>1]);
        } else {
            return response()->json(['message'=>'Password and Confirm Password not same', 'status'=>0]);
        }
    }
    public function checkPhone(Request $request)
    {
            $data = $request->all();
            // dd($data);
            // dd(!empty(User::where('phone', $data['phone'])->get()));
            if ((User::where('phone', $data['phone'])->count()>0)) {
                $code=mt_rand(10000,99999);
                User::where('phone', $data['phone'])->update(['code'=>$code]);
                return response()->json(['status'=>1, 'phone'=>$data['phone']]);
            } else {
                return response()->json(['status'=>0]);
            }
    }
    public function checkCode(Request $request){
            $data=$request->all();
            // dd($data);
            $code=$data['first']*10000+$data['second']*1000+$data['third']*100+$data['fourth']*10+$data['fifth'];
            if(User::where('phone', $data['phone'])->where('code', $code)->count()>0){
                return response()->json(['status'=>1, 'phone'=>$data['phone']]);
            }else{
                return response()->json(['status'=>0]);
            }
    }
    public function changePassword(Request $request){
            $data=$request->all();
            if($data['new_password']==$data['confirm_password']){
                User::where('phone', $data['phone'])->update(['password'=>Hash::make($data['new_password'])]);
                return response()->json(['message'=>'Changed Password Successfully', 'status'=>1]);
            }else{
                return response()->json(['message'=>'Somethings wrong!', 'status'=>0]);
            }
    }
    public function logout()
    {
        User::find(Auth::user()->id)->update(['check_login' => 0]);
        Auth::logout();
        return response()->json(['message'=>'Logout Successfully', 'status'=>1]);
    }
}
