<?php
/**
 * Search Results Template
 *
 * @package Swarnim Bharat Manch
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="container" style="padding: 60px 0;">
	<header class="archive-header" style="margin-bottom: 50px; text-align: center;">
		<h1 class="archive-title" style="font-size: 2.5rem; margin-bottom: 15px; color: var(--primary-color);">
			<?php echo esc_html__( 'Search Results for: ', 'swarnim-bharat-manch' ) . '<em>' . esc_html( get_search_query() ) . '</em>'; ?>
		</h1>
		<p class="archive-subtitle" style="color: var(--text-light); font-size: 1.1rem;">
			<?php
			$query = get_search_query();
			$found = $GLOBALS['wp_query']->found_posts;
			echo sprintf( esc_html__( 'Found %d result(s)', 'swarnim-bharat-manch' ), $found );
			?>
		</p>
	</header>

	<div class="row">
		<!-- Main Content -->
		<div class="<?php echo esc_attr( sbmanch_get_layout_class() ); ?>">
			<?php
			if ( have_posts() ) {
				?>
				<div class="blog-grid" style="grid-template-columns: 1fr;">
					<?php
					while ( have_posts() ) {
						the_post();
						?>
						<article class="post-card">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="post-image">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'sbmanch-blog' ); ?>
									</a>
									<span class="post-meta">
										<?php echo esc_html( get_post_type() ); ?>
									</span>
								</div>
							<?php } ?>
							<div class="post-content">
								<div class="post-date">
									<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
								</div>
								<h3 class="post-title">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h3>
								<p class="post-excerpt">
									<?php
									// Highlight search term in excerpt
									$excerpt = get_the_excerpt();
									$search_term = get_search_query();
									$highlighted = str_ireplace( $search_term, '<strong style="color: var(--secondary-color);">' . $search_term . '</strong>', $excerpt );
									echo wp_kses_post( $highlighted );
									?>
								</p>
								<a href="<?php the_permalink(); ?>" class="read-more">
									<?php esc_html_e( 'Read More', 'swarnim-bharat-manch' ); ?>
									<i class="fas fa-arrow-right"></i>
								</a>
							</div>
						</article>
						<?php
					}
					?>
				</div>

				<!-- Pagination -->
				<div class="pagination" style="margin-top: 50px; display: flex; justify-content: center; gap: 10px;">
					<?php
					echo wp_kses_post( paginate_links( array(
						'type'      => 'list',
						'prev_text' => '<i class="fas fa-chevron-left"></i> ' . esc_html__( 'Previous', 'swarnim-bharat-manch' ),
						'next_text' => esc_html__( 'Next', 'swarnim-bharat-manch' ) . ' <i class="fas fa-chevron-right"></i>',
					) ) );
					?>
				</div>
				<?php
			} else {
				?>
				<div class="no-posts" style="text-align: center; padding: 60px 0;">
					<i class="fas fa-search" style="font-size: 60px; color: var(--text-light); margin-bottom: 20px; display: block;"></i>
					<h2 style="color: var(--text-dark); margin-bottom: 15px;">
						<?php esc_html_e( 'No Results Found', 'swarnim-bharat-manch' ); ?>
					</h2>
					<p style="color: var(--text-light); margin-bottom: 30px;">
						<?php echo esc_html__( 'Sorry, we couldn\'t find any results for "', 'swarnim-bharat-manch' ) . esc_html( get_search_query() ) . esc_html__( '"', 'swarnim-bharat-manch' ); ?>
					</p>
					<p style="color: var(--text-light); margin-bottom: 30px;">
						<?php esc_html_e( 'Try using different keywords or check back later.', 'swarnim-bharat-manch' ); ?>
					</p>
					<a href="<?php echo esc_url( home_url() ); ?>" class="cta-button">
						<?php esc_html_e( 'Go to Home', 'swarnim-bharat-manch' ); ?>
					</a>
				</div>
				<?php
			}
			?>
		</div>

		<!-- Sidebar -->
		<?php if ( sbmanch_has_sidebar() ) : ?>
		<div class="<?php echo esc_attr( sbmanch_get_sidebar_class() ); ?>">
			<aside class="sidebar">
				<!-- Search Widget -->
				<div class="widget" style="background: var(--background-light); padding: 20px; border-radius: 10px; margin-bottom: 30px;">
					<h3 class="widget-title" style="margin-bottom: 15px; color: var(--primary-color);">
						<?php esc_html_e( 'Search Again', 'swarnim-bharat-manch' ); ?>
					</h3>
					<?php get_search_form(); ?>
				</div>

				<!-- Categories Widget -->
				<div class="widget" style="background: var(--background-light); padding: 20px; border-radius: 10px; margin-bottom: 30px;">
					<h3 class="widget-title" style="margin-bottom: 20px; border-bottom: 2px solid var(--primary-color); padding-bottom: 10px;">
						<?php esc_html_e( 'Browse by Category', 'swarnim-bharat-manch' ); ?>
					</h3>
					<ul style="list-style: none;">
						<?php
						$categories = get_categories();
						foreach ( $categories as $category ) {
							echo '<li style="margin-bottom: 8px;"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" style="color: var(--text-light); text-decoration: none;">' . esc_html( $category->name ) . '</a></li>';
						}
						?>
					</ul>
				</div>

				<!-- Recent Posts Widget -->
				<div class="widget" style="background: var(--background-light); padding: 20px; border-radius: 10px; margin-bottom: 30px;">
					<h3 class="widget-title" style="margin-bottom: 20px; border-bottom: 2px solid var(--primary-color); padding-bottom: 10px;">
						<?php esc_html_e( 'Recent Posts', 'swarnim-bharat-manch' ); ?>
					</h3>
					<ul style="list-style: none;">
						<?php
						$recent_posts = get_posts( array(
							'posts_per_page' => 5,
						) );

						foreach ( $recent_posts as $post ) {
							setup_postdata( $post );
							?>
							<li style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid rgba(0,0,0,0.1);">
								<a href="<?php the_permalink(); ?>" style="font-weight: 600; color: var(--text-dark); text-decoration: none;">
									<?php the_title(); ?>
								</a>
								<div style="font-size: 0.85rem; color: var(--text-light); margin-top: 5px;">
									<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
								</div>
							</li>
							<?php
						}
						wp_reset_postdata();
						?>
					</ul>
				</div>

				<!-- CTA Widget -->
				<div class="widget" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white; padding: 20px; border-radius: 10px;">
					<h3 class="widget-title" style="margin-bottom: 15px; border-bottom: 1px solid rgba(255, 255, 255, 0.3); padding-bottom: 10px; color: white;">
						<?php esc_html_e( 'Work With Us', 'swarnim-bharat-manch' ); ?>
					</h3>
					<p style="color: rgba(255, 255, 255, 0.95); margin-bottom: 15px;">
						<?php esc_html_e( 'Want to make a difference? Join our team or volunteer with us.', 'swarnim-bharat-manch' ); ?>
					</p>
					<a href="<?php echo esc_url( sbmanch_get_option( 'cta_url', '#donate' ) ); ?>" class="cta-button" style="display: inline-block; margin-top: 10px; background: white; color: var(--primary-color);">
						<?php echo esc_html( sbmanch_get_option( 'cta_text', 'Get Involved' ) ); ?>
					</a>
				</div>
			</aside>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
?>
