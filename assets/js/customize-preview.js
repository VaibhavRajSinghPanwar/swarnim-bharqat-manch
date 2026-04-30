/**
 * Customizer Preview Script
 * Handles live preview updates in the WordPress Customizer
 *
 * @package Swarnim Bharat Manch
 */

(function ($) {
    'use strict';

    const root = document.documentElement;

    // Primary Color
    wp.customize('sbmanch_primary_color', function (value) {
        value.bind(function (to) {
            root.style.setProperty('--primary-color', to);
        });
    });

    // Secondary Color
    wp.customize('sbmanch_secondary_color', function (value) {
        value.bind(function (to) {
            root.style.setProperty('--secondary-color', to);
        });
    });

    // About Title
    wp.customize('sbmanch_about_title', function (value) {
        value.bind(function (to) {
            const elements = document.querySelectorAll('[data-sbmanch="about-title"]');
            elements.forEach(el => {
                el.textContent = to;
            });
        });
    });

    // About Description
    wp.customize('sbmanch_about_description', function (value) {
        value.bind(function (to) {
            const elements = document.querySelectorAll('[data-sbmanch="about-description"]');
            elements.forEach(el => {
                el.innerHTML = to;
            });
        });
    });

    // About Image
    wp.customize('sbmanch_about_image', function (value) {
        value.bind(function (to) {
            if (to) {
                const images = document.querySelectorAll('[data-sbmanch="about-image"]');
                images.forEach(img => {
                    img.src = to;
                });
            }
        });
    });

    // Contact Email
    wp.customize('sbmanch_contact_email', function (value) {
        value.bind(function (to) {
            const elements = document.querySelectorAll('[data-sbmanch="contact-email"]');
            elements.forEach(el => {
                el.textContent = to;
                el.href = 'mailto:' + to;
            });
        });
    });

    // Contact Phone
    wp.customize('sbmanch_contact_phone', function (value) {
        value.bind(function (to) {
            const elements = document.querySelectorAll('[data-sbmanch="contact-phone"]');
            elements.forEach(el => {
                el.textContent = to;
                el.href = 'tel:' + to;
            });
        });
    });

    // Contact Address
    wp.customize('sbmanch_contact_address', function (value) {
        value.bind(function (to) {
            const elements = document.querySelectorAll('[data-sbmanch="contact-address"]');
            elements.forEach(el => {
                el.textContent = to;
            });
        });
    });

    // CTA Button Text
    wp.customize('sbmanch_cta_text', function (value) {
        value.bind(function (to) {
            const buttons = document.querySelectorAll('[data-sbmanch="cta-button"]');
            buttons.forEach(btn => {
                btn.textContent = to;
            });
        });
    });

    // CTA Button URL
    wp.customize('sbmanch_cta_url', function (value) {
        value.bind(function (to) {
            const buttons = document.querySelectorAll('[data-sbmanch="cta-button"]');
            buttons.forEach(btn => {
                btn.href = to;
            });
        });
    });

    // Copyright Text
    wp.customize('sbmanch_copyright_text', function (value) {
        value.bind(function (to) {
            const elements = document.querySelectorAll('[data-sbmanch="copyright"]');
            elements.forEach(el => {
                el.innerHTML = to;
            });
        });
    });

    // Hero Title
    wp.customize('sbmanch_hero_title', function (value) {
        value.bind(function (to) {
            const elements = document.querySelectorAll('[data-sbmanch="hero-title"]');
            elements.forEach(el => {
                el.textContent = to;
            });
        });
    });

    // Hero Subtitle
    wp.customize('sbmanch_hero_subtitle', function (value) {
        value.bind(function (to) {
            const elements = document.querySelectorAll('[data-sbmanch="hero-subtitle"]');
            elements.forEach(el => {
                el.textContent = to;
            });
        });
    });

    // Social Media URLs
    wp.customize('sbmanch_facebook_url', function (value) {
        value.bind(function (to) {
            const elements = document.querySelectorAll('[data-sbmanch="facebook"]');
            elements.forEach(el => {
                el.href = to;
            });
        });
    });

    wp.customize('sbmanch_twitter_url', function (value) {
        value.bind(function (to) {
            const elements = document.querySelectorAll('[data-sbmanch="twitter"]');
            elements.forEach(el => {
                el.href = to;
            });
        });
    });

    wp.customize('sbmanch_linkedin_url', function (value) {
        value.bind(function (to) {
            const elements = document.querySelectorAll('[data-sbmanch="linkedin"]');
            elements.forEach(el => {
                el.href = to;
            });
        });
    });

    wp.customize('sbmanch_instagram_url', function (value) {
        value.bind(function (to) {
            const elements = document.querySelectorAll('[data-sbmanch="instagram"]');
            elements.forEach(el => {
                el.href = to;
            });
        });
    });

})(jQuery);
