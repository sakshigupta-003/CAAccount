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
// ========================
// RIGHT SIDE POPUP WIDGET
// ========================
(function() {
    const toggleBtn = document.getElementById('popupToggleBtn');
    const popup = document.getElementById('rightPopupContainer');
    const closeBtn = document.getElementById('closeRightPopupBtn');
    const contentArea = document.getElementById('popupContentArea');

    // Content templates for different actions
    const contentTemplates = {
        default: `
            <div class="content-default">
                <div class="welcome-message">
                    <i class="fas fa-hand-wave"></i>
                    <h4>Welcome to Accountech!</h4>
                    <p>How can we assist you today?</p>
                </div>
                <div class="featured-tips">
                    <div class="tip-card">
                        <i class="fas fa-lightbulb"></i>
                        <div>
                            <strong>Tax Saving Tip</strong>
                            <p>Invest in Section 80C to save up to ₹46,800 in taxes.</p>
                        </div>
                    </div>
                    <div class="tip-card">
                        <i class="fas fa-chart-line"></i>
                        <div>
                            <strong>Financial Planning</strong>
                            <p>Start SIP with just ₹500 per month for long-term wealth.</p>
                        </div>
                    </div>
                  
                </div>
            </div>
        `,
        account: `
            <div class="account-info">
                <h4><i class="fas fa-user-circle"></i> My Account</h4>
                <div class="account-details">
                    <p><span>Account Holder:</span><span>John Doe</span></p>
                    <p><span>Account Type:</span><span>Premium Plus</span></p>
                    <p><span>Member Since:</span><span>Jan 2024</span></p>
                    <p><span>Total Savings:</span><span>₹1,24,500</span></p>
                    <p><span>Active Services:</span><span>3</span></p>
                </div>
                <div class="tip-card" style="margin-top: 10px;">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <strong>Security Status</strong>
                        <p>Your account is fully secured • 2FA Enabled</p>
                    </div>
                </div>
            </div>
        `,
        services: `
            <div class="services-list">
                <h4><i class="fas fa-bag-shopping"></i> Our Services</h4>
                <div class="service-item">
                    <i class="fas fa-search"></i>
                    <div>
                        <strong>Audit Services</strong>
                        <p>Financial audit & compliance</p>
                    </div>
                </div>
                <div class="service-item">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <div>
                        <strong>Tax Preparation</strong>
                        <p>Income tax & GST filing</p>
                    </div>
                </div>
                <div class="service-item">
                    <i class="fas fa-chart-line"></i>
                    <div>
                        <strong>Financial Planning</strong>
                        <p>Wealth & retirement planning</p>
                    </div>
                </div>
            </div>
        `,
        courses: `
            <div class="courses-list">
                <h4><i class="fas fa-graduation-cap"></i> Popular Courses</h4>
                <div class="course-item">
                    <i class="fas fa-calculator"></i>
                    <div>
                        <strong>Tally Prime</strong>
                        <p>Master accounting software</p>
                    </div>
                </div>
                <div class="course-item">
                    <i class="fas fa-percentage"></i>
                    <div>
                        <strong>GST Training</strong>
                        <p>Complete GST compliance</p>
                    </div>
                </div>
                <div class="course-item">
                    <i class="fas fa-coins"></i>
                    <div>
                        <strong>Taxation Course</strong>
                        <p>Income tax & corporate tax</p>
                    </div>
                </div>
            </div>
        `,
        support: `
            <div class="support-options">
                <h4><i class="fas fa-headset"></i> Support Options</h4>
                <div class="option" onclick="window.location.href='tel:+919217354577'">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <strong>Call Us</strong>
                        <p>+91 92173 54577 • Available 24/7</p>
                    </div>
                </div>
                <div class="option" onclick="window.location.href='mailto:support@accountech.com'">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <strong>Email Support</strong>
                        <p>support@accountech.com</p>
                    </div>
                </div>
            </div>
        `
    };

    // Function to load content
    function loadContent(type) {
        if (contentTemplates[type]) {
            contentArea.innerHTML = contentTemplates[type];
        } else {
            contentArea.innerHTML = contentTemplates.default;
        }
    }

    // Open popup
    function openPopup() {
        popup.classList.add('active');
        loadContent('default');
    }

    // Close popup
    function closePopup() {
        popup.classList.remove('active');
    }

    // Toggle popup
    function togglePopup() {
        if (popup.classList.contains('active')) {
            closePopup();
        } else {
            openPopup();
        }
    }

    // Event listeners for action buttons
    function setupActionButtons() {
        const actionBtns = document.querySelectorAll('.action-btn');
        actionBtns.forEach(btn => {
            btn.removeEventListener('click', handleActionClick);
            btn.addEventListener('click', handleActionClick);
        });
    }

    function handleActionClick(e) {
        const action = this.getAttribute('data-action');
        if (action && contentTemplates[action]) {
            loadContent(action);
        }
    }

    // Watch for DOM changes to reattach action button listeners
    const observer = new MutationObserver(() => {
        setupActionButtons();
    });
    observer.observe(contentArea, { childList: true, subtree: true });

    // Toggle button click
    if (toggleBtn) {
        toggleBtn.addEventListener('click', togglePopup);
    }

    // Close button click
    if (closeBtn) {
        closeBtn.addEventListener('click', closePopup);
    }

    // Close on outside click
    document.addEventListener('click', (event) => {
        if (popup && popup.classList.contains('active')) {
            if (!popup.contains(event.target) && !toggleBtn.contains(event.target)) {
                closePopup();
            }
        }
    });

    // Close on ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && popup && popup.classList.contains('active')) {
            closePopup();
        }
    });

    // Chat input handler
    const chatInput = document.getElementById('chatInput');
    const sendBtn = document.getElementById('sendMessageBtn');

    function sendMessage() {
        const message = chatInput.value.trim();
        if (message) {
            const responseDiv = document.createElement('div');
            responseDiv.className = 'tip-card';
            responseDiv.style.marginTop = '10px';
            responseDiv.innerHTML = `
                <i class="fas fa-robot"></i>
                <div>
                    <strong>Accountech Assistant</strong>
                    <p>Thank you for your message! Our team will get back to you shortly.</p>
                </div>
            `;
            contentArea.appendChild(responseDiv);
            chatInput.value = '';
            contentArea.scrollTop = contentArea.scrollHeight;
        }
    }

    if (sendBtn) {
        sendBtn.addEventListener('click', sendMessage);
    }
    
    if (chatInput) {
        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    }

    // Initialize action buttons
    setupActionButtons();
})();