<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::latestFirst()->paginate(10);
        return view('admin.notices.index', compact('notices'));
    }

    public function create()
    {
        $notice = new Notice();
        return view('admin.notices.form', compact('notice'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        Notice::create($data);

        return redirect()->route('admin.notices.index')->with('status', 'Notice published.');
    }

    public function edit(Notice $notice)
    {
        return view('admin.notices.form', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $data = $this->validated($request);
        $notice->update($data);

        return redirect()->route('admin.notices.index')->with('status', 'Notice updated.');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();
        return back()->with('status', 'Notice deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'description' => ['required', 'string'],
            'tag' => ['required', 'in:' . implode(',', array_keys(Notice::TAGS))],
            'notice_date' => ['required', 'date'],
            'is_new' => ['nullable', 'boolean'],
        ]);

        $data['is_new'] = $request->boolean('is_new');

        return $data;
    }
}
