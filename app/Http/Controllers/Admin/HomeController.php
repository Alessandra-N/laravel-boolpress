<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{
    public function home()
    {
        $articles = Article::all();
        return view('admin.home', compact('articles'));
    }
}