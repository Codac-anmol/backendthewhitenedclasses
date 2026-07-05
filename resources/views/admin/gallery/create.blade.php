@extends('layouts.admin')

@section('title', 'Add Gallery Photo')

@section('content')
  <div class="topbar">
    <div>
      <h1>Add Gallery Photo</h1>
      <p>JPG or PNG, up to 8MB.</p>
    </div>
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline">← Back to gallery</a>
  </div>

  <div class="glass" style="max-width: 480px;">
    <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
      @csrf

      <label for="title">Title (optional)</label>
      <input type="text" id="title" name="title" value="{{ old('title') }}">

      <label for="sort_order">Display order (lower shows first)</label>
      <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">

      <label for="image">Photo</label>
      <input type="file" id="image" name="image" accept="image/*" required>

      <button type="submit" class="btn btn-primary">Upload Photo</button>
    </form>
  </div>
@endsection
