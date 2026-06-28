@extends('admin.dashboard_master')

@section('content')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote-lite@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

<div class="admin-page-body">
<div class="page-wrap">

  <div class="page-head">
    <div class="eyebrow">Content Studio</div>
    <h1>Edit Blog</h1>
    <div class="rule"></div>
  </div>

  <div class="form-panel active" id="panel-blog">
  <form action="{{ url('/admin/update-blog/'.$blog->id) }}" method="POST" enctype="multipart/form-data" id="blogForm">
    @csrf
    <div class="form-card">

      <div class="section-label">Basics</div>

      <div class="field-row single">
        <div class="field">
          <label for="blog-title">Blog Title <span class="req">*</span></label>
          <input class="input" id="blog-title" name="blog-title" type="text" value="{{ old('blog-title', $blog->{'blog-title'}) }}" placeholder="e.g. Moving from Memorization to a Culture of Questions" maxlength="120">
        </div>
      </div>

      <div class="field-row single">
        <div class="field">
          <label for="blog-subtitle">Subtitle <span class="hint">Shown on the card — keep it to 1–2 sentences</span></label>
          <textarea class="input" id="blog-subtitle" name="subtitle" rows="2" maxlength="180" placeholder="A short subtitle that appears under the title on the listing page.">{{ old('subtitle', $blog->subtitle) }}</textarea>
          <div class="char-count" id="subtitle-count">0 / 180</div>
        </div>
      </div>

      <div class="field-row">
        <div class="field">
          <label for="blog-publication-name">Publication Name (If Applicable)</label>
          <input class="input" id="blog-publication-name" name="publication_name" type="text" value="{{ old('publication_name', $blog->publication_name) }}" placeholder="e.g. The Daily Star">
        </div>
        <div class="field">
          <label for="blog-article-url">Article URL/Reference (If Applicable)</label>
          <input class="input" id="blog-article-url" name="article_url" type="url" value="{{ old('article_url', $blog->article_url) }}" placeholder="https://www.example.com/article">
        </div>
      </div>

      <div class="section-label">Cover Image</div>
      <div class="field-row single">
        <label class="dropzone" id="blog-dropzone" for="blog-img-input">
          <div class="dz-icon">⤓</div>
          <div class="dz-title">Click to upload, or drag an image here</div>
          <div class="dz-sub">Recommended 1200×630px · JPG or PNG</div>
        </label>
        <input type="file" name="img" id="blog-img-input" accept="image/*" style="display:none;">
        @if($blog->img)
          <div style="margin-top:8px;"><img src="{{ asset('blog-images/'.$blog->img) }}" alt="Current image" style="max-width:240px; border:1px solid #e2e8f0; border-radius:6px; padding:4px;"></div>
        @endif
      </div>

      <div class="section-label">Full Article</div>
      <div class="field-row single">
        <div class="field">
          <label>Body <span class="req">*</span></label>
          <div class="editor-shell">
            <div class="editor-toolbar">
              <button type="button" class="tb-btn bold" data-cmd="bold">B</button>
              <button type="button" class="tb-btn italic" data-cmd="italic">I</button>
              <div class="tb-divider"></div>
              <button type="button" class="tb-btn" data-cmd="h2">H2</button>
              <button type="button" class="tb-btn" data-cmd="h3">H3</button>
              <div class="tb-divider"></div>
              <button type="button" class="tb-btn" data-cmd="quote">"</button>
              <button type="button" class="tb-btn" data-cmd="link">🔗</button>
              <div class="tb-divider"></div>
              <button type="button" class="tb-btn" data-cmd="ul">•≡</button>
              <button type="button" class="tb-btn" data-cmd="clear">Tx</button>
            </div>
            <div class="editor-body" id="blog-editor" contenteditable="true" data-placeholder="Start writing your post here…">{!! old('description', $blog->description) !!}</div>
          </div>
          <input required type="hidden" name="description" id="blog-description-hidden">
        </div>
      </div>

    </div>

    <div class="action-bar">
      <div class="autosave-note"><span class="autosave-dot"></span><span id="autosaveText">Unsaved changes are not kept on reload</span></div>
      <div class="btn-group">
        <button class="btn btn-solid" type="submit">Update</button>
      </div>
    </div>
  </form>
  </div>

</div>
</div>

<script>
  const titleInput = document.getElementById('blog-title');
  const slugOut = document.getElementById('slug-out');
  function refreshSlug(){
    if(!slugOut) return;
    const slug = titleInput.value
      .toLowerCase().trim()
      .replace(/[^a-z0-9\s-]/g, '')
      .replace(/\s+/g, '-')
      .replace(/-+/g, '-');
    slugOut.textContent = slug || 'your-post-title';
  }
  titleInput && titleInput.addEventListener('input', refreshSlug);
  refreshSlug();

  function bindCounter(inputId, counterId, max){
    const el = document.getElementById(inputId);
    const counter = document.getElementById(counterId);
    if(!el || !counter) return;
    function update(){
      const len = el.value.length;
      counter.textContent = `${len} / ${max}`;
      counter.classList.toggle('warn', len > max * 0.92);
    }
    el.addEventListener('input', update);
    update();
  }
  bindCounter('blog-subtitle', 'subtitle-count', 180);

  const editor = document.getElementById('blog-editor');
  function exec(cmd){
    editor.focus();
    switch(cmd){
      case 'bold': document.execCommand('bold'); break;
      case 'italic': document.execCommand('italic'); break;
      case 'h2': document.execCommand('formatBlock', false, 'H2'); break;
      case 'h3': document.execCommand('formatBlock', false, 'H3'); break;
      case 'quote': document.execCommand('formatBlock', false, 'BLOCKQUOTE'); break;
      case 'ul': document.execCommand('insertUnorderedList'); break;
      case 'clear': document.execCommand('removeFormat'); document.execCommand('formatBlock', false, 'P'); break;
      case 'link':
        const url = prompt('Paste the link URL:');
        if(url) document.execCommand('createLink', false, url);
        break;
    }
  }
  document.querySelectorAll('.tb-btn').forEach(btn => {
    btn.addEventListener('click', () => exec(btn.dataset.cmd));
  });

  document.getElementById('blogForm').addEventListener('submit', () => {
    document.getElementById('blog-description-hidden').value = editor.innerHTML.trim();
  });

  function bindDropzone(zoneId, inputId){
    const zone = document.getElementById(zoneId);
    const input = document.getElementById(inputId);
    if(!zone || !input) return;
    input.addEventListener('change', () => {
      if(input.files[0]){
        zone.querySelector('.dz-title').textContent = input.files[0].name;
        zone.querySelector('.dz-sub').textContent = 'Selected · click to change';
      }
    });
  }
  bindDropzone('blog-dropzone', 'blog-img-input');

  function bindUnsavedHint(formId, textId){
    const form = document.getElementById(formId);
    const text = document.getElementById(textId);
    if(!form || !text) return;
    form.addEventListener('input', () => { text.textContent = 'Unsaved changes'; });
  }
  bindUnsavedHint('blogForm', 'autosaveText');
</script>

@endsection