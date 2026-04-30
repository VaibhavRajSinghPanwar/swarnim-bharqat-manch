<?php
/**
 * Page Template
 *
 * @package Swarnim Bharat Manch
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="container" style="padding: 60px 0;">
	<div class="row">
		<!-- Main Content -->
		<div class="<?php echo esc_attr( sbmanch_get_layout_class() ); ?>">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					?>
					<article <?php post_class( 'page-article' ); ?> id="post-<?php the_ID(); ?>">
						<!-- Page Header -->
						<header class="page-header" style="margin-bottom: 40px;">
							<h1 class="page-title" style="margin-bottom: 20px; color: var(--primary-color);">
								<?php the_title(); ?>
							</h1>
							<?php
							if ( get_the_excerpt() ) {
								?>
								<p class="page-subtitle" style="font-size: 1.1rem; color: var(--text-light); line-height: 1.8;">
									<?php the_excerpt(); ?>
								</p>
								<?php
							}
							?>
						</header>

						<!-- Featured Image -->
						<?php
						if ( has_post_thumbnail() ) {
							?>
							<div class="page-featured-image" style="margin-bottom: 40px;">
								<?php the_post_thumbnail( 'sbmanch-hero', array( 'alt' => get_the_title() ) ); ?>
							</div>
							<?php
						}
						?>

						<!-- Page Content -->
						<div class="page-content" style="color: var(--text-light); line-height: 1.8; margin: 30px 0;">
							<?php
							the_content();
							wp_link_pages( array(
								'before' => '<div class="link-pages" style="margin: 30px 0;">',
								'after'  => '</div>',
							) );
							?>
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
				<!-- Pages Widget -->
				<div class="widget" style="background: var(--background-light); padding: 20px; border-radius: 10px; margin-bottom: 30px;">
					<h3 class="widget-title" style="margin-bottom: 20px; border-bottom: 2px solid var(--primary-color); padding-bottom: 10px;">
						<?php esc_html_e( 'Pages', 'swarnim-bharat-manch' ); ?>
					</h3>
					<ul>
						<?php
						wp_list_pages( array(
							'title_li' => '',
						) );
						?>
					</ul>
				</div>

				<!-- About Website Widget -->
				<div class="widget" style="background: var(--primary-color); color: white; padding: 20px; border-radius: 10px; margin-bottom: 30px;">
					<h3 class="widget-title" style="margin-bottom: 15px; border-bottom: 2px solid rgba(255, 255, 255, 0.3); padding-bottom: 10px; color: white;">
						<?php esc_html_e( 'About Us', 'swarnim-bharat-manch' ); ?>
					</h3>
					<p style="color: rgba(255, 255, 255, 0.9); margin-bottom: 15px;">
						<?php echo wp_kses_post( wpautop( get_bloginfo( 'description' ) ) ); ?>
					</p>
					<a href="<?php echo esc_url( sbmanch_get_option( 'cta_url', '#donate' ) ); ?>" class="btn btn-primary" style="display: inline-block; margin-top: 10px;">
						<?php echo esc_html( sbmanch_get_option( 'cta_text', 'Donate Now' ) ); ?>
					</a>
				</div>

				<!-- Search Widget -->
				<div class="widget" style="background: var(--background-light); padding: 20px; border-radius: 10px;">
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
