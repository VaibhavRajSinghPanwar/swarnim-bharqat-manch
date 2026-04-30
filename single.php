<?php
/**
 * Single Post Template
 *
 * @package Swarnim Bharat Manch
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="container">
	<div class="row">
		<!-- Main Content -->
		<div class="<?php echo esc_attr( sbmanch_get_layout_class() ); ?>">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					?>
					<article <?php post_class( 'post-article' ); ?> id="post-<?php the_ID(); ?>">
						<!-- Featured Image -->
						<?php
						if ( has_post_thumbnail() ) {
							?>
							<div class="post-featured-image">
								<?php the_post_thumbnail( 'sbmanch-hero', array( 'alt' => get_the_title() ) ); ?>
							</div>
							<?php
						}
						?>

						<!-- Post Header -->
						<header class="post-header" style="margin: 40px 0;">
							<h1 class="post-title" style="margin-bottom: 15px;">
								<?php the_title(); ?>
							</h1>
							<div class="post-meta" style="color: var(--text-light); margin-bottom: 20px;">
								<span class="post-date">
									<i class="fas fa-calendar"></i>
									<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
								</span>
								<span class="post-author" style="margin-left: 20px;">
									<i class="fas fa-user"></i>
									<?php the_author(); ?>
								</span>
								<?php
								$categories = get_the_terms( get_the_ID(), 'category' );
								if ( $categories && ! is_wp_error( $categories ) ) {
									echo '<span class="post-categories" style="margin-left: 20px;"><i class="fas fa-folder"></i>';
									foreach ( $categories as $category ) {
										echo ' <a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
									}
									echo '</span>';
								}
								?>
								<span class="post-comments-count" style="margin-left: 20px;">
									<i class="fas fa-comments"></i>
									<?php comments_number( esc_html__( 'No Comments', 'swarnim-bharat-manch' ), esc_html__( '1 Comment', 'swarnim-bharat-manch' ), esc_html__( '% Comments', 'swarnim-bharat-manch' ) ); ?>
								</span>
							</div>
						</header>

						<!-- Post Content -->
						<div class="post-content" style="color: var(--text-light); line-height: 1.8; margin: 30px 0;">
							<?php
							the_content();
							wp_link_pages( array(
								'before' => '<div class="link-pages" style="margin: 30px 0;">',
								'after'  => '</div>',
							) );
							?>
						</div>

						<!-- Post Tags -->
						<?php
						$tags = get_the_tags();
						if ( $tags && ! is_wp_error( $tags ) ) {
							?>
							<div class="post-tags" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border-color);">
								<strong><?php esc_html_e( 'Tags: ', 'swarnim-bharat-manch' ); ?></strong>
								<?php
								foreach ( $tags as $tag ) {
									echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="tag-link" style="display: inline-block; background: var(--primary-color); color: white; padding: 5px 12px; border-radius: 20px; margin: 5px 5px 5px 0; text-decoration: none;">' . esc_html( $tag->name ) . '</a>';
								}
								?>
							</div>
							<?php
						}
						?>

						<!-- Post Navigation -->
						<div class="post-navigation" style="margin: 40px 0; padding: 20px 0; border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between;">
							<div class="prev-post">
								<?php
								$prev_post = get_previous_post();
								if ( ! empty( $prev_post ) ) {
									echo '<a href="' . esc_url( get_permalink( $prev_post->ID ) ) . '" class="prev-link"><i class="fas fa-arrow-left"></i> ' . esc_html__( 'Previous Post', 'swarnim-bharat-manch' ) . '</a>';
								}
								?>
							</div>
							<div class="home-link">
								<a href="<?php echo esc_url( home_url() ); ?>" class="home-btn"><i class="fas fa-home"></i></a>
							</div>
							<div class="next-post" style="text-align: right;">
								<?php
								$next_post = get_next_post();
								if ( ! empty( $next_post ) ) {
									echo '<a href="' . esc_url( get_permalink( $next_post->ID ) ) . '" class="next-link">' . esc_html__( 'Next Post', 'swarnim-bharat-manch' ) . ' <i class="fas fa-arrow-right"></i></a>';
								}
								?>
							</div>
						</div>
					</article>

					<!-- Comments Section -->
					<?php
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					?>

					<?php
				}
			}
			?>
		</div>

		<!-- Sidebar -->
		<?php if ( sbmanch_has_sidebar() ) : ?>
		<div class="<?php echo esc_attr( sbmanch_get_sidebar_class() ); ?>">
			<aside class="sidebar">
				<!-- Recent Posts Widget -->
				<div class="widget" style="background: var(--background-light); padding: 20px; border-radius: 10px; margin-bottom: 30px;">
					<h3 class="widget-title" style="margin-bottom: 20px; border-bottom: 2px solid var(--primary-color); padding-bottom: 10px;">
						<?php esc_html_e( 'Recent Posts', 'swarnim-bharat-manch' ); ?>
					</h3>
					<ul style="list-style: none;">
						<?php
						$recent_posts = get_posts( array(
							'posts_per_page' => 5,
							'post__not_in'   => array( get_the_ID() ),
						) );

						foreach ( $recent_posts as $post ) {
							setup_postdata( $post );
							?>
							<li style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid rgba(0,0,0,0.1);">
								<a href="<?php the_permalink(); ?>" style="font-weight: 600;">
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

				<!-- Categories Widget -->
				<div class="widget" style="background: var(--background-light); padding: 20px; border-radius: 10px; margin-bottom: 30px;">
					<h3 class="widget-title" style="margin-bottom: 20px; border-bottom: 2px solid var(--primary-color); padding-bottom: 10px;">
						<?php esc_html_e( 'Categories', 'swarnim-bharat-manch' ); ?>
					</h3>
					<ul>
						<?php
						wp_list_categories( array(
							'title_li' => '',
						) );
						?>
					</ul>
				</div>

				<!-- Search Widget -->
				<div class="widget" style="background: var(--background-light); padding: 20px; border-radius: 10px; margin-bottom: 30px;">
					<?php get_search_form(); ?>
				</div>
			</aside>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
?>
