@extends('admin.dashboard_master')

@section('content')
<div class="container">
    <h3>Create Journal Post</h3>
    <form action="{{ url('/admin/journals/store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Slug (optional)</label>
            <input type="text" name="slug" class="form-control">
        </div>
        <div class="form-group">
            <label>Journal Name</label>
            <input type="text" name="journal_name" class="form-control">
        </div>
        <div class="form-group">
            <label>Authors</label>
            <input type="text" name="authors" class="form-control" placeholder="Name1; Name2">
        </div>
        <div class="form-group">
            <label>Affiliation</label>
            <input type="text" name="affiliation" class="form-control">
        </div>
        <div class="form-group">
            <label>Role (e.g. Principal, PhD Candidate)</label>
            <input type="text" name="role" class="form-control">
        </div>
        <div class="form-group">
            <label>Publication Date</label>
            <input type="date" name="publication_date" class="form-control">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4"><label>Volume</label><input type="text" name="volume" class="form-control"></div>
            <div class="form-group col-md-4"><label>Issue</label><input type="text" name="issue" class="form-control"></div>
            <div class="form-group col-md-4"><label>Pages</label><input type="text" name="pages" class="form-control"></div>
        </div>
        <div class="form-group">
            <label>DOI</label>
            <input type="text" name="doi" class="form-control">
        </div>
        <div class="form-group">
            <label>Abstract</label>
            <textarea name="abstract" class="form-control" rows="6"></textarea>
        </div>
        <div class="form-group">
            <label>Keywords (comma separated)</label>
            <input type="text" name="keywords" class="form-control">
        </div>
        <div class="form-group">
            <label>Featured Image</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label>PDF Upload</label>
            <input type="file" name="pdf" class="form-control-file">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="draft">Draft</option>
                <option value="published" selected>Published</option>
            </select>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
