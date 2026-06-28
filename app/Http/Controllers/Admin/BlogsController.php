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
        return view('admin.blogs.create_blog_news');
    }

    public function storeBlog(Request $request)
    {
        $blog = new Blog();

        $blog->{'blog-title'} = $request->input('blog-title');
        $blog->subtitle   = $request->input('subtitle');
        $blog->publication_name = $request->input('publication_name');
        $blog->publication_date = $request->input('publication_date');
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
        // Paginate blogs (10 per page) and show newest first
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(10);
    
        return view('admin.blogs.blogList', compact('blogs'));
    
    }

    public function deleteBlog($id){
        $blog = Blog::find($id);
        
        // Delete image from public/blog-images folder
        if($blog->img && file_exists(public_path('blog-images/' . $blog->img))){
            unlink(public_path('blog-images/' . $blog->img));
        }
        
        // Delete blog from database
        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }

    // Show edit form
    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        // Reuse the create form for editing — view will detect $blog
        return view('admin.blogs.create_blog_news', compact('blog'));
    }

    // Handle update
    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $blog->{'blog-title'} = $request->input('blog-title');
        $blog->subtitle   = $request->input('subtitle');
        $blog->publication_name = $request->input('publication_name');
        $blog->publication_date = $request->input('publication_date');
        $blog->article_url = $request->input('article_url');
        $blog->description = $request->input('description');

        // If a new image uploaded, remove old and store new
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            // delete old image
            if ($blog->img && file_exists(public_path('blog-images/' . $blog->img))) {
                unlink(public_path('blog-images/' . $blog->img));
            }

            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $slug = Str::slug($request->input('blog-title')) ?: 'blog';
            $timestamp = now()->timestamp;
            $filename = "{$slug}-{$timestamp}.{$extension}";

            $publicBlogPath = public_path('blog-images');
            if (!is_dir($publicBlogPath)) {
                mkdir($publicBlogPath, 0755, true);
            }

            $file->move($publicBlogPath, $filename);
            $blog->img = $filename;
        }

        $blog->save();
        return redirect('/admin/blog-list')->with('success', 'Blog updated successfully!');
    }

}