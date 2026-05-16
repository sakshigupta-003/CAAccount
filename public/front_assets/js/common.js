 (function() {
      // DOM elements
      const menuOpenBtn = document.getElementById('menuOpenBtn');
      const menuCloseBtn = document.getElementById('menuCloseBtn');
      const mobileSidebar = document.getElementById('mobileSidebar');
      const sidebarOverlay = document.getElementById('sidebarOverlay');

      // Functions to control sidebar
      function openSidebar() {
        if (mobileSidebar) {
          mobileSidebar.classList.add('open');
        }
        if (sidebarOverlay) {
          sidebarOverlay.classList.add('active');
        }
        // prevent body scroll when sidebar open
        document.body.style.overflow = 'hidden';
      }

      function closeSidebar() {
        if (mobileSidebar) {
          mobileSidebar.classList.remove('open');
        }
        if (sidebarOverlay) {
          sidebarOverlay.classList.remove('active');
        }
        // restore scroll
        document.body.style.overflow = '';
      }

      // Event listeners
      if (menuOpenBtn) {
        menuOpenBtn.addEventListener('click', (e) => {
          e.preventDefault();
          openSidebar();
        });
      }

      if (menuCloseBtn) {
        menuCloseBtn.addEventListener('click', (e) => {
          e.preventDefault();
          closeSidebar();
        });
      }

      if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', (e) => {
          closeSidebar();
        });
      }

      // Optional: close sidebar on escape key press
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileSidebar && mobileSidebar.classList.contains('open')) {
          closeSidebar();
        }
      });

      // For any internal links inside mobile sidebar (like anchor tags), close after navigation (optional)
      const mobileLinks = document.querySelectorAll('.mobile-links a, .mobile-buttons a');
      mobileLinks.forEach(link => {
        link.addEventListener('click', (e) => {
          // only if the href is not just '#', but keep original behavior.
          // we close sidebar after click for better UX on mobile
          if (window.innerWidth <= 820) {
            // Small delay to allow navigation event
            setTimeout(() => {
              closeSidebar();
            }, 150);
          }
        });
      });

      // window resize: if sidebar open and window size > 820px, we auto close? (optional good practice)
      window.addEventListener('resize', function() {
        if (window.innerWidth > 820 && mobileSidebar && mobileSidebar.classList.contains('open')) {
          closeSidebar();
        }
        // Reset body overflow if needed
        if (window.innerWidth > 820 && document.body.style.overflow === 'hidden') {
          document.body.style.overflow = '';
        }
      });
    })();