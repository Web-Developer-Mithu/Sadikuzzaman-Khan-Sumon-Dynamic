<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Journal;
use App\Models\User;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $user = User::first();
        $galleryItems = Gallery::orderBy('created_at', 'desc')->get();
        $journals = Journal::where('status','published')->orderBy('published_at','desc')->take(6)->get();

        return view('frontend.homepage', [
            'profileName' => optional($user)->name,
            'heroTagline' => optional($user)->hero_tagline,
            'heroTitle' => optional($user)->hero_title,
            'heroDescription' => optional($user)->hero_description,
            'profileImage' => optional($user)->profile_image,
            'phone' => optional($user)->phone,
            'contactEmail' => optional($user)->contact_email,
            'address' => optional($user)->address,
            'linkedin' => optional($user)->linkedin,
            'facebook' => optional($user)->facebook,
            'twitter' => optional($user)->twitter,
            'instagram' => optional($user)->instagram,
            'wikipedia' => optional($user)->wikipedia,
            'social_medias' => optional($user)->social_media,
            'galleryItems' => $galleryItems,
            'journals' => $journals,
        ]);
    }

    public function blog()
    {
        $blogs = Blog::all();
        return view('frontend.blog', ['blogs' => $blogs]);
    }
}
