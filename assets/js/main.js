$('.ourvision').owlCarousel({
    loop:true,
    items:1,
    dost:false,
    nav:false,
    margin:30,
    autoplay: true,
    autoPlaySpeed: 300,
    responsiveClass:true,
    navText : ["<i class='fa-solid fa-angle-left'></i>","<i class='fa-solid fa-angle-right'></i>"],

});

  window.addEventListener('load', function() {
    setTimeout(function() {
      var myModal = new bootstrap.Modal(document.getElementById('myModal'));
      myModal.show();
    }, 2000); // 5000 ms = 5 seconds
  });

// Set active nav link based on current page
function setActiveNavLink() {
    // Get current page URL
    const pathname = window.location.pathname;
    let currentPage = pathname.split('/').pop();
    
    // Handle root or empty pathname
    if (!currentPage || currentPage === '' || currentPage === 'quran-website' || currentPage === 'html' || pathname.endsWith('/')) {
        currentPage = 'index.html';
    }
    
    // Remove query strings and hash
    currentPage = currentPage.split('?')[0].split('#')[0].toLowerCase();
    
    // Find all nav links in main navbar (excluding menu-drop)
    const navLinks = document.querySelectorAll('.navbar-nav > .nav-item > .nav-link');
    
    navLinks.forEach(function(link) {
        let linkHref = link.getAttribute('href') || '';
        
        // Remove query strings and hash from link
        linkHref = linkHref.split('?')[0].split('#')[0].toLowerCase();
        
        // Get just the filename
        const linkFile = linkHref.split('/').pop();
        const currentFile = currentPage.split('/').pop();
        
        // Check if files match
        if (linkFile === currentFile) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
    
    // Ensure menu-drop links never get active class
    const menuDropLinks = document.querySelectorAll('.menu-drop .nav-link');
    menuDropLinks.forEach(function(link) {
        link.classList.remove('active');
    });
}

// Run on page load
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', setActiveNavLink);
} else {
    setActiveNavLink();
}

// Also run after page fully loads
window.addEventListener('load', setActiveNavLink);

// Desktop Menu Scroll Animation - Only once per page load
(function() {
    let lastScrollTop = 0;
    let animationApplied = false; // Track if animation has been applied
    const desktopMenu = document.querySelector('.desktop-menu');
    
    if (!desktopMenu) return;
    
    // Reset animation state on page load/refresh
    function resetAnimationState() {
        animationApplied = false;
        desktopMenu.classList.remove('scrolled');
        lastScrollTop = 0;
    }
    
    // Reset on page load
    window.addEventListener('load', resetAnimationState);
    
    // Also reset when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', resetAnimationState);
    } else {
        resetAnimationState();
    }
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Add class if scrolling down past 100px and animation not applied yet
        if (scrollTop > lastScrollTop && scrollTop > 100 && !animationApplied) {
            desktopMenu.classList.add('scrolled');
            animationApplied = true; // Mark animation as applied
        } 
        // Remove class if animation already applied (to prevent repeat)
        else {
            // If animation was applied but user is still scrolling, don't remove class
            // Only remove if scrolled back to top
            if (animationApplied && scrollTop <= 100) {
                desktopMenu.classList.remove('scrolled');
                animationApplied = false;
            }
        }
        
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
})();

// Counter Animation
(function() {
    const statNumbers = document.querySelectorAll('.stat-number');
    let countersAnimated = false;
    
    if (statNumbers.length === 0) return;
    
    function animateCounter(element) {
        const target = element.textContent.trim();
        const isPercentage = target.includes('%');
        const isPlus = target.includes('+');
        
        // Extract number from text
        let targetValue = parseInt(target.replace(/[^0-9]/g, ''));
        if (isNaN(targetValue)) return;
        
        const duration = 2000; // 2 seconds
        const increment = targetValue / (duration / 16); // 60fps
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current < targetValue) {
                element.textContent = Math.floor(current) + (isPlus ? '+' : '') + (isPercentage ? '%' : '');
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target; // Set final value
            }
        };
        
        updateCounter();
    }
    
    function checkIfInView() {
        const statsSection = document.querySelector('.stat-box');
        if (!statsSection) return;
        
        const rect = statsSection.getBoundingClientRect();
        const isInView = rect.top < window.innerHeight && rect.bottom > 0;
        
        if (isInView && !countersAnimated) {
            countersAnimated = true;
            statNumbers.forEach(function(stat) {
                animateCounter(stat);
            });
        }
    }
    
    // Check on scroll
    window.addEventListener('scroll', checkIfInView);
    
    // Check on page load
    window.addEventListener('load', checkIfInView);
    
    // Also check immediately if already in view
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', checkIfInView);
    } else {
        checkIfInView();
    }
})();


