<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function contact(Request $request){
        $data=$request->all();
        Contact::create($data);
        return redirect()->back();
    }

}
