/**
 * SentinelReign Premium Minimal Theme JS
 * Advanced animations with GSAP, AOS, and performance optimizations
 * Sub-millisecond rendering with optimized DOM manipulation
 */

(function() {
    'use strict';

    // Performance: Use requestAnimationFrame for smooth animations
    const raf = window.requestAnimationFrame || window.webkitRequestAnimationFrame || function(fn) { setTimeout(fn, 16); };

    document.addEventListener('DOMContentLoaded', () => {
        
        // Initialize AOS with optimized settings
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 700,
                easing: 'cubic-bezier(0.4, 0, 0.2, 1)',
                once: true,
                offset: 30,
                delay: 0,
                anchorPlacement: 'top-bottom',
            });
        }

        // GSAP Animations if available
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);

            // Hero section animation
            gsap.from('.sentinel-hero-content', {
                duration: 1,
                y: 40,
                opacity: 0,
                ease: 'power3.out',
                delay: 0.1
            });

            // Section headers
            gsap.utils.toArray('.section-header').forEach(header => {
                gsap.from(header, {
                    scrollTrigger: {
                        trigger: header,
                        start: 'top 85%',
                        toggleActions: 'play none none reverse'
                    },
                    y: 25,
                    opacity: 0,
                    duration: 0.7,
                    ease: 'power2.out'
                });
            });

            // Cards stagger animation
            gsap.utils.toArray('.sentinel-grid').forEach(grid => {
                gsap.from(grid.children, {
                    scrollTrigger: {
                        trigger: grid,
                        start: 'top 80%'
                    },
                    y: 40,
                    opacity: 0,
                    duration: 0.5,
                    stagger: 0.08,
                    ease: 'back.out(1.5)'
                });
            });

            // Team member cards
            gsap.utils.toArray('.team-member-card').forEach((card, i) => {
                gsap.from(card, {
                    scrollTrigger: {
                        trigger: card,
                        start: 'top 85%'
                    },
                    y: 30,
                    opacity: 0,
                    duration: 0.6,
                    delay: i * 0.05,
                    ease: 'power2.out'
                });
            });

            // Author widget animation
            gsap.from('.sentinel-author-widget', {
                scrollTrigger: {
                    trigger: '.sentinel-author-widget',
                    start: 'top 85%'
                },
                y: 30,
                opacity: 0,
                duration: 0.7,
                ease: 'power2.out'
            });
        }

        // Articles/Posts - smooth fade up with data-aos
        const articles = document.querySelectorAll('.site-main > article, .site-main .wp-block-post, .sentinel-card');
        articles.forEach((article, index) => {
            if (!article.hasAttribute('data-aos')) {
                article.setAttribute('data-aos', 'fade-up');
                article.setAttribute('data-aos-delay', (index % 6) * 40);
            }
        });
        
        // Widgets in Sidebar
        const widgets = document.querySelectorAll('.widget-area .widget');
        widgets.forEach((widget, index) => {
            if (!widget.hasAttribute('data-aos')) {
                widget.setAttribute('data-aos', 'fade-up');
                widget.setAttribute('data-aos-delay', (index % 6) * 40 + 80);
            }
        });

        // Homepage sections
        const sections = document.querySelectorAll('.sentinel-about-section, .sentinel-team-section, .sentinel-founder-section, .sentinel-featured-section, .sentinel-most-viewed-section, .sentinel-categories-section, .sentinel-latest-section, .sentinel-newsletter-section');
        sections.forEach((section, index) => {
            if (!section.hasAttribute('data-aos')) {
                section.setAttribute('data-aos', 'fade-up');
                section.setAttribute('data-aos-delay', Math.min(index * 50, 300));
            }
        });

        // Add gentle smooth zoom to thumbnails (performance optimized)
        const thumbnails = document.querySelectorAll('.post-image img, .sentinel-card-image img, .team-member-image img');
        thumbnails.forEach(img => {
            img.style.willChange = 'transform';
            img.style.transition = 'transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
        });

        // Reading Progress Bar (optimized)
        let progressBar = document.getElementById('minimal-progress-bar');
        if (!progressBar) {
            progressBar = document.createElement('div');
            progressBar.id = 'minimal-progress-bar';
            progressBar.style.cssText = 'position:fixed;top:0;left:0;height:3px;background:linear-gradient(90deg,#667eea,#764ba2);z-index:9999;width:0%;transition:width 0.1s ease;';
            document.body.appendChild(progressBar);
        }
        
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                raf(() => {
                    let winScroll = document.documentElement.scrollTop || document.body.scrollTop;
                    let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                    let scrolled = (height > 0) ? (winScroll / height) * 100 : 0;
                    progressBar.style.width = scrolled + '%';
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });

        // Back to Top button (optimized)
        let backToTop = document.getElementById('minimal-back-to-top');
        if (!backToTop) {
            backToTop = document.createElement('button');
            backToTop.id = 'minimal-back-to-top';
            backToTop.innerHTML = '<i class="fas fa-arrow-up"></i>';
            backToTop.setAttribute('aria-label', 'Scroll to top');
            backToTop.style.cssText = 'position:fixed;bottom:30px;right:30px;width:50px;height:50px;border-radius:50%;background:linear-gradient(135deg,#667eea,#764ba2);color:white;border:none;cursor:pointer;z-index:9998;opacity:0;pointer-events:none;transition:all 0.3s cubic-bezier(0.4,0,0.2,1);display:flex;align-items:center;justify-content:center;font-size:1.2rem;box-shadow:0 4px 15px rgba(102,126,234,0.4);';
            document.body.appendChild(backToTop);
        }

        let scrollTicking = false;
        window.addEventListener('scroll', () => {
            if (!scrollTicking) {
                raf(() => {
                    if (window.scrollY > 400) {
                        backToTop.style.opacity = '1';
                        backToTop.style.pointerEvents = 'auto';
                        backToTop.style.transform = 'translateY(0)';
                    } else {
                        backToTop.style.opacity = '0';
                        backToTop.style.pointerEvents = 'none';
                        backToTop.style.transform = 'translateY(20px)';
                    }
                    scrollTicking = false;
                });
                scrollTicking = true;
            }
        }, { passive: true });

        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Hover effects for cards (delegated event for performance)
        document.addEventListener('mouseover', (e) => {
            const card = e.target.closest('.sentinel-card, .team-member-card');
            if (card) {
                card.style.willChange = 'transform, box-shadow';
            }
        }, { passive: true });

        // Lazy load images enhancement
        if ('loading' in HTMLImageElement.prototype) {
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');
            lazyImages.forEach(img => {
                img.src = img.src;
            });
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href.length > 1) {
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            }, { passive: false });
        });

    }, { once: true });

})();
