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

    (function() {
    const toggleBtn = document.getElementById('chatToggleBtn');
    const popup = document.getElementById('popupContainer');
    const closeBtn = document.getElementById('closePopupBtn');
    const unreadBadge = document.getElementById('unreadBadge');
    const messagesArea = document.getElementById('messagesArea');
    
    // Function to count unread messages
    function updateUnreadCount() {
      const unreadMessages = document.querySelectorAll('.popupcard.unread');
      const count = unreadMessages.length;
      if (count > 0) {
        unreadBadge.textContent = count;
        unreadBadge.style.display = 'flex';
      } else {
        unreadBadge.style.display = 'none';
      }
    }

    // Mark all messages as read and remove unread styling
    function markAllAsRead() {
      const unreadMessages = document.querySelectorAll('.popupcard.unread');
      unreadMessages.forEach(msg => {
        msg.classList.remove('unread');
      });
      updateUnreadCount();
    }

    // Open popup
    function openPopup() {
      popup.classList.add('active');
      // When opened, mark all as read (WhatsApp behavior)
      markAllAsRead();
    }

    function closePopup() {
      popup.classList.remove('active');
    }

    toggleBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      if (popup.classList.contains('active')) {
        closePopup();
      } else {
        openPopup();
      }
    });

    closeBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      closePopup();
    });

    // Close popup when clicking outside
    document.addEventListener('click', function(event) {
      if (!popup.contains(event.target) && !toggleBtn.contains(event.target) && popup.classList.contains('active')) {
        closePopup();
      }
    });

    // Initial unread count (messages 1 and 3 are unread)
    updateUnreadCount();

    // Optional: simulate new incoming message after 10 seconds (just for demo)
    setTimeout(() => {
      // Only add if popup is closed? We'll add regardless but if popup is open, we might not want to increment? 
      // Better: add message and update unread count if popup is not active.
      if (!popup.classList.contains('active')) {
        const newMsg = document.createElement('div');
        newMsg.className = 'popupcard incoming unread';
        newMsg.setAttribute('data-msg-id', Date.now());
        newMsg.innerHTML = `
          <div class="message-sender">
            <span class="avatar-icon"><i class="fas fa-bell"></i></span>
            System Alert
          </div>
          <div class="message-bubble">
            Your tax filing deadline is approaching. Need assistance?
          </div>
          <div class="timestamp">Just now</div>
        `;
        messagesArea.appendChild(newMsg);
        updateUnreadCount();
        // Auto scroll to bottom
        messagesArea.scrollTop = messagesArea.scrollHeight;
      }
    }, 10000);
  })();

  // ========================
// HERO SLIDER FUNCTIONALITY
// ========================
(function() {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.getElementById('prevSlide');
    const nextBtn = document.getElementById('nextSlide');
    let currentSlide = 0;
    let slideInterval;
    const intervalTime = 2000; // Change slide every 5 seconds

    // Function to show specific slide
    function showSlide(index) {
        // Remove active class from all slides
        slides.forEach(slide => {
            slide.classList.remove('active');
        });
        
        // Remove active class from all dots
        dots.forEach(dot => {
            dot.classList.remove('active');
        });
        
        // Add active class to current slide and dot
        slides[index].classList.add('active');
        dots[index].classList.add('active');
        currentSlide = index;
    }

    // Next slide function
    function nextSlide() {
        let newIndex = currentSlide + 1;
        if (newIndex >= slides.length) {
            newIndex = 0;
        }
        showSlide(newIndex);
    }

    // Previous slide function
    function prevSlide() {
        let newIndex = currentSlide - 1;
        if (newIndex < 0) {
            newIndex = slides.length - 1;
        }
        showSlide(newIndex);
    }

    // Start automatic slideshow
    function startSlideshow() {
        slideInterval = setInterval(nextSlide, intervalTime);
    }

    // Stop automatic slideshow
    function stopSlideshow() {
        clearInterval(slideInterval);
    }

    // Event listeners for arrows
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            prevSlide();
            stopSlideshow();
            startSlideshow(); // Restart interval after manual navigation
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            nextSlide();
            stopSlideshow();
            startSlideshow();
        });
    }

    // Event listeners for dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            stopSlideshow();
            startSlideshow();
        });
    });

    // Pause slideshow on hover
    const heroSection = document.querySelector('.hero');
    if (heroSection) {
        heroSection.addEventListener('mouseenter', stopSlideshow);
        heroSection.addEventListener('mouseleave', startSlideshow);
    }

    // Start the slideshow
    startSlideshow();

    // ========================
    // DASHBOARD POPUP
    // ========================
    const openBtn = document.getElementById('openDashboardBtn');
    const popup = document.getElementById('dashboardPopup');
    const closeBtn = document.getElementById('closeDashboardBtn');

    function openPopup() {
        popup.classList.add('active');
        document.body.classList.add('popup-open');
    }

    function closePopup() {
        popup.classList.remove('active');
        document.body.classList.remove('popup-open');
    }

    if (openBtn) openBtn.addEventListener('click', openPopup);
    if (closeBtn) closeBtn.addEventListener('click', closePopup);

    // Close popup on ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && popup && popup.classList.contains('active')) {
            closePopup();
        }
    });

    // Close popup when clicking outside
    document.body.addEventListener('click', (e) => {
        if (popup && popup.classList.contains('active')) {
            if (!popup.contains(e.target) && e.target !== openBtn) {
                closePopup();
            }
        }
    });

    if (popup) {
        popup.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    }

    // ========================
    // CHARTS INITIALIZATION
    // ========================
    const revenueChart = document.getElementById('revenueChart');
    if (revenueChart) {
        const revenueCtx = revenueChart.getContext('2d');
        new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [42000, 48500, 53200, 61800, 72500, 89200],
                    backgroundColor: 'rgba(19, 137, 201, 0.7)',
                    borderColor: 'rgb(19, 137, 201)',
                    borderWidth: 1,
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: { callbacks: { label: (ctx) => `$${ctx.raw.toLocaleString()}` } }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#eef2f6' }, ticks: { callback: (val) => `$${val/1000}k` } }
                }
            }
        });
    }

    const timeChart = document.getElementById('timeSavedChart');
    if (timeChart) {
        const timeCtx = timeChart.getContext('2d');
        new Chart(timeCtx, {
            type: 'line',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Hours Saved',
                    data: [14, 18, 22, 26],
                    borderColor: 'rgb(19, 137, 201)',
                    backgroundColor: 'rgba(19, 137, 201, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.3,
                    pointBackgroundColor: 'rgb(19, 137, 201)',
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: { callbacks: { label: (ctx) => `${ctx.raw} hours` } }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#eef2f6' }, title: { display: true, text: 'Hours Saved' } }
                }
            }
        });
    }
})();