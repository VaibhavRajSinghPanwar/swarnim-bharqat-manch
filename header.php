<?php
/**
 * Header Template
 *
 * @package Swarnim Bharat Manch
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
	?>

	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'swarnim-bharat-manch' ); ?></a>

	<!-- Header Section -->
	<header class="site-header" id="site-header">
		<div class="container">
			<div class="header-inner">
				<!-- Logo and Site Title -->
				<div class="site-logo">
					<?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					} else {
						?>
						<div class="site-title-wrapper">
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</h1>
						</div>
						<?php
					}
					?>
				</div>

				<!-- Mobile Menu Toggle -->
				<button class="menu-toggle" id="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<i class="fas fa-bars"></i>
				</button>

				<!-- Navigation and CTA -->
				<div class="header-nav-wrapper">
					<!-- Main Navigation -->
					<nav class="main-nav" aria-label="<?php esc_attr_e( 'Main Navigation', 'swarnim-bharat-manch' ); ?>">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'primary-menu',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'main-navigation',
							'container'      => false,
							'fallback_cb'    => 'sbmanch_fallback_menu',
							'walker'         => new SBMANCH_Nav_Walker(),
						) );
						?>
					</nav>

					<!-- CTA Button -->
					<a href="<?php echo esc_url( sbmanch_get_option( 'cta_url', '#donate' ) ); ?>" class="cta-button">
						<?php echo esc_html( sbmanch_get_option( 'cta_text', 'Donate Now' ) ); ?>
					</a>
				</div>
			</div>
		</div>
	</header>

	<!-- Main Content -->
	<main id="main" class="site-main">
