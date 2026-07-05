<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GalleryPhoto;
use App\Models\Notice;
use App\Models\Resource;

class PublicApiController extends Controller
{
    // GET /api/notices
    public function notices()
    {
        return Notice::latestFirst()->get()->map(fn (Notice $n) => [
            'id' => $n->id,
            'title' => $n->title,
            'description' => $n->description,
            'tag' => $n->tag,
            'day' => $n->notice_date->format('d'),
            'month' => $n->notice_date->format('M'),
            'is_new' => $n->is_new,
        ]);
    }

    // GET /api/resources
    public function resources()
    {
        return Resource::newestFirst()->get()->map(fn (Resource $r) => [
            'id' => $r->id,
            'title' => $r->title,
            'description' => $r->description,
            'class_label' => $r->class_label,
            'icon' => $r->icon,
            'format' => $r->format,
            'file_size_label' => $r->file_size_label,
            'file_url' => $r->file_url,
        ]);
    }

    // GET /api/gallery
    public function gallery()
    {
        return GalleryPhoto::ordered()->get()->map(fn (GalleryPhoto $g) => [
            'id' => $g->id,
            'title' => $g->title,
            'image_url' => $g->image_url,
        ]);
    }
}
