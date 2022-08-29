<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Comment;
class ProjectController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(['projects' => Project::all(), 'status' => 1]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $xxx = [];
            if ($request->hasFile('image')) {
                $images = $request->file('image');
                foreach ($images as $image) {
                    $reimage = time() . rand(100, 10000000) . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('/images');
                    $image->move($dest, $reimage);
                    $xxx[] = 'images/' . $reimage;
                }
                $data['image'] = implode(",", $xxx);
                Project::create($data);
            } else {
                Project::create($data);
            }
            return response()->json(['status' => 1, 'message' => 'Created Project Successfully']);
        }
    }
    public function edit(Request $request, $id)
    {
        $project = Project::find($id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (!empty($project)) {
                $xxx = [];
                if ($request->hasFile('image')) {
                    $images = $request->file('image');
                    foreach ($images as $image) {
                        $reimage = time() . rand(100, 10000000) . '.' . $image->getClientOriginalExtension();
                        $dest = public_path('/images');
                        $image->move($dest, $reimage);
                        $xxx[] = 'images/' . $reimage;
                    }
                    $data['image'] = implode(",", $xxx);
                    $project->update($data);
                } else {
                    $project->update($data);
                }
                return response()->json(['status' => 1, 'message' => 'Updated Project Successfully']);
            } else {
                return response()->json(['status' => 0, 'message' => 'Not find id']);
            }
        }
        return response()->json(['status' => 1, 'project' => $project]);
    }
    public function delete($id)
    {
        if (!empty(Project::find($id))) {
            Project::find($id)->delete();
            return response()->json(['status' => 1, 'message' => 'Deleted Project Successfully']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Not find id']);
        }
    }
    public function projects(){
        $projects=Project::paginate(8);
        return View('frontend.projects.index', compact('projects'));
    }
    public function detail($id){
        $project=Project::find($id);
        $comments=Project::with('comment')->find($id)->toArray();
        // dd($comments);
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
        return reponse()->json(['status'=>1,'project'=>$project, 'comments'=>$comments, 'reviews'=>$reviews, 'count_comments'=>$count_comments]);
    }
}
