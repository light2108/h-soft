<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
class NewController extends Controller
{
    public function index(Request $request){

        return response()->json(['news'=>News::all(), 'status'=>200]);
    }
    public function edit(Request $request, $id){
        $new=News::find($id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (!empty($new)) {
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
                    $new->update($data);
                } else {
                    $new->update($data);
                }
                return response()->json(['status' => 1, 'message' => 'Updated New Successfully']);
            } else {
                return response()->json(['status' => 0, 'message' => 'Not find id']);
            }
        }
        return response()->json(['new'=>$new, 'status'=>1]);
    }
    public function create(Request $request){
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
                News::create($data);
            } else {
                News::create($data);
            }
            return response()->json(['status' => 1, 'message' => 'Created New Successfully']);
        }
    }
    public function delete($id){
        if(!empty(News::find($id))){
            News::find($id)->delete();
            return response()->json(['status'=>1, 'message'=>'Deleted New Successfully']);
        }else{
            return response()->json(['status'=>0, 'message'=>'Not find id']);
        }
    }
    public function news(){
        $news=News::inRandomOrder()->paginate(9);
        $featured_news=News::orderBy('id', 'desc')->paginate(6);
        return response()->json(['status'=>1, 'news'=>$news, 'featured_news'=>$featured_news]);
    }
    public function detail($id){
        $new=News::find($id);
        $featured_news=News::orderBy('id', 'desc')->paginate(6);
        return response()->json(['status'=>1, 'new'=>$new, 'featured_news'=>$featured_news]);
    }
}
