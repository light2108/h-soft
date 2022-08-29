<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function comments(Request $request){
        $data=$request->all();
        $data['user_id']=Auth::user()->id;
        Comment::create($data);
        return redirect()->back();
    }
}
