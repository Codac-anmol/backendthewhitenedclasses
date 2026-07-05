@extends('layouts.admin')

@section('title', 'Resources')

@section('content')
  <div class="topbar">
    <div>
      <h1>Resources</h1>
      <p>Free downloadable sample papers, worksheets &amp; revision notes.</p>
    </div>
    <a href="{{ route('admin.resources.create') }}" class="btn btn-primary">+ New Resource</a>
  </div>

  <div class="glass">
    <table>
      <thead>
        <tr><th>Title</th><th>Class</th><th>Format</th><th>Size</th><th>File</th><th style="text-align:right;">Actions</th></tr>
      </thead>
      <tbody>
        @forelse ($resources as $resource)
          <tr>
            <td>{{ $resource->icon }} {{ $resource->title }}</td>
            <td>{{ $resource->class_label }}</td>
            <td>{{ $resource->format }}</td>
            <td>{{ $resource->file_size_label ?? '—' }}</td>
            <td>
              @if ($resource->file_path)
                <a href="{{ $resource->file_url }}" target="_blank" style="color:#fdba74;">View</a>
              @else
                <span style="color:#94a3b8;">No file</span>
              @endif
            </td>
            <td style="text-align:right; display:flex; gap:8px; justify-content:flex-end;">
              <a href="{{ route('admin.resources.edit', $resource) }}" class="btn btn-outline btn-sm">Edit</a>
              <form action="{{ route('admin.resources.destroy', $resource) }}" method="POST" onsubmit="return confirm('Delete this resource?');">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6">No resources yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div style="margin-top:20px;">{{ $resources->links() }}</div>
@endsection
