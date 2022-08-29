<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
class CommentController extends Controller
{
    public function comments(Request $request){
        $data=$request->all();
        $data['user_id']=Auth::user()->id;
        Comment::create($data);
        return response()->json(['message'=>'Created Comment Successfully', 'status'=>1]);
    }
    public function index(Request $request){
        return response()->json(['comments'=>Comment::all(), 'status'=>1]);
    }
}
