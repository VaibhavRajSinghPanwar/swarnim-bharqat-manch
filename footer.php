<?php
/**
 * Footer Template
 *
 * @package Swarnim Bharat Manch
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	</main><!-- #main -->

	<!-- Footer -->
	<footer class="site-footer">
		<div class="container">
			<!-- Footer Content -->
			<div class="footer-content">
				<!-- Widget Area 1 - About -->
				<div class="footer-widget footer-widget-1">
					<?php
					if ( is_active_sidebar( 'footer-1' ) ) {
						dynamic_sidebar( 'footer-1' );
					} else {
						?>
						<div class="widget about">
							<h3><?php echo esc_html( bloginfo( 'name' ) ); ?></h3>
							<p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
							<!-- Social Media Links -->
							<div class="social-links mt-3">
								<?php
								$facebook_url = sbmanch_get_option( 'facebook_url', 'https://facebook.com' );
								if ( $facebook_url ) {
									echo sprintf( '<a href="%s" class="social-link" target="_blank" rel="noopener noreferrer" title="Facebook"><i class="fab fa-facebook-f"></i></a>', esc_url( $facebook_url ) );
								}

								$twitter_url = sbmanch_get_option( 'twitter_url', 'https://twitter.com' );
								if ( $twitter_url ) {
									echo sprintf( '<a href="%s" class="social-link" target="_blank" rel="noopener noreferrer" title="Twitter"><i class="fab fa-twitter"></i></a>', esc_url( $twitter_url ) );
								}

								$linkedin_url = sbmanch_get_option( 'linkedin_url', 'https://linkedin.com' );
								if ( $linkedin_url ) {
									echo sprintf( '<a href="%s" class="social-link" target="_blank" rel="noopener noreferrer" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>', esc_url( $linkedin_url ) );
								}

								$instagram_url = sbmanch_get_option( 'instagram_url', 'https://instagram.com' );
								if ( $instagram_url ) {
									echo sprintf( '<a href="%s" class="social-link" target="_blank" rel="noopener noreferrer" title="Instagram"><i class="fab fa-instagram"></i></a>', esc_url( $instagram_url ) );
								}
								?>
							</div>
						</div>
						<?php
					}
					?>
				</div>

				<!-- Widget Area 2 -->
				<div class="footer-widget footer-widget-2">
					<?php
					if ( is_active_sidebar( 'footer-2' ) ) {
						dynamic_sidebar( 'footer-2' );
					} else {
						?>
						<div class="widget">
							<h3><?php esc_html_e( 'Quick Links', 'swarnim-bharat-manch' ); ?></h3>
							<ul>
								<li><a href="<?php echo esc_url( home_url( '#about' ) ); ?>"><?php esc_html_e( 'About', 'swarnim-bharat-manch' ); ?></a></li>
								<li><a href="<?php echo esc_url( home_url( '/news' ) ); ?>"><?php esc_html_e( 'News', 'swarnim-bharat-manch' ); ?></a></li>
								<li><a href="<?php echo esc_url( home_url( '/projects' ) ); ?>"><?php esc_html_e( 'Projects', 'swarnim-bharat-manch' ); ?></a></li>
								<li><a href="<?php echo esc_url( home_url( '/events' ) ); ?>"><?php esc_html_e( 'Events', 'swarnim-bharat-manch' ); ?></a></li>
							</ul>
						</div>
						<?php
					}
					?>
				</div>

				<!-- Widget Area 3 - Contact Info -->
				<div class="footer-widget footer-widget-3">
					<?php
					if ( is_active_sidebar( 'footer-3' ) ) {
						dynamic_sidebar( 'footer-3' );
					} else {
						$contact_email   = sbmanch_get_option( 'contact_email', 'info@example.com' );
						$contact_phone   = sbmanch_get_option( 'contact_phone', '+91 98765 43210' );
						$contact_address = sbmanch_get_option( 'contact_address', 'Swarnim Bharat, India' );
						?>
						<div class="widget">
							<h3><?php esc_html_e( 'Contact Info', 'swarnim-bharat-manch' ); ?></h3>
							<div class="footer-contact">
								<?php if ( $contact_email ) { ?>
									<div class="contact-item">
										<div class="contact-icon">
											<i class="fas fa-envelope"></i>
										</div>
										<div class="contact-text">
											<a href="mailto:<?php echo esc_attr( $contact_email ); ?>">
												<?php echo esc_html( $contact_email ); ?>
											</a>
										</div>
									</div>
								<?php } ?>

								<?php if ( $contact_phone ) { ?>
									<div class="contact-item">
										<div class="contact-icon">
											<i class="fas fa-phone"></i>
										</div>
										<div class="contact-text">
											<a href="tel:<?php echo esc_attr( $contact_phone ); ?>">
												<?php echo esc_html( $contact_phone ); ?>
											</a>
										</div>
									</div>
								<?php } ?>

								<?php if ( $contact_address ) { ?>
									<div class="contact-item">
										<div class="contact-icon">
											<i class="fas fa-map-marker-alt"></i>
										</div>
										<div class="contact-text">
											<?php echo esc_html( $contact_address ); ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
						<?php
					}
					?>
				</div>

				<!-- Widget Area 4 -->
				<div class="footer-widget footer-widget-4">
					<?php
					if ( is_active_sidebar( 'footer-4' ) ) {
						dynamic_sidebar( 'footer-4' );
					} else {
						?>
						<div class="widget">
							<h3><?php esc_html_e( 'Support Us', 'swarnim-bharat-manch' ); ?></h3>
							<p><?php esc_html_e( 'Make a difference in someone\'s life today. Donate to support our mission.', 'swarnim-bharat-manch' ); ?></p>
							<a href="<?php echo esc_url( sbmanch_get_option( 'cta_url', '#donate' ) ); ?>" class="cta-button" style="display: inline-block; margin-top: 10px;">
								<?php echo esc_html( sbmanch_get_option( 'cta_text', 'Donate Now' ) ); ?>
							</a>
						</div>
						<?php
					}
					?>
				</div>
			</div>

			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="copyright">
					<?php
					$copyright_text = sbmanch_get_option( 'copyright_text', sprintf( '&copy; %s Swarnim Bharat Manch. All Rights Reserved.', date( 'Y' ) ) );
					echo wp_kses_post( $copyright_text );
					?>
				</div>

				<div class="footer-menu">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-menu',
						'menu_id'        => 'footer-menu',
						'menu_class'     => 'footer-nav',
						'container'      => false,
						'fallback_cb'    => '',
						'depth'          => 1,
						'echo'           => true,
					) );
					?>
				</div>
			</div>
		</div>
	</footer><!-- .site-footer -->

	<?php wp_footer(); ?>

	<!-- Custom Navigation Walker -->
	<?php
	if ( ! class_exists( 'SBMANCH_Nav_Walker' ) ) {
		class SBMANCH_Nav_Walker extends Walker_Nav_Menu {
			function start_lvl( &$output, $depth = 0, $args = null ) {
				$indent = str_repeat( "\t", $depth );
				$output .= "\n$indent<ul class=\"submenu\">\n";
			}

			function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'menu-item';

				if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-parent', $classes ) ) {
					$classes[] = 'active';
				}

				$class_names = join( ' ', apply_filters( 'nav_menu_item_class', $classes, $item, $args, $depth ) );
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= $indent . '<li' . $id . $class_names . '>';

				$atts = array();
				$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
				$atts['target'] = ! empty( $item->target ) ? $item->target : '';
				$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
				$atts['href']   = ! empty( $item->url ) ? $item->url : '';

				$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

				$attributes = '';
				foreach ( $atts as $attr => $value ) {
					if ( ! empty( $value ) ) {
						$value      = 'href' === $attr ? $value : esc_attr( $value );
						$attributes .= ' ' . $attr . '="' . $value . '"';
					}
				}

				$title = apply_filters( 'nav_menu_item_title', $item->title, $item, $args, $depth );
				$title = apply_filters( 'nav_menu_link_attributes', $title, $item, $args, $depth );

				$item_output = $args->before;
				$item_output .= '<a' . $attributes . '>';
				$item_output .= $args->link_before . $title . $args->link_after;
				$item_output .= '</a>';
				$item_output .= $args->after;

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}
		}
	}
	?>

	<!-- Fallback Menu Function -->
	<?php
	if ( ! function_exists( 'sbmanch_fallback_menu' ) ) {
		function sbmanch_fallback_menu() {
			?>
			<ul class="main-navigation">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'swarnim-bharat-manch' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '#about' ) ); ?>"><?php esc_html_e( 'About', 'swarnim-bharat-manch' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/news' ) ); ?>"><?php esc_html_e( 'News', 'swarnim-bharat-manch' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/projects' ) ); ?>"><?php esc_html_e( 'Projects', 'swarnim-bharat-manch' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/events' ) ); ?>"><?php esc_html_e( 'Events', 'swarnim-bharat-manch' ); ?></a></li>
			</ul>
			<?php
		}
	}
	?>

</body>
</html>
