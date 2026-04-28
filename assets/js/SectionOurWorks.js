// The autoplay carousel logic implemented without Embla dependency
document.addEventListener("DOMContentLoaded", () => {
    const autoplayCarousel = document.querySelector("#carousel-autoplay");
    if (!autoplayCarousel) return;
    const container = autoplayCarousel.querySelector('[data-slot="carousel-container"]');
    if (!container) return;
    
    container.style.overflowX = 'auto';
    container.style.scrollBehavior = 'smooth';
    container.style.scrollSnapType = 'x mandatory';
    container.style.scrollbarWidth = 'none';
    
    // Hide scrollbar for this container too
    const hideScrollbarStyle = document.createElement('style');
    hideScrollbarStyle.textContent = `[data-slot="carousel-container"]::-webkit-scrollbar { display: none; }`;
    document.head.appendChild(hideScrollbarStyle);

    const prevBtn = autoplayCarousel.querySelector('[data-slot="carousel-previous"]');
    const nextBtn = autoplayCarousel.querySelector('[data-slot="carousel-next"]');
    let intervalId;
    
    function startAutoplay() {
        intervalId = setInterval(() => {
            if (container.scrollLeft + container.clientWidth >= container.scrollWidth - 10) {
                container.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                container.scrollBy({ left: container.clientWidth, behavior: 'smooth' });
            }
        }, 16000);
    }
    
    function resetAutoplay() {
        clearInterval(intervalId);
        startAutoplay();
    }

    // Wire up the buttons
    if (prevBtn) {
        prevBtn.addEventListener("click", () => {
            container.scrollBy({ left: -container.clientWidth, behavior: 'smooth' });
            resetAutoplay();
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener("click", () => {
            container.scrollBy({ left: container.clientWidth, behavior: 'smooth' });
            resetAutoplay();
        });
    }

    startAutoplay();
});
