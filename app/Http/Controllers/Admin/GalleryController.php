<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = GalleryPhoto::ordered()->paginate(12);
        return view('admin.gallery.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:120'],
            'sort_order' => ['nullable', 'integer'],
            'image' => ['required', 'image', 'max:8192'], // 8MB
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryPhoto::create([
            'title' => $data['title'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
            'image_path' => $path,
        ]);

        return redirect()->route('admin.gallery.index')->with('status', 'Photo added to gallery.');
    }

    public function destroy(GalleryPhoto $photo)
    {
        Storage::disk('public')->delete($photo->image_path);
        $photo->delete();

        return back()->with('status', 'Photo removed.');
    }
}
