<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取动态流-最新文章
        $articles_new = Article::new();

        return view('home', compact('articles_new'));
    }
}
