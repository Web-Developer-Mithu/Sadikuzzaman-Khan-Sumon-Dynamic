<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Md. Sadikuzzaman Blog </title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" class="css">
  <style>
    :root {
      color-scheme: light;
    }
    body {
      font-family: 'DM Sans', sans-serif;
      background: #f5f3ef;
      color: #262626;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }
    .blog-header {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      gap: 24px;
      margin: 40px 0 20px;
      flex-wrap: wrap;
    }
    .section-eyebrow {
      display: inline-block;
      margin-bottom: 10px;
      color: #a37c3b;
      font-size: 0.9rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.18em;
    }
    .blog-header h1 {
      margin: 0;
      font-size: clamp(2.4rem, 4vw, 3.2rem);
      line-height: 1.05;
      letter-spacing: -0.04em;
      color: #1f1f1f;
    }
    .section-copy {
      margin: 10px 0 0;
      max-width: 640px;
      color: #555;
      font-size: 1rem;
      line-height: 1.8;
    }
    .blog-tabs {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }
    .blog-tab {
      border: 1px solid #d9c09b;
      border-radius: 999px;
      background: #fff;
      color: #67543a;
      padding: 12px 20px;
      cursor: pointer;
      font-weight: 700;
      transition: all .2s ease;
      box-shadow: 0 8px 24px rgba(103, 84, 58, 0.06);
    }
    .blog-tab.active {
      border-color: #c9a35a;
      background: #c9a35a;
      color: #fff;
      transform: translateY(-1px);
    }
    .blog-section {
      display: none;
      margin-bottom: 40px;
    }
    .blog-section.active {
      display: block;
    }
    .blog-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 24px;
      margin-top: 24px;
    }
    .blog-card {
      border: 1px solid rgba(97, 74, 42, 0.12);
      border-radius: 22px;
      overflow: hidden;
      box-shadow: 0 20px 40px rgba(79, 56, 34, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
      background: #fff;
      display: flex;
      flex-direction: column;
    }
    .blog-card:hover {
      transform: translateY(-8px);
      border-color: #d0aa58;
      box-shadow: 0 24px 50px rgba(79, 56, 34, 0.16);
    }
    .blog-card img {
      width: 100%;
      height: 260px;
      object-fit: cover;
      display: block;
    }
    .blog-card-body {
      padding: 22px;
      display: flex;
      flex-direction: column;
      gap: 16px;
      flex: 1;
    }
    .blog-card-title {
      font-size: 1.25rem;
      font-weight: 800;
      margin: 0;
      line-height: 1.2;
      color: #161616;
    }
    .blog-card-subtitle {
      font-size: 0.98rem;
      color: #5f5f5f;
      margin: 0;
      line-height: 1.75;
      min-height: 56px;
    }
    .blog-card-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      align-items: center;
      font-size: 0.86rem;
      color: #6e6e6e;
    }
    .blog-meta-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      border-radius: 999px;
      background: #fff4dd;
      color: #8d6527;
      padding: 8px 12px;
      font-weight: 700;
      border: 1px solid rgba(201, 163, 90, 0.35);
    }
    .blog-meta-pill a {
      color: #8d6527;
      text-decoration: none;
      border-bottom: 1px dashed rgba(141, 101, 39, 0.45);
      transition: color .2s ease;
    }
    .blog-meta-pill a:hover {
      color: #5f441a;
    }
    .blog-card-footer {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      justify-content: space-between;
      align-items: center;
      margin-top: auto;
    }
    .blog-card-footer button,
    .blog-card-footer a {
      border: none;
      background: #c9a35a;
      color: #fff;
      padding: 12px 20px;
      border-radius: 999px;
      font-size: 0.95rem;
      cursor: pointer;
      transition: background 0.25s ease, transform 0.25s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    .blog-card-footer button:hover,
    .blog-card-footer a:hover {
      background: #b58d3f;
      transform: translateY(-1px);
    }
    .blog-slide-overlay {
      position: fixed;
      inset: 0;
      background: rgba(18, 18, 22, 0.66);
      opacity: 0;
      visibility: hidden;
      transition: opacity .24s ease, visibility .24s ease;
      z-index: 1000;
    }
    .blog-slide-overlay.visible {
      opacity: 1;
      visibility: visible;
    }
    .blog-slide-panel {
      position: fixed;
      top: 0;
      right: 0;
      height: 100%;
      width: min(600px, 100%);
      background: #ffffff;
      box-shadow: -16px 0 64px rgba(20, 20, 40, 0.18);
      transform: translateX(110%);
      transition: transform .28s ease;
      z-index: 1001;
      display: flex;
      flex-direction: column;
    }
    .blog-slide-panel.open {
      transform: translateX(0);
    }
    .blog-slide-header {
      padding: 28px 28px 18px;
      border-bottom: 1px solid #f0e9db;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
    }
    .blog-slide-header h2 {
      font-size: 1.3rem;
      margin: 0;
      color: #222;
    }
    .blog-slide-close {
      width: 48px;
      height: 48px;
      border: none;
      border-radius: 50%;
      background: #f4efe7;
      color: #5b432c;
      cursor: pointer;
      font-size: 22px;
      display: grid;
      place-items: center;
    }
    .blog-slide-content {
      overflow-y: auto;
      padding: 24px 28px 28px;
      flex: 1;
    }
    .blog-slide-image {
      width: 100%;
      height: 280px;
      border-radius: 18px;
      object-fit: cover;
      margin-bottom: 22px;
      background: #f5f1eb;
    }
    .blog-slide-detail {
      margin-bottom: 24px;
    }
    .blog-slide-detail strong {
      display: block;
      font-size: 0.78rem;
      letter-spacing: 0.16em;
      text-transform: uppercase;
      color: #9e8551;
      margin-bottom: 10px;
    }
    .blog-slide-detail p {
      margin: 0;
      color: #4b4b4b;
      line-height: 1.9;
      font-size: 0.98rem;
    }
    .blog-slide-meta {
      display: grid;
      gap: 16px;
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      margin-bottom: 24px;
    }
    .blog-slide-meta-item {
      border-radius: 16px;
      border: 1px solid rgba(201, 163, 90, 0.25);
      background: #fffbf5;
      padding: 18px 18px 16px;
    }
    .blog-slide-meta-item h3 {
      font-size: 0.78rem;
      margin: 0 0 10px;
      text-transform: uppercase;
      letter-spacing: .14em;
      color: #9b7c43;
    }
    .blog-slide-meta-item p,
    .blog-slide-meta-item a {
      margin: 0;
      font-size: 0.95rem;
      line-height: 1.8;
      color: #3c3c3c;
    }
    .blog-slide-meta-item a {
      color: #b78b32;
      text-decoration: none;
    }
    .blog-slide-meta-item a:hover {
      text-decoration: underline;
    }
    .blog-slide-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 12px;
      color: #6b6b6b;
      font-size: 0.95rem;
    }
    .blog-slide-footer span {
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .blog-slide-footer a {
      color: #b58e3f;
      text-decoration: none;
      font-weight: 700;
    }
    .blog-slide-footer a:hover {
      color: #8e6b2d;
    }
    /* Dark Mode Styles */
    [data-theme="dark"] body {
      background: #0b1421;
      color: #f0e8d8;
    }
    [data-theme="dark"] .section-eyebrow {
      color: #e4b96a;
    }
    [data-theme="dark"] .blog-header h1 {
      color: #f0e8d8;
    }
    [data-theme="dark"] .section-copy,
    [data-theme="dark"] .section-title {
      color: #c8d4e0;
    }
    [data-theme="dark"] .blog-tab {
      background: #15233a;
      color: #c8d4e0;
      border-color: #6b5d45;
    }
    [data-theme="dark"] .blog-tab.active {
      background: #c9a35a;
      color: #fff;
    }
    [data-theme="dark"] .blog-card {
      background: #111d2e;
      border-color: rgba(201, 163, 90, 0.15);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }
    [data-theme="dark"] .blog-card-title {
      color: #f0e8d8;
    }
    [data-theme="dark"] .blog-card-subtitle {
      color: #c8d4e0;
    }
    [data-theme="dark"] .blog-card-meta {
      color: #8fa3bc;
    }
    [data-theme="dark"] .blog-meta-pill {
      background: #14253d;
      color: #e4b96a;
      border-color: rgba(228, 185, 106, 0.2);
    }
    [data-theme="dark"] .blog-meta-pill a {
      color: #e4b96a;
    }
    [data-theme="dark"] .blog-slide-overlay {
      background: rgba(0, 0, 0, 0.8);
    }
    [data-theme="dark"] .blog-slide-panel {
      background: #111d2e;
      box-shadow: -16px 0 64px rgba(0, 0, 0, 0.5);
    }
    [data-theme="dark"] .blog-slide-header {
      border-bottom: 1px solid rgba(201, 163, 90, 0.1);
    }
    [data-theme="dark"] .blog-slide-header h2 {
      color: #f0e8d8;
    }
    [data-theme="dark"] .blog-slide-header p {
      color: #8fa3bc;
    }
    [data-theme="dark"] .blog-slide-close {
      background: #14253d;
      color: #e4b96a;
    }
    [data-theme="dark"] .blog-slide-detail strong {
      color: #e4b96a;
    }
    [data-theme="dark"] .blog-slide-detail p {
      color: #c8d4e0;
    }
    [data-theme="dark"] .blog-slide-meta-item {
      background: #14253d;
      border-color: rgba(228, 185, 106, 0.15);
    }
    [data-theme="dark"] .blog-slide-meta-item h3 {
      color: #e4b96a;
    }
    [data-theme="dark"] .blog-slide-meta-item p,
    [data-theme="dark"] .blog-slide-meta-item a {
      color: #c8d4e0;
    }
    [data-theme="dark"] .blog-slide-footer {
      color: #8fa3bc;
    }
    [data-theme="dark"] .blog-slide-footer a {
      color: #e4b96a;
    }
    @media (max-width: 768px) {
      .blog-slide-panel {
        width: 100%;
      }
      .blog-header {
        align-items: flex-start;
      }
      .blog-card-body {
        padding: 18px;
      }
    }
  </style>
</head>
<body>

<!-- NAVIGATION -->
@include('include.nav');

<div class="container">
  @php
    $blogCollection = $blogs;
    if ($blogs instanceof \Illuminate\Contracts\Pagination\Paginator) {
      $blogCollection = collect($blogs->items());
    }
    $recentBlogs = $blogCollection->take(4);
  @endphp

  <div class="blog-header">
    <div>
      <span class="section-eyebrow">Newsroom</span>
      <h1>Blog & News</h1>
      <p class="section-copy">Professional previews of the latest posts, publication sources, and quick access to recent highlights.</p>
    </div>
    <div class="blog-tabs">
      <button class="blog-tab active" data-tab="recent">Recent</button>
      <button class="blog-tab" data-tab="all">All Posts</button>
    </div>
  </div>

  <section id="recentSection" class="blog-section active">
    <h2 class="section-title">Recent Highlights</h2>
    <div class="blog-grid">
      @foreach($recentBlogs as $blog)
        <div class="blog-card">
          @if($blog->image_url)
            <img src="{{ $blog->image_url }}" alt="{{ $blog->{'blog-title'} }}">
          @else
            <div style="width: 100%; height: 220px; background: #f4f0e8; display: flex; align-items: center; justify-content: center; color: #9a8a70;">No image available</div>
          @endif
          <div class="blog-card-body">
            <div class="blog-card-meta">
              <span class="blog-meta-pill">
                @if($blog->publication_date)
                  {{ \Carbon\Carbon::parse($blog->publication_date)->format('d M, Y') }}
                @else
                  {{ $blog->created_at->format('d M, Y') }}
                @endif
              </span>
              @if($blog->publication_name)
                <span class="blog-meta-pill">{{ $blog->publication_name }}</span>
              @endif
            </div>
            <h3 class="blog-card-title">{{ $blog->{'blog-title'} }}</h3>
            <p class="blog-card-subtitle">{{ $blog->subtitle ?? 'Latest news and update from our projects.' }}</p>
            <div class="blog-card-footer">
              <button type="button" class="blog-read-btn"
                data-title="{{ e($blog->{'blog-title'}) }}"
                data-subtitle="{{ e($blog->subtitle ?? '') }}"
                data-description-id="blogDesc-{{ $blog->id }}"
                data-image="{{ $blog->image_url ?? '' }}"
                data-publication-name="{{ e($blog->publication_name ?? '') }}"
                data-publication-date="{{ $blog->publication_date ?? '' }}"
                data-article-url="{{ e($blog->article_url ?? '') }}"
              >Read Preview</button>
              @if($blog->article_url)
                <a href="{{ $blog->article_url }}" target="_blank" rel="noopener noreferrer">View Source</a>
              @endif
            </div>
          </div>
        </div>
        <div id="blogDesc-{{ $blog->id }}" class="blog-description-data" style="display:none;">
          {!! $blog->description !!}
        </div>
      @endforeach
    </div>
  </section>

  <section id="allSection" class="blog-section">
    <h2 class="section-title">All Posts</h2>
    <div class="blog-grid">
      @foreach($blogCollection as $blog)
        <div class="blog-card">
          @if($blog->image_url)
            <img src="{{ $blog->image_url }}" alt="{{ $blog->{'blog-title'} }}">
          @else
            <div style="width: 100%; height: 220px; background: #f4f0e8; display: flex; align-items: center; justify-content: center; color: #9a8a70;">No image available</div>
          @endif
          <div class="blog-card-body">
            <div class="blog-card-meta">
              <span class="blog-meta-pill">
                @if($blog->publication_date)
                  {{ \Carbon\Carbon::parse($blog->publication_date)->format('d M, Y') }}
                @else
                  {{ $blog->created_at->format('d M, Y') }}
                @endif
              </span>
              @if($blog->publication_name)
                <span class="blog-meta-pill">{{ $blog->publication_name }}</span>
              @endif
            </div>
            <h3 class="blog-card-title">{{ $blog->{'blog-title'} }}</h3>
            <p class="blog-card-subtitle">{{ $blog->subtitle ?? 'Latest news from the blog.' }}</p>
            <div class="blog-card-footer">
              <button type="button" class="blog-read-btn"
                data-title="{{ e($blog->{'blog-title'}) }}"
                data-subtitle="{{ e($blog->subtitle ?? '') }}"
                data-description-id="blogDesc-{{ $blog->id }}"
                data-image="{{ $blog->image_url ?? '' }}"
                data-publication-name="{{ e($blog->publication_name ?? '') }}"
                data-publication-date="{{ $blog->publication_date ?? '' }}"
                data-article-url="{{ e($blog->article_url ?? '') }}"
              >Read Preview</button>
              @if($blog->article_url)
                <a href="{{ $blog->article_url }}" target="_blank" rel="noopener noreferrer">View Source</a>
              @endif
            </div>
          </div>
        </div>
        <div id="blogDesc-{{ $blog->id }}" class="blog-description-data" style="display:none;">
          {!! $blog->description !!}
        </div>
      @endforeach
    </div>
  </section>

  <div id="blogSlideOverlay" class="blog-slide-overlay" tabindex="-1"></div>
  <aside id="blogSlidePanel" class="blog-slide-panel" aria-hidden="true" aria-labelledby="blog-slide-title">
    <div class="blog-slide-header">
      <div>
        <h2 id="blog-slide-title">Blog Preview</h2>
        <p style="margin: 6px 0 0; color: #6f6f6f; font-size: 0.95rem;">Story summary and publication details in one place.</p>
      </div>
      <button type="button" id="blogSlideClose" class="blog-slide-close" aria-label="Close blog preview">×</button>
    </div>
    <div class="blog-slide-content">
      <img id="blogSlideImage" class="blog-slide-image" src="" alt="Blog image">
      <div class="blog-slide-meta">
        <div class="blog-slide-meta-item">
          <h3>Publication</h3>
          <p id="blogSlidePublicationText">—</p>
        </div>
        <div class="blog-slide-meta-item">
          <h3>Source</h3>
          <p id="blogSlideSourceText">—</p>
        </div>
        <div class="blog-slide-meta-item">
          <h3>Published</h3>
          <p id="blogSlideDate">—</p>
        </div>
      </div>
      <div class="blog-slide-detail">
        <strong>Title</strong>
        <p id="blogSlideTitleText"></p>
      </div>
      <div class="blog-slide-detail">
        <strong>Subtitle</strong>
        <p id="blogSlideSubtitleText"></p>
      </div>
      <div class="blog-slide-detail">
        <strong>Description</strong>
        <p id="blogSlideDescriptionText"></p>
      </div>
      <div class="blog-slide-footer">
        <a id="blogSlideSourceLink" href="#" target="_blank" rel="noopener noreferrer">Open source article</a>
      </div>
    </div>
  </aside>

  @if($blogs && count($blogs) > 0 && $blogs instanceof \Illuminate\Contracts\Pagination\Paginator)
    <div style="margin-top: 32px;">
      {{ $blogs->links() }}
    </div>
  @endif

  @if(!$blogCollection->count())
    <p style="text-align: center; padding: 40px; color: #999;">No blog posts yet.</p>
  @endif
</div>

{{-- Footer --}}
@include('include.footer')

<script src="{{ asset('script.js') }}" class="js"></script>
</body>
</html>
