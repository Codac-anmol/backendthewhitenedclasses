@extends('layouts.admin')

@section('title', $resource->exists ? 'Edit Resource' : 'New Resource')

@section('content')
  <div class="topbar">
    <div>
      <h1>{{ $resource->exists ? 'Edit Resource' : 'New Resource' }}</h1>
      <p>Upload a PDF/Word file — it'll show up as a downloadable card on the site.</p>
    </div>
    <a href="{{ route('admin.resources.index') }}" class="btn btn-outline">← Back to list</a>
  </div>

  <div class="glass" style="max-width: 620px;">
    <form method="POST"
          action="{{ $resource->exists ? route('admin.resources.update', $resource) : route('admin.resources.store') }}"
          enctype="multipart/form-data">
      @csrf
      @if ($resource->exists) @method('PUT') @endif

      <label for="title">Title</label>
      <input type="text" id="title" name="title" value="{{ old('title', $resource->title) }}" required>

      <label for="description">Description</label>
      <textarea id="description" name="description" required>{{ old('description', $resource->description) }}</textarea>

      <label for="class_label">Class / Level label</label>
      <input type="text" id="class_label" name="class_label" value="{{ old('class_label', $resource->class_label) }}" placeholder="e.g. Class 10" required>

      <label for="icon">Icon (emoji)</label>
      <input type="text" id="icon" name="icon" value="{{ old('icon', $resource->icon ?? '📝') }}" maxlength="10">

      <label for="file">{{ $resource->exists ? 'Replace file (optional)' : 'File (PDF/DOC)' }}</label>
      <input type="file" id="file" name="file" accept=".pdf,.doc,.docx" {{ $resource->exists ? '' : 'required' }}>
      @if ($resource->exists && $resource->file_path)
        <p style="color:#94a3b8; font-size:0.8rem; margin-top:-12px; margin-bottom:16px;">
          Current file: <a href="{{ $resource->file_url }}" target="_blank" style="color:#fdba74;">{{ basename($resource->file_path) }}</a>
        </p>
      @endif

      <button type="submit" class="btn btn-primary">{{ $resource->exists ? 'Save Changes' : 'Upload Resource' }}</button>
    </form>
  </div>
@endsection
