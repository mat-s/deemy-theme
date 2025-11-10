// Basic GSAP init example
// This runs after DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  if (window.gsap) {
    // Simple fade-in for the body
    gsap.from(document.body, { opacity: 0, duration: 0.3, ease: 'power1.out' });

    // Example: animate elements with data-gsap-fade selector
    const els = document.querySelectorAll('[data-gsap-fade]');
    if (els.length) {
      gsap.from(els, { opacity: 0, y: 12, duration: 0.5, stagger: 0.1, ease: 'power2.out' });
    }
  } else {
    // eslint-disable-next-line no-console
    console.warn('GSAP not available');
  }
});

