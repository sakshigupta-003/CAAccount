const menuOpenBtn = document.getElementById("menuOpenBtn");
const menuCloseBtn = document.getElementById("menuCloseBtn");
const mobileSidebar = document.getElementById("mobileSidebar");
const sidebarOverlay = document.getElementById("sidebarOverlay");

/* OPEN SIDEBAR */

menuOpenBtn.addEventListener("click", () => {

    mobileSidebar.classList.add("active");
    sidebarOverlay.classList.add("active");

});

/* CLOSE SIDEBAR BUTTON */

menuCloseBtn.addEventListener("click", () => {

    mobileSidebar.classList.remove("active");
    sidebarOverlay.classList.remove("active");

});

/* CLOSE ON OVERLAY CLICK */

sidebarOverlay.addEventListener("click", () => {

    mobileSidebar.classList.remove("active");
    sidebarOverlay.classList.remove("active");

});
document.querySelector('.mobile-sidebar').classList.toggle('open');

// Navbar background change on scroll
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.custom-navbar');
    if (!navbar) return;

    // Threshold (pixels scrolled to trigger)
    const scrollThreshold = 50;

    function updateNavbarOnScroll() {
        if (window.scrollY > scrollThreshold) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    }

    // Run on load & on scroll
    updateNavbarOnScroll();
    window.addEventListener('scroll', updateNavbarOnScroll);
});
(function() {
    const sidebar = document.getElementById('mobileSidebar');
    const closeBtn = document.getElementById('menuCloseBtn');
    const overlay = document.querySelector('.sidebar-overlay');
    
    // Create overlay if not exists
    if (!overlay) {
      const newOverlay = document.createElement('div');
      newOverlay.className = 'sidebar-overlay';
      newOverlay.id = 'sidebarOverlay';
      document.body.appendChild(newOverlay);
    }
    
    const sidebarOverlay = document.getElementById('sidebarOverlay') || document.querySelector('.sidebar-overlay');
    
    function openSidebar() {
      if (sidebar) sidebar.classList.add('active');
      if (sidebarOverlay) sidebarOverlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
    
    function closeSidebar() {
      if (sidebar) sidebar.classList.remove('active');
      if (sidebarOverlay) sidebarOverlay.classList.remove('active');
      document.body.style.overflow = '';
    }
    
    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
    if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);
    
    // Close on ESC key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && sidebar && sidebar.classList.contains('active')) {
        closeSidebar();
      }
    });
    
    // Export functions globally if needed
    window.openSidebar = openSidebar;
    window.closeSidebar = closeSidebar;
  })();