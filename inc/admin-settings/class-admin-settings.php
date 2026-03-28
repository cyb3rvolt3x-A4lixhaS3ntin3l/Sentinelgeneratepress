<?php
/**
 * SentinelReign Admin Settings Panel
 * Advanced theme customization options for footer, colors, SEO, and more
 *
 * @package GeneratePress
 * @subpackage SentinelReign_Customization
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add Admin Menu Page
 */
function sentinel_reign_add_admin_menu() {
	add_theme_page(
		__( 'Theme Settings', 'generatepress' ),
		__( 'Theme Settings', 'generatepress' ),
		'manage_options',
		'sentinel-reign-settings',
		'sentinel_reign_settings_page_html'
	);
}
add_action( 'admin_menu', 'sentinel_reign_add_admin_menu' );

/**
 * Register Settings
 */
function sentinel_reign_register_settings() {
	// Footer Settings Section
	add_settings_section(
		'sentinel_reign_footer_section',
		__( 'Footer Configuration', 'generatepress' ),
		'sentinel_reign_footer_section_callback',
		'sentinel-reign-settings'
	);

	// Footer Text
	add_settings_field(
		'sentinel_footer_copyright',
		__( 'Copyright Text', 'generatepress' ),
		'sentinel_reign_footer_copyright_callback',
		'sentinel-reign-settings',
		'sentinel_reign_footer_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_footer_copyright' );

	// Footer Description
	add_settings_field(
		'sentinel_footer_description',
		__( 'Footer Description', 'generatepress' ),
		'sentinel_reign_footer_description_callback',
		'sentinel-reign-settings',
		'sentinel_reign_footer_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_footer_description' );

	// About Us Section
	add_settings_section(
		'sentinel_reign_about_section',
		__( 'About Us & Team', 'generatepress' ),
		'sentinel_reign_about_section_callback',
		'sentinel-reign-settings'
	);

	// About Us Content
	add_settings_field(
		'sentinel_about_us_content',
		__( 'About Us Content', 'generatepress' ),
		'sentinel_reign_about_us_content_callback',
		'sentinel-reign-settings',
		'sentinel_reign_about_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_about_us_content' );

	// About Us Title
	add_settings_field(
		'sentinel_about_us_title',
		__( 'About Us Title', 'generatepress' ),
		'sentinel_reign_about_us_title_callback',
		'sentinel-reign-settings',
		'sentinel_reign_about_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_about_us_title' );

	// Team Members (JSON)
	add_settings_field(
		'sentinel_team_members',
		__( 'Team Members (JSON)', 'generatepress' ),
		'sentinel_reign_team_members_callback',
		'sentinel-reign-settings',
		'sentinel_reign_about_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_team_members' );

	// Social Media Links
	add_settings_field(
		'sentinel_social_links',
		__( 'Social Media Links (JSON)', 'generatepress' ),
		'sentinel_reign_social_links_callback',
		'sentinel-reign-settings',
		'sentinel_reign_footer_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_social_links' );

	// Theme Colors Section
	add_settings_section(
		'sentinel_reign_colors_section',
		__( 'Theme Colors', 'generatepress' ),
		'sentinel_reign_colors_section_callback',
		'sentinel-reign-settings'
	);

	// Primary Color
	add_settings_field(
		'sentinel_primary_color',
		__( 'Primary Color', 'generatepress' ),
		'sentinel_reign_primary_color_callback',
		'sentinel-reign-settings',
		'sentinel_reign_colors_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_primary_color' );

	// Secondary Color
	add_settings_field(
		'sentinel_secondary_color',
		__( 'Secondary Color', 'generatepress' ),
		'sentinel_reign_secondary_color_callback',
		'sentinel-reign-settings',
		'sentinel_reign_colors_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_secondary_color' );

	// Accent Color
	add_settings_field(
		'sentinel_accent_color',
		__( 'Accent Color', 'generatepress' ),
		'sentinel_reign_accent_color_callback',
		'sentinel-reign-settings',
		'sentinel_reign_colors_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_accent_color' );

	// Background Color
	add_settings_field(
		'sentinel_background_color',
		__( 'Background Color', 'generatepress' ),
		'sentinel_reign_background_color_callback',
		'sentinel-reign-settings',
		'sentinel_reign_colors_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_background_color' );

	// Founder/About Section
	add_settings_section(
		'sentinel_reign_founder_section',
		__( 'Founder Information', 'generatepress' ),
		'sentinel_reign_founder_section_callback',
		'sentinel-reign-settings'
	);

	// Founder Name
	add_settings_field(
		'sentinel_founder_name',
		__( 'Founder Name', 'generatepress' ),
		'sentinel_reign_founder_name_callback',
		'sentinel-reign-settings',
		'sentinel_reign_founder_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_founder_name' );

	// Founder Bio
	add_settings_field(
		'sentinel_founder_bio',
		__( 'Founder Bio', 'generatepress' ),
		'sentinel_reign_founder_bio_callback',
		'sentinel-reign-settings',
		'sentinel_reign_founder_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_founder_bio' );

	// Founder Image
	add_settings_field(
		'sentinel_founder_image',
		__( 'Founder Image URL', 'generatepress' ),
		'sentinel_reign_founder_image_callback',
		'sentinel-reign-settings',
		'sentinel_reign_founder_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_founder_image' );

	// Homepage Display Section
	add_settings_section(
		'sentinel_reign_homepage_section',
		__( 'Homepage Display Options', 'generatepress' ),
		'sentinel_reign_homepage_section_callback',
		'sentinel-reign-settings'
	);

	// Show Featured Posts
	add_settings_field(
		'sentinel_show_featured',
		__( 'Show Featured Posts on Homepage', 'generatepress' ),
		'sentinel_reign_show_featured_callback',
		'sentinel-reign-settings',
		'sentinel_reign_homepage_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_show_featured' );

	// Featured Posts Count
	add_settings_field(
		'sentinel_featured_count',
		__( 'Featured Posts Count', 'generatepress' ),
		'sentinel_reign_featured_count_callback',
		'sentinel-reign-settings',
		'sentinel_reign_homepage_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_featured_count' );

	// Show Most Viewed
	add_settings_field(
		'sentinel_show_most_viewed',
		__( 'Show Most Viewed Posts', 'generatepress' ),
		'sentinel_reign_show_most_viewed_callback',
		'sentinel-reign-settings',
		'sentinel_reign_homepage_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_show_most_viewed' );

	// Most Viewed Count
	add_settings_field(
		'sentinel_most_viewed_count',
		__( 'Most Viewed Posts Count', 'generatepress' ),
		'sentinel_reign_most_viewed_count_callback',
		'sentinel-reign-settings',
		'sentinel_reign_homepage_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_most_viewed_count' );

	// Categories to Show
	add_settings_field(
		'sentinel_homepage_categories',
		__( 'Categories to Display (comma-separated IDs)', 'generatepress' ),
		'sentinel_reign_homepage_categories_callback',
		'sentinel-reign-settings',
		'sentinel_reign_homepage_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_homepage_categories' );

	// SEO Settings Section
	add_settings_section(
		'sentinel_reign_seo_section',
		__( 'SEO & Meta Settings', 'generatepress' ),
		'sentinel_reign_seo_section_callback',
		'sentinel-reign-settings'
	);

	// Default Meta Description
	add_settings_field(
		'sentinel_default_meta_desc',
		__( 'Default Meta Description', 'generatepress' ),
		'sentinel_reign_default_meta_desc_callback',
		'sentinel-reign-settings',
		'sentinel_reign_seo_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_default_meta_desc' );

	// OG Default Image
	add_settings_field(
		'sentinel_og_default_image',
		__( 'Default OG Image URL', 'generatepress' ),
		'sentinel_reign_og_default_image_callback',
		'sentinel-reign-settings',
		'sentinel_reign_seo_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_og_default_image' );

	// Google Adsense Section
	add_settings_section(
		'sentinel_reign_adsense_section',
		__( 'Google AdSense Integration', 'generatepress' ),
		'sentinel_reign_adsense_section_callback',
		'sentinel-reign-settings'
	);

	// AdSense Publisher ID
	add_settings_field(
		'sentinel_adsense_publisher_id',
		__( 'AdSense Publisher ID', 'generatepress' ),
		'sentinel_reign_adsense_publisher_id_callback',
		'sentinel-reign-settings',
		'sentinel_reign_adsense_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_adsense_publisher_id' );

	// AdSense Auto Ads
	add_settings_field(
		'sentinel_adsense_auto_ads',
		__( 'Enable Auto Ads', 'generatepress' ),
		'sentinel_reign_adsense_auto_ads_callback',
		'sentinel-reign-settings',
		'sentinel_reign_adsense_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_adsense_auto_ads' );

	// Header Code
	add_settings_field(
		'sentinel_header_code',
		__( 'Custom Header Code', 'generatepress' ),
		'sentinel_reign_header_code_callback',
		'sentinel-reign-settings',
		'sentinel_reign_adsense_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_header_code' );

	// Footer Code
	add_settings_field(
		'sentinel_footer_code',
		__( 'Custom Footer Code', 'generatepress' ),
		'sentinel_reign_footer_code_callback',
		'sentinel-reign-settings',
		'sentinel_reign_adsense_section'
	);
	register_setting( 'sentinel-reign-settings', 'sentinel_footer_code' );
}
add_action( 'admin_init', 'sentinel_reign_register_settings' );

/**
 * Section Callbacks
 */
function sentinel_reign_footer_section_callback() {
	echo '<p>' . __( 'Configure your website footer content and social links.', 'generatepress' ) . '</p>';
}

function sentinel_reign_colors_section_callback() {
	echo '<p>' . __( 'Set your brand colors. These will be applied throughout the theme.', 'generatepress' ) . '</p>';
}

function sentinel_reign_founder_section_callback() {
	echo '<p>' . __( 'Add founder information to display on the homepage.', 'generatepress' ) . '</p>';
}

function sentinel_reign_homepage_section_callback() {
	echo '<p>' . __( 'Control what content appears on your homepage.', 'generatepress' ) . '</p>';
}

function sentinel_reign_about_section_callback() {
	echo '<p>' . __( 'Configure About Us section and team members information for your homepage.', 'generatepress' ) . '</p>';
}

function sentinel_reign_seo_section_callback() {
	echo '<p>' . __( 'Optimize your site for search engines with meta tags and Open Graph data.', 'generatepress' ) . '</p>';
}

function sentinel_reign_adsense_section_callback() {
	echo '<p>' . __( 'Integrate Google AdSense for monetization.', 'generatepress' ) . '</p>';
}

/**
 * Field Callbacks
 */
function sentinel_reign_footer_copyright_callback() {
	$value = get_option( 'sentinel_footer_copyright', '&copy; ' . date( 'Y' ) . ' SentinelReign. All rights reserved.' );
	echo '<input type="text" name="sentinel_footer_copyright" value="' . esc_attr( $value ) . '" class="regular-text" />';
}

function sentinel_reign_footer_description_callback() {
	$value = get_option( 'sentinel_footer_description', 'Your trusted source for tech, science, AI, cybersecurity, and more.' );
	echo '<textarea name="sentinel_footer_description" class="large-text" rows="3">' . esc_textarea( $value ) . '</textarea>';
}

function sentinel_reign_social_links_callback() {
	$default = array(
		'twitter' => '',
		'facebook' => '',
		'linkedin' => '',
		'github' => '',
		'youtube' => '',
	);
	$value = get_option( 'sentinel_social_links', $default );
	if ( ! is_array( $value ) ) {
		$value = $default;
	}
	echo '<textarea name="sentinel_social_links" class="large-text" rows="5">' . esc_textarea( wp_json_encode( $value, JSON_PRETTY_PRINT ) ) . '</textarea>';
	echo '<p class="description">Format: {"twitter": "https://twitter.com/yourhandle", "facebook": "...", ...}</p>';
}

function sentinel_reign_primary_color_callback() {
	$value = get_option( 'sentinel_primary_color', '#111111' );
	echo '<input type="color" name="sentinel_primary_color" value="' . esc_attr( $value ) . '" class="sentinel-color-picker" />';
	echo '<p class="description">Currently: <code>' . esc_html( $value ) . '</code></p>';
}

function sentinel_reign_secondary_color_callback() {
	$value = get_option( 'sentinel_secondary_color', '#fafafa' );
	echo '<input type="color" name="sentinel_secondary_color" value="' . esc_attr( $value ) . '" class="sentinel-color-picker" />';
	echo '<p class="description">Currently: <code>' . esc_html( $value ) . '</code></p>';
}

function sentinel_reign_accent_color_callback() {
	$value = get_option( 'sentinel_accent_color', '#2563eb' );
	echo '<input type="color" name="sentinel_accent_color" value="' . esc_attr( $value ) . '" class="sentinel-color-picker" />';
	echo '<p class="description">Currently: <code>' . esc_html( $value ) . '</code></p>';
}

function sentinel_reign_background_color_callback() {
	$value = get_option( 'sentinel_background_color', '#f5f5f7' );
	echo '<input type="color" name="sentinel_background_color" value="' . esc_attr( $value ) . '" class="sentinel-color-picker" />';
	echo '<p class="description">Currently: <code>' . esc_html( $value ) . '</code></p>';
}

function sentinel_reign_founder_name_callback() {
	$value = get_option( 'sentinel_founder_name', 'Syed Abrar' );
	echo '<input type="text" name="sentinel_founder_name" value="' . esc_attr( $value ) . '" class="regular-text" />';
}

function sentinel_reign_founder_bio_callback() {
	$value = get_option( 'sentinel_founder_bio', 'Founder of SentinelReign, passionate about technology, cybersecurity, and sharing knowledge with the world.' );
	echo '<textarea name="sentinel_founder_bio" class="large-text" rows="4">' . esc_textarea( $value ) . '</textarea>';
}

function sentinel_reign_founder_image_callback() {
	$value = get_option( 'sentinel_founder_image', '' );
	echo '<input type="url" name="sentinel_founder_image" value="' . esc_url( $value ) . '" class="regular-text" />';
	echo '<button type="button" class="button sentinel-upload-image">Upload Image</button>';
	if ( ! empty( $value ) ) {
		echo '<br/><img src="' . esc_url( $value ) . '" style="max-width: 200px; margin-top: 10px; border-radius: 8px;" />';
	}
}

function sentinel_reign_show_featured_callback() {
	$value = get_option( 'sentinel_show_featured', true );
	echo '<label><input type="checkbox" name="sentinel_show_featured" value="1" ' . checked( $value, true, false ) . ' /> Enable Featured Posts Section</label>';
}

function sentinel_reign_featured_count_callback() {
	$value = get_option( 'sentinel_featured_count', 3 );
	echo '<input type="number" name="sentinel_featured_count" value="' . esc_attr( $value ) . '" min="1" max="10" class="small-text" />';
}

function sentinel_reign_show_most_viewed_callback() {
	$value = get_option( 'sentinel_show_most_viewed', true );
	echo '<label><input type="checkbox" name="sentinel_show_most_viewed" value="1" ' . checked( $value, true, false ) . ' /> Enable Most Viewed Posts Section</label>';
}

function sentinel_reign_most_viewed_count_callback() {
	$value = get_option( 'sentinel_most_viewed_count', 5 );
	echo '<input type="number" name="sentinel_most_viewed_count" value="' . esc_attr( $value ) . '" min="1" max="10" class="small-text" />';
}

function sentinel_reign_homepage_categories_callback() {
	$value = get_option( 'sentinel_homepage_categories', '' );
	echo '<input type="text" name="sentinel_homepage_categories" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="e.g., 1,2,3,4"';
	echo '<p class="description">Enter category IDs separated by commas. Leave empty to show all categories.</p>';
}

function sentinel_reign_default_meta_desc_callback() {
	$value = get_option( 'sentinel_default_meta_desc', 'SentinelReign.com - Your premier destination for technology, science, AI, cybersecurity, programming, poetry, self-improvement, and more.' );
	echo '<textarea name="sentinel_default_meta_desc" class="large-text" rows="3">' . esc_textarea( $value ) . '</textarea>';
}

function sentinel_reign_og_default_image_callback() {
	$value = get_option( 'sentinel_og_default_image', '' );
	echo '<input type="url" name="sentinel_og_default_image" value="' . esc_url( $value ) . '" class="regular-text" />';
	echo '<button type="button" class="button sentinel-upload-image">Upload Image</button>';
	if ( ! empty( $value ) ) {
		echo '<br/><img src="' . esc_url( $value ) . '" style="max-width: 300px; margin-top: 10px; border-radius: 8px;" />';
	}
}

function sentinel_reign_adsense_publisher_id_callback() {
	$value = get_option( 'sentinel_adsense_publisher_id', '' );
	echo '<input type="text" name="sentinel_adsense_publisher_id" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="pub-XXXXXXXXXXXXXXXX" />';
	echo '<p class="description">Enter your AdSense Publisher ID (starts with pub-)</p>';
}

function sentinel_reign_adsense_auto_ads_callback() {
	$value = get_option( 'sentinel_adsense_auto_ads', false );
	echo '<label><input type="checkbox" name="sentinel_adsense_auto_ads" value="1" ' . checked( $value, true, false ) . ' /> Enable Google AdSense Auto Ads</label>';
}

// About Us Section Callbacks
function sentinel_reign_about_us_title_callback() {
	$value = get_option( 'sentinel_about_us_title', 'About SentinelReign' );
	echo '<input type="text" name="sentinel_about_us_title" value="' . esc_attr( $value ) . '" class="regular-text" />';
}

function sentinel_reign_about_us_content_callback() {
	$default = 'SentinelReign is your premier destination for cutting-edge content on technology, science, artificial intelligence, cybersecurity, programming, poetry, and self-improvement. Founded with a vision to bridge the gap between technical expertise and creative expression, we deliver high-quality articles that inform, inspire, and empower our readers.';
	$value = get_option( 'sentinel_about_us_content', $default );
	echo '<textarea name="sentinel_about_us_content" class="large-text" rows="4">' . esc_textarea( $value ) . '</textarea>';
	echo '<p class="description">This content will appear in the About Us section on your homepage.</p>';
}

function sentinel_reign_team_members_callback() {
	$default = array(
		array(
			'name' => 'Syed Abrar',
			'role' => 'Founder & Editor-in-Chief',
			'bio' => 'Passionate about technology and sharing knowledge.',
			'image' => '',
			'social' => array(
				'twitter' => '',
				'linkedin' => '',
				'github' => '',
			),
		),
	);
	$value = get_option( 'sentinel_team_members', $default );
	if ( ! is_array( $value ) ) {
		$value = $default;
	}
	echo '<textarea name="sentinel_team_members" class="large-text code" rows="10">' . esc_textarea( wp_json_encode( $value, JSON_PRETTY_PRINT ) ) . '</textarea>';
	echo '<p class="description">Define team members in JSON format. Each member should have: name, role, bio, image (URL), and social (object with twitter, linkedin, github URLs).</p>';
}

function sentinel_reign_header_code_callback() {
	$value = get_option( 'sentinel_header_code', '' );
	echo '<textarea name="sentinel_header_code" class="large-text code" rows="5">' . esc_textarea( $value ) . '</textarea>';
	echo '<p class="description">Code will be inserted before </head> tag. Use for analytics, verification codes, etc.</p>';
}

function sentinel_reign_footer_code_callback() {
	$value = get_option( 'sentinel_footer_code', '' );
	echo '<textarea name="sentinel_footer_code" class="large-text code" rows="5">' . esc_textarea( $value ) . '</textarea>';
	echo '<p class="description">Code will be inserted before </body> tag. Use for scripts, chat widgets, etc.</p>';
}

/**
 * Settings Page HTML
 */
function sentinel_reign_settings_page_html() {
	?>
	<div class="wrap sentinel-reign-settings">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		
		<div class="sentinel-settings-intro">
			<h2>Welcome to SentinelReign Theme Settings</h2>
			<p>Manage all aspects of your multi-genre professional website from this central dashboard. Customize colors, footer content, founder information, SEO settings, and integrate Google AdSense seamlessly.</p>
		</div>

		<form method="post" action="options.php">
			<?php
			settings_fields( 'sentinel-reign-settings' );
			do_settings_sections( 'sentinel-reign-settings' );
			submit_button( 'Save All Settings' );
			?>
		</form>

		<style>
			.sentinel-reign-settings {
				max-width: 1200px;
			}
			.sentinel-settings-intro {
				background: #fff;
				padding: 20px;
				border-left: 4px solid #2271b1;
				margin-bottom: 30px;
				box-shadow: 0 1px 3px rgba(0,0,0,0.1);
			}
			.sentinel-settings-intro h2 {
				margin-top: 0;
			}
			.sentinel-color-picker {
				width: 100px;
				height: 40px;
				padding: 0;
				border: none;
				cursor: pointer;
			}
			.form-table code {
				background: #f0f0f1;
				padding: 2px 6px;
				border-radius: 3px;
			}
			textarea.code {
				font-family: monospace;
				font-size: 13px;
			}
		</style>

		<script>
		jQuery(document).ready(function($) {
			// Image Upload Functionality
			var mediaUploader;
			$('.sentinel-upload-image').click(function(e) {
				e.preventDefault();
				var button = $(this);
				
				if (mediaUploader) {
					mediaUploader.open();
					return;
				}
				
				mediaUploader = wp.media({
					title: 'Choose Image',
					button: {
						text: 'Use this image'
					},
					multiple: false
				});
				
				mediaUploader.on('select', function() {
					var attachment = mediaUploader.state().get('selection').first().toJSON();
					button.prev('input').val(attachment.url);
					button.next('img').remove();
					button.after('<br/><img src="' + attachment.url + '" style="max-width: 200px; margin-top: 10px; border-radius: 8px;" />');
				});
				
				mediaUploader.open();
			});
		});
		</script>
	</div>
	<?php
}

/**
 * Enqueue Media Uploader for Image Upload
 */
function sentinel_reign_enqueue_media_scripts( $hook ) {
	if ( 'appearance_page_sentinel-reign-settings' !== $hook ) {
		return;
	}
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'sentinel_reign_enqueue_media_scripts' );
