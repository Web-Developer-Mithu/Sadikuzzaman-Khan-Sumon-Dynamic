<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createBlogNews()
    {
        return view('Admin.Blogs.create_blog_news');
    }
}
