<?php
/**
 * GeneratePress.
 *
 * Please do not make any edits to this file. All edits should be done in a child theme.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set our theme version.
define( 'GENERATE_VERSION', '3.6.1' );

if ( ! function_exists( 'generate_setup' ) ) {
	add_action( 'after_setup_theme', 'generate_setup' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 0.1
	 */
	function generate_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'generatepress' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		$color_palette = generate_get_editor_color_palette();

		if ( ! empty( $color_palette ) ) {
			add_theme_support( 'editor-color-palette', $color_palette );
		}

		add_theme_support(
			'custom-logo',
			array(
				'height' => 70,
				'width' => 350,
				'flex-height' => true,
				'flex-width' => true,
			)
		);

		// Register primary menu.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'generatepress' ),
			)
		);

		/**
		 * Set the content width to something large
		 * We set a more accurate width in generate_smart_content_width()
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1200; /* pixels */
		}

		// Add editor styles to the block editor.
		add_theme_support( 'editor-styles' );

		$editor_styles = apply_filters(
			'generate_editor_styles',
			array(
				'assets/css/admin/block-editor.css',
			)
		);

		add_editor_style( $editor_styles );
	}
}

/**
 * Get all necessary theme files
 */
$theme_dir = get_template_directory();

require $theme_dir . '/inc/theme-functions.php';
require $theme_dir . '/inc/defaults.php';
require $theme_dir . '/inc/class-css.php';
require $theme_dir . '/inc/css-output.php';
require $theme_dir . '/inc/general.php';
require $theme_dir . '/inc/customizer.php';
require $theme_dir . '/inc/markup.php';
require $theme_dir . '/inc/typography.php';
require $theme_dir . '/inc/plugin-compat.php';
require $theme_dir . '/inc/block-editor.php';
require $theme_dir . '/inc/class-typography.php';
require $theme_dir . '/inc/class-typography-migration.php';
require $theme_dir . '/inc/class-html-attributes.php';
require $theme_dir . '/inc/class-theme-update.php';
require $theme_dir . '/inc/class-rest.php';
require $theme_dir . '/inc/deprecated.php';

if ( is_admin() ) {
	require $theme_dir . '/inc/meta-box.php';
	require $theme_dir . '/inc/class-dashboard.php';
}

/**
 * Load our theme structure
 */
require $theme_dir . '/inc/structure/archives.php';
require $theme_dir . '/inc/structure/comments.php';
require $theme_dir . '/inc/structure/featured-images.php';
require $theme_dir . '/inc/structure/footer.php';
require $theme_dir . '/inc/structure/header.php';
require $theme_dir . '/inc/structure/navigation.php';
require $theme_dir . '/inc/structure/post-meta.php';
require $theme_dir . '/inc/structure/sidebars.php';
require $theme_dir . '/inc/structure/search-modal.php';
require $theme_dir . '/inc/structure/author-widget.php';

/**
 * Custom SentinelReign Modifications
 * Premium Minimalist Theme Integration
 */

// Include Admin Settings Panel
require get_template_directory() . '/inc/admin-settings/class-admin-settings.php';

function sentinel_reign_enqueue_scripts() {
    // Premium Typography - Google Fonts with display swap for performance
    wp_enqueue_style( 'sentinel-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Fira+Code:wght@300;400;500&family=Outfit:wght@300;400;500;600;700&display=swap', array(), null );
    
    // Font Awesome Pro Alternative - Latest Version
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', array(), '6.7.2' );
    
    // Animate.css for additional animations
    wp_enqueue_style( 'animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1' );
    
    // AOS CSS & JS - Scroll Animations
    wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1' );
    wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true );
    
    // Swiper.js for modern carousels/sliders
    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11.2.0/swiper-bundle.min.css', array(), '11.2.0' );
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11.2.0/swiper-bundle.min.js', array(), '11.2.0', true );
    
    // GSAP for advanced animations
    wp_enqueue_script( 'gsap-core', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true );
    wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array('gsap-core'), '3.12.5', true );
    
    // Custom Premium Theme Style
    wp_enqueue_style( 'sentinel-minimal-css', get_template_directory_uri() . '/assets/css/premium-minimal.css', array(), '3.0.0' );
    
    // Advanced Homepage Styles
    wp_enqueue_style( 'sentinel-homepage-css', get_template_directory_uri() . '/assets/css/sentinel-homepage.css', array(), '3.0.0' );
    
    // Custom Premium Theme Script
    wp_enqueue_script( 'sentinel-minimal-js', get_template_directory_uri() . '/assets/js/premium-minimal.js', array('aos-js', 'swiper-js', 'gsap-core'), '3.0.0', true );
    
    // Localize script for AJAX and config
    wp_localize_script( 'sentinel-minimal-js', 'sentinelConfig', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'sentinel_nonce' ),
        'siteUrl' => get_site_url(),
    ) );
}
add_action( 'wp_enqueue_scripts', 'sentinel_reign_enqueue_scripts', 99 );

// Modern Theme Configuration - Advanced CSS Variables & Animation Setup
// Provides better performance and smaller bundle size than Tailwind CDN
function sentinel_reign_modern_config() {
echo '<script>
// AOS Animation Configuration
document.addEventListener("DOMContentLoaded", function() {
if (typeof AOS !== "undefined") {
AOS.init({
duration: 800,
easing: "cubic-bezier(0.4, 0, 0.2, 1)",
once: true,
offset: 50,
delay: 0,
mirror: false,
anchorPlacement: "top-bottom"
});
}

// GSAP ScrollTrigger Registration
if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
gsap.registerPlugin(ScrollTrigger);

// Hero animation
gsap.from(".sentinel-hero-content", {
duration: 1.2,
y: 50,
opacity: 0,
ease: "power3.out",
delay: 0.2
});

// Section headers animation
gsap.utils.toArray(".section-header").forEach(function(header) {
gsap.from(header, {
scrollTrigger: {
trigger: header,
start: "top 80%",
toggleActions: "play none none reverse"
},
y: 30,
opacity: 0,
duration: 0.8,
ease: "power2.out"
});
});

// Cards stagger animation
gsap.utils.toArray(".sentinel-grid").forEach(function(grid) {
gsap.from(grid.children, {
scrollTrigger: {
trigger: grid,
start: "top 75%"
},
y: 50,
opacity: 0,
duration: 0.6,
stagger: 0.1,
ease: "back.out(1.7)"
});
});
}
});
</script>';

// Modern CSS Variables for theming
echo '<style>
:root {
/* Primary Colors */
--sentinel-primary: #6366f1;
--sentinel-primary-dark: #4f46e5;
--sentinel-primary-light: #818cf8;
--sentinel-secondary: #ec4899;
--sentinel-accent: #14b8a6;

/* Neutral Colors */
--sentinel-white: #ffffff;
--sentinel-surface: #fafafa;
--sentinel-surface-2: #f5f5f7;
--sentinel-border: #e5e7eb;
--sentinel-border-light: #f3f4f6;
--sentinel-muted: #6b7280;
--sentinel-text: #111827;
--sentinel-text-light: #374151;
--sentinel-black: #0f172a;

/* Gradient Presets */
--gradient-primary: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
--gradient-sunset: linear-gradient(135deg, #f59e0b 0%, #ec4899 100%);
--gradient-ocean: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%);
--gradient-forest: linear-gradient(135deg, #10b981 0%, #14b8a6 100%);
--gradient-midnight: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);

/* Shadows */
--shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
--shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
--shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
--shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
--shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
--shadow-glow: 0 0 40px rgba(99, 102, 241, 0.3);

/* Border Radius */
--radius-sm: 0.375rem;
--radius-md: 0.5rem;
--radius-lg: 0.75rem;
--radius-xl: 1rem;
--radius-2xl: 1.5rem;
--radius-full: 9999px;

/* Transitions */
--transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
--transition-base: 300ms cubic-bezier(0.4, 0, 0.2, 1);
--transition-slow: 500ms cubic-bezier(0.4, 0, 0.2, 1);
--transition-bounce: 500ms cubic-bezier(0.34, 1.56, 0.64, 1);

/* Typography */
--font-sans: "Plus Jakarta Sans", system-ui, -apple-system, sans-serif;
--font-heading: "Outfit", system-ui, -apple-system, sans-serif;
--font-serif: "Playfair Display", Georgia, serif;
--font-mono: "Fira Code", monospace;
}

/* Dark Mode Support */
@media (prefers-color-scheme: dark) {
:root {
--sentinel-white: #0f172a;
--sentinel-surface: #1e293b;
--sentinel-surface-2: #334155;
--sentinel-border: #475569;
--sentinel-border-light: #334155;
--sentinel-muted: #94a3b8;
--sentinel-text: #f1f5f9;
--sentinel-text-light: #cbd5e1;
--sentinel-black: #ffffff;
}
}

/* Smooth Scrolling */
html {
scroll-behavior: smooth;
}

/* Enhanced Selection */
::selection {
background: var(--sentinel-primary);
color: var(--sentinel-white);
}

/* Focus Styles */
:focus-visible {
outline: 2px solid var(--sentinel-primary);
outline-offset: 2px;
}
</style>';
}
add_action('wp_head', 'sentinel_reign_modern_config', 5);

// Deep SEO & Branding Injection for SentinelReign
function sentinel_reign_seo_meta_tags() {
    global $post;
    echo '<!-- SentinelReign Premium SEO Elements -->'."\n";
    
    // Get default meta description from settings
    $default_meta_desc = get_option( 'sentinel_default_meta_desc', 'SentinelReign.com - Cyber Security & Programming Blog by Syed Abrar' );
    
    if ( is_singular() && !is_front_page() ) {
        $meta_desc = get_the_excerpt();
        $meta_desc = wp_strip_all_tags( $meta_desc );
        if (empty($meta_desc)) {
            $meta_desc = wp_trim_words(get_post_field('post_content', $post->ID), 25, '...');
            $meta_desc = wp_strip_all_tags($meta_desc);
        }
        echo '<meta name="description" content="' . esc_attr($meta_desc) . '" />' . "\n";
        echo '<meta property="og:title" content="' . get_the_title() . '" />' . "\n";
        echo '<meta property="og:description" content="' . esc_attr($meta_desc) . '" />' . "\n";
        echo '<meta property="og:url" content="' . get_permalink() . '" />' . "\n";
        echo '<meta property="og:site_name" content="SentinelReign.com" />' . "\n";
        echo '<meta property="og:type" content="article" />' . "\n";
        
        if ( has_post_thumbnail() ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            if ( $image ) {
                echo '<meta property="og:image" content="' . esc_url($image[0]) . '" />' . "\n";
            }
        } else {
            // Default placeholder SEO image from settings
            $default_og_image = get_option( 'sentinel_og_default_image', '' );
            if ( ! empty( $default_og_image ) ) {
                echo '<meta property="og:image" content="' . esc_url($default_og_image) . '" />' . "\n";
            } else {
                echo '<meta property="og:image" content="' . esc_url(get_template_directory_uri() . '/assets/images/sentinel-default-og.jpg') . '" />' . "\n";
            }
        }
    } elseif ( is_front_page() || is_home() ) {
        echo '<meta name="description" content="' . esc_attr( $default_meta_desc ) . '" />' . "\n";
        echo '<meta property="og:title" content="SentinelReign - Technology, Science, AI, Cybersecurity & More" />' . "\n";
        echo '<meta property="og:type" content="website" />' . "\n";
        
        $default_og_image = get_option( 'sentinel_og_default_image', '' );
        if ( ! empty( $default_og_image ) ) {
            echo '<meta property="og:image" content="' . esc_url($default_og_image) . '" />' . "\n";
        }
    } else {
        echo '<meta name="description" content="' . esc_attr( $default_meta_desc ) . '" />' . "\n";
        echo '<meta property="og:title" content="SentinelReign - Multi-Genre Professional Blog" />' . "\n";
        echo '<meta property="og:type" content="website" />' . "\n";
    }
}
add_action( 'wp_head', 'sentinel_reign_seo_meta_tags', 1 );

// Google AdSense Integration
function sentinel_reign_adsense_integration() {
    $publisher_id = get_option( 'sentinel_adsense_publisher_id', '' );
    $auto_ads = get_option( 'sentinel_adsense_auto_ads', false );
    
    if ( ! empty( $publisher_id ) && $auto_ads ) {
        ?>
        <!-- Google AdSense Auto Ads -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?php echo esc_attr( $publisher_id ); ?>" crossorigin="anonymous"></script>
        <?php
    }
}
add_action( 'wp_head', 'sentinel_reign_adsense_integration', 2 );

// Custom Header Code from Settings
function sentinel_reign_custom_header_code() {
    $header_code = get_option( 'sentinel_header_code', '' );
    if ( ! empty( $header_code ) ) {
        echo $header_code . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}
add_action( 'wp_head', 'sentinel_reign_custom_header_code', 9999 );

// Custom Footer Code from Settings
function sentinel_reign_custom_footer_code() {
    $footer_code = get_option( 'sentinel_footer_code', '' );
    if ( ! empty( $footer_code ) ) {
        echo $footer_code . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}
add_action( 'wp_footer', 'sentinel_reign_custom_footer_code', 9999 );

// Update footer copyright with settings
function sentinel_reign_custom_footer_copyright( $copyright ) {
    $custom_copyright = get_option( 'sentinel_footer_copyright', '' );
    if ( ! empty( $custom_copyright ) ) {
        return $custom_copyright;
    }
    return $copyright;
}
add_filter( 'generate_copyright', 'sentinel_reign_custom_footer_copyright' );

// Register homepage template
function sentinel_reign_register_templates( $templates ) {
    $templates['front-page.php'] = 'Advanced Homepage';
    return $templates;
}
add_filter( 'theme_page_templates', 'sentinel_reign_register_templates' );

