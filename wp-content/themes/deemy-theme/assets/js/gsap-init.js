// Basic GSAP init example
// This runs after DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  if (!window.gsap) {
    console.warn('GSAP not available');
    return;
  }

  // Register ScrollTrigger if available
  if (window.ScrollTrigger) {
    gsap.registerPlugin(ScrollTrigger);
  }

  // Simple fade-in for the body
  gsap.from(document.body, { opacity: 0, duration: 0.3, ease: 'power1.out' });

  // Example: animate elements with data-gsap-fade selector
  const els = document.querySelectorAll('[data-gsap-fade]');
  if (els.length) {
    gsap.from(els, { opacity: 0, y: 12, duration: 0.5, stagger: 0.1, ease: 'power2.out' });
  }

  // Fullpage-ähnliches Verhalten: kein freies Scrollen, nur Abschnittswechsel bei Schwellenwert
  if (window.ScrollTrigger && window.ScrollToPlugin && window.Observer) {
    gsap.registerPlugin(ScrollToPlugin, Observer);

    const sections = gsap.utils.toArray('.snap-section');
    if (sections.length) {
      const clampIndex = gsap.utils.clamp(0, sections.length - 1);
      let index = 0;
      let animating = false;

      // Hilfsfunktionen
      const getIndexByScroll = () => {
        const y = window.scrollY;
        let nearestIdx = 0;
        let minDist = Number.POSITIVE_INFINITY;
        sections.forEach((sec, i) => {
          const top = sec.getBoundingClientRect().top + window.scrollY;
          const d = Math.abs(top - y);
          if (d < minDist) { minDist = d; nearestIdx = i; }
        });
        return nearestIdx;
      };

      const goTo = (i) => {
        i = clampIndex(i);
        if (i === index || animating) return;
        animating = true;
        index = i;
        // Scrollverhalten der Seite neutralisieren
        document.documentElement.style.scrollBehavior = 'auto';
        gsap.to(window, {
          duration: 0.6,
          ease: 'power2.out',
          scrollTo: { y: sections[index], autoKill: false },
          onComplete: () => { animating = false; }
        });
      };

      // Initial auf den nächsten/naheliegenden Abschnitt ausrichten
      index = getIndexByScroll();

      // Input über Observer abfangen und Standard-Scrollen unterbinden
      Observer.create({
        type: 'wheel,touch,pointer',
        tolerance: 100,         // wie “intensiv” die Geste sein muss
        preventDefault: true,  // verhindert Default-Scrollen
        wheelSpeed: 1,
        onUp: () => !animating && goTo(index - 1),
        onDown: () => !animating && goTo(index + 1),
        onRight: () => {},
        onLeft: () => {},
        allowClicks: true
      });

      // Tastatur: Pfeile / PageUp/Down / Space
      window.addEventListener('keydown', (e) => {
        if (animating) { e.preventDefault(); return; }
        if (['ArrowDown', 'PageDown', 'Space'].includes(e.code)) { e.preventDefault(); goTo(index + 1); }
        if (['ArrowUp', 'PageUp'].includes(e.code)) { e.preventDefault(); goTo(index - 1); }
        if (e.code === 'Home') { e.preventDefault(); goTo(0); }
        if (e.code === 'End') { e.preventDefault(); goTo(sections.length - 1); }
      }, { passive: false });

      // Bei Größenänderung neu berechnen
      const recalc = () => { index = getIndexByScroll(); ScrollTrigger.refresh(); };
      window.addEventListener('resize', recalc);
      window.addEventListener('load', recalc);

      // Optional: iOS/Touch bounce verhindern
      document.documentElement.style.overscrollBehaviorY = 'none';
    }
  }
});
