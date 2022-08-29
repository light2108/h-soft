<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\News;
class NewController extends Controller
{
    public function index(){
        Session::put('page', 'new');
        $news=News::inRandomOrder()->paginate(9);
        $featured_news=News::orderBy('id', 'desc')->paginate(6);
        return View('frontend.news.index', compact('news', 'featured_news'));
    }
    public function detail($id){
        $new=News::find($id);
        $featured_news=News::orderBy('id', 'desc')->paginate(6);
        return View('frontend.news.detail', compact('new', 'featured_news'));
    }
}
