<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function storeBlog(Request $request)
    {
        $blog = new Blog();

        $blog->{'blog-title'} = $request->input('blog-title');
        $blog->subtitle   = $request->input('subtitle');
        $blog->publication_name = $request->input('publication_name');
        $blog->article_url = $request->input('article_url');
        $blog->description = $request->input('description');

        // Image upload to public/blog-images
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            
            // Create URL-friendly filename from blog title
            $slug = Str::slug($request->input('blog-title'));
            $timestamp = now()->timestamp;
            $filename = "{$slug}-{$timestamp}.{$extension}";
            
            // Ensure directory exists
            $publicBlogPath = public_path('blog-images');
            if (!is_dir($publicBlogPath)) {
                mkdir($publicBlogPath, 0755, true);
            }
            
            // Move file directly to public folder
            $file->move($publicBlogPath, $filename);
            // Store only filename in DB; frontend builds URL via accessor
            $blog->img = $filename;
        }

        $blog->save();
        return redirect()->back()->with('success', 'Blog created successfully!');
    }

    public function blogList()
    {
   
        return view('Admin.Blogs.blogList');
    
    }
}