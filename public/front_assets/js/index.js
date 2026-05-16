document.addEventListener('DOMContentLoaded', function() {
    // Select all cards
    const cards = document.querySelectorAll('.card');
    
    cards.forEach(card => {
      card.addEventListener('click', function(e) {
        // Prevent toggling if the click is on the button itself
        if (e.target.classList.contains('card__btn')) return;
        
        // Remove 'active' class from all cards
        cards.forEach(c => c.classList.remove('active'));
        // Add 'active' class to clicked card
        this.classList.add('active');
      });
    });
  });

   // ========================
// HERO SLIDER - SINGLE CLEAN FUNCTION
// ========================
(function() {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.getElementById('prevSlide');
    const nextBtn = document.getElementById('nextSlide');
    let currentSlide = 0;
    let slideInterval;
    const intervalTime = 2000;

    if (slides.length === 0) return;

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        slides[index].classList.add('active');
        dots[index].classList.add('active');
        currentSlide = index;
    }

    function nextSlide() {
        showSlide((currentSlide + 1) % slides.length);
    }

    function prevSlide() {
        showSlide((currentSlide - 1 + slides.length) % slides.length);
    }

    function startSlideshow() {
        if (slideInterval) clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, intervalTime);
    }

    function stopSlideshow() {
        if (slideInterval) clearInterval(slideInterval);
        slideInterval = null;
    }

    if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); stopSlideshow(); startSlideshow(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); stopSlideshow(); startSlideshow(); });
    
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => { showSlide(index); stopSlideshow(); startSlideshow(); });
    });

    const heroSection = document.querySelector('.hero');
    if (heroSection) {
        heroSection.addEventListener('mouseenter', stopSlideshow);
        heroSection.addEventListener('mouseleave', startSlideshow);
    }

    startSlideshow();
})();
