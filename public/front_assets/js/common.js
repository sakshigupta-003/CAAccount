// Wait for DOM to fully load
document.addEventListener('DOMContentLoaded', function() {
  
  // Get elements
  const sidebar = document.getElementById('sidebar');
  const openBtn = document.getElementById('menuOpenBtn');
  const closeBtn = document.getElementById('closeSidebarBtn');
  const overlay = document.getElementById('sidebarOverlay');
  
  // Function to open sidebar
  function openSidebar() {
    if (sidebar) {
      sidebar.classList.add('active');
    }
    if (overlay) {
      overlay.classList.add('active');
    }
    // Prevent body scrolling
    document.body.style.overflow = 'hidden';
  }
  
  // Function to close sidebar
  function closeSidebar() {
    if (sidebar) {
      sidebar.classList.remove('active');
    }
    if (overlay) {
      overlay.classList.remove('active');
    }
    // Restore body scrolling
    document.body.style.overflow = '';
  }
  
  // Event Listeners
  if (openBtn) {
    openBtn.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      openSidebar();
    });
  }
  
  if (closeBtn) {
    closeBtn.addEventListener('click', function(e) {
      e.preventDefault();
      closeSidebar();
    });
  }
  
  if (overlay) {
    overlay.addEventListener('click', function(e) {
      e.preventDefault();
      closeSidebar();
    });
  }
  
  // Close sidebar when Escape key is pressed
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      if (sidebar && sidebar.classList.contains('active')) {
        closeSidebar();
      }
    }
  });
  
  // Optional: Close sidebar when clicking on any mobile link
  const mobileLinks = document.querySelectorAll('.mobile-links a, .mobile-buttons a');
  mobileLinks.forEach(link => {
    link.addEventListener('click', function() {
      // Small delay to allow navigation
      setTimeout(closeSidebar, 100);
    });
  });
  
  // Prevent body scroll when sidebar is open
  if (sidebar) {
    const observer = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {
        if (mutation.attributeName === 'class') {
          if (sidebar.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
          } else {
            document.body.style.overflow = '';
          }
        }
      });
    });
    
    observer.observe(sidebar, { attributes: true });
  }
});

// Add scroll effect to navbar
window.addEventListener('scroll', function() {
  const navbar = document.querySelector('.custom-navbar');
  if (window.scrollY > 50) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});

// Add active class to current page link
const currentLocation = window.location.pathname;
const navLinks = document.querySelectorAll('.nav-links li a');
navLinks.forEach(link => {
  if (link.getAttribute('href') === currentLocation) {
    link.parentElement.classList.add('active');
  }
});
