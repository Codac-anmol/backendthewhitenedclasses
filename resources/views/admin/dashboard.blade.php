@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
  <div class="topbar">
    <div>
      <h1>Dashboard</h1>
      <p>Overview of your site content.</p>
    </div>
  </div>

  <div class="stat-grid">
    <div class="glass stat-card">
      <div class="num">{{ $noticeCount }}</div>
      <div class="label">🔔 Notices published</div>
    </div>
    <div class="glass stat-card">
      <div class="num">{{ $resourceCount }}</div>
      <div class="label">📚 Resources uploaded</div>
    </div>
    <div class="glass stat-card">
      <div class="num">{{ $galleryCount }}</div>
      <div class="label">🖼️ Gallery photos</div>
    </div>
  </div>

  <div class="glass">
    <h3 style="margin-bottom: 16px; font-size: 1rem;">Recent Notices</h3>
    <table>
      <thead>
        <tr><th>Title</th><th>Tag</th><th>Date</th></tr>
      </thead>
      <tbody>
        @forelse ($recentNotices as $notice)
          <tr>
            <td>{{ $notice->title }}</td>
            <td><span class="badge badge-{{ $notice->tag }}">{{ $notice->tag }}</span></td>
            <td>{{ $notice->notice_date->format('d M Y') }}</td>
          </tr>
        @empty
          <tr><td colspan="3">No notices yet — <a href="{{ route('admin.notices.create') }}" style="color:#fdba74;">add your first one</a>.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
