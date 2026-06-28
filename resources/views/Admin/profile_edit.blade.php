@extends('admin.dashboard_master')

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
                        <label class="form-label">Email (username)</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
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
                    <div class="col-md-6 mt-2">
                        <label class="form-label">New Password (leave blank to keep current)</label>
                        <input type="password" name="password" class="form-control" autocomplete="new-password">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
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

                    <!-- Custom Social Media -->
                    <div class="col-md-12">
                        <div class="card mt-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Other Social Media</h5>
                                <button type="button" class="btn btn-sm btn-success" id="addSocialMediaBtn">+ Add More</button>
                            </div>
                            <div class="card-body">
                                <div id="socialMediaContainer">
                                    @php
                                        $socialMedias = [];
                                        if (!empty($user->social_media)) {
                                            $socialMedias = is_array($user->social_media) ? $user->social_media : (json_decode($user->social_media, true) ?: []);
                                        }
                                    @endphp
                                    @if(count($socialMedias) > 0)
                                        @foreach($socialMedias as $index => $media)
                                        <div class="social-media-item row gy-2 mb-3">
                                            <div class="col-md-5">
                                                <input type="text" name="social_media_name[]" class="form-control" placeholder="Platform name (e.g., YouTube, TikTok)" value="{{ $media['name'] ?? '' }}">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="url" name="social_media_url[]" class="form-control" placeholder="Profile URL" value="{{ $media['url'] ?? '' }}">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger btn-sm w-100 removeSocialMediaBtn">Remove</button>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const addBtn = document.getElementById('addSocialMediaBtn');
    const container = document.getElementById('socialMediaContainer');

    addBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const newRow = document.createElement('div');
        newRow.className = 'social-media-item row gy-2 mb-3';
        newRow.innerHTML = `
            <div class="col-md-5">
                <input type="text" name="social_media_name[]" class="form-control" placeholder="Platform name (e.g., YouTube, TikTok)">
            </div>
            <div class="col-md-5">
                <input type="url" name="social_media_url[]" class="form-control" placeholder="Profile URL">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm w-100 removeSocialMediaBtn">Remove</button>
            </div>
        `;
        container.appendChild(newRow);
        attachRemoveHandler(newRow.querySelector('.removeSocialMediaBtn'));
    });

    function attachRemoveHandler(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            btn.closest('.social-media-item').remove();
        });
    }

    // Attach handlers to existing remove buttons
    document.querySelectorAll('.removeSocialMediaBtn').forEach(btn => {
        attachRemoveHandler(btn);
    });
});
</script>
@endsection
