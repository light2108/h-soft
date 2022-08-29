<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\News;

class HSoftController extends Controller
{
  public function dashboard()
  {
    $projects = Project::inRandomOrder()->get();
    $news = News::paginate(8);
    return response()->json(['projects' => $projects, 'news' => $news, 'status' => 1]);
  }
  public function detailInfor()
  {
    return View('frontend.infor.detail');
  }
  public function term()
  {
    return View('frontend.terms.index');
  }
  public function aboutUs()
  {
    return View('frontend.aboutus');
  }
}
