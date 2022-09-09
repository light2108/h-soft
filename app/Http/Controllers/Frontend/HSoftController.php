<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Project;
use App\Models\News;

class HSoftController extends Controller
{
  public function dashboard()
  {

    Session::put('page', 'dashboard');
    $projects = Project::inRandomOrder()->get();
    $news = News::paginate(8);
    return View('frontend.dashboard', compact('projects', 'news'));
  }
  public function detailInfor()
  {
    return View('frontend.infor.detail');
  }
  public function term()
  {
    Session::put('active', 'terms');
    return View('frontend.terms.index');
  }
  public function aboutUs()
  {
    Session::put('active', 'about-us');
    return View('frontend.aboutus');
  }
}