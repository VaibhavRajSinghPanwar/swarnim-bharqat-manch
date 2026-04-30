/**
 * Main JavaScript File for Swarnim Bharat Manch Theme
 *
 * @package Swarnim Bharat Manch
 */

(function ($) {
    'use strict';

    // Document Ready
    $(document).ready(function () {
        sbmanchTheme.init();
    });

    /**
     * Main Theme Object
     */
    const sbmanchTheme = {
        init: function () {
            this.headerScroll();
            this.mobileMenu();
            this.smoothScroll();
            this.statsAnimation();
            this.initLightbox();
            this.formValidation();
            this.stickyHeader();
        },

        /**
         * Header Scroll Effect
         */
        headerScroll: function () {
            const header = document.getElementById('site-header');
            if (!header) return;

            const scrollFunction = () => {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            };

            window.addEventListener('scroll', scrollFunction, false);
        },

        /**
         * Mobile Menu Toggle
         */
        mobileMenu: function () {
            const menuToggle = document.getElementById('menu-toggle');
            const primaryMenu = document.getElementById('primary-menu');

            if (!menuToggle || !primaryMenu) return;

            menuToggle.addEventListener('click', function () {
                primaryMenu.classList.toggle('active');
                menuToggle.setAttribute('aria-expanded', primaryMenu.classList.contains('active'));
            });

            // Close menu when clicking on a link
            const menuLinks = primaryMenu.querySelectorAll('a');
            menuLinks.forEach(link => {
                link.addEventListener('click', function () {
                    primaryMenu.classList.remove('active');
                    menuToggle.setAttribute('aria-expanded', false);
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', function (event) {
                if (!event.target.closest('#site-header')) {
                    primaryMenu.classList.remove('active');
                    menuToggle.setAttribute('aria-expanded', false);
                }
            });
        },

        /**
         * Smooth Scroll for Anchor Links
         */
        smoothScroll: function () {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    if (href === '#') return;

                    const target = document.querySelector(href);
                    if (!target) return;

                    e.preventDefault();

                    const headerHeight = document.querySelector('.site-header').offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    // Update URL
                    window.history.pushState(null, null, href);
                });
            });
        },

        /**
         * Stats Counter Animation
         */
        statsAnimation: function () {
            const statNumbers = document.querySelectorAll('.stat-number[data-target]');
            if (statNumbers.length === 0) return;

            const observerOptions = {
                threshold: 0.5
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        const finalValue = parseInt(target.getAttribute('data-target'));
                        this.animateCounter(target, finalValue);
                        observer.unobserve(target);
                    }
                });
            }, observerOptions);

            statNumbers.forEach(stat => observer.observe(stat));
        },

        /**
         * Animate Counter
         */
        animateCounter: function (element, finalValue) {
            const duration = 2000; // 2 seconds
            const startValue = 0;
            const startTime = performance.now();

            const animate = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = elapsed / duration;

                if (progress < 1) {
                    const currentValue = Math.floor(startValue + (finalValue - startValue) * progress);
                    element.textContent = currentValue.toLocaleString();
                    requestAnimationFrame(animate);
                } else {
                    element.textContent = finalValue.toLocaleString();
                }
            };

            requestAnimationFrame(animate);
        },

        /**
         * Initialize Lightbox Gallery
         */
        initLightbox: function () {
            // Check if GLightbox is available
            if (typeof GLightbox !== 'undefined') {
                const lightbox = GLightbox({
                    selector: '.glightbox',
                    touchNavigation: true,
                    loop: true,
                    autoplayVideos: true,
                    descPosition: 'bottom'
                });
            }
        },

        /**
         * Form Validation
         */
        formValidation: function () {
            const forms = document.querySelectorAll('form');

            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    if (!form.checkValidity()) {
                        e.preventDefault();
                        e.stopPropagation();

                        // Show error message
                        const errorFields = form.querySelectorAll(':invalid');
                        errorFields.forEach(field => {
                            field.classList.add('error');
                            const errorMsg = document.createElement('span');
                            errorMsg.className = 'error-message';
                            errorMsg.style.color = '#dc3545';
                            errorMsg.style.fontSize = '0.85rem';
                            errorMsg.style.marginTop = '5px';
                            errorMsg.style.display = 'block';
                            
                            if (field.validationMessage) {
                                errorMsg.textContent = field.validationMessage;
                                field.parentElement.appendChild(errorMsg);
                            }
                        });
                    }
                });

                // Remove error class on focus
                const inputs = form.querySelectorAll('input, textarea, select');
                inputs.forEach(input => {
                    input.addEventListener('focus', function () {
                        this.classList.remove('error');
                        const errorMsg = this.parentElement.querySelector('.error-message');
                        if (errorMsg) {
                            errorMsg.remove();
                        }
                    });
                });
            });
        },

        /**
         * Sticky Header
         */
        stickyHeader: function () {
            const header = document.querySelector('.site-header');
            if (!header) return;

            const observer = new IntersectionObserver(([e]) => {
                e.target.classList.toggle('sticky', e.intersectionRatio < 1);
            }, {
                threshold: [1]
            });

            observer.observe(header);
        }
    };

    /**
     * Load More Posts via AJAX
     */
    window.sbmanchLoadMore = function (postType) {
        const button = document.querySelector('[data-action="load-more"]');
        if (!button) return;

        button.addEventListener('click', function () {
            const paged = parseInt(this.getAttribute('data-paged')) || 1;
            const nextPage = paged + 1;

            const data = {
                action: 'sbmanch_load_more_posts',
                paged: nextPage,
                post_type: postType || 'post',
                nonce: sbmanch.nonce
            };

            $.ajax({
                url: sbmanch.ajaxurl,
                type: 'POST',
                data: data,
                beforeSend: function () {
                    button.disabled = true;
                    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
                },
                success: function (response) {
                    if (response) {
                        const container = document.querySelector('[data-posts-container]');
                        if (container) {
                            container.insertAdjacentHTML('beforeend', response);
                            button.setAttribute('data-paged', nextPage);
                            button.disabled = false;
                            button.innerHTML = 'Load More';

                            // Re-initialize lightbox if available
                            if (typeof GLightbox !== 'undefined') {
                                GLightbox({
                                    selector: '.glightbox',
                                    touchNavigation: true,
                                    loop: true
                                });
                            }
                        }
                    } else {
                        button.style.display = 'none';
                    }
                },
                error: function () {
                    button.disabled = false;
                    button.innerHTML = 'Error Loading Posts';
                }
            });
        });
    };

    /**
     * Contact Form Handler
     */
    window.sbmanchContactForm = function () {
        const form = document.getElementById('contact-form');
        if (!form) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(form);
            formData.append('action', 'sbmanch_submit_contact_form');
            formData.append('nonce', sbmanch.nonce);

            $.ajax({
                url: sbmanch.ajaxurl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    const button = form.querySelector('[type="submit"]');
                    button.disabled = true;
                    button.textContent = 'Sending...';
                },
                success: function (response) {
                    form.reset();
                    alert('Thank you for your message. We will get back to you soon!');
                    const button = form.querySelector('[type="submit"]');
                    button.disabled = false;
                    button.textContent = 'Send Message';
                },
                error: function () {
                    alert('An error occurred. Please try again.');
                    const button = form.querySelector('[type="submit"]');
                    button.disabled = false;
                    button.textContent = 'Send Message';
                }
            });
        });
    };

    /**
     * Initialize on page load
     */
    document.addEventListener('DOMContentLoaded', function () {
        sbmanchContactForm();
    });

    // Expose global functions
    window.sbmanchTheme = sbmanchTheme;

})(jQuery);

/**
 * Lazy Loading Images
 */
(function () {
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.add('loaded');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
})();

/**
 * Keyboard Navigation Enhancement
 */
document.addEventListener('keydown', function (e) {
    // Skip to main content on Tab+Alt
    if (e.altKey && e.key === 'M') {
        const main = document.getElementById('main');
        if (main) {
            main.focus();
        }
    }

    // Close mobile menu on Escape
    if (e.key === 'Escape') {
        const menu = document.getElementById('primary-menu');
        const toggle = document.getElementById('menu-toggle');
        if (menu && toggle) {
            menu.classList.remove('active');
            toggle.setAttribute('aria-expanded', false);
        }
    }
});

/**
 * Back to Top Button
 */
(function () {
    const backToTop = document.querySelector('.back-to-top');
    if (!backToTop) {
        const button = document.createElement('button');
        button.className = 'back-to-top';
        button.setAttribute('aria-label', 'Back to Top');
        button.innerHTML = '<i class="fas fa-arrow-up"></i>';
        button.style.cssText = `
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: #1a47b3;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999;
            transition: all 0.3s ease;
        `;

        document.body.appendChild(button);

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                button.style.display = 'flex';
            } else {
                button.style.display = 'none';
            }
        });

        button.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        button.addEventListener('mouseenter', function () {
            this.style.background = '#ff6b35';
            this.style.transform = 'translateY(-5px)';
        });

        button.addEventListener('mouseleave', function () {
            this.style.background = '#1a47b3';
            this.style.transform = 'translateY(0)';
        });
    }
})();
