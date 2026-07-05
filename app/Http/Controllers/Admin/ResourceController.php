<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::newestFirst()->paginate(10);
        return view('admin.resources.index', compact('resources'));
    }

    public function create()
    {
        $resource = new Resource();
        return view('admin.resources.form', compact('resource'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data = $this->handleUpload($request, $data);

        Resource::create($data);

        return redirect()->route('admin.resources.index')->with('status', 'Resource uploaded.');
    }

    public function edit(Resource $resource)
    {
        return view('admin.resources.form', compact('resource'));
    }

    public function update(Request $request, Resource $resource)
    {
        $data = $this->validated($request);
        $data = $this->handleUpload($request, $data, $resource);

        $resource->update($data);

        return redirect()->route('admin.resources.index')->with('status', 'Resource updated.');
    }

    public function destroy(Resource $resource)
    {
        if ($resource->file_path) {
            Storage::disk('public')->delete($resource->file_path);
        }
        $resource->delete();

        return back()->with('status', 'Resource deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'description' => ['required', 'string'],
            'class_label' => ['required', 'string', 'max:60'],
            'icon' => ['nullable', 'string', 'max:10'],
            'format' => ['nullable', 'string', 'max:20'],
            'file' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:20480'], // 20MB
        ]);
    }

    private function handleUpload(Request $request, array $data, ?Resource $resource = null): array
    {
        if ($request->hasFile('file')) {
            if ($resource && $resource->file_path) {
                Storage::disk('public')->delete($resource->file_path);
            }

            $file = $request->file('file');
            $path = $file->store('resources', 'public');

            $data['file_path'] = $path;
            $data['file_size_label'] = round($file->getSize() / 1024 / 1024, 1) . ' MB';
            $data['format'] = strtoupper($file->getClientOriginalExtension());
        }

        unset($data['file']);

        $data['icon'] = $data['icon'] ?? '📝';
        $data['format'] = $data['format'] ?? 'PDF';

        return $data;
    }
}
