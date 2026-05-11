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

  (function() {
    const openBtn = document.getElementById('openDashboardBtn');
    const popup = document.getElementById('dashboardPopup');
    const closeBtn = document.getElementById('closeDashboardBtn');
    const overlay = document.getElementById('dashboardOverlay');

    function openPopup() {
      popup.classList.add('active');
      overlay.classList.add('active');
    }

    function closePopup() {
      popup.classList.remove('active');
      overlay.classList.remove('active');
    }

    openBtn.addEventListener('click', openPopup);
    closeBtn.addEventListener('click', closePopup);
    overlay.addEventListener('click', closePopup);

    // ESC key closes popup
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && popup.classList.contains('active')) {
        closePopup();
      }
    });

    // Initialize Charts
    // Bar Chart - Revenue Growth
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
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

    // Line Chart - Time Saved
    const timeCtx = document.getElementById('timeSavedChart').getContext('2d');
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
          pointRadius: 5,
          pointHoverRadius: 7
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
  })();