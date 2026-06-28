@extends('admin.dashboard_master')

@section('content')
<div class="container">
    <h3>Edit Journal Post</h3>
    <form action="{{ url('/admin/journals/update/'.$journal->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $journal->title }}" required>
        </div>
        <div class="form-group">
            <label>Slug (optional)</label>
            <input type="text" name="slug" class="form-control" value="{{ $journal->slug }}">
        </div>
        <div class="form-group">
            <label>Journal Name</label>
            <input type="text" name="journal_name" class="form-control" value="{{ $journal->journal_name }}">
        </div>
        <div class="form-group">
            <label>Authors</label>
            <input type="text" name="authors" class="form-control" value="{{ $journal->authors }}">
        </div>
        <div class="form-group">
            <label>Affiliation</label>
            <input type="text" name="affiliation" class="form-control" value="{{ $journal->affiliation }}">
        </div>
        <div class="form-group">
            <label>Role</label>
            <input type="text" name="role" class="form-control" value="{{ $journal->role }}">
        </div>
        <div class="form-group">
            <label>Publication Date</label>
            <input type="date" name="publication_date" class="form-control" value="{{ optional($journal->publication_date)->format('Y-m-d') }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4"><label>Volume</label><input type="text" name="volume" class="form-control" value="{{ $journal->volume }}"></div>
            <div class="form-group col-md-4"><label>Issue</label><input type="text" name="issue" class="form-control" value="{{ $journal->issue }}"></div>
            <div class="form-group col-md-4"><label>Pages</label><input type="text" name="pages" class="form-control" value="{{ $journal->pages }}"></div>
        </div>
        <div class="form-group">
            <label>DOI</label>
            <input type="text" name="doi" class="form-control" value="{{ $journal->doi }}">
        </div>
        <div class="form-group">
            <label>Abstract</label>
            <textarea name="abstract" class="form-control" rows="6">{{ $journal->abstract }}</textarea>
        </div>
        <div class="form-group">
            <label>Keywords (comma separated)</label>
            <input type="text" name="keywords" class="form-control" value="{{ $journal->keywords }}">
        </div>
        <div class="form-group">
            <label>Featured Image</label>
            <input type="file" name="image" class="form-control-file">
            @if($journal->image)
                <div class="mt-2"><img src="{{ asset('journal-images/'.$journal->image) }}" alt="" style="max-width:200px"></div>
            @endif
        </div>
        <div class="form-group">
            <label>PDF Upload</label>
            <input type="file" name="pdf" class="form-control-file">
            @if($journal->pdf)
                <div class="mt-2"><a href="{{ asset('journal-files/'.$journal->pdf) }}" target="_blank">Current PDF</a></div>
            @endif
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="draft" {{ $journal->status=='draft'?'selected':'' }}>Draft</option>
                <option value="published" {{ $journal->status=='published'?'selected':'' }}>Published</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
