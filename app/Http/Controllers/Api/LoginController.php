<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'phone' => 'required|numeric|min:10',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 401]);
        } else {
            $data = $request->all();
            if(empty(User::where('phone', $data['phone'])->first()->code)){
                if (Auth::attempt(['phone' => $data['phone'], 'password' => $data['password']])) {
                    $user = Auth::user();
                    $success['token'] = $user->createToken('MyApp')->accessToken;
                    return response()->json(['data' => $success, 'status' => 200, 'message' => 'Login Successfully']);
                } else {
                    return response()->json(['error' => 'Unauthorised', 'status' => 401]);
                }
            }else{
                return response()->json(['error' => 'Your phone not confirmed', 'status' => 401]);
            }
        }
    }
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'phone' => 'required|min:10|numeric',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 401]);
        } else {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $data['code']=random_int(100000, 999999);
            $user = User::create($data);
            // $success['token'] = $user->createToken('MyApp')->accessToken;
            $user->update(['code'=>$data['code']]);
            return response()->json(['code'=>$data['code'], 'status' => 200, 'message' => 'Register Successfully']);
        }
    }
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'phone' => 'required|numeric|min:10',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 401]);
        } else {
            $data = $request->all();
            if (empty(User::where('phone', $data['phone'])->first())) {
                return response()->json(['error' => "Dont't exists phone number", 'status' => 401]);
            } else {
                $user=User::where('phone', $data['phone'])->first();
                // $success['token'] = $user->createToken('MyApp')->accessToken;
                // $user->update(['token'=>$success['token']]);
                return response()->json(['status' => 200, 'message' => 'OTP Send Successfully']);
            }
        }
    }
    public function changePassword(Request $request, $phone){

        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 401]);
        }else{
            $data=$request->all();
            $data['password'] = Hash::make($data['password']);
            $user=User::where('phone', $phone)->first();
            $user->update(['password'=>$data['password']]);
            return response()->json(['status' => 200, 'message' => 'Change Password Successfully']);
        }
    }
    public function checkCode(Request $request, $phone){
        $data=$request->all();
        if(empty(User::where('phone', $phone)->where('code', $data['code']))){
            return response()->json(['error'=>'Wrong code', 'status'=>401]);
        }else{
            $user=User::where('phone', $phone)->where('code', $data['code'])->first();
            $user->update(['code'=>'']);
            return response()->json(['status'=>200, 'message'=>'Confirm OTP Successfully']);
        }
    }
    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json(['message'=>'Logout Successfully', 'status'=>200]);
    }
}
