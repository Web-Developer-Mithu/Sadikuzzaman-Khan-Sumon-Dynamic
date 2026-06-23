@extends('Admin.dashboard_master')

@section('content')
<div class="content-wrapper p-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Profile Update</h3>
        </div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <form action="{{ url('/admin/profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row gy-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Profile Image</label>
                        <input type="file" name="profile_image" class="form-control">
                        @if($user->profile_image)
                            <img src="{{ asset('profile-images/' . $user->profile_image) }}" class="img-thumbnail mt-2" style="max-width: 150px;" alt="Profile">
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Hero Tagline</label>
                        <input type="text" name="hero_tagline" class="form-control" value="{{ old('hero_tagline', $user->hero_tagline) }}">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Hero Title</label>
                        <input type="text" name="hero_title" class="form-control" value="{{ old('hero_title', $user->hero_title) }}">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Hero Description</label>
                        <textarea name="hero_description" class="form-control" rows="4">{{ old('hero_description', $user->hero_description) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Contact Email</label>
                        <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $user->contact_email) }}">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="2">{{ old('address', $user->address) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">LinkedIn URL</label>
                        <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $user->linkedin) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Facebook URL</label>
                        <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $user->facebook) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Twitter URL</label>
                        <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $user->twitter) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Instagram URL</label>
                        <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $user->instagram) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Wikipedia URL</label>
                        <input type="url" name="wikipedia" class="form-control" value="{{ old('wikipedia', $user->wikipedia) }}">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
