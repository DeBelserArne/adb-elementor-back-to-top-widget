(function ($) {
    'use strict';

    class ADBBackToTop {
        constructor() {
            this.initButtons();
            this.handleScroll(); // Check initial scroll position
        }

        initButtons() {
            const buttons = document.querySelectorAll('.adb-back-to-top');

            buttons.forEach(button => {
                const scrollOffset = parseInt(button.getAttribute('data-scroll-offset')) || 100;
                const scrollDuration = parseInt(button.getAttribute('data-scroll-duration')) || 800;

                // Initial setup - hide button if not in editor
                if (!document.body.classList.contains('elementor-editor-active')) {
                    button.style.display = 'none';
                }

                // Show/hide button and update progress based on scroll position
                window.addEventListener('scroll', () => this.handleScroll(button, scrollOffset));

                // Handle click event
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.scrollToTop(scrollDuration);
                });
            });
        }

        handleScroll(button, scrollOffset) {
            if (!button) return;

            const winScroll = window.pageYOffset;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;

            // Update percentage if it exists
            const percentageElements = button.querySelectorAll('.adb-scroll-percentage');
            percentageElements.forEach(el => {
                el.textContent = Math.round(scrolled) + (el.textContent.includes('%') ? '%' : '');
            });

            // Show/hide button
            if (winScroll > scrollOffset) {
                button.style.display = 'flex';
                button.style.opacity = '1';
            } else {
                button.style.opacity = '0';
                setTimeout(() => {
                    if (window.pageYOffset <= scrollOffset) {
                        button.style.display = 'none';
                    }
                }, 300);
            }
        }

        scrollToTop(duration) {
            const start = window.pageYOffset;
            const startTime = performance.now();

            function animate(currentTime) {
                const timeElapsed = currentTime - startTime;
                const progress = Math.min(timeElapsed / duration, 1);

                window.scrollTo(0, start * (1 - this.easeOutCubic(progress)));

                if (progress < 1) {
                    requestAnimationFrame(animate.bind(this));
                }
            }

            requestAnimationFrame(animate.bind(this));
        }

        easeOutCubic(t) {
            return 1 - Math.pow(1 - t, 3);
        }
    }

    // Initialize when document is ready
    $(document).ready(() => {
        new ADBBackToTop();
    });

})(jQuery);