/* WCS – Water Conservation Services | main.js */

/* ======================================================
   NAV: Scroll-aware sticky header
   ====================================================== */
(function () {
  const nav = document.getElementById('nav');
  if (!nav) return;

  let ticking = false;
  window.addEventListener('scroll', () => {
    if (!ticking) {
      requestAnimationFrame(() => {
        if (window.scrollY > 60) {
          nav.classList.add('scrolled');
        } else {
          nav.classList.remove('scrolled');
        }
        ticking = false;
      });
      ticking = true;
    }
  }, { passive: true });
})();

/* ======================================================
   NAV: Active section highlighting
   ====================================================== */
(function () {
  const sections = document.querySelectorAll('section[id], div[id="hero"]');
  const navLinks = document.querySelectorAll('.nav__links a');

  if (!sections.length || !navLinks.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const id = entry.target.id;
        navLinks.forEach(link => {
          link.classList.remove('active');
          if (link.getAttribute('href') === `#${id}`) {
            link.classList.add('active');
          }
        });
      }
    });
  }, { rootMargin: '-50% 0px -50% 0px' });

  sections.forEach(s => observer.observe(s));
})();

/* ======================================================
   NAV: Mobile hamburger
   ====================================================== */
(function () {
  const btn = document.getElementById('hamburger');
  const mobileNav = document.getElementById('mobileNav');
  if (!btn || !mobileNav) return;

  let isOpen = false;

  btn.addEventListener('click', () => {
    isOpen = !isOpen;
    btn.setAttribute('aria-expanded', isOpen);
    mobileNav.classList.toggle('open', isOpen);

    // Animate hamburger lines
    const spans = btn.querySelectorAll('span');
    if (isOpen) {
      spans[0].style.transform = 'translateY(6.5px) rotate(45deg)';
      spans[1].style.opacity = '0';
      spans[2].style.transform = 'translateY(-6.5px) rotate(-45deg)';
    } else {
      spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
    }
  });

  // Close on link click
  mobileNav.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      isOpen = false;
      btn.setAttribute('aria-expanded', false);
      mobileNav.classList.remove('open');
      const spans = btn.querySelectorAll('span');
      spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
    });
  });
})();

/* ======================================================
   SCROLL REVEAL
   ====================================================== */
(function () {
  const els = document.querySelectorAll('.reveal');
  if (!els.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  els.forEach(el => observer.observe(el));
})();

/* ======================================================
   CONTACT FORM: Client-side handling
   ====================================================== */
(function () {
  const form = document.getElementById('contactForm');
  const success = document.getElementById('formSuccess');
  if (!form) return;

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const btn = form.querySelector('[type="submit"]');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="animation:spin 1s linear infinite"><path d="M21 12a9 9 0 1 1-9-9"/></svg> Sending…';
    btn.disabled = true;

    // Simulate submission (replace with actual endpoint)
    setTimeout(() => {
      form.style.display = 'none';
      if (success) success.classList.add('visible');
    }, 1200);
  });
})();

/* ======================================================
   SMOOTH ANCHOR SCROLLING
   ====================================================== */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

/* Keyframe for spinner */
const style = document.createElement('style');
style.textContent = '@keyframes spin { to { transform: rotate(360deg); } }';
document.head.appendChild(style);
