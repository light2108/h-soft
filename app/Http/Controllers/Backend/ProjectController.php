<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    public function index(){
        $projects=Project::all();
        return View('backend.projects.index', compact('projects'));
    }
    public function create(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $xxx=[];

            if ($request->hasFile('image')) {
                $images=$request->file('image');
                foreach($images as $key=>$image){
                    $reimage = time().rand(100, 10000000) . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('/images');
                    $image->move($dest, $reimage);
                    $xxx[]='images/'.$reimage;

                    // Project::create($data);
                }
                $data['image']=implode(",", $xxx);
                Project::create($data);

            }else{
                Project::create($data);
            }
            return redirect('/admin/index/projects')->with('success_message', 'Created Project Successfully');
        }
        return View('backend.projects.create');
    }
    public function edit(Request $request, $id){
        $project=Project::find($id);
        if($request->isMethod('post')){
            $data=$request->all();
            $xxx=[];

            if ($request->hasFile('image')) {
                $images=$request->file('image');
                foreach($images as $key=>$image){
                    $reimage = time().rand(100, 10000000) . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('/images');
                    $image->move($dest, $reimage);
                    $xxx[]='images/'.$reimage;
                    // Project::create($data);
                }
                $data['image']=implode(",", $xxx);
                $project->update($data);
            }else{
                $project->update($data);
            }
            return redirect('/admin/index/projects')->with('success_message', 'Updated Project Successfully');
        }
        return View('backend.projects.edit', compact('project'));
    }
    public function delete($id){
        Project::find($id)->delete();
        return redirect()->back()->with('success_message', 'Deleted Project Successfully');
    }
    public function changeStatus(Request $request){
        if($request->ajax()){
            $data=$request->all();
            if($data['text']=="Active"){
                Project::find($data['id'])->update(['status'=>0]);
                return response()->json(['status'=>false]);
            }else{
                Project::find($data['id'])->update(['status'=>1]);
                return response()->json(['status'=>true]);
            }

        }
    }
    public function deleteAll(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            // dd($data['id']);
            if(isset($data['id'])){
                $data['id']=implode(",", $data['id']);
                Project::whereIn('id', explode(",",$data['id']))->delete();
                return redirect()->back()->with('success_message', 'Deleted All News You Selected');
            }else{
                return redirect()->back()->with('error_message', 'You Must Select At Least 1 Row');
            }
        }
    }
}
