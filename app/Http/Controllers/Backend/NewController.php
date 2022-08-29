<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
class NewController extends Controller
{
    public function index(){
        $news=News::all();
        return View('backend.news.index', compact('news'));
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
                News::create($data);

            }else{
                News::create($data);
            }
            return redirect('/admin/index/news')->with('success_message', 'Created New Successfully');
        }
        return View('backend.news.create');
    }
    public function edit(Request $request, $id){
        $new=News::find($id);
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
                $new->update($data);
            }else{
                $new->update($data);
            }
            return redirect('/admin/index/news')->with('success_message', 'Updated New Successfully');
        }
        return View('backend.news.edit', compact('new'));
    }
    public function delete($id){
        News::find($id)->delete();
        return redirect()->back()->with('success_message', 'Deleted Project Successfully');
    }
    public function changeStatus(Request $request){
        if($request->ajax()){
            $data=$request->all();
            if($data['text']=="Active"){
                News::find($data['id'])->update(['status'=>0]);
                return response()->json(['status'=>false]);
            }else{
                News::find($data['id'])->update(['status'=>1]);
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
                News::whereIn('id', explode(",",$data['id']))->delete();
                return redirect()->back()->with('success_message', 'Deleted All News You Selected');
            }else{
                return redirect()->back()->with('error_message', 'You Must Select At Least 1 Row');
            }
        }
    }
}
