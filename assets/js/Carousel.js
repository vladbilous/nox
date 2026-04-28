document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".starwind-carousel").forEach(carousel => {
    if (carousel.dataset.autoInit === "false") return;
    const container = carousel.querySelector('[data-slot="carousel-container"]');
    const prevBtn = carousel.querySelector('.starwind-carousel-previous, [data-slot="carousel-previous"]');
    const nextBtn = carousel.querySelector('.starwind-carousel-next, [data-slot="carousel-next"]');
    if (!container) return;
    
    container.style.overflowX = 'auto';
    container.style.scrollBehavior = 'smooth';
    container.style.scrollSnapType = 'x mandatory';
    container.style.scrollbarWidth = 'none';

    // Hide scrollbar
    if (!document.getElementById('hide-carousel-scrollbar')) {
        const style = document.createElement('style');
        style.id = 'hide-carousel-scrollbar';
        style.textContent = `[data-slot="carousel-container"]::-webkit-scrollbar { display: none; }`;
        document.head.appendChild(style);
    }

    const slides = container.querySelectorAll('[data-slot="carousel-item"]');
    slides.forEach(slide => slide.style.scrollSnapAlign = 'start');

    // Drag to scroll logic
    let isDown = false;
    let startX;
    let scrollLeft;

    container.addEventListener('mousedown', (e) => {
        isDown = true;
        container.style.scrollBehavior = 'auto';
        container.style.scrollSnapType = 'none';
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
        container.style.cursor = 'grabbing';
    });
    
    container.addEventListener('mouseleave', () => {
        isDown = false;
        container.style.scrollBehavior = 'smooth';
        container.style.scrollSnapType = 'x mandatory';
        container.style.cursor = '';
    });
    
    container.addEventListener('mouseup', () => {
        isDown = false;
        container.style.scrollBehavior = 'smooth';
        container.style.scrollSnapType = 'x mandatory';
        container.style.cursor = '';
    });
    
    container.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 1.5;
        container.scrollLeft = scrollLeft - walk;
    });

    if (prevBtn) {
      prevBtn.addEventListener('click', (e) => {
        e.preventDefault();
        container.scrollBy({ left: -container.clientWidth, behavior: 'smooth' });
      });
    }
    if (nextBtn) {
      nextBtn.addEventListener('click', (e) => {
        e.preventDefault();
        container.scrollBy({ left: container.clientWidth, behavior: 'smooth' });
      });
    }
  });
});
