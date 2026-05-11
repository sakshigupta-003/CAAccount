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