<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Project;
use App\Models\News;
class ContactController extends Controller
{
    public function index(Request $request){
        $contacts=Contact::all();
        $projects=Project::all();
        return View('backend.contacts.index', compact('contacts', 'projects'));
    }
    public function edit(Request $request, $id){
        $contact=Contact::find($id);
        return View('backend.contacts.edit', compact('contact'));
    }
    public function delete($id){
        Contact::find($id)->delete();
        return redirect()->back()->with('success_message', 'Deleted Project Successfully');
    }
    public function deleteAll(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            // dd($data['id']);
            if(isset($data['id'])){
                $data['id']=implode(",", $data['id']);
                Contact::whereIn('id', explode(",",$data['id']))->delete();
                return redirect()->back()->with('success_message', 'Deleted All News You Selected');
            }else{
                return redirect()->back()->with('error_message', 'You Must Select At Least 1 Row');
            }
        }
    }
}
