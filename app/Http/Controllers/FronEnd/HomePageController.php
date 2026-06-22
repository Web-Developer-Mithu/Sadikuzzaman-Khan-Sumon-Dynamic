<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('frontend.homepage');
    }

    public function blog()
    {
        $blogs = Blog::all();
        return view('frontend.blog', ['blogs' => $blogs]);
    }
}
