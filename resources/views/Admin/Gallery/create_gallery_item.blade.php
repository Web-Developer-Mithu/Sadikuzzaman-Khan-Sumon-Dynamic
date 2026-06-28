@extends('admin.dashboard_master')

@section('content')
<div class="content-wrapper p-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ isset($item) ? 'Edit Gallery Item' : 'Add Gallery Item' }}</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ isset($item) ? url('/admin/gallery/update/'.$item->id) : url('/admin/gallery/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row gy-3">
                    <div class="col-md-12">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', isset($item) ? $item->title : '') }}" required>
                        @error('title')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" {{ isset($item) ? '' : 'required' }} accept="image/*">
                        @error('image')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                        @if(isset($item) && $item->image)
                            <div class="mt-3">
                                <img src="{{ $item->image_url }}" class="img-thumbnail" style="max-width: 220px;" alt="Gallery image">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">{{ isset($item) ? 'Update' : 'Add to Gallery' }}</button>
                    <a href="{{ url('/admin/gallery') }}" class="btn btn-secondary ms-2">Back to Gallery</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
