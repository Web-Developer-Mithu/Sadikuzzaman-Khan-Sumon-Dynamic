@extends('admin.dashboard_master')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote-lite@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<style>
  /* =========================================================
     Theme variables — matched to the gold/navy dashboard theme.
     Light mode = default; dark mode = html[data-bs-theme="dark"]
     ========================================================= */
  :root{
    --page-bg: #F4F5F8;
    --surface: #FFFFFF;
    --surface-2: #FAFAFC;
    --field: #FFFFFF;
    --line: #E7E8EE;
    --line-strong: #D8D2C0;
    --navy: #1B2333;
    --navy-2: #232C40;
    --gold: #C9A35A;
    --gold-soft: rgba(201,163,90,0.12);
    --text: #1A1D24;
    --text-dim: #6B7080;
    --muted: #8A8F9C;
    --danger: #C0492F;
    --danger-soft: rgba(192,73,47,0.10);
  }

  html[data-bs-theme="dark"]{
    --page-bg: #0B0F19;
    --surface: #131A2A;
    --surface-2: #161D30;
    --field: #101626;
    --line: rgba(255,255,255,0.08);
    --line-strong: rgba(201,163,90,0.30);
    --navy: #1B2333;
    --navy-2: #232C40;
    --gold: #D8B26C;
    --gold-soft: rgba(216,178,108,0.14);
    --text: #F1F1F4;
    --text-dim: #B7BAC4;
    --muted: #7C8194;
    --danger: #E0735A;
    --danger-soft: rgba(224,115,90,0.14);
  }

  *{ box-sizing: border-box; }

  .admin-page-body{
    background: var(--page-bg);
    color: var(--text);
    font-family: 'Inter', sans-serif;
    -webkit-font-smoothing: antialiased;
    padding-bottom: 100px;
    min-height: calc(100vh - 80px);
    transition: background .2s ease, color .2s ease;
  }

  .admin-page-body a{ color: inherit; }
  .admin-page-body button{ font-family: inherit; }

  /* ---------- Page header ---------- */
  .page-wrap{ max-width: 980px; margin: 0 auto; padding: 0 28px; }

  .page-head{ padding: 40px 0 0; }
  .eyebrow{
    display:inline-flex; align-items:center; gap:10px;
    font-family:'JetBrains Mono', monospace;
    font-size:11px; letter-spacing:0.16em; text-transform:uppercase;
    color: var(--gold); margin-bottom: 14px;
  }
  .eyebrow::before{ content:''; width:22px; height:1px; background: var(--gold); }
  .page-head h1{
    font-family:'Playfair Display', serif; font-weight:700;
    font-size: clamp(26px, 3.2vw, 34px);
    margin: 0 0 10px; color: var(--text);
  }
  .page-head .rule{
    width: 56px; height: 3px; border-radius: 2px;
    background: var(--gold); margin-bottom: 18px;
  }
  .page-head p{
    font-size: 14px; color: var(--text-dim); margin: 0 0 8px;
    max-width: 560px; line-height: 1.65;
  }

  /* ---------- Tabs ---------- */
  .tabs{
    display:flex; gap: 6px;
    margin: 30px 0 0;
    border-bottom: 1px solid var(--line);
  }
  .tab-btn{
    appearance:none; border:none; background:transparent; cursor:pointer;
    padding: 12px 4px; margin-right: 26px;
    font-family:'Inter', sans-serif; font-weight:600; font-size: 14px;
    color: var(--text-dim);
    position: relative;
  }
  .tab-btn::after{
    content:''; position:absolute; left:0; right:0; bottom:-1px; height:2px;
    background: var(--gold); border-radius: 2px;
    transform: scaleX(0); transform-origin: left;
    transition: transform .2s ease;
  }
  .tab-btn.active{ color: var(--text); }
  .tab-btn.active::after{ transform: scaleX(1); }

  /* ---------- Form shell ---------- */
  .form-panel{ display:none; padding-top: 30px; }
  .form-panel.active{ display:block; }

  .form-card{
    background: var(--surface);
    border: 1px solid var(--line);
    border-radius: 12px;
    padding: 34px 36px;
    box-shadow: 0 1px 2px rgba(16,20,30,0.04);
  }

  .section-label{
    font-family:'JetBrains Mono', monospace;
    font-size: 10.5px; letter-spacing: 0.1em; text-transform: uppercase;
    color: var(--gold);
    display:flex; align-items:center; gap:10px;
    margin: 0 0 20px;
  }
  .section-label:not(:first-child){ margin-top: 34px; padding-top: 28px; border-top: 1px solid var(--line); }
  .section-label::after{ content:''; flex:1; height:1px; background: var(--line); }

  .field-row{ display:grid; grid-template-columns: 1fr 1fr; gap: 18px; margin-bottom: 18px; }
  .field-row.single{ grid-template-columns: 1fr; }

  .field{ display:flex; flex-direction:column; gap: 7px; }
  .field label{
    font-size: 12.5px; font-weight:600; color: var(--text);
    display:flex; align-items:center; gap:8px;
  }
  .field label .req{ color: var(--gold); font-size: 11px; }
  .field label .hint{
    font-family:'JetBrains Mono', monospace; font-size: 10.5px;
    color: var(--muted); font-weight: 400; margin-left: auto;
  }

  .input, textarea.input, select.input{
    width:100%;
    background: var(--field);
    border: 1px solid var(--line);
    border-radius: 8px;
    padding: 11px 13px;
    color: var(--text);
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    transition: border-color .15s ease;
  }
  .input::placeholder{ color: var(--muted); }
  .input:focus, textarea.input:focus, select.input:focus{
    outline:none; border-color: var(--gold);
  }
  textarea.input{ resize: vertical; line-height: 1.6; }

  select.input{
    appearance:none;
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><path fill='%23C9A35A' d='M4 6l4 4 4-4'/></svg>");
    background-repeat: no-repeat;
    background-position: right 12px center;
    padding-right: 34px;
  }

  .helptext{ font-size: 11.5px; color: var(--muted); line-height:1.5; }

  .field-error{
    font-size: 12px; color: var(--danger);
    display:flex; align-items:center; gap:6px;
    margin-top: 1px;
  }
  .field-error::before{ content:'⚠'; font-size:11px; }

  .slug-preview{
    font-family:'JetBrains Mono', monospace;
    font-size: 11px; color: var(--muted);
    padding: 2px 0 0;
  }
  .slug-preview span{ color: var(--gold); }

  .char-count{
    font-family:'JetBrains Mono', monospace; font-size: 10.5px; color: var(--muted);
    text-align:right; margin-top:4px;
  }
  .char-count.warn{ color: var(--danger); }

  /* ---------- Cover/preview image dropzone ---------- */
  .dropzone{
    display:block;
    border: 1px dashed var(--line-strong);
    border-radius: 10px;
    padding: 24px;
    text-align:center;
    cursor:pointer;
    transition: background .15s ease, border-color .15s ease;
    background: var(--surface-2);
  }
  .dropzone:hover{ background: var(--gold-soft); border-color: var(--gold); }
  .dropzone .dz-icon{
    width:34px; height:34px; margin: 0 auto 10px;
    border-radius: 50%;
    background: var(--navy);
    display:flex; align-items:center; justify-content:center;
    color: var(--gold); font-size: 15px;
  }
  .dropzone .dz-title{ font-size: 13.5px; font-weight: 600; color: var(--text); margin-bottom: 3px; }
  .dropzone .dz-sub{ font-size: 11px; color: var(--muted); font-family:'JetBrains Mono', monospace; }

  /* ---------- Rich text toolbar ---------- */
  .editor-shell{
    border: 1px solid var(--line);
    border-radius: 8px;
    overflow: hidden;
    background: var(--field);
  }
  .editor-toolbar{
    display:flex; align-items:center; gap: 2px;
    padding: 7px 9px;
    border-bottom: 1px solid var(--line);
    background: var(--surface-2);
    flex-wrap: wrap;
  }
  .tb-btn{
    width: 30px; height: 30px;
    border-radius: 6px;
    border: 1px solid transparent;
    background: transparent;
    color: var(--text-dim);
    cursor: pointer;
    display:flex; align-items:center; justify-content:center;
    font-size: 13px;
    transition: all .12s ease;
  }
  .tb-btn:hover{ background: var(--gold-soft); color: var(--text); }
  .tb-btn.active{ background: var(--gold-soft); color: var(--gold); border-color: var(--line-strong); }
  .tb-divider{ width:1px; height: 18px; background: var(--line); margin: 0 5px; }
  .tb-btn.bold{ font-weight: 700; }
  .tb-btn.italic{ font-style: italic; }

  .editor-body{
    min-height: 260px;
    max-height: 460px;
    overflow-y: auto;
    padding: 16px 18px;
    font-size: 14.5px;
    line-height: 1.8;
    color: var(--text);
    outline: none;
  }
  .editor-body:empty::before{
    content: attr(data-placeholder);
    color: var(--muted);
  }
  .editor-body h2{ font-family:'Playfair Display', serif; font-size: 20px; font-weight:600; color: var(--text); margin: 20px 0 10px; }
  .editor-body h3{ font-family:'Playfair Display', serif; font-size: 17px; font-weight:600; color: var(--text); margin: 16px 0 8px; }
  .editor-body blockquote{
    margin: 16px 0; padding: 2px 0 2px 16px;
    border-left: 3px solid var(--gold);
    font-style: italic; color: var(--text-dim);
  }
  .editor-body p{ margin: 0 0 12px; }
  .editor-body a{ color: var(--gold); text-decoration: underline; }

  /* ---------- Year-style status badge (echoes the "PHD — IN PROGRESS" pill) ---------- */
  .seg-control{
    display:inline-flex; border: 1px solid var(--line); border-radius: 999px; overflow:hidden;
    background: var(--surface-2);
  }
  .seg-option{
    padding: 9px 18px; font-size: 12.5px; font-weight: 600; cursor:pointer;
    color: var(--text-dim);
    transition: all .15s ease;
  }
  .seg-option.active{ background: var(--gold); color: #1A1404; }

  /* ---------- Action bar ---------- */
  .action-bar{
    margin-top: 30px;
    padding: 16px 36px;
    background: var(--surface);
    border: 1px solid var(--line);
    border-radius: 12px;
    display:flex; align-items:center; justify-content:space-between;
  }
  .autosave-note{
    font-family:'JetBrains Mono', monospace; font-size: 11px; color: var(--muted);
    display:flex; align-items:center; gap:8px;
  }
  .autosave-dot{ width:6px; height:6px; border-radius:50%; background: var(--muted); }

  .btn-group{ display:flex; gap: 10px; }
  .btn{
    padding: 11px 22px;
    border-radius: 8px;
    font-size: 13.5px; font-weight: 600;
    cursor:pointer; border: 1px solid transparent;
    transition: all .15s ease;
    display:inline-flex; align-items:center; gap:8px;
  }
  .btn-ghost{
    background: transparent; border-color: var(--line); color: var(--text-dim);
  }
  .btn-ghost:hover{ border-color: var(--gold); color: var(--text); }
  .btn-primary{
    background: var(--gold-soft); border-color: var(--line-strong); color: var(--gold);
  }
  .btn-primary:hover{ background: var(--gold); color: #1A1404; }
  .btn-solid{
    background: var(--gold); border-color: var(--gold); color: #1A1404; font-weight: 700;
  }
  .btn-solid:hover{ filter: brightness(1.08); }

  @media (max-width: 760px){
    .field-row{ grid-template-columns: 1fr; }
    .form-card{ padding: 24px 18px; }
    .action-bar{ flex-direction: column; gap: 14px; align-items: stretch; padding: 16px 18px; }
    .btn-group{ justify-content: stretch; }
    .btn{ flex:1; justify-content:center; }
  }

  .admin-page-body a:focus-visible,
  .admin-page-body button:focus-visible,
  .admin-page-body .input:focus-visible{
    outline: 1.5px solid var(--gold); outline-offset: 2px;
  }

  /* ========== Summernote Theme Support ========== */
  .note-editor.note-frame {
    border: 1px solid var(--line);
    border-radius: 8px;
    background: var(--field);
  }
  
  .note-editor.note-frame .note-toolbar {
    background: var(--surface-2);
    border-bottom: 1px solid var(--line);
  }

  .note-editor.note-frame .note-editable {
    background: var(--field);
    color: var(--text);
    min-height: 320px;
  }

  .note-editor.note-frame .note-editable p,
  .note-editor.note-frame .note-editable h2,
  .note-editor.note-frame .note-editable h3 {
    color: var(--text);
  }

  .note-btn {
    color: var(--text-dim);
    transition: all .12s ease;
  }

  .note-btn:hover {
    background: var(--gold-soft);
    color: var(--text);
  }

  .note-btn.active {
    background: var(--gold-soft);
    color: var(--gold);
  }

  .note-popover,
  .note-dialog {
    background: var(--surface);
    border-color: var(--line);
    color: var(--text);
  }

  .note-popover .note-popover-content,
  .note-dialog .note-form-group {
    color: var(--text);
  }

  .note-dialog .form-control {
    background: var(--field);
    border-color: var(--line);
    color: var(--text);
  }

  .note-dialog .form-control:focus {
    background: var(--field);
    border-color: var(--gold);
    color: var(--text);
  }

  .note-editable:focus {
    outline: none;
    border-color: var(--gold);
  }
</style>
@endpush

<div class="admin-page-body">
<div class="page-wrap">

  <div class="page-head">
    <div class="eyebrow">Content Studio</div>
    <h1>Publish a New Entry</h1>
    <div class="rule"></div>
    <p>Add a blog post you've written, or log a piece of press coverage so it appears on your site's Writing &amp; Press page.</p>
  </div>

  <!-- ============ BLOG POST FORM ============ -->
  <div class="form-panel active" id="panel-blog">
  @if(isset($blog))
  <form action="{{ url('/admin/update-blog/'.$blog->id) }}" method="POST" enctype="multipart/form-data" id="blogForm">
    @csrf
  @else
  <form action="{{ url('/storeblog') }}" method="POST" enctype="multipart/form-data" id="blogForm">
    @csrf
  @endif
    <div class="form-card">

      <div class="section-label">Basics</div>

      <div class="field-row single">
        <div class="field">
          <label for="blog-title">Blog Title <span class="req">*</span></label>
          <input class="input" id="blog-title" name="blog-title" type="text" value="{{ old('blog-title', isset($blog) ? $blog->{'blog-title'} : '') }}" placeholder="e.g. Moving from Memorization to a Culture of Questions" maxlength="120">
          @error('blog-title', 'blog') <div class="field-error">{{ $message }}</div> @enderror
          <div class="slug-preview">URL: yoursite.com/blog/<span id="slug-out">your-post-title</span></div>
        </div>
      </div>

      <div class="field-row single">
        <div class="field">
          <label for="blog-subtitle">Subtitle <span class="hint">Shown on the card — keep it to 1–2 sentences</span></label>
          <textarea required class="input" id="blog-subtitle" name="subtitle" rows="2" maxlength="180" placeholder="A short subtitle that appears under the title on the listing page.">{{ old('subtitle', isset($blog) ? $blog->subtitle : '') }}</textarea>
          <div class="char-count" id="subtitle-count">0 / 180</div>
          @error('subtitle', 'blog') <div class="field-error">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="field-row">
        <div class="field">
          <label for="blog-publication-name">Publication Name (If Applicable)</label>
          <input class="input" id="blog-publication-name" name="publication_name" type="text" value="{{ old('publication_name', isset($blog) ? $blog->publication_name : '') }}" placeholder="e.g. The Daily Star">
          @error('publication_name', 'blog') <div class="field-error">{{ $message }}</div> @enderror
        </div>
        <div class="field">
          <label for="blog-article-url">Article URL/Reference (If Applicable)</label>
          <input class="input" id="blog-article-url" name="article_url" type="url" value="{{ old('article_url', isset($blog) ? $blog->article_url : '') }}" placeholder="https://www.example.com/article">
          @error('article_url', 'blog') <div class="field-error">{{ $message }}</div> @enderror
        </div>
      </div>

        <div class="field-row single">
          <div class="field">
            <label for="blog-publication-date">Publication Date (If Applicable)</label>
            <input class="input" id="blog-publication-date" name="publication_date" type="date" value="{{ old('publication_date', isset($blog) ? $blog->publication_date : '') }}">
            @error('publication_date', 'blog') <div class="field-error">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="section-label">Cover Image</div>
      <div class="field-row single">
        <label class="dropzone" id="blog-dropzone" for="blog-img-input">
          <div class="dz-icon">⤓</div>
          <div class="dz-title">Click to upload, or drag an image here</div>
          <div class="dz-sub">Recommended 1200×630px · JPG or PNG</div>
        </label>
        <input {{ isset($blog) ? '' : 'required' }} type="file" name="img" id="blog-img-input" accept="image/*" style="display:none;">
        @error('img', 'blog') <div class="field-error">{{ $message }}</div> @enderror
        @if(isset($blog) && $blog->img)
          <div style="margin-top:8px;"><img src="{{ asset('blog-images/'.$blog->img) }}" alt="Current image" style="max-width:240px; border:1px solid #e2e8f0; border-radius:6px; padding:4px;"></div>
        @endif
      </div>

      <div class="section-label">Full Article</div>
      <div class="field-row single">
        <div class="field">
          <label>Body <span class="req">*</span></label>
          <div class="editor-shell">
            <div class="editor-toolbar">
              <button type="button" class="tb-btn bold" data-cmd="bold" title="Bold">B</button>
              <button type="button" class="tb-btn italic" data-cmd="italic" title="Italic">I</button>
              <div class="tb-divider"></div>
              <button type="button" class="tb-btn" data-cmd="h2" title="Heading">H2</button>
              <button type="button" class="tb-btn" data-cmd="h3" title="Subheading">H3</button>
              <div class="tb-divider"></div>
              <button type="button" class="tb-btn" data-cmd="quote" title="Quote">"</button>
              <button type="button" class="tb-btn" data-cmd="link" title="Insert link">🔗</button>
              <div class="tb-divider"></div>
              <button type="button" class="tb-btn" data-cmd="ul" title="Bullet list">•≡</button>
              <button type="button" class="tb-btn" data-cmd="clear" title="Clear formatting">Tx</button>
            </div>
            <div class="editor-body" id="blog-editor" contenteditable="true" data-placeholder="Start writing your post here…">{!! old('description', isset($blog) ? $blog->description : '') !!}</div>
          </div>
          <!-- Hidden field: JS copies the editor's HTML here right before submit, since
               contenteditable divs don't submit their content on their own. -->
          <input required type="hidden" name="description" id="blog-description-hidden">
          <div class="helptext">Select text and use the toolbar to format it. This becomes the full article shown when readers click into the post.</div>
          @error('description', 'blog') <div class="field-error">{{ $message }}</div> @enderror
        </div>
      </div>

    </div>

    <div class="action-bar">
      <div class="autosave-note"><span class="autosave-dot"></span><span id="autosaveText">Unsaved changes are not kept on reload</span></div>
      <div class="btn-group">
        <button class="btn btn-solid" type="submit">{{ isset($blog) ? 'Update' : 'Publish' }}</button>
      </div>
    </div>
  </form>
  </div>

</div>
</div>

<script>
  // ---------- Tabs ----------
  const tabBtns = document.querySelectorAll('.tab-btn');
  const panels = { blog: document.getElementById('panel-blog'), press: document.getElementById('panel-press') };
  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      tabBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      Object.values(panels).forEach(p => p.classList.remove('active'));
      panels[btn.dataset.tab].classList.add('active');
    });
  });

  // ---------- Slug preview ----------
  const titleInput = document.getElementById('blog-title');
  const slugOut = document.getElementById('slug-out');
  function refreshSlug(){
    const slug = titleInput.value
      .toLowerCase().trim()
      .replace(/[^a-z0-9\s-]/g, '')
      .replace(/\s+/g, '-')
      .replace(/-+/g, '-');
    slugOut.textContent = slug || 'your-post-title';
  }
  titleInput.addEventListener('input', refreshSlug);
  refreshSlug();

  // ---------- Char counters ----------
  function bindCounter(inputId, counterId, max){
    const el = document.getElementById(inputId);
    const counter = document.getElementById(counterId);
    function update(){
      const len = el.value.length;
      counter.textContent = `${len} / ${max}`;
      counter.classList.toggle('warn', len > max * 0.92);
    }
    el.addEventListener('input', update);
    update();
  }
  bindCounter('blog-subtitle', 'subtitle-count', 180);

  // ---------- Rich text toolbar ----------

  // ---------- Rich text toolbar ----------
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

  document.addEventListener('selectionchange', () => {
    if(document.activeElement !== editor) return;
    const boldBtn = document.querySelector('.tb-btn[data-cmd="bold"]');
    const italicBtn = document.querySelector('.tb-btn[data-cmd="italic"]');
    boldBtn.classList.toggle('active', document.queryCommandState('bold'));
    italicBtn.classList.toggle('active', document.queryCommandState('italic'));
  });

  // IMPORTANT: contenteditable divs are not form fields, so their content
  // never gets submitted on its own. Right before the blog form posts,
  // copy the editor's current HTML into the hidden "description" input.
  document.getElementById('blogForm').addEventListener('submit', () => {
    document.getElementById('blog-description-hidden').value = editor.innerHTML.trim();
  });

  // ---------- Dropzones: wire the visible box to the real file input ----------
  function bindDropzone(zoneId, inputId){
    const zone = document.getElementById(zoneId);
    const input = document.getElementById(inputId);
    input.addEventListener('change', () => {
      if(input.files[0]){
        zone.querySelector('.dz-title').textContent = input.files[0].name;
        zone.querySelector('.dz-sub').textContent = 'Selected · click to change';
      }
    });
  }
  bindDropzone('blog-dropzone', 'blog-img-input');
  bindDropzone('press-dropzone', 'press-image-input');

  // ---------- "Unsaved changes" hint (visual only) ----------
  function bindUnsavedHint(formId, textId){
    const form = document.getElementById(formId);
    const text = document.getElementById(textId);
    form.addEventListener('input', () => { text.textContent = 'Unsaved changes'; });
  }
  bindUnsavedHint('blogForm', 'autosaveText');
  bindUnsavedHint('pressForm', 'autosaveTextPress');
</script>

@endsection