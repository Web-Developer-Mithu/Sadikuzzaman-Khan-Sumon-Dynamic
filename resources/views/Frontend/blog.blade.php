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
    .blog-card { border: 1px solid #ddd; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 14px rgba(0,0,0,0.08); transition: transform 0.28s ease, border-color 0.28s ease; background: #fff; }
    .blog-card:hover { transform: translateY(-4px); border-color: #c9a35a; box-shadow: 0 6px 22px rgba(0,0,0,0.12); }
    .blog-card img { width: 100%; height: 220px; object-fit: cover; }
    .blog-card-body { padding: 18px; }
    .blog-card-title { font-size: 20px; font-weight: 700; margin: 0 0 10px; color: #1c1c1c; }
    .blog-card-subtitle { font-size: 14px; color: #555; margin: 0 0 14px; line-height: 1.6; min-height: 42px; }
    .blog-card-meta { display: flex; flex-wrap: wrap; gap: 8px; align-items: center; font-size: 12px; color: #777; margin-bottom: 14px; }
    .blog-meta-pill { display: inline-flex; align-items: center; gap: 6px; border-radius: 999px; background: #f7f3ee; color: #6b4e26; padding: 6px 10px; font-weight: 600; }
    .blog-meta-pill a { color: inherit; text-decoration: none; }
    .blog-card-footer { display: flex; justify-content: space-between; align-items: center; gap: 10px; margin-top: 12px; }
    .blog-card-footer button { border: none; background: #c9a35a; color: #fff; padding: 10px 16px; border-radius: 999px; font-size: 13px; cursor: pointer; transition: background 0.2s ease; }
    .blog-card-footer button:hover { background: #af8c49; }
    .blog-slide-overlay { position: fixed; inset: 0; background: rgba(13,18,29,0.55); opacity: 0; visibility: hidden; transition: opacity .24s ease, visibility .24s ease; z-index: 1000; }
    .blog-slide-overlay.visible { opacity: 1; visibility: visible; }
    .blog-slide-panel { position: fixed; top: 0; right: 0; height: 100%; width: min(520px, 100%); max-width: 520px; background: #fff; box-shadow: -12px 0 40px rgba(20,20,40,0.14); transform: translateX(110%); transition: transform .28s ease; z-index: 1001; display: flex; flex-direction: column; }
    .blog-slide-panel.open { transform: translateX(0); }
    .blog-slide-header { padding: 22px 22px 12px; border-bottom: 1px solid #ece8e0; display: flex; align-items: center; justify-content: space-between; gap: 16px; }
    .blog-slide-header h2 { font-size: 20px; margin: 0; color: #1a1a1a; }
    .blog-slide-close { width: 42px; height: 42px; border: none; border-radius: 50%; background: #f3f1ee; color: #6b4e26; cursor: pointer; font-size: 18px; }
    .blog-slide-content { overflow-y: auto; padding: 20px 22px 24px; flex: 1; }
    .blog-slide-image { width: 100%; height: 240px; border-radius: 12px; object-fit: cover; margin-bottom: 18px; background: #f2f2f2; }
    .blog-slide-detail { margin-bottom: 18px; }
    .blog-slide-detail strong { display: block; font-size: 13px; letter-spacing: .04em; text-transform: uppercase; color: #7a6a58; margin-bottom: 8px; }
    .blog-slide-detail p { margin: 0; color: #3d3d3d; line-height: 1.7; }
    .blog-slide-highlight { border: 1px solid #c9a35a; border-radius: 12px; background: #fffbf2; padding: 14px 16px; margin-bottom: 14px; color: #5d462a; }
    .blog-slide-highlight a { color: #5d462a; text-decoration: underline; }
    .blog-slide-footer { display: flex; flex-wrap: wrap; gap: 10px; align-items: center; justify-content: space-between; margin-top: 18px; font-size: 14px; color: #666; }
    .blog-slide-footer a { color: #c9a35a; text-decoration: none; font-weight: 600; }
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
            <div class="blog-card-meta">
              <span>{{ $blog->created_at->format('M d, Y') }}</span>
              @if($blog->publication_name)
                <span class="blog-meta-pill">Publication: {{ $blog->publication_name }}</span>
              @endif
              @if($blog->publication_date)
                <span class="blog-meta-pill">Published: {{ \Carbon\Carbon::parse($blog->publication_date)->format('M d, Y') }}</span>
              @endif
              @if($blog->article_url)
                <span class="blog-meta-pill"><a href="{{ $blog->article_url }}" target="_blank" rel="noopener noreferrer">Source URL</a></span>
              @endif
            </div>
            <div class="blog-card-footer">
              <button type="button" class="blog-read-btn"
                data-title="{{ e($blog->{'blog-title'}) }}"
                data-subtitle="{{ e($blog->subtitle ?? '') }}"
                data-description-id="blogDesc-{{ $blog->id }}"
                data-image="{{ $blog->image_url ?? '' }}"
                data-publication-name="{{ e($blog->publication_name ?? '') }}"
                data-publication-date="{{ $blog->publication_date ?? '' }}"
                data-article-url="{{ e($blog->article_url ?? '') }}"
              >Read</button>
            </div>
          </div>
        </div>
        <div id="blogDesc-{{ $blog->id }}" class="blog-description-data" style="display:none;">
          {!! $blog->description !!}
        </div>
      @endforeach
    </div>

    <div id="blogSlideOverlay" class="blog-slide-overlay" tabindex="-1"></div>
    <aside id="blogSlidePanel" class="blog-slide-panel" aria-hidden="true" aria-labelledby="blog-slide-title">
      <div class="blog-slide-header">
        <h2 id="blog-slide-title">Blog Preview</h2>
        <button type="button" id="blogSlideClose" class="blog-slide-close" aria-label="Close blog preview">×</button>
      </div>
      <div class="blog-slide-content">
        <img id="blogSlideImage" class="blog-slide-image" src="" alt="Blog image">
        <div class="blog-slide-detail">
          <strong>Title</strong>
          <p id="blogSlideTitleText"></p>
        </div>
        <div class="blog-slide-detail">
          <strong>Subtitle</strong>
          <p id="blogSlideSubtitleText"></p>
        </div>
        <div id="blogPublicationInfo" class="blog-slide-highlight" style="display:none;"></div>
        <div id="blogArticleUrl" class="blog-slide-highlight" style="display:none;"></div>
        <div class="blog-slide-detail">
          <strong>Description</strong>
          <p id="blogSlideDescriptionText"></p>
        </div>
        <div class="blog-slide-footer">
          <span id="blogSlideDate"></span>
        </div>
      </div>
    </aside>
  @else
    <p style="text-align: center; padding: 40px; color: #999;">No blog posts yet.</p>
  @endif
</div>

{{-- Footer --}}
@include('include.footer')

<script src="{{ asset('script.js') }}" class="js"></script>
</body>
</html>
