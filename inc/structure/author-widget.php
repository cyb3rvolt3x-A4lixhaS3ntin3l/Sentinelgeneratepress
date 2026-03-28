<?php
/**
 * SentinelReign Author Widget
 * Display author information box after post content
 *
 * @package GeneratePress
 * @subpackage SentinelReign_Customization
 */

if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly.
}

if ( ! function_exists( 'sentinel_reign_author_widget' ) ) :
/**
 * Display author widget on single posts
 */
function sentinel_reign_author_widget() {
if ( ! is_single() ) {
return;
}

$author_id = get_the_author_meta( 'ID' );
$author_name = get_the_author_meta( 'display_name' );
$author_bio = get_the_author_meta( 'description' );
$author_avatar = get_avatar( $author_id, 80, '', '', array( 'class' => 'author-avatar-img' ) );
$author_posts_url = get_author_posts_url( $author_id );

// Get author social links from user meta
$author_twitter = get_the_author_meta( 'twitter', $author_id );
$author_facebook = get_the_author_meta( 'facebook', $author_id );
$author_linkedin = get_the_author_meta( 'linkedin', $author_id );
$author_github = get_the_author_meta( 'github', $author_id );
$author_website = get_the_author_meta( 'user_url', $author_id );

if ( empty( $author_bio ) ) {
return;
}
?>
<div class="sentinel-author-widget" data-aos="fade-up">
<div class="sentinel-author-card">
<div class="sentinel-author-avatar">
<a href="<?php echo esc_url( $author_posts_url ); ?>">
<?php echo $author_avatar; // phpcs:ignore -- Avatar is escaped ?>
</a>
</div>
<div class="sentinel-author-info">
<h3 class="sentinel-author-name">
<a href="<?php echo esc_url( $author_posts_url ); ?>"><?php echo esc_html( $author_name ); ?></a>
</h3>
<span class="sentinel-author-title"><?php esc_html_e( 'About the Author', 'generatepress' ); ?></span>
<p class="sentinel-author-bio"><?php echo esc_html( $author_bio ); ?></p>

<?php if ( $author_twitter || $author_facebook || $author_linkedin || $author_github || $author_website ) : ?>
<div class="sentinel-author-social">
<?php if ( $author_twitter ) : ?>
<a href="<?php echo esc_url( $author_twitter ); ?>" target="_blank" rel="noopener noreferrer" class="social-link twitter" aria-label="Twitter">
<i class="fab fa-twitter"></i>
</a>
<?php endif; ?>

<?php if ( $author_facebook ) : ?>
<a href="<?php echo esc_url( $author_facebook ); ?>" target="_blank" rel="noopener noreferrer" class="social-link facebook" aria-label="Facebook">
<i class="fab fa-facebook-f"></i>
</a>
<?php endif; ?>

<?php if ( $author_linkedin ) : ?>
<a href="<?php echo esc_url( $author_linkedin ); ?>" target="_blank" rel="noopener noreferrer" class="social-link linkedin" aria-label="LinkedIn">
<i class="fab fa-linkedin-in"></i>
</a>
<?php endif; ?>

<?php if ( $author_github ) : ?>
<a href="<?php echo esc_url( $author_github ); ?>" target="_blank" rel="noopener noreferrer" class="social-link github" aria-label="GitHub">
<i class="fab fa-github"></i>
</a>
<?php endif; ?>

<?php if ( $author_website ) : ?>
<a href="<?php echo esc_url( $author_website ); ?>" target="_blank" rel="noopener noreferrer" class="social-link website" aria-label="Website">
<i class="fas fa-globe"></i>
</a>
<?php endif; ?>
</div>
<?php endif; ?>

<div class="sentinel-author-posts-link">
<a href="<?php echo esc_url( $author_posts_url ); ?>">
<?php
printf(
/* translators: %s: author name */
esc_html__( 'View all posts by %s →', 'generatepress' ),
'<span>' . esc_html( $author_name ) . '</span>'
);
?>
</a>
</div>
</div>
</div>
</div>
<?php
}
endif;

/**
 * Add custom social fields to user profile
 */
function sentinel_reign_author_social_fields( $contactmethods ) {
// Remove default fields
unset( $contactmethods['yim'] );
unset( $contactmethods['aim'] );
unset( $contactmethods['jabber'] );

// Add new social fields
$contactmethods['twitter'] = __( 'Twitter Profile URL', 'generatepress' );
$contactmethods['facebook'] = __( 'Facebook Profile URL', 'generatepress' );
$contactmethods['linkedin'] = __( 'LinkedIn Profile URL', 'generatepress' );
$contactmethods['github'] = __( 'GitHub Profile URL', 'generatepress' );

return $contactmethods;
}
add_filter( 'user_contactmethods', 'sentinel_reign_author_social_fields' );
