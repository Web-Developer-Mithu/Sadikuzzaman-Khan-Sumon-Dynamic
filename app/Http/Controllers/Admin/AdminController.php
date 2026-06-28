<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        $blogCount = \App\Models\Blog::count();
        $journalCount = \App\Models\Journal::count();
        // Pending approvals: count of journals in draft state (can extend to other models)
        $pendingApprovals = \App\Models\Journal::where('status','draft')->count();
        return view('admin.admin_dashboard', compact('blogCount','journalCount','pendingApprovals'));
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/login');
    }

    public function createBlogNews()
    {
        return view('admin.blogs.create_blog_news');
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('admin.profile_edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
            'hero_tagline' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'phone' => 'nullable|string|max:60',
            'contact_email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'linkedin' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'wikipedia' => 'nullable|url|max:255',
            'social_media_name.*' => 'nullable|string|max:100',
            'social_media_url.*' => 'nullable|url|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $validator->validate();

        $data = $request->only([
            'name',
            'email',
            'hero_tagline',
            'hero_title',
            'hero_description',
            'phone',
            'contact_email',
            'address',
            'linkedin',
            'facebook',
            'twitter',
            'instagram',
            'wikipedia',
            // social_media handled below
        ]);

        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            if ($user->profile_image && File::exists(public_path('profile-images/' . $user->profile_image))) {
                File::delete(public_path('profile-images/' . $user->profile_image));
            }

            $file = $request->file('profile_image');
            $filename = 'profile-' . $user->id . '-' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('profile-images');
            if (!File::isDirectory($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $data['profile_image'] = $filename;
        }

        // Collect custom social media entries (names + urls)
        $socials = [];
        $names = $request->input('social_media_name', []);
        $urls = $request->input('social_media_url', []);
        if (is_array($names) && count($names) > 0) {
            for ($i = 0; $i < count($names); $i++) {
                $name = trim($names[$i] ?? '');
                $url = trim($urls[$i] ?? '');
                if ($name || $url) {
                    $socials[] = ['name' => $name, 'url' => $url];
                }
            }
        }

        if (!empty($socials)) {
            $data['social_media'] = $socials; // User model casts to json
        } else {
            $data['social_media'] = null;
        }

        // If password provided, hash and set it explicitly
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->update($data);

        return redirect()->back()->with('status', 'Profile updated successfully.');
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
