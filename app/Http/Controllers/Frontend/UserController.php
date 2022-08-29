<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\News;
use Exception;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            $validator = Validator::make($data, [
                'image' => 'image|mimes:png,jpg,jpeg',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('success_message', 'Somthings wrong!');
            } else {
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $reimage = time() . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('/images');
                    $image->move($dest, $reimage);
                    $data['image'] = 'images/' . $reimage;
                    User::find(Auth::user()->id)->update($data);
                    return redirect()->back()->with('success_message', 'Updated Profile Successfully');
                }else{
                    User::find(Auth::user()->id)->update($data);
                    return redirect()->back()->with('success_message', 'Updated Profile Successfully');
                }
            }
        }
        return View('frontend.users.index', compact('user'));
    }
    public function edit(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if($request->isMethod('post')){
            $data=$request->all();
            $validator = Validator::make($data, [
                'image' => 'image|mimes:png,jpg,jpeg',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('success_message', 'Somthings wrong!');
            } else {
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $reimage = time() . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('/images');
                    $image->move($dest, $reimage);
                    $data['image'] = 'images/' . $reimage;
                    $user->update($data);
                    return redirect()->back()->with('success_message', 'Updated Profile Successfully');
                }else{
                    $user->update($data);
                    return redirect()->back()->with('success_message', 'Updated Profile Successfully');
                }
            }
        }
        return View('frontend.users.edit', compact('user'));
    }
    public function login(Request $request)
    {
        $data = $request->all();

        if (Auth::attempt(['phone' => $data['phone'], 'password' => $data['password']])) {
            User::find(Auth::user()->id)->update(['check_login' => 1]);
            return redirect()->back()->with('success_message', 'Login Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Somethings wrong!');
        }
    }
    public function register(Request $request)
    {
        $data = $request->all();
        if ($data['password'] == $data['confirm_password']) {
            $data['password'] = Hash::make($data['password']);
            User::create($data);
            return redirect()->back()->with('success_message', 'Register Successfully');
        } else {
            return redirect()->back()->with('error_message', 'Somethings wrong!');
        }
    }
    public function checkPhone(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            // dd($data);
            // dd(!empty(User::where('phone', $data['phone'])->get()));
            if ((User::where('phone', $data['phone'])->count()>0)) {
                $code=mt_rand(10000,99999);
                Session::put('phone', $data['phone']);
                User::where('phone', $data['phone'])->update(['code'=>$code]);
                return response()->json(['status'=>1, 'phone'=>$data['phone']]);
            } else {
                return response()->json(['status'=>0]);
            }
        }
    }

    public function checkCode(Request $request){
        if($request->ajax()){
            $data=$request->all();
            // dd($data);
            $code=$data['first']*10000+$data['second']*1000+$data['third']*100+$data['fourth']*10+$data['fifth'];
            if(User::where('phone', $data['phone'])->where('code', $code)->count()>0){
                $nexmo = app('Nexmo\Client');

                $nexmo->message()->send([
                    'to'   => Integer($data['phone']),
                    'from' => 'Vonage APIs',
                    'text' => 'Your OTP is '.$code
                ]);
                return response()->json(['status'=>1, 'phone'=>$data['phone']]);
            }else{
                return response()->json(['status'=>0]);
            }
        }
    }
    public function changePassword(Request $request){
            $data=$request->all();
            if($data['new_password']==$data['confirm_password']){
                User::where('phone', $data['phone'])->update(['password'=>Hash::make($data['new_password'])]);
                return redirect()->back()->with('success_message', 'Changed Password Successfully');
            }else{
                return redirect()->back()->with('error_message', 'Somethings wrong!');
            }
    }
    public function logout()
    {
        User::find(Auth::user()->id)->update(['check_login' => 0]);
        Auth::logout();
        return redirect('/')->with('success_message', 'Logout Successfully');
    }
    public function checkReading(Request $request){
        if($request->ajax()){
            $data=$request->all();
            $all_user_id=News::find($data['id'])->user_id;
            if(!in_array(Auth::user()->id, explode(",",$all_user_id))){
                $xxx[]=$all_user_id.",".Auth::user()->id;
                News::find($data['id'])->update(['user_id'=>$xxx]);
                return response()->json(['status'=>1]);
            }

        }
    }
}
