<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        return view('Admin.admin_dashboard');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/login');
    }

    public function createBlogNews()
    {
        return view('Admin.Blogs.create_blog_news');
    }
}
