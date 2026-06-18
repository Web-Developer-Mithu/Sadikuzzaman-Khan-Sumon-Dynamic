
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
        setTimeout(() => e.target.classList.add('visible'), 80);
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

  

