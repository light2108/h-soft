<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Session;
use App\Models\Comment;
class ProjectController extends Controller
{
    public function index(){
        Session::put('page', 'project');
        $projects=Project::paginate(8);
        return View('frontend.projects.index', compact('projects'));
    }
    public function detail($id){
        $project=Project::find($id);
        $comments=Comment::where('project_id', $id)->orderBy('id', 'desc')->paginate(6);
        // dd(count($comments['comment']));
        // dd($comments);
        // dd($comments['comment']::orderBy('id','desc')->get());
        $count_comments=count(Comment::where('project_id', $id)->get());
        $reviews = [
            ['rate' => 0],
            ['rate' => .5],
            ['rate' => 1],
            ['rate' => 1.5],
            ['rate' => 2],
            ['rate' => 2.5],
            ['rate' => 3],
            ['rate' => 3.5],
            ['rate' => 4],
            ['rate' => 4.5],
            ['rate' => 5]
        ];
        return View('frontend.projects.detail', compact('project', 'comments', 'reviews', 'count_comments'));
    }
}
