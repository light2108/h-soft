<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index(){
        return response()->json(['contacts'=>Contact::all(), 'status'=>1]);
    }
    public function contact(Request $request){
        $data=$request->all();
        Contact::create($data);
        return response()->json(['message'=>'Created Contact Successfully', 'status'=>1]);
    }
}
