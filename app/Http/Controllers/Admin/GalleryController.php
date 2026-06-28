<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Gallery::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.gallery.gallery_list', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery.create_gallery_item');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $gallery = new Gallery();
        $gallery->title = $request->input('title');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $slug = Str::slug($request->input('title')) ?: 'gallery-item';
            $filename = "{$slug}-" . time() . ".{$extension}";

            $publicGalleryPath = public_path('gallery-images');
            if (! is_dir($publicGalleryPath)) {
                mkdir($publicGalleryPath, 0755, true);
            }

            $file->move($publicGalleryPath, $filename);
            $gallery->image = $filename;
        }

        $gallery->save();

        return redirect('/admin/gallery')->with('success', 'Gallery item added successfully.');
    }

    public function edit($id)
    {
        $item = Gallery::findOrFail($id);
        return view('admin.gallery.create_gallery_item', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $item->title = $request->input('title');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($item->image && file_exists(public_path('gallery-images/' . $item->image))) {
                unlink(public_path('gallery-images/' . $item->image));
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $slug = Str::slug($request->input('title')) ?: 'gallery-item';
            $filename = "{$slug}-" . time() . ".{$extension}";

            $publicGalleryPath = public_path('gallery-images');
            if (! is_dir($publicGalleryPath)) {
                mkdir($publicGalleryPath, 0755, true);
            }

            $file->move($publicGalleryPath, $filename);
            $item->image = $filename;
        }

        $item->save();

        return redirect('/admin/gallery')->with('success', 'Gallery item updated successfully.');
    }

    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);

        if ($item->image && file_exists(public_path('gallery-images/' . $item->image))) {
            unlink(public_path('gallery-images/' . $item->image));
        }

        $item->delete();

        return redirect()->back()->with('success', 'Gallery item deleted successfully.');
    }
}
