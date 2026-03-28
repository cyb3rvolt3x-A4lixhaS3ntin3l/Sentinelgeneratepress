<?php
/**
 * Template Name: Advanced Homepage
 * Custom homepage for SentinelReign with featured posts, most viewed, recent posts, and founder section
 *
 * @package GeneratePress
 * @subpackage SentinelReign_Customization
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

// Get theme options
$show_featured = get_option( 'sentinel_show_featured', true );
$featured_count = get_option( 'sentinel_featured_count', 3 );
$show_most_viewed = get_option( 'sentinel_show_most_viewed', true );
$most_viewed_count = get_option( 'sentinel_most_viewed_count', 5 );
$founder_name = get_option( 'sentinel_founder_name', 'Syed Abrar' );
$founder_bio = get_option( 'sentinel_founder_bio', '' );
$founder_image = get_option( 'sentinel_founder_image', '' );

// About Us Section Options
$about_us_title = get_option( 'sentinel_about_us_title', 'About SentinelReign' );
$about_us_content = get_option( 'sentinel_about_us_content', '' );
$team_members_json = get_option( 'sentinel_team_members', '' );
$team_members = is_array( $team_members_json ) ? $team_members_json : json_decode( $team_members_json, true );
?>

<div <?php generate_do_attr( 'content' ); ?>>
	<main <?php generate_do_attr( 'main' ); ?>>
		
		<?php do_action( 'generate_before_main_content' ); ?>
		
		<!-- Hero Section -->
		<section class="sentinel-hero" data-aos="fade-down">
			<div class="sentinel-hero-content">
				<h1 class="sentinel-hero-title">Welcome to <span class="highlight">SentinelReign</span></h1>
				<p class="sentinel-hero-subtitle">Your premier destination for Technology, Science, AI, Cybersecurity, Programming, Poetry, Self-Improvement, and more.</p>
				<div class="sentinel-hero-cta">
					<a href="#latest-posts" class="btn-primary">Explore Articles</a>
					<a href="#featured" class="btn-secondary">Featured Posts</a>
				</div>
			</div>
		</section>

		<!-- About Us Section -->
		<?php if ( ! empty( $about_us_content ) ) : ?>
		<section class="sentinel-about-section" data-aos="fade-up">
			<div class="sentinel-container">
				<div class="section-header">
					<h2 class="section-title"><?php echo esc_html( $about_us_title ); ?></h2>
					<span class="section-divider"></span>
				</div>
				<div class="about-us-content">
					<p><?php echo esc_html( $about_us_content ); ?></p>
				</div>
			</div>
		</section>
		<?php endif; ?>

		<!-- Team Section -->
		<?php if ( ! empty( $team_members ) && is_array( $team_members ) ) : ?>
		<section class="sentinel-team-section" data-aos="fade-up">
			<div class="sentinel-container">
				<div class="section-header">
					<h2 class="section-title">Meet Our Team</h2>
					<span class="section-divider"></span>
				</div>
				<div class="sentinel-grid sentinel-grid-4 team-grid">
					<?php foreach ( $team_members as $member ) : 
						if ( empty( $member['name'] ) ) continue;
						$member_image = ! empty( $member['image'] ) ? $member['image'] : '';
						$member_role = ! empty( $member['role'] ) ? $member['role'] : 'Team Member';
						$member_bio = ! empty( $member['bio'] ) ? $member['bio'] : '';
						$member_social = ! empty( $member['social'] ) ? $member['social'] : array();
					?>
					<div class="team-member-card">
						<div class="team-member-image">
							<?php if ( $member_image ) : ?>
								<img src="<?php echo esc_url( $member_image ); ?>" alt="<?php echo esc_attr( $member['name'] ); ?>" loading="lazy" />
							<?php else : ?>
								<div class="team-member-placeholder">
									<i class="fas fa-user"></i>
								</div>
							<?php endif; ?>
						</div>
						<div class="team-member-info">
							<h3 class="team-member-name"><?php echo esc_html( $member['name'] ); ?></h3>
							<span class="team-member-role"><?php echo esc_html( $member_role ); ?></span>
							<?php if ( $member_bio ) : ?>
								<p class="team-member-bio"><?php echo esc_html( $member_bio ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $member_social ) ) : ?>
								<div class="team-member-social">
									<?php if ( ! empty( $member_social['twitter'] ) ) : ?>
										<a href="<?php echo esc_url( $member_social['twitter'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
											<i class="fab fa-twitter"></i>
										</a>
									<?php endif; ?>
									<?php if ( ! empty( $member_social['linkedin'] ) ) : ?>
										<a href="<?php echo esc_url( $member_social['linkedin'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
											<i class="fab fa-linkedin-in"></i>
										</a>
									<?php endif; ?>
									<?php if ( ! empty( $member_social['github'] ) ) : ?>
										<a href="<?php echo esc_url( $member_social['github'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
											<i class="fab fa-github"></i>
										</a>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php endif; ?>

		<!-- Founder Section -->
		<?php if ( ! empty( $founder_bio ) || ! empty( $founder_image ) ) : ?>
		<section class="sentinel-founder-section" data-aos="fade-up">
			<div class="sentinel-container">
				<div class="sentinel-founder-card">
					<?php if ( ! empty( $founder_image ) ) : ?>
					<div class="sentinel-founder-image">
						<img src="<?php echo esc_url( $founder_image ); ?>" alt="<?php echo esc_attr( $founder_name ); ?>" loading="lazy" />
					</div>
					<?php endif; ?>
					<div class="sentinel-founder-info">
						<h2 class="sentinel-founder-name"><?php echo esc_html( $founder_name ); ?></h2>
						<span class="sentinel-founder-title">Founder & Editor-in-Chief</span>
						<p class="sentinel-founder-bio"><?php echo esc_html( $founder_bio ); ?></p>
						<div class="sentinel-founder-social">
							<?php
							$social_links = get_option( 'sentinel_social_links', array() );
							if ( ! empty( $social_links ) && is_array( $social_links ) ) :
								foreach ( $social_links as $platform => $url ) :
									if ( ! empty( $url ) ) :
										$icon_class = '';
										switch ( $platform ) {
											case 'twitter': $icon_class = 'twitter'; break;
											case 'facebook': $icon_class = 'facebook'; break;
											case 'linkedin': $icon_class = 'linkedin'; break;
											case 'github': $icon_class = 'github'; break;
											case 'youtube': $icon_class = 'youtube'; break;
										}
										?>
										<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" class="social-link <?php echo esc_attr( $icon_class ); ?>" aria-label="<?php echo esc_attr( $platform ); ?>">
											<span class="screen-reader-text"><?php echo esc_html( ucfirst( $platform ) ); ?></span>
											<i class="fab fa-<?php echo esc_attr( $icon_class ); ?>"></i>
										</a>
										<?php
									endif;
								endforeach;
							endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>

		<!-- Featured Posts Section -->
		<?php if ( $show_featured ) :
			$featured_args = array(
				'post_type'      => 'post',
				'posts_per_page' => absint( $featured_count ),
				'meta_key'       => '_thumbnail_id',
				'tax_query'      => array(
					array(
						'taxonomy' => 'post_tag',
						'field'    => 'slug',
						'terms'    => 'featured',
					),
				),
			);
			
			// Fallback to sticky posts if no featured tag posts
			if ( ! get_posts( $featured_args ) ) {
				$featured_args = array(
					'post_type'      => 'post',
					'posts_per_page' => absint( $featured_count ),
					'post__in'       => get_option( 'sticky_posts' ),
				);
			}
			
			$featured_query = new WP_Query( $featured_args );
			
			if ( $featured_query->have_posts() ) :
		?>
		<section id="featured" class="sentinel-featured-section" data-aos="fade-up">
			<div class="sentinel-container">
				<div class="section-header">
					<h2 class="section-title">Featured Posts</h2>
					<span class="section-divider"></span>
				</div>
				<div class="sentinel-grid sentinel-grid-3">
					<?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'sentinel-card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
						<div class="sentinel-card-image">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy', 'class' => 'card-thumbnail' ) ); ?>
							</a>
							<span class="featured-badge">Featured</span>
						</div>
						<?php else : ?>
						<div class="sentinel-card-image sentinel-card-image-fallback">
							<a href="<?php the_permalink(); ?>">
								<div class="fallback-placeholder">
									<span class="category-badge"><?php echo esc_html( get_the_category()[0]->name ?? 'Article' ); ?></span>
								</div>
							</a>
						</div>
						<?php endif; ?>
						<div class="sentinel-card-content">
							<div class="sentinel-card-meta">
								<span class="post-category"><?php echo esc_html( get_the_category()[0]->name ?? 'Uncategorized' ); ?></span>
								<span class="post-date"><?php echo get_the_date(); ?></span>
							</div>
							<h3 class="sentinel-card-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<p class="sentinel-card-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
							<div class="sentinel-card-footer">
								<div class="author-info">
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 32, '', '', array( 'class' => 'author-avatar' ) ); ?>
									<span class="author-name"><?php the_author(); ?></span>
								</div>
								<a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
							</div>
						</div>
					</article>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
		<?php endif; endif; ?>

		<!-- Most Viewed Posts Section -->
		<?php if ( $show_most_viewed ) :
			// Try to get most viewed using post meta (for sites with view tracking)
			$most_viewed_args = array(
				'post_type'      => 'post',
				'posts_per_page' => absint( $most_viewed_count ),
				'meta_key'       => 'post_views_count',
				'orderby'        => 'meta_value_num',
				'order'          => 'DESC',
			);
			
			// Fallback to popular posts by comments if no view count
			if ( ! get_posts( $most_viewed_args ) ) {
				$most_viewed_args = array(
					'post_type'      => 'post',
					'posts_per_page' => absint( $most_viewed_count ),
					'orderby'        => 'comment_count',
					'order'          => 'DESC',
				);
			}
			
			$most_viewed_query = new WP_Query( $most_viewed_args );
			
			if ( $most_viewed_query->have_posts() ) :
		?>
		<section class="sentinel-most-viewed-section" data-aos="fade-up">
			<div class="sentinel-container">
				<div class="section-header">
					<h2 class="section-title">Most Popular</h2>
					<span class="section-divider"></span>
				</div>
				<div class="sentinel-list-layout">
					<?php $counter = 1; while ( $most_viewed_query->have_posts() ) : $most_viewed_query->the_post(); ?>
					<article class="sentinel-list-item">
						<span class="list-number"><?php echo esc_html( $counter++ ); ?></span>
						<?php if ( has_post_thumbnail() ) : ?>
						<div class="list-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'thumbnail', array( 'loading' => 'lazy' ) ); ?>
							</a>
						</div>
						<?php endif; ?>
						<div class="list-content">
							<div class="list-meta">
								<span class="list-category"><?php echo esc_html( get_the_category()[0]->name ?? 'Uncategorized' ); ?></span>
							</div>
							<h3 class="list-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<div class="list-footer">
								<span class="list-author"><?php the_author(); ?></span>
								<span class="list-date"><?php echo get_the_date(); ?></span>
							</div>
						</div>
					</article>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
		<?php endif; endif; ?>

		<!-- Categories Section -->
		<section class="sentinel-categories-section" data-aos="fade-up">
			<div class="sentinel-container">
				<div class="section-header">
					<h2 class="section-title">Explore by Category</h2>
					<span class="section-divider"></span>
				</div>
				<div class="sentinel-category-grid">
					<?php
					$categories = get_categories( array(
						'number'   => 12,
						'orderby'  => 'count',
						'order'    => 'DESC',
					) );
					
					foreach ( $categories as $category ) :
						$cat_color = '';
						switch ( strtolower( $category->name ) ) {
							case 'technology': $cat_color = '#3b82f6'; break;
							case 'ai': $cat_color = '#8b5cf6'; break;
							case 'cybersecurity': $cat_color = '#ef4444'; break;
							case 'programming': $cat_color = '#10b981'; break;
							case 'science': $cat_color = '#f59e0b'; break;
							case 'poetry': $cat_color = '#ec4899'; break;
							default: $cat_color = '#6b7280';
						}
					?>
					<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="sentinel-category-card" style="border-left-color: <?php echo esc_attr( $cat_color ); ?>;">
						<h3><?php echo esc_html( $category->name ); ?></h3>
						<span class="category-count"><?php echo esc_html( $category->count ); ?> posts</span>
					</a>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<!-- Latest Posts Section with Pagination -->
		<section id="latest-posts" class="sentinel-latest-section" data-aos="fade-up">
			<div class="sentinel-container">
				<div class="section-header">
					<h2 class="section-title">Latest Articles</h2>
					<span class="section-divider"></span>
				</div>
				
				<div class="sentinel-grid sentinel-grid-3">
					<?php
					// Pagination setup
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					
					$latest_args = array(
						'post_type'      => 'post',
						'posts_per_page' => 9,
						'paged'          => $paged,
						'post_status'    => 'publish',
					);
					
					// Exclude featured posts from latest if showing featured section
					if ( $show_featured && $featured_query->have_posts() ) {
						$featured_ids = $featured_query->posts;
						$latest_args['post__not_in'] = wp_list_pluck( $featured_ids, 'ID' );
					}
					
					$latest_query = new WP_Query( $latest_args );
					
					if ( $latest_query->have_posts() ) :
						while ( $latest_query->have_posts() ) : $latest_query->the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'sentinel-card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
						<div class="sentinel-card-image">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy', 'class' => 'card-thumbnail' ) ); ?>
							</a>
						</div>
						<?php else : ?>
						<div class="sentinel-card-image sentinel-card-image-fallback">
							<a href="<?php the_permalink(); ?>">
								<div class="fallback-placeholder">
									<span class="category-badge"><?php echo esc_html( get_the_category()[0]->name ?? 'Article' ); ?></span>
								</div>
							</a>
						</div>
						<?php endif; ?>
						<div class="sentinel-card-content">
							<div class="sentinel-card-meta">
								<span class="post-category"><?php echo esc_html( get_the_category()[0]->name ?? 'Uncategorized' ); ?></span>
								<span class="post-date"><?php echo get_the_date(); ?></span>
							</div>
							<h3 class="sentinel-card-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<p class="sentinel-card-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
							<div class="sentinel-card-footer">
								<div class="author-info">
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 32, '', '', array( 'class' => 'author-avatar' ) ); ?>
									<span class="author-name"><?php the_author(); ?></span>
								</div>
								<a href="<?php the_permalink(); ?>" class="read-more">Read More →</a>
							</div>
						</div>
					</article>
					<?php
						endwhile;
						
						// Pagination
						echo '<div class="sentinel-pagination">';
						echo paginate_links( array(
							'total'     => $latest_query->max_num_pages,
							'current'   => $paged,
							'prev_text' => '&larr; Previous',
							'next_text' => 'Next &rarr;',
							'type'      => 'list',
						) );
						echo '</div>';
						
						wp_reset_postdata();
					else :
					?>
					<div class="no-posts-found">
						<p>No articles found. Check back soon for new content!</p>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<!-- Newsletter CTA Section -->
		<section class="sentinel-newsletter-section" data-aos="zoom-in">
			<div class="sentinel-container">
				<div class="newsletter-content">
					<h2>Stay Updated</h2>
					<p>Subscribe to our newsletter for the latest articles on technology, science, AI, and more.</p>
					<form class="newsletter-form" action="#" method="post">
						<input type="email" name="email" placeholder="Enter your email address" required />
						<button type="submit" class="btn-subscribe">Subscribe</button>
					</form>
				</div>
			</div>
		</section>

		<?php do_action( 'generate_after_main_content' ); ?>
		
	</main>
</div>

<?php
do_action( 'generate_after_primary_content_area' );
generate_construct_sidebars();
get_footer();
