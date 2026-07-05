<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryPhoto;
use App\Models\Notice;
use App\Models\Resource;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'noticeCount' => Notice::count(),
            'resourceCount' => Resource::count(),
            'galleryCount' => GalleryPhoto::count(),
            'recentNotices' => Notice::latestFirst()->take(5)->get(),
        ]);
    }
}
