@extends('layouts.admin')

@section('title', $notice->exists ? 'Edit Notice' : 'New Notice')

@section('content')
  <div class="topbar">
    <div>
      <h1>{{ $notice->exists ? 'Edit Notice' : 'New Notice' }}</h1>
      <p>This appears on the Notices &amp; Resources page of the website.</p>
    </div>
    <a href="{{ route('admin.notices.index') }}" class="btn btn-outline">← Back to list</a>
  </div>

  <div class="glass" style="max-width: 620px;">
    <form method="POST" action="{{ $notice->exists ? route('admin.notices.update', $notice) : route('admin.notices.store') }}">
      @csrf
      @if ($notice->exists) @method('PUT') @endif

      <label for="title">Title</label>
      <input type="text" id="title" name="title" value="{{ old('title', $notice->title) }}" required>

      <label for="description">Description</label>
      <textarea id="description" name="description" required>{{ old('description', $notice->description) }}</textarea>

      <label for="tag">Tag</label>
      <select id="tag" name="tag" required>
        @foreach (\App\Models\Notice::TAGS as $value => $label)
          <option value="{{ $value }}" @selected(old('tag', $notice->tag) === $value)>{{ $label }}</option>
        @endforeach
      </select>

      <label for="notice_date">Date</label>
      <input type="date" id="notice_date" name="notice_date"
             value="{{ old('notice_date', optional($notice->notice_date)->format('Y-m-d')) }}" required>

      <div class="checkbox-row">
        <input type="checkbox" id="is_new" name="is_new" value="1" @checked(old('is_new', $notice->is_new))>
        <label for="is_new" style="margin:0;">Show "New" badge</label>
      </div>

      <button type="submit" class="btn btn-primary">{{ $notice->exists ? 'Save Changes' : 'Publish Notice' }}</button>
    </form>
  </div>
@endsection
