

@extends('layout.master')

@section('content')


<!-- HERO SECTION -->
<section class="hero" id="hero" aria-label="Introduction">

  <!-- Background Effects -->
  <div class="hero-bg-orb orb-1"></div>
  <div class="hero-bg-orb orb-2"></div>
  <div class="hero-bg-orb orb-3"></div>
  <div class="hero-grid-lines"></div>

  <div class="hero-inner">

    <!-- Profile Image -->
    <div class="hero-photo-wrap">

      <div class="hero-photo-ring"></div>

      <img src="{{ isset($profileImage) ? asset('profile-images/' . $profileImage) : asset('img/profile.jpg') }}" alt="{{ $profileName ?? 'Md. Sadikuzzaman' }}" class="hero-photo">

    </div>

    <!-- Content -->
    <div class="hero-content">

      <div class="hero-eyebrow">
        {{ $heroTagline ?? 'Educator • Academic Leader • PhD Researcher' }}
      </div>

      <h1 class="hero-name">
        {{ $profileName ?? 'Md. Sadikuzzaman' }}
      </h1>

      <p class="hero-title">
        {{ $heroTitle ?? 'Principal,  PhD Candidate, Educationalist' }}
      </p>

      <p class="hero-desc">
        {{ $heroDescription ?? 'Principal of Daulatpur College, Bangladesh, with 23 years of distinguished service in education. Currently pursuing a Doctor of Philosophy in Education at GenoVasi University College, Malaysia, advancing knowledge in Design Thinking and Educational Leadership.' }}

      </p>

      <div class="badge-row">
        <span class="badge">PhD Candidate,  Malaysia</span>
        <span class="badge">Principal , Daulatpur College</span>
        <span class="badge">Senate Member , National University BD</span>
      </div>

      @if($linkedin || $facebook || $twitter || $instagram || $wikipedia)
      <div class="social-links" style="margin-top:16px; display:flex; gap:12px; flex-wrap:wrap;">
        @if($linkedin)
          <a href="{{ $linkedin }}" target="_blank" rel="noopener noreferrer" class="badge bg-secondary text-white">LinkedIn</a>
        @endif
        @if($facebook)
          <a href="{{ $facebook }}" target="_blank" rel="noopener noreferrer" class="badge bg-secondary text-white">Facebook</a>
        @endif
        @if($twitter)
          <a href="{{ $twitter }}" target="_blank" rel="noopener noreferrer" class="badge bg-secondary text-white">Twitter</a>
        @endif
        @if($instagram)
          <a href="{{ $instagram }}" target="_blank" rel="noopener noreferrer" class="badge bg-secondary text-white">Instagram</a>
        @endif
        @if($wikipedia)
          <a href="{{ $wikipedia }}" target="_blank" rel="noopener noreferrer" class="badge bg-secondary text-white">Wikipedia</a>
        @endif
      </div>
      @endif

    </div>

  </div>

  <div class="hero-scroll">
    <div class="hero-scroll-line"></div>
    Scroll
  </div>

</section>

<!-- New End -->

<div class="accent-bar" aria-hidden="true"></div>

<div class="container">

  <!-- STAT STRIP -->
  <div class="stat-strip reveal" id="about">
    <div class="stat-item">
      <span class="stat-number" data-count="23">0</span>
      <span class="stat-label">Years of Service</span>
    </div>
    <div class="stat-item">
      <span class="stat-number" data-count="8">0</span>
      <span class="stat-label">Institutions Led</span>
    </div>
    <div class="stat-item">
      <span class="stat-number" data-count="1">0</span>
      <span class="stat-label">Publication</span>
    </div>
    <div class="stat-item">
      <span class="stat-number" data-count="2024">0</span>
      <span class="stat-label">PhD Enrolled</span>
    </div>
  </div>

  <!-- ABOUT -->
<div class="about-card reveal" style="transition-delay:.12s">
  <h4>Personal Information</h4>

  <div class="info-row">
    <span class="info-label">Father:</span>
    Md. Mafiuzzaman Khan (Freedom Fighter), Former Assistant Engineer, BADC (Retired)
  </div>

  <div class="info-row">
    <span class="info-label">Mother:</span>
    Mst. Shukrun Nesa (Housewife)
  </div>

  <div class="info-row">
    <span class="info-label">Born:</span>
    November 27, 1977, Kushtia, Bangladesh
  </div>

  <div class="info-row">
    <span class="info-label">Nationality:</span>
    Bangladeshi by Birth
  </div>

  <div class="info-row">
    <span class="info-label">Religion:</span>
    Islam
  </div>

  <div class="info-row">
    <span class="info-label">Holy Pilgrimage:</span>
    Performed Holy Hajj in 2016
  </div>

  <div class="info-row">
    <span class="info-label">Height:</span>
    5' 6"
  </div>

  <div class="info-row">
    <span class="info-label">Permanent Address:</span>
    Village: Daulatpur, Post: Rifayetpur, Upazila: Daulatpur, District: Kushtia
  </div>

  <div class="info-row">
    <span class="info-label">Present Address:</span>
    Village: Daulatpur, Post: Rifayetpur, Upazila: Daulatpur, District: Kushtia
  </div>

  <div class="info-row">
    <span class="info-label">Marital Status:</span>
    Married
  </div>

  <div class="info-row">
    <span class="info-label">Late Wife:</span>
    Wahida Selina (Assistant Headmaster, Daulatpur Govt. Pilot Model Secondary School)
    <br>
    Date of Birth: September 27, 1980 |
    Date of Demise: May 25, 2018
  </div>

  <div class="info-row">
    <span class="info-label">Present Spouse:</span>
    Mst. Asmaul Husna Smrete
    <br>
    Date of Birth: April 21, 1997 |
    Education: M.A (Bangla)
  </div>

  <div class="info-row">
    <span class="info-label">Children:</span>
    Sneha Khan (HSC Candidate, Holy Cross College, Dhaka)
    <br>
    Siza Khan (Class 10, Dhaka Cantonment Girls' Public School & College)
  </div>

  <div class="info-row">
    <span class="info-label">Service:</span>
    23 Years
  </div>
  <div class="about-card reveal" style="transition-delay:.18s">
    <h4>Family Details</h4>
  
    <div class="info-row">
      <span class="info-label">Elder Sister:</span>
      Mst. Zakia Khanom
    </div>
  
    <div class="info-row">
      <span class="info-label">Education:</span>
      B.A. (Honors), M.A. in Islamic History,
      Islamic University, Kushtia
    </div>
  
    <div class="info-row">
      <span class="info-label">Occupation:</span>
      Housewife
    </div>
  
    <hr>
  
    <div class="info-row">
      <span class="info-label">Brother-in-Law:</span>
      Md. Azom Ali
    </div>
  
    <div class="info-row">
      <span class="info-label">Education:</span>
      B.Sc. Engineer (Civil)
    </div>
  
    <div class="info-row">
      <span class="info-label">Profession:</span>
      Chief Engineer, Rangpur City Corporation
    </div>
  
    <hr>
  
    <div class="info-row">
      <span class="info-label">Younger Brother:</span>
      Md. Rakibuzzaman
    </div>
  
    <div class="info-row">
      <span class="info-label">Education:</span>
      B.Sc. (Honors), M.Sc. in Fisheries,
      University of Dhaka
    </div>
  
    <div class="info-row">
      <span class="info-label">Profession:</span>
      Deputy Director,
      Department of Narcotics Control, Dinajpur
    </div>
  </div>
</div>

</div>

<!-- PHD HIGHLIGHT -->
<div class="container">
  <div class="phd-highlight reveal">
    <div class="phd-icon-wrap" aria-hidden="true">&#127891;</div>
    <div class="phd-content">
      <span class="phd-badge">Currently Enrolled &ndash; 2024/2025</span>
      <h3>Doctor of Philosophy in Education, GenoVasi University College, Malaysia</h3>
      <p>School of Design Thinking Graduate School &bull; Mode: Conventional (Thesis-Based) &bull; Duration: 3&ndash;5 Years &bull; Advancing research in educational leadership, design thinking, and institutional innovation in South and Southeast Asian contexts.</p>
    </div>
  </div>
</div>

<div class="container">

  <!-- CAREER TIMELINE -->
  <section class="section" id="career" aria-labelledby="career-title">
    <div class="section-header reveal">
      <span class="section-eyebrow">Professional Journey</span>
      <h2 class="section-title" id="career-title">Career Timeline</h2>
    </div>
    <div class="timeline-v2">
      <div class="tl-row reveal">
        <div class="tl-left"><span class="yr">2017 &ndash; Present</span></div>
        <div class="tl-center"><div class="tl-dot2 a"></div><div class="tl-line"></div></div>
        <div class="tl-card">
          <div class="role">Principal</div>
          <div class="place">Daulatpur College, Daulatpur, Kushtia . Appointed 29 November 2017. Joined: 03 December 2017</div>
        </div>
      </div>
      <div class="tl-row reveal" style="transition-delay:.1s">
        <div class="tl-left"><span class="yr">1996 &ndash; Present</span></div>
        <div class="tl-center"><div class="tl-dot2 a"></div><div class="tl-line"></div></div>
        <div class="tl-card">
          <div class="role">Director</div>
          <div class="place">Shukuron Nesa Academy, Daulatpur, Kushtia</div>
        </div>
      </div>
      <div class="tl-row reveal" style="transition-delay:.2s">
        <div class="tl-left"><span class="yr">2016 &ndash; 2017</span></div>
        <div class="tl-center"><div class="tl-dot2"></div><div class="tl-line"></div></div>
        <div class="tl-card">
          <div class="role">Acting Principal</div>
          <div class="place">Daulatpur College , Appointed 1 December 2016 . Joined: 03 December 2016 </div>
        </div>
      </div>
      <div class="tl-row reveal" style="transition-delay:.3s">
        <div class="tl-left"><span class="yr">2002 &ndash; 2016</span></div>
        <div class="tl-center"><div class="tl-dot2"></div></div>
        <div class="tl-card">
          <div class="role">Lecturer in History</div>
          <div class="place">Daulatpur College , Appointed 20 November 2002 . Joined: 21 November 2002</div>
        </div> 
      </div>
    </div>
  </section>

  <!-- LATEST NEWS -->
  @if(isset($blogs) && count($blogs) > 0)
  <section class="section" id="latest-news" aria-labelledby="latest-news-title">
    <div class="section-header reveal">
      <span class="section-eyebrow">Newsroom</span>
      <h2 class="section-title" id="latest-news-title">Latest News</h2>
    </div>
    <div class="blog-grid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:20px; margin-top:16px;">
      @php
        $homeBlogs = $blogs instanceof \Illuminate\Contracts\Pagination\Paginator ? collect($blogs->items()) : collect($blogs);
        $homeRecent = $homeBlogs->take(4);
      @endphp
      @foreach($homeRecent as $blog)
        <div class="blog-card" style="border-radius:14px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.06); background:#fff;">
          @if(!empty($blog->image_url))
            <img src="{{ $blog->image_url }}" alt="{{ $blog->{'blog-title'} }}" style="width:100%; height:180px; object-fit:cover; display:block;">
          @else
            <div style="width:100%; height:180px; background:#f4f0e8; display:flex; align-items:center; justify-content:center; color:#9a8a70;">No image</div>
          @endif
          <div style="padding:16px; display:flex; flex-direction:column; gap:10px;">
            <div style="display:flex; gap:8px; align-items:center; flex-wrap:wrap;">
              <span style="background:#fff4dd; color:#8d6527; padding:6px 10px; border-radius:999px; font-weight:700; border:1px solid rgba(201,163,90,0.25); font-size:12px;">
                @if($blog->publication_date)
                  {{ \Carbon\Carbon::parse($blog->publication_date)->format('d M, Y') }}
                @else
                  {{ $blog->created_at->format('d M, Y') }}
                @endif
              </span>
              @if($blog->publication_name)
                <span style="background:#fff4dd; color:#8d6527; padding:6px 10px; border-radius:999px; font-weight:700; border:1px solid rgba(201,163,90,0.25); font-size:12px;">{{ $blog->publication_name }}</span>
              @endif
            </div>
            <h3 style="margin:0; font-size:1.05rem; color:#111;">{{ \Illuminate\Support\Str::limit($blog->{'blog-title'}, 80) }}</h3>
            <p style="margin:0; color:#555; line-height:1.6;">{{ \Illuminate\Support\Str::limit($blog->subtitle ?? $blog->description ?? '', 120) }}</p>
            <div style="margin-top:auto; display:flex; gap:8px; align-items:center;">
              <a href="{{ $blog->article_url ?? url('/blog') }}" target="_blank" rel="noopener noreferrer" style="background:#c9a35a; color:#fff; padding:10px 14px; border-radius:999px; text-decoration:none; font-weight:700;">View Source</a>
              <a href="{{ url('/blog') }}" class="btn btn-outline-secondary" style="padding:8px 12px; border-radius:999px;">More</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
  @endif

  <!-- LEADERSHIP -->
  <section class="section" id="leadership" aria-labelledby="leadership-title">
    <div class="section-header reveal">
      <span class="section-eyebrow">Governance &amp; Leadership</span>
      <h2 class="section-title" id="leadership-title">Chairmanship &amp; Board Positions</h2>
    </div>
    <div class="pos-grid" id="pos-grid">
      <div class="pos-card"><h4>Daulatpur Pilot Model Secondary School</h4><p>Chairman : 2009&ndash;2016</p></div>
      <div class="pos-card"><h4>Rifayetpur Secondary School</h4><p>Chairman : 2014&ndash;2015</p></div>
      <div class="pos-card"><h4>Goalgram College</h4><p>Chairman : 2014&ndash;2016 &amp; Jan 2024&ndash;Sep 2024</p></div>
      <div class="pos-card"><h4>Pragpur College</h4><p>Chairman : 2014&ndash;September 2024</p></div>
      <div class="pos-card"><h4>Daulatpur Dakhil Madrasa</h4><p>Chairman : 2014&ndash;2016</p></div>
      <div class="pos-card"><h4>Khalishakundi Degree College</h4><p>Chairman : 2021&ndash;September 2024</p></div>
      <div class="pos-card"><h4>National University, Bangladesh</h4><p>Senate Member : 2018&ndash;2020 &amp; 2024&ndash;Sep 2024</p></div>
      <div class="pos-card"><h4>Daulatpur Central Graveyard Committee</h4><p>President : 2020&ndash;2024</p></div>
    </div>
  </section>

  <!-- EDUCATION -->
  <section class="section" id="education" aria-labelledby="education-title">
    <div class="section-header reveal">
      <span class="section-eyebrow">Academic Qualifications</span>
      <h2 class="section-title" id="education-title">Education</h2>
    </div>
    <div class="edu-list">
      <div class="edu-item reveal">
        <div class="edu-year-box">2024<br>&ndash;<br>Now</div>
        <div class="edu-body">
          <span class="phd-badge">PhD &ndash; In Progress</span>
          <h4>Doctor of Philosophy in Education</h4>
          <p>GenoVasi University College, Malaysia &bull; Design Thinking Graduate School &bull; Research (Thesis) Mode</p>
        </div>
      </div>
      <div class="edu-item reveal" style="transition-delay:.1s">
        <div class="edu-year-box">2000</div>
        <div class="edu-body">
          <h4>Master of Arts in History</h4>
          <p>University of Rajshahi, Bangladesh &bull; 2nd Class</p>
        </div>
      </div>
      <div class="edu-item reveal" style="transition-delay:.2s">
        <div class="edu-year-box">1999</div>
        <div class="edu-body">
          <h4>Bachelor of Arts (Honours) in History</h4>
          <p>University of Rajshahi, Bangladesh &bull; 2nd Class</p>
        </div>
      </div>
      <div class="edu-item reveal" style="transition-delay:.3s">
        <div class="edu-year-box">1995</div>
        <div class="edu-body">
          <h4>Higher Secondary School Certificate</h4>
          <p>Jessore Board, Bangladesh &bull; 2nd Division</p>
        </div>
      </div>
      <div class="edu-item reveal" style="transition-delay:.4s">
        <div class="edu-year-box">1993</div>
        <div class="edu-body">
          <h4>Secondary School Certificate</h4>
          <p>Jessore Board, Bangladesh &bull; 1st Division</p>
        </div>
      </div>
    </div>
  </section>

  <!-- PUBLICATION -->
  <section class="section" id="publication" aria-labelledby="publication-title">
    <div class="section-header reveal">
      <span class="section-eyebrow">Research &amp; Publication</span>
      <h2 class="section-title" id="publication-title">Published Work</h2>
    </div>
    <div class="pub-card reveal">
      <div class="pub-icon" aria-hidden="true">&#128218;</div>
      <div class="pub-body">
        <h4>Encyclopedia of the Liberation War of Bangladesh (2018)</h4>
        <p>Published by the Asiatic Society of Bangladesh. Contributed comprehensive documentation on the Liberation War history of Daulatpur, providing rare archival information on the region&apos;s role in the 1971 War of Independence.</p>
      </div>
    </div>
  </section>

  <!-- GALLERY -->
  @if(isset($galleryItems) && $galleryItems->isNotEmpty())
  <section class="section" id="gallery" aria-labelledby="gallery-title">
    <div class="section-header reveal">
      <span class="section-eyebrow">Gallery</span>
      <h2 class="section-title" id="gallery-title">Photo Gallery</h2>
    </div>
    <div class="gallery reveal">
      @foreach($galleryItems as $item)
      <div class="gallery-item" style="transition-delay: {{ $loop->index * 0.1 }}s">
        <img src="{{ $item->image_url }}" alt="{{ $item->title }}" loading="lazy">
        <div class="gallery-overlay"><span class="gallery-overlay-text">{{ $item->title }}</span></div>
        <p class="gallery-caption">{{ $item->title }}</p>
      </div>
      @endforeach
    </div>
  </section>
  @endif

</div>

<!-- JOURNALS -->
@if(isset($journals) && $journals->isNotEmpty())
<div class="container">
  <section class="section" id="journal" aria-labelledby="journal-title">
    <div class="section-header reveal">
      <span class="section-eyebrow">Journal</span>
      <h2 class="section-title" id="journal-title">Recent Journals</h2>
    </div>
    <div class="row">
      @foreach($journals as $j)
      <div class="col-md-6 mb-4">
        <div class="card">
          @if($j->image)
            <img src="{{ asset('journal-images/'.$j->image) }}" class="card-img-top" alt="">
          @endif
          <div class="card-body">
            <h5 class="card-title"><a href="{{ url('/journals/'.$j->slug) }}">{{ $j->title }}</a></h5>
            <p class="card-text"><strong>{{ $j->authors }}</strong> — {{ $j->journal_name }}</p>
            <p class="card-text">{{ \Illuminate\Support\Str::limit($j->abstract, 140) }}</p>
            <a href="{{ url('/journals/'.$j->slug) }}" class="btn btn-sm btn-primary">Read</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
</div>
@endif

<!-- QUOTE -->
<div class="quote-section" aria-label="Featured quote">
  <div class="quote-inner reveal"> 
    <span class="quote-marks" aria-hidden="true">&ldquo;</span>
    <blockquote>Education is the most powerful weapon which you can use to change the world &mdash; and every institution I lead is a step toward a brighter Bangladesh.</blockquote>
    <cite>&mdash; Md. Sadikuzzaman, Principal &amp; PhD Researcher</cite>
  </div>
</div>

<div class="container">

  <!-- CONTACT -->
  <section class="section" id="contact" aria-labelledby="contact-title">
    <div class="section-header reveal">
      <span class="section-eyebrow">Get in Touch</span>
      <h2 class="section-title" id="contact-title">Contact Information</h2>
    </div>
    <div class="contact-grid">
      <div class="contact-card reveal">
        <div class="contact-icon-wrap" aria-hidden="true">&#128222;</div>
        <h4>Phone</h4>
        <p>{{ $phone ?? '+60143087663 (Malaysia)' }}</p>
      </div>
      <div class="contact-card reveal" style="transition-delay:.12s">
        <div class="contact-icon-wrap" aria-hidden="true">&#9993;&#65039;</div>
        <h4>Email</h4>
        <p>{{ $contactEmail ?? 'sadikuzzamandpurcollege@gmail.com' }}</p>
      </div>
      <div class="contact-card reveal" style="transition-delay:.24s">
        <div class="contact-icon-wrap" aria-hidden="true">&#128205;</div>
        <h4>Address</h4>
        <p>{{ $address ?? 'Daulatpur, Rifayetpur, Kushtia, Bangladesh' }}</p>
      </div>
      @if($linkedin || $facebook || $twitter || $instagram || $wikipedia)
      <div class="contact-card reveal" style="transition-delay:.36s; width:100%;">
        <div class="contact-icon-wrap" aria-hidden="true">&#128279;</div>
        <h4>Social Links</h4>
        <div style="display:flex; flex-wrap:wrap; gap:10px; margin-top:8px;">
          @if($linkedin)
            <a href="{{ $linkedin }}" target="_blank" rel="noopener noreferrer" class="badge bg-secondary text-white">LinkedIn</a>
          @endif
          @if($facebook)
            <a href="{{ $facebook }}" target="_blank" rel="noopener noreferrer" class="badge bg-secondary text-white">Facebook</a>
          @endif
          @if($twitter)
            <a href="{{ $twitter }}" target="_blank" rel="noopener noreferrer" class="badge bg-secondary text-white">Twitter</a>
          @endif
          @if($instagram)
            <a href="{{ $instagram }}" target="_blank" rel="noopener noreferrer" class="badge bg-secondary text-white">Instagram</a>
          @endif
          @if($wikipedia)
            <a href="{{ $wikipedia }}" target="_blank" rel="noopener noreferrer" class="badge bg-secondary text-white">Wikipedia</a>
          @endif
          @if(!empty($social_medias) && is_array($social_medias))
            @foreach($social_medias as $s)
              @if(!empty($s['url']))
                <a href="{{ $s['url'] }}" target="_blank" rel="noopener noreferrer" class="badge bg-secondary text-white">{{ $s['name'] ?? 'Link' }}</a>
              @endif
            @endforeach
          @endif
        </div>
      </div>
      @endif
    </div>
  </section>

</div>



@endsection