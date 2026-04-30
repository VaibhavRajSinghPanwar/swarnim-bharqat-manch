<?php
/**
 * 404 Error Page Template
 *
 * @package Swarnim Bharat Manch
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="container" style="padding: 100px 0;">
	<div style="text-align: center;">
		<!-- 404 Icon -->
		<div style="font-size: 120px; color: var(--primary-color); margin-bottom: 20px; opacity: 0.8;">
			<i class="fas fa-exclamation-triangle"></i>
		</div>

		<!-- 404 Title -->
		<h1 style="font-size: 3rem; color: var(--primary-color); margin-bottom: 15px;">
			<?php esc_html_e( '404', 'swarnim-bharat-manch' ); ?>
		</h1>

		<!-- 404 Subtitle -->
		<h2 style="font-size: 2rem; color: var(--text-dark); margin-bottom: 20px;">
			<?php esc_html_e( 'Page Not Found', 'swarnim-bharat-manch' ); ?>
		</h2>

		<!-- 404 Message -->
		<p style="color: var(--text-light); font-size: 1.1rem; margin-bottom: 30px; max-width: 500px; margin-left: auto; margin-right: auto;">
			<?php esc_html_e( 'Sorry, the page you are looking for might have been removed or is temporarily unavailable. Please try again or contact us if you need any assistance.', 'swarnim-bharat-manch' ); ?>
		</p>

		<!-- Search Form -->
		<div style="margin-bottom: 40px;">
			<?php get_search_form(); ?>
		</div>

		<!-- Action Buttons -->
		<div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
			<a href="<?php echo esc_url( home_url() ); ?>" class="cta-button">
				<i class="fas fa-home"></i> <?php esc_html_e( 'Go to Home', 'swarnim-bharat-manch' ); ?>
			</a>
			<a href="<?php echo esc_url( home_url( '/news' ) ); ?>" class="btn btn-secondary">
				<i class="fas fa-newspaper"></i> <?php esc_html_e( 'Latest News', 'swarnim-bharat-manch' ); ?>
			</a>
			<a href="<?php echo esc_url( home_url( '/projects' ) ); ?>" class="btn btn-secondary">
				<i class="fas fa-briefcase"></i> <?php esc_html_e( 'Our Projects', 'swarnim-bharat-manch' ); ?>
			</a>
		</div>

		<!-- Additional Links -->
		<div style="margin-top: 60px; padding-top: 30px; border-top: 1px solid var(--border-color);">
			<h3 style="color: var(--text-dark); margin-bottom: 20px;">
				<?php esc_html_e( 'Explore', 'swarnim-bharat-manch' ); ?>
			</h3>
			<ul style="list-style: none; display: flex; gap: 30px; justify-content: center; flex-wrap: wrap; color: var(--text-light);">
				<li><a href="<?php echo esc_url( home_url( '#about' ) ); ?>" style="color: var(--primary-color); text-decoration: none;"><i class="fas fa-info-circle"></i> <?php esc_html_e( 'About Us', 'swarnim-bharat-manch' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/events' ) ); ?>" style="color: var(--primary-color); text-decoration: none;"><i class="fas fa-calendar"></i> <?php esc_html_e( 'Events', 'swarnim-bharat-manch' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/gallery' ) ); ?>" style="color: var(--primary-color); text-decoration: none;"><i class="fas fa-images"></i> <?php esc_html_e( 'Gallery', 'swarnim-bharat-manch' ); ?></a></li>
				<li><a href="<?php echo esc_url( admin_url( 'admin-ajax.php?action=sbmanch_contact' ) ); ?>" style="color: var(--primary-color); text-decoration: none;"><i class="fas fa-envelope"></i> <?php esc_html_e( 'Contact', 'swarnim-bharat-manch' ); ?></a></li>
			</ul>
		</div>
	</div>
</div>

<?php
get_footer();
?>
