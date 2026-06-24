
  /* ── Scroll Progress + Back to Top ── */
  const progressBar = document.getElementById('scroll-progress');
  const backTop     = document.getElementById('back-top');
  window.addEventListener('scroll', () => {
    const pct = window.scrollY / (document.documentElement.scrollHeight - window.innerHeight) * 100;
    progressBar.style.width = pct + '%';
    backTop.classList.toggle('visible', window.scrollY > 400);
  }, { passive: true });
  backTop.addEventListener('click', () => window.scrollTo({ top:0, behavior:'smooth' }));

  /* ── Theme Toggle ── */
  const htmlEl    = document.documentElement;
  const themeBtn  = document.getElementById('theme-toggle');
  const saved     = localStorage.getItem('theme') || 'light';
  htmlEl.setAttribute('data-theme', saved);
  themeBtn.addEventListener('click', () => {
    const next = htmlEl.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
    htmlEl.setAttribute('data-theme', next);
    localStorage.setItem('theme', next);
  });

  /* ── Mobile Nav ── */
  const navToggle = document.getElementById('nav-toggle');
  const navLinks  = document.getElementById('nav-links');
  navToggle.addEventListener('click', () => {
    const open = navToggle.classList.toggle('open');
    navLinks.classList.toggle('open', open);
    navToggle.setAttribute('aria-expanded', open);
  });
  navLinks.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
    navToggle.classList.remove('open');
    navLinks.classList.remove('open');
    navToggle.setAttribute('aria-expanded','false');
  }));

  /* ── Active Nav Highlight ── */
  const navAs = document.querySelectorAll('.nav-links a');
  new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting)
        navAs.forEach(a => a.classList.toggle('active', a.getAttribute('href') === '#' + e.target.id));
    });
  }, { rootMargin:'-40% 0px -40% 0px' }).observeAll = function(els){ els.forEach(el=>this.observe(el)); };
  const sIO = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting)
        navAs.forEach(a => a.classList.toggle('active', a.getAttribute('href') === '#' + e.target.id));
    });
  }, { rootMargin:'-40% 0px -40% 0px' });
  document.querySelectorAll('section[id]').forEach(s => sIO.observe(s));

  /* ── Scroll Reveal ── */
  const revIO = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        const delay = parseInt(e.target.getAttribute('data-delay')) || 80;
        setTimeout(() => e.target.classList.add('in-view'), delay);
        revIO.unobserve(e.target);
      }
    });
  }, { rootMargin:'0px 0px -60px 0px', threshold:.08 });
  document.querySelectorAll('.reveal, .reveal-left').forEach(el => revIO.observe(el));

  /* ── Pos-grid staggered entry ── */
  const posGrid = document.getElementById('pos-grid');
  if (posGrid) {
    const cards = posGrid.querySelectorAll('.pos-card');
    cards.forEach(c => { c.style.opacity='0'; c.style.transform='translateY(28px)'; c.style.transition='opacity .55s,transform .55s cubic-bezier(.23,1,.32,1)'; });
    new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          cards.forEach((c,i) => setTimeout(()=>{ c.style.opacity='1'; c.style.transform='translateY(0)'; }, i*75));
        }
      });
    }, { threshold:.08 }).observe(posGrid);
  }

  /* ── Counter Animation ── */
  const counters = document.querySelectorAll('.stat-number[data-count]');
  const cntIO = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (!e.isIntersecting) return;
      const el     = e.target;
      const target = parseInt(el.dataset.count, 10);
      const dur    = target > 100 ? 1800 : 1200;
      const step   = dur / 60;
      let cur = 0;
      const inc = target / (dur / 16);
      const tick = () => {
        cur = Math.min(cur + inc, target);
        el.textContent = target > 100 ? Math.round(cur) : (cur < target ? Math.floor(cur) : target);
        if (cur < target) requestAnimationFrame(tick);
        else el.textContent = target;
      };
      requestAnimationFrame(tick);
      cntIO.unobserve(el);
    });
  }, { threshold:.5 });
  counters.forEach(c => cntIO.observe(c));
  function toggleTheme() {
      document.body.classList.toggle("dark");
    }

  // New Navbar Scroll Effect

  const blogSlideOverlay = document.getElementById('blogSlideOverlay');
  const blogSlidePanel = document.getElementById('blogSlidePanel');
  const blogSlideClose = document.getElementById('blogSlideClose');
  const blogSlideImage = document.getElementById('blogSlideImage');
  const blogSlideTitleText = document.getElementById('blogSlideTitleText');
  const blogSlideSubtitleText = document.getElementById('blogSlideSubtitleText');
  const blogSlideDescriptionText = document.getElementById('blogSlideDescriptionText');
  const blogSlidePublicationText = document.getElementById('blogSlidePublicationText');
  const blogSlideSourceText = document.getElementById('blogSlideSourceText');
  const blogSlideSourceLink = document.getElementById('blogSlideSourceLink');
  const blogSlideDate = document.getElementById('blogSlideDate');

  function closeBlogSlide() {
    if (!blogSlidePanel) return;
    blogSlidePanel.classList.remove('open');
    blogSlideOverlay.classList.remove('visible');
    blogSlidePanel.setAttribute('aria-hidden', 'true');
  }

  function openBlogSlide(details) {
    if (!blogSlidePanel) return;
    blogSlideTitleText.textContent = details.title || 'Untitled';
    blogSlideSubtitleText.textContent = details.subtitle || 'No subtitle.';
    const descriptionHtml = details.description || '<p>No description available.</p>';
    blogSlideDescriptionText.innerHTML = descriptionHtml;
    blogSlideDate.textContent = details.publicationDate || 'Unknown';

    if (details.image) {
      blogSlideImage.src = details.image;
      blogSlideImage.style.display = 'block';
      blogSlideImage.alt = details.title || 'Blog image';
    } else {
      blogSlideImage.style.display = 'none';
    }

    blogSlidePublicationText.textContent = details.publicationName || 'Not specified';
    if (details.articleUrl) {
      blogSlideSourceText.innerHTML = '<a href="' + details.articleUrl + '" target="_blank" rel="noopener noreferrer">View original source</a>';
      blogSlideSourceLink.href = details.articleUrl;
      blogSlideSourceLink.style.display = 'inline-flex';
    } else {
      blogSlideSourceText.textContent = 'No source URL provided';
      blogSlideSourceLink.style.display = 'none';
    }

    blogSlidePanel.classList.add('open');
    blogSlideOverlay.classList.add('visible');
    blogSlidePanel.setAttribute('aria-hidden', 'false');
  }

  document.querySelectorAll('.blog-read-btn').forEach(button => {
    button.addEventListener('click', () => {
      let descriptionHtml = '';
      const descriptionId = button.dataset.descriptionId;
      if (descriptionId) {
        const descElement = document.getElementById(descriptionId);
        descriptionHtml = descElement ? descElement.innerHTML : '';
      }

      openBlogSlide({
        title: button.dataset.title,
        subtitle: button.dataset.subtitle,
        description: descriptionHtml,
        image: button.dataset.image,
        publicationName: button.dataset.publicationName,
        publicationDate: button.dataset.publicationDate,
        articleUrl: button.dataset.articleUrl,
      });
    });
  });

  const blogTabs = document.querySelectorAll('.blog-tab');
  const blogSections = document.querySelectorAll('.blog-section');

  blogTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      blogTabs.forEach(btn => btn.classList.remove('active'));
      blogSections.forEach(section => section.classList.remove('active'));

      tab.classList.add('active');
      const target = document.getElementById(tab.dataset.tab + 'Section');
      if (target) {
        target.classList.add('active');
      }
    });
  });

  if (blogSlideClose) {
    blogSlideClose.addEventListener('click', closeBlogSlide);
  }

  if (blogSlideOverlay) {
    blogSlideOverlay.addEventListener('click', closeBlogSlide);
  }

  document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && blogSlidePanel && blogSlidePanel.classList.contains('open')) {
      closeBlogSlide();
    }
  });


