<?php
/**
 * Front Page / Homepage Template
 *
 * @package Swarnim Bharat Manch
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<!-- Hero Section with Slider -->
<section class="hero-section">
	<div class="container">
		<div class="hero-content">
			<h1 class="hero-title">
				<?php echo esc_html( get_theme_mod( 'sbmanch_hero_title', 'Welcome to Swarnim Bharat Manch' ) ); ?>
			</h1>
			<p class="hero-subtitle">
				<?php echo esc_html( get_theme_mod( 'sbmanch_hero_subtitle', 'Making a positive impact in our community' ) ); ?>
			</p>
			<div class="hero-buttons">
				<a href="<?php echo esc_url( sbmanch_get_option( 'cta_url', '#donate' ) ); ?>" class="btn btn-primary">
					<?php echo esc_html( sbmanch_get_option( 'cta_text', 'Donate Now' ) ); ?>
				</a>
				<a href="#about" class="btn btn-secondary">
					<?php esc_html_e( 'Learn More', 'swarnim-bharat-manch' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- About Section -->
<section class="about-section" id="about">
	<div class="container">
		<div class="section-title">
			<h2><?php echo esc_html( sbmanch_get_option( 'about_title', 'About Our NGO' ) ); ?></h2>
			<p class="section-subtitle">
				<?php echo esc_html( sbmanch_get_option( 'about_description', 'We are committed to creating positive change in society.' ) ); ?>
			</p>
		</div>
		<div class="about-content">
			<div class="about-text">
				<h3><?php esc_html_e( 'Our Mission & Vision', 'swarnim-bharat-manch' ); ?></h3>
				<?php
				$about_image = sbmanch_get_option( 'about_image' );
				if ( $about_image ) {
					?>
					<p><?php echo wp_kses_post( wpautop( get_theme_mod( 'sbmanch_about_long_description', 'Our organization is dedicated to empowering communities and creating sustainable positive change. We work across various sectors including education, health, and livelihood development.' ) ) ); ?></p>
					<?php
				} else {
					?>
					<p><?php esc_html_e( 'Our organization is dedicated to empowering communities and creating sustainable positive change. We work across various sectors including education, health, and livelihood development.', 'swarnim-bharat-manch' ); ?></p>
					<p><?php esc_html_e( 'Join us in our mission to build a better world for everyone.', 'swarnim-bharat-manch' ); ?></p>
					<?php
				}
				?>
				<a href="<?php echo esc_url( sbmanch_get_option( 'cta_url', '#donate' ) ); ?>" class="cta-button" style="margin-top: 20px;">
					<?php esc_html_e( 'Join Us Today', 'swarnim-bharat-manch' ); ?>
				</a>
			</div>
			<div class="about-image">
				<?php
				$about_image = sbmanch_get_option( 'about_image' );
				if ( $about_image ) {
					?>
					<img src="<?php echo esc_url( $about_image ); ?>" alt="<?php esc_attr_e( 'About', 'swarnim-bharat-manch' ); ?>">
					<?php
				} else {
					?>
					<div style="width: 100%; height: 400px; background: linear-gradient(135deg, #1a47b3, #ff6b35); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white;">
						<i class="fas fa-image" style="font-size: 80px; opacity: 0.5;"></i>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>

<!-- Statistics Section -->
<section class="stats-section">
	<div class="container">
		<div class="row">
			<?php
			$stats = sbmanch_get_stats();
			foreach ( $stats as $stat ) {
				?>
				<div class="col-md-6 col-lg-3">
					<div class="stat-item">
						<div class="stat-number" data-target="<?php echo esc_attr( $stat['number'] ); ?>">
							<?php echo esc_html( $stat['number'] ); ?>
						</div>
						<div class="stat-label">
							<?php echo esc_html( $stat['label'] ); ?>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>

<!-- News / Blog Section -->
<section class="blog-section">
	<div class="container">
		<div class="section-title">
			<h2><?php esc_html_e( 'Latest News & Updates', 'swarnim-bharat-manch' ); ?></h2>
			<p class="section-subtitle">
				<?php esc_html_e( 'Stay updated with our latest activities and achievements', 'swarnim-bharat-manch' ); ?>
			</p>
		</div>
		<div class="blog-grid">
			<?php
			$blog_query = new WP_Query( array(
				'post_type'      => 'news',
				'posts_per_page' => 3,
				'orderby'        => 'date',
				'order'          => 'DESC',
			) );

			if ( $blog_query->have_posts() ) {
				while ( $blog_query->have_posts() ) {
					$blog_query->the_post();
					?>
					<article class="post-card">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="post-image">
								<?php the_post_thumbnail( 'sbmanch-blog' ); ?>
								<span class="post-meta">
									<?php
									$categories = get_the_terms( get_the_ID(), 'news-category' );
									if ( $categories && ! is_wp_error( $categories ) ) {
										echo esc_html( $categories[0]->name );
									}
									?>
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
								<?php echo wp_trim_words( get_the_excerpt(), 20 ); ?>
							</p>
							<a href="<?php the_permalink(); ?>" class="read-more">
								<?php esc_html_e( 'Read More', 'swarnim-bharat-manch' ); ?>
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</article>
					<?php
				}
				wp_reset_postdata();
			} else {
				?>
				<div class="col-12">
					<p><?php esc_html_e( 'No news available yet.', 'swarnim-bharat-manch' ); ?></p>
				</div>
				<?php
			}
			?>
		</div>
		<div class="text-center mt-5">
			<a href="<?php echo esc_url( home_url( '/news' ) ); ?>" class="cta-button">
				<?php esc_html_e( 'View All News', 'swarnim-bharat-manch' ); ?>
			</a>
		</div>
	</div>
</section>

<!-- Projects Section -->
<section class="projects-section" style="background-color: #f8f9fa;">
	<div class="container">
		<div class="section-title">
			<h2><?php esc_html_e( 'Our Projects', 'swarnim-bharat-manch' ); ?></h2>
			<p class="section-subtitle">
				<?php esc_html_e( 'Discover the projects we are working on to create impact', 'swarnim-bharat-manch' ); ?>
			</p>
		</div>
		<div class="row">
			<?php
			$projects_query = new WP_Query( array(
				'post_type'      => 'projects',
				'posts_per_page' => 3,
				'orderby'        => 'date',
				'order'          => 'DESC',
			) );

			if ( $projects_query->have_posts() ) {
				while ( $projects_query->have_posts() ) {
					$projects_query->the_post();
					?>
					<div class="col-md-4 mb-4">
						<div class="project-card">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="project-image">
									<?php the_post_thumbnail( 'sbmanch-project' ); ?>
									<span class="project-status">
										<?php
										$project_status = get_post_meta( get_the_ID(), '_project_status', true );
										echo esc_html( $project_status ? $project_status : esc_html__( 'Ongoing', 'swarnim-bharat-manch' ) );
										?>
									</span>
								</div>
							<?php } ?>
							<div class="project-details">
								<h3 class="project-title">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h3>
								<p class="project-description">
									<?php echo wp_trim_words( get_the_content(), 20 ); ?>
								</p>
								<?php
								$progress = get_post_meta( get_the_ID(), '_project_progress', true );
								if ( $progress ) {
									?>
									<div class="project-progress">
										<div class="progress-bar">
											<div class="progress-fill" style="width: <?php echo esc_attr( $progress ); ?>%;"></div>
										</div>
										<small><?php echo esc_html( $progress ); ?>% Complete</small>
									</div>
									<?php
								}
								?>
								<a href="<?php the_permalink(); ?>" class="cta-button" style="display: inline-block; padding: 8px 20px; font-size: 14px;">
									<?php esc_html_e( 'Learn More', 'swarnim-bharat-manch' ); ?>
								</a>
							</div>
						</div>
					</div>
					<?php
				}
				wp_reset_postdata();
			} else {
				?>
				<div class="col-12">
					<p><?php esc_html_e( 'No projects available yet.', 'swarnim-bharat-manch' ); ?></p>
				</div>
				<?php
			}
			?>
		</div>
		<div class="text-center mt-5">
			<a href="<?php echo esc_url( home_url( '/projects' ) ); ?>" class="cta-button">
				<?php esc_html_e( 'View All Projects', 'swarnim-bharat-manch' ); ?>
			</a>
		</div>
	</div>
</section>

<!-- Gallery Section -->
<section class="gallery-section">
	<div class="container">
		<div class="section-title">
			<h2><?php esc_html_e( 'Gallery', 'swarnim-bharat-manch' ); ?></h2>
			<p class="section-subtitle">
				<?php esc_html_e( 'A glimpse into our work and activities', 'swarnim-bharat-manch' ); ?>
			</p>
		</div>
		<div class="gallery-grid">
			<?php
			$gallery_query = new WP_Query( array(
				'post_type'      => 'gallery',
				'posts_per_page' => 6,
				'orderby'        => 'date',
				'order'          => 'DESC',
			) );

			if ( $gallery_query->have_posts() ) {
				while ( $gallery_query->have_posts() ) {
					$gallery_query->the_post();
					?>
					<a href="<?php echo esc_url( sbmanch_get_featured_image_url( get_the_ID(), 'full' ) ); ?>" class="gallery-item glightbox">
						<?php the_post_thumbnail( 'sbmanch-gallery', array( 'alt' => get_the_title() ) ); ?>
						<div class="gallery-overlay">
							<div class="gallery-icon">
								<i class="fas fa-search-plus"></i>
							</div>
						</div>
					</a>
					<?php
				}
				wp_reset_postdata();
			}
			?>
		</div>
	</div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
	<div class="container">
		<div class="section-title" style="color: white;">
			<h2 style="color: white;"><?php esc_html_e( 'Testimonials', 'swarnim-bharat-manch' ); ?></h2>
			<p class="section-subtitle" style="color: rgba(255, 255, 255, 0.9);">
				<?php esc_html_e( 'Hear from the people we have helped', 'swarnim-bharat-manch' ); ?>
			</p>
		</div>
		<div class="testimonials-grid">
			<?php
			$testimonials = array(
				array(
					'text'   => esc_html__( 'This organization has made a tremendous difference in my life. Highly recommended!', 'swarnim-bharat-manch' ),
					'author' => esc_html__( 'John Doe', 'swarnim-bharat-manch' ),
					'role'   => esc_html__( 'Program Beneficiary', 'swarnim-bharat-manch' ),
				),
				array(
					'text'   => esc_html__( 'Amazing work being done for the community. I\'m proud to be part of this mission.', 'swarnim-bharat-manch' ),
					'author' => esc_html__( 'Jane Smith', 'swarnim-bharat-manch' ),
					'role'   => esc_html__( 'Volunteer', 'swarnim-bharat-manch' ),
				),
				array(
					'text'   => esc_html__( 'The impact of their initiatives is visible in every corner of the community.', 'swarnim-bharat-manch' ),
					'author' => esc_html__( 'Ahmed Khan', 'swarnim-bharat-manch' ),
					'role'   => esc_html__( 'Community Leader', 'swarnim-bharat-manch' ),
				),
			);

			foreach ( $testimonials as $testimonial ) {
				?>
				<div class="testimonial-card">
					<div class="testimonial-text">
						"<?php echo esc_html( $testimonial['text'] ); ?>"
					</div>
					<div class="testimonial-author">
						<div class="author-avatar" style="background: linear-gradient(135deg, #1a47b3, #ff6b35); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 24px;">
							<?php echo strtoupper( substr( $testimonial['author'], 0, 1 ) ); ?>
						</div>
						<div class="author-info">
							<div class="author-name"><?php echo esc_html( $testimonial['author'] ); ?></div>
							<div class="author-title"><?php echo esc_html( $testimonial['role'] ); ?></div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>

<!-- CTA Section -->
<section class="blog-section">
	<div class="container">
		<div style="background: linear-gradient(135deg, #1a47b3, #ff6b35); color: white; padding: 60px 40px; border-radius: 15px; text-align: center;">
			<h2 style="color: white; margin-bottom: 20px;">
				<?php esc_html_e( 'Make a Difference Today', 'swarnim-bharat-manch' ); ?>
			</h2>
			<p style="color: rgba(255, 255, 255, 0.95); font-size: 1.1rem; margin-bottom: 30px;">
				<?php esc_html_e( 'Join our mission to create positive change in the community. Your contribution matters!', 'swarnim-bharat-manch' ); ?>
			</p>
			<div class="hero-buttons" style="justify-content: center;">
				<a href="<?php echo esc_url( sbmanch_get_option( 'cta_url', '#donate' ) ); ?>" class="cta-button" style="background: white; color: #1a47b3;">
					<?php echo esc_html( sbmanch_get_option( 'cta_text', 'Donate Now' ) ); ?>
				</a>
				<a href="#contact-form" class="btn btn-secondary">
					<?php esc_html_e( 'Join as Volunteer', 'swarnim-bharat-manch' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
?>
