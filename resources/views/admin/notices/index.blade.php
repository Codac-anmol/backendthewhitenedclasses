@extends('layouts.admin')

@section('title', 'Notices')

@section('content')
  <div class="topbar">
    <div>
      <h1>Notices</h1>
      <p>Admission updates, exam schedules, events &amp; announcements.</p>
    </div>
    <a href="{{ route('admin.notices.create') }}" class="btn btn-primary">+ New Notice</a>
  </div>

  <div class="glass">
    <table>
      <thead>
        <tr><th>Title</th><th>Tag</th><th>Date</th><th>New?</th><th style="text-align:right;">Actions</th></tr>
      </thead>
      <tbody>
        @forelse ($notices as $notice)
          <tr>
            <td>{{ $notice->title }}</td>
            <td><span class="badge badge-{{ $notice->tag }}">{{ $notice->tag }}</span></td>
            <td>{{ $notice->notice_date->format('d M Y') }}</td>
            <td>{{ $notice->is_new ? '✅' : '—' }}</td>
            <td style="text-align:right; display:flex; gap:8px; justify-content:flex-end;">
              <a href="{{ route('admin.notices.edit', $notice) }}" class="btn btn-outline btn-sm">Edit</a>
              <form action="{{ route('admin.notices.destroy', $notice) }}" method="POST" onsubmit="return confirm('Delete this notice?');">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="5">No notices yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div style="margin-top:20px;">{{ $notices->links() }}</div>
@endsection
