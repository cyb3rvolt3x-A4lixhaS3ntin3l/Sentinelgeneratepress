/**
 * SentinelReign Premium Minimal Theme JS
 * Injects AOS attributes dynamically and initializes smooth minimalist animations.
 */

document.addEventListener('DOMContentLoaded', () => {
    
    // Articles/Posts - smooth float up
    const articles = document.querySelectorAll('.site-main > article, .site-main .wp-block-post');
    articles.forEach((article, index) => {
        article.setAttribute('data-aos', 'fade-up');
        article.setAttribute('data-aos-delay', (index % 5) * 50); // Very subtle delay
    });
    
    // Widgets in Sidebar
    const widgets = document.querySelectorAll('.widget-area .widget');
    widgets.forEach((widget, index) => {
        widget.setAttribute('data-aos', 'fade-up');
        widget.setAttribute('data-aos-delay', (index % 5) * 50 + 100);
    });

    // Initialize Animate On Scroll (AOS)
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 900,
            easing: 'ease-out-quart',
            once: true,
            offset: 40,
        });
    }

    // Add gentle smooth zoom to thumbnails
    const thumbnails = document.querySelectorAll('.post-image img');
    thumbnails.forEach(img => {
        img.style.transition = 'transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1)';
        img.addEventListener('mouseenter', () => {
            img.style.transform = 'scale(1.02)';
        });
        img.addEventListener('mouseleave', () => {
            img.style.transform = 'scale(1)';
        });
    });

    // Deep UI Feature: Minimal Reading Progress Bar
    const progressBar = document.createElement('div');
    progressBar.id = 'minimal-progress-bar';
    document.body.appendChild(progressBar);
    
    window.addEventListener('scroll', () => {
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (height > 0) ? (winScroll / height) * 100 : 0;
        progressBar.style.width = scrolled + "%";
    });

    // Deep UI Feature: Minimal Back to Top button
    const backToTop = document.createElement('button');
    backToTop.id = 'minimal-back-to-top';
    backToTop.innerHTML = '&uarr;'; // Elegant up arrow
    backToTop.setAttribute('aria-label', 'Scroll to top');
    document.body.appendChild(backToTop);

    window.addEventListener('scroll', () => {
        if (window.scrollY > 500) {
            backToTop.style.opacity = '1';
            backToTop.style.pointerEvents = 'auto';
            backToTop.style.transform = 'translateY(0)';
        } else {
            backToTop.style.opacity = '0';
            backToTop.style.pointerEvents = 'none';
            backToTop.style.transform = 'translateY(20px)';
        }
    });

    backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Deep UI Feature: Elegant Minimal Thumbnail Fallback
    const articleCards = document.querySelectorAll('.post.type-post');
    articleCards.forEach((card) => {
        // GeneratePress wraps images in .post-image
        if (!card.querySelector('.post-image')) {
            const tempThumb = document.createElement('div');
            tempThumb.className = 'post-image-fallback';
            
            const categoryElem = card.querySelector('.cat-links a') ? card.querySelector('.cat-links a').innerText : 'ARTICLE';
            
            tempThumb.innerHTML = `
                <div class="fallback-content">
                    <span class="minimal-badge">${categoryElem}</span>
                </div>
            `;
            
            // Insert it at the absolute top of the inside-article block
            const inside = card.querySelector('.inside-article');
            if (inside) {
                inside.insertBefore(tempThumb, inside.firstChild);
            }
        }
    });

});
