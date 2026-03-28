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

/**
 * Custom SentinelReign Modifications
 * Premium Minimalist Theme Integration
 */
function sentinel_reign_enqueue_scripts() {
    // Premium Typography
    wp_enqueue_style( 'sentinel-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Fira+Code:wght@400&display=swap', array(), null );
    
    // Tailwind CSS CDN
    wp_enqueue_script( 'tailwindcss', 'https://cdn.tailwindcss.com', array(), null, false );
    
    // AOS CSS & JS
    wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), null );
    wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true );
    
    // Custom Premium Theme Style
    wp_enqueue_style( 'sentinel-minimal-css', get_template_directory_uri() . '/assets/css/premium-minimal.css', array(), '2.0.0' );
    
    // Custom Premium Theme Script
    wp_enqueue_script( 'sentinel-minimal-js', get_template_directory_uri() . '/assets/js/premium-minimal.js', array('aos-js'), '2.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'sentinel_reign_enqueue_scripts', 99 );

// Add Tailwind Config for CDN
function sentinel_reign_tailwind_config() {
	echo '<script>
	tailwind.config = {
		darkMode: "class",
		theme: {
			extend: {
				colors: {
					minimal: {
						white: "#ffffff",
						surface: "#fafafa",
						surface2: "#f5f5f7",
						border: "#eaeaea",
						muted: "#888888",
						text: "#111111",
						black: "#000000"
					}
				},
				fontFamily: {
					sans: ["Inter", "sans-serif"],
					heading: ["Inter", "sans-serif"],
					serif: ["Playfair Display", "serif"],
					mono: ["Fira Code", "monospace"]
				}
			}
		}
	}
	</script>';
}
add_action('wp_head', 'sentinel_reign_tailwind_config', 5);

// Deep SEO & Branding Injection for SentinelReign
function sentinel_reign_seo_meta_tags() {
    global $post;
    echo '<!-- SentinelReign Premium SEO Elements -->'."\n";
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
            // Default placeholder SEO image
            echo '<meta property="og:image" content="' . esc_url(get_template_directory_uri() . '/assets/images/sentinel-default-og.jpg') . '" />' . "\n";
        }
    } else {
        echo '<meta name="description" content="SentinelReign.com - Cyber Security & Programming Blog by Syed Abrar" />' . "\n";
        echo '<meta property="og:title" content="SentinelReign - Cyber Security & Programming" />' . "\n";
        echo '<meta property="og:type" content="website" />' . "\n";
    }
}
add_action( 'wp_head', 'sentinel_reign_seo_meta_tags', 1 );

