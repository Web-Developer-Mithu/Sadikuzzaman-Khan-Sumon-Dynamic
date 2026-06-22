<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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

    public function storeBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blog-title' => 'required|string|max:120',
            'subtitle' => 'nullable|string|max:180',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $validator->validateWithBag('blog');

        $blog = new Blog();
        $blog->{'blog-title'} = $request->input('blog-title');
        $blog->subtitle = $request->input('subtitle');
        $blog->description = $request->input('description');

        if ($request->hasFile('img')) {
            $blog->img = $request->file('img')->store('blog-images', 'public');
        } else {
            $blog->img = null;
        }

        $blog->save();

        return redirect()->back()->with('status', 'Blog submitted successfully.');
    }

  
}
