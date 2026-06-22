<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Md. Sadikuzzaman Blog </title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" class="css">
  <style>
    .blog-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 24px; margin: 40px 0; }
    .blog-card { border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s; }
    .blog-card:hover { transform: translateY(-4px); box-shadow: 0 4px 16px rgba(0,0,0,0.15); }
    .blog-card img { width: 100%; height: 200px; object-fit: cover; }
    .blog-card-body { padding: 16px; }
    .blog-card-title { font-size: 18px; font-weight: 600; margin: 0 0 8px; color: #333; }
    .blog-card-subtitle { font-size: 14px; color: #666; margin: 0 0 12px; line-height: 1.5; }
    .blog-card-meta { font-size: 12px; color: #999; }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
  </style>
</head>
<body>

<!-- NAVIGATION -->
@include('include.nav');

<div class="container">
  <h1 style="margin-top: 40px;">Blog & News</h1>
  
  @if($blogs && count($blogs) > 0)
    <div class="blog-grid">
      @foreach($blogs as $blog)
        <div class="blog-card">
          @if($blog->image_url)
            <img src="{{ $blog->image_url }}" alt="{{ $blog->{'blog-title'} }}">
          @else
            <div style="width: 100%; height: 200px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #999;">No Image</div>
          @endif
          <div class="blog-card-body">
            <h3 class="blog-card-title">{{ $blog->{'blog-title'} }}</h3>
            <p class="blog-card-subtitle">{{ $blog->subtitle ?? 'No subtitle' }}</p>
            <div class="blog-card-meta">{{ $blog->created_at->format('M d, Y') }}</div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <p style="text-align: center; padding: 40px; color: #999;">No blog posts yet.</p>
  @endif
</div>

{{-- Footer --}}
@include('include.footer')

<script src="{{ asset('script.js') }}" class="js"></script>
</body>
</html>
