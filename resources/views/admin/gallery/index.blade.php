@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')
  <div class="topbar">
    <div>
      <h1>Gallery</h1>
      <p>Photos shown in the homepage Gallery carousel.</p>
    </div>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">+ Add Photo</a>
  </div>

  <div class="glass">
    @if ($photos->isEmpty())
      <p>No photos yet — <a href="{{ route('admin.gallery.create') }}" style="color:#fdba74;">add your first one</a>.</p>
    @else
      <div class="gallery-grid">
        @foreach ($photos as $photo)
          <div class="gallery-item">
            <img src="{{ $photo->image_url }}" alt="{{ $photo->title ?? 'Gallery photo' }}">
            <form action="{{ route('admin.gallery.destroy', $photo) }}" method="POST" onsubmit="return confirm('Remove this photo?');">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">✕</button>
            </form>
          </div>
        @endforeach
      </div>
    @endif
  </div>

  <div style="margin-top:20px;">{{ $photos->links() }}</div>
@endsection
