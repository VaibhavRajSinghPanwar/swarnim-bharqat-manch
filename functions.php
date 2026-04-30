<?php
/**
 * Swarnim Bharat Manch NGO Theme - Main Theme Functions
 *
 * @package Swarnim Bharat Manch
 * @version 1.0.0
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define Theme Constants
 */
define( 'SBMANCH_VERSION', '1.0.0' );
define( 'SBMANCH_TEXTDOMAIN', 'swarnim-bharat-manch' );
define( 'SBMANCH_PATH', get_template_directory() );
define( 'SBMANCH_URI', get_template_directory_uri() );
define( 'SBMANCH_ASSETS', SBMANCH_URI . '/assets' );

/**
 * Theme Setup Hook
 * Register theme features and support
 */
add_action( 'after_setup_theme', 'sbmanch_setup' );
function sbmanch_setup() {
	// Load text domain for translations
	load_theme_textdomain( SBMANCH_TEXTDOMAIN, SBMANCH_PATH . '/languages' );

	// Add theme support for various features
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 800, true );

	// Add image sizes for different sections
	add_image_size( 'sbmanch-hero', 1920, 600, true );
	add_image_size( 'sbmanch-project', 600, 400, true );
	add_image_size( 'sbmanch-gallery', 400, 400, true );
	add_image_size( 'sbmanch-blog', 600, 400, true );

	// Register navigation menus
	register_nav_menus( array(
		'primary-menu' => esc_html__( 'Primary Menu', SBMANCH_TEXTDOMAIN ),
		'footer-menu'  => esc_html__( 'Footer Menu', SBMANCH_TEXTDOMAIN ),
	) );

	// Support HTML5
	add_theme_support( 'html5', array(
		'comment-list',
		'comment-form',
		'search-form',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	// Add theme support for wide blocks
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
}

/**
 * Enqueue Theme Stylesheets and Scripts
 */
add_action( 'wp_enqueue_scripts', 'sbmanch_enqueue_assets' );
function sbmanch_enqueue_assets() {
	// Bootstrap 5 CSS
	wp_enqueue_style(
		'bootstrap-5',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
		array(),
		'5.3.0'
	);

	// Font Awesome Icons
	wp_enqueue_style(
		'font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
		array(),
		'6.4.0'
	);

	// Lightbox CSS (GLightbox)
	wp_enqueue_style(
		'glightbox',
		'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css',
		array(),
		'3.2.0'
	);

	// Main Theme Stylesheet
	wp_enqueue_style(
		'sbmanch-style',
		get_stylesheet_uri(),
		array( 'bootstrap-5', 'font-awesome' ),
		SBMANCH_VERSION
	);

	// Custom CSS file
	wp_enqueue_style(
		'sbmanch-custom',
		SBMANCH_ASSETS . '/css/custom.css',
		array( 'sbmanch-style' ),
		SBMANCH_VERSION
	);

	// Bootstrap 5 JS
	wp_enqueue_script(
		'bootstrap-5',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
		array(),
		'5.3.0',
		true
	);

	// GLightbox JS
	wp_enqueue_script(
		'glightbox',
		'https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js',
		array(),
		'3.2.0',
		true
	);

	// CountUp JS for stats animation
	wp_enqueue_script(
		'countup',
		'https://cdnjs.cloudflare.com/ajax/libs/CountUp.js/2.4.0/countUp.min.js',
		array(),
		'2.4.0',
		true
	);

	// Main Theme Script
	wp_enqueue_script(
		'sbmanch-main',
		SBMANCH_ASSETS . '/js/main.js',
		array( 'jquery', 'bootstrap-5', 'glightbox', 'countup' ),
		SBMANCH_VERSION,
		true
	);

	// Localize script for AJAX
	wp_localize_script( 'sbmanch-main', 'sbmanch', array(
		'ajaxurl'  => admin_url( 'admin-ajax.php' ),
		'nonce'    => wp_create_nonce( 'sbmanch_nonce' ),
		'home_url' => home_url(),
	) );

	// Add comment script if needed
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Output dynamic color CSS for published frontend
 */
add_action( 'wp_enqueue_scripts', 'sbmanch_custom_colors', 20 );
function sbmanch_custom_colors() {
	$primary   = get_theme_mod( 'sbmanch_primary_color', '#1a47b3' );
	$secondary = get_theme_mod( 'sbmanch_secondary_color', '#ff6b35' );

	$custom_css = ":root { --primary-color: " . esc_html( $primary ) . "; --secondary-color: " . esc_html( $secondary ) . "; }";

	wp_add_inline_style( 'sbmanch-style', $custom_css );
}

/**
 * Output dynamic header CSS
 */
add_action( 'wp_enqueue_scripts', 'sbmanch_custom_header_css', 21 );
function sbmanch_custom_header_css() {
	$header_bg     = get_theme_mod( 'sbmanch_header_bg_color', '#ffffff' );
	$header_text   = get_theme_mod( 'sbmanch_header_text_color', '#333333' );
	$header_layout = get_theme_mod( 'sbmanch_header_layout', 'default' );

	$header_css = "
		.site-header { background-color: " . esc_html( $header_bg ) . "; color: " . esc_html( $header_text ) . "; }
		.site-header a { color: " . esc_html( $header_text ) . "; }
	";

	if ( 'centered' === $header_layout ) {
		$header_css .= "
			.site-header .navbar-brand { text-align: center; }
			.site-header .navbar-nav { justify-content: center; }
		";
	}

	wp_add_inline_style( 'sbmanch-style', $header_css );
}

/**
 * Enqueue Admin Styles and Scripts
 */
add_action( 'admin_enqueue_scripts', 'sbmanch_admin_enqueue' );
function sbmanch_admin_enqueue() {
	wp_enqueue_style(
		'sbmanch-admin',
		SBMANCH_ASSETS . '/css/admin.css',
		array(),
		SBMANCH_VERSION
	);
}

/**
 * Register Custom Post Types
 */
add_action( 'init', 'sbmanch_register_post_types' );
function sbmanch_register_post_types() {
	// News Post Type
	register_post_type( 'news', array(
		'label'              => esc_html__( 'News', SBMANCH_TEXTDOMAIN ),
		'description'        => esc_html__( 'News and updates from NGO', SBMANCH_TEXTDOMAIN ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'news' ),
		'capability_type'    => 'post',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments' ),
		'menu_icon'          => 'dashicons-newspaper',
		'has_archive'        => true,
		'show_in_rest'       => true,
	) );

	// Projects Post Type
	register_post_type( 'projects', array(
		'label'              => esc_html__( 'Projects', SBMANCH_TEXTDOMAIN ),
		'description'        => esc_html__( 'NGO Projects', SBMANCH_TEXTDOMAIN ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'projects' ),
		'capability_type'    => 'post',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'menu_icon'          => 'dashicons-briefcase',
		'has_archive'        => true,
		'show_in_rest'       => true,
	) );

	// Events Post Type
	register_post_type( 'events', array(
		'label'              => esc_html__( 'Events', SBMANCH_TEXTDOMAIN ),
		'description'        => esc_html__( 'NGO Events and activities', SBMANCH_TEXTDOMAIN ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'events' ),
		'capability_type'    => 'post',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'menu_icon'          => 'dashicons-calendar',
		'has_archive'        => true,
		'show_in_rest'       => true,
	) );

	// Gallery Post Type
	register_post_type( 'gallery', array(
		'label'              => esc_html__( 'Gallery', SBMANCH_TEXTDOMAIN ),
		'description'        => esc_html__( 'Image and Video Gallery', SBMANCH_TEXTDOMAIN ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'gallery' ),
		'capability_type'    => 'post',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'menu_icon'          => 'dashicons-format-image',
		'has_archive'        => true,
		'show_in_rest'       => true,
	) );
}

/**
 * Register Custom Taxonomies
 */
add_action( 'init', 'sbmanch_register_taxonomies' );
function sbmanch_register_taxonomies() {
	// News Categories
	register_taxonomy( 'news-category', 'news', array(
		'label'       => esc_html__( 'News Categories', SBMANCH_TEXTDOMAIN ),
		'rewrite'     => array( 'slug' => 'news-category' ),
		'show_in_rest' => true,
	) );

	// Project Categories
	register_taxonomy( 'project-category', 'projects', array(
		'label'       => esc_html__( 'Project Categories', SBMANCH_TEXTDOMAIN ),
		'rewrite'     => array( 'slug' => 'project-category' ),
		'show_in_rest' => true,
	) );

	// Event Categories
	register_taxonomy( 'event-category', 'events', array(
		'label'       => esc_html__( 'Event Categories', SBMANCH_TEXTDOMAIN ),
		'rewrite'     => array( 'slug' => 'event-category' ),
		'show_in_rest' => true,
	) );

	// Gallery Categories
	register_taxonomy( 'gallery-category', 'gallery', array(
		'label'       => esc_html__( 'Gallery Categories', SBMANCH_TEXTDOMAIN ),
		'rewrite'     => array( 'slug' => 'gallery-category' ),
		'show_in_rest' => true,
	) );
}

/**
 * Register Widget Areas
 */
add_action( 'widgets_init', 'sbmanch_register_widgets' );
function sbmanch_register_widgets() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', SBMANCH_TEXTDOMAIN ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'First footer widget area', SBMANCH_TEXTDOMAIN ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', SBMANCH_TEXTDOMAIN ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Second footer widget area', SBMANCH_TEXTDOMAIN ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 3', SBMANCH_TEXTDOMAIN ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Third footer widget area', SBMANCH_TEXTDOMAIN ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 4', SBMANCH_TEXTDOMAIN ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Fourth footer widget area', SBMANCH_TEXTDOMAIN ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

/**
 * Theme Customizer Settings
 */
add_action( 'customize_register', 'sbmanch_customize_register' );
function sbmanch_customize_register( $wp_customize ) {
	// Logo and Colors Panel
	$wp_customize->add_panel( 'sbmanch_general', array(
		'priority'    => 10,
		'title'       => esc_html__( 'Site Settings', SBMANCH_TEXTDOMAIN ),
		'description' => esc_html__( 'General site settings', SBMANCH_TEXTDOMAIN ),
	) );

	// Colors Section
	$wp_customize->add_section( 'sbmanch_colors', array(
		'title'       => esc_html__( 'Colors', SBMANCH_TEXTDOMAIN ),
		'panel'       => 'sbmanch_general',
		'priority'    => 10,
	) );

	// Primary Color
	$wp_customize->add_setting( 'sbmanch_primary_color', array(
		'default'           => '#1a47b3',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sbmanch_primary_color', array(
		'label'       => esc_html__( 'Primary Color', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_colors',
		'priority'    => 10,
	) ) );

	// Secondary Color
	$wp_customize->add_setting( 'sbmanch_secondary_color', array(
		'default'           => '#ff6b35',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sbmanch_secondary_color', array(
		'label'       => esc_html__( 'Secondary Color', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_colors',
		'priority'    => 20,
	) ) );

	// About Section
	$wp_customize->add_section( 'sbmanch_about', array(
		'title'       => esc_html__( 'About Section', SBMANCH_TEXTDOMAIN ),
		'panel'       => 'sbmanch_general',
		'priority'    => 20,
	) );

	// About Title
	$wp_customize->add_setting( 'sbmanch_about_title', array(
		'default'           => esc_html__( 'About Our NGO', SBMANCH_TEXTDOMAIN ),
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'sbmanch_about_title', array(
		'label'       => esc_html__( 'About Title', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_about',
		'priority'    => 10,
	) );

	// About Description
	$wp_customize->add_setting( 'sbmanch_about_description', array(
		'default'           => esc_html__( 'We are committed to creating positive change in society.', SBMANCH_TEXTDOMAIN ),
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'sbmanch_about_description', array(
		'label'       => esc_html__( 'About Description', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_about',
		'priority'    => 20,
		'type'        => 'textarea',
	) );

	// About Image
	$wp_customize->add_setting( 'sbmanch_about_image' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sbmanch_about_image', array(
		'label'       => esc_html__( 'About Image', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_about',
		'priority'    => 30,
	) ) );

	// Contact Information Section
	$wp_customize->add_section( 'sbmanch_contact', array(
		'title'       => esc_html__( 'Contact Information', SBMANCH_TEXTDOMAIN ),
		'panel'       => 'sbmanch_general',
		'priority'    => 30,
	) );

	// Contact Email
	$wp_customize->add_setting( 'sbmanch_contact_email', array(
		'default'           => 'info@example.com',
		'sanitize_callback' => 'sanitize_email',
	) );

	$wp_customize->add_control( 'sbmanch_contact_email', array(
		'label'       => esc_html__( 'Contact Email', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_contact',
		'priority'    => 10,
		'type'        => 'email',
	) );

	// Contact Phone
	$wp_customize->add_setting( 'sbmanch_contact_phone', array(
		'default'           => '+91 98765 43210',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sbmanch_contact_phone', array(
		'label'       => esc_html__( 'Contact Phone', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_contact',
		'priority'    => 20,
	) );

	// Contact Address
	$wp_customize->add_setting( 'sbmanch_contact_address', array(
		'default'           => 'Swarnim Bharat, India',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sbmanch_contact_address', array(
		'label'       => esc_html__( 'Contact Address', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_contact',
		'priority'    => 30,
	) );

	// CTA Button Section
	$wp_customize->add_section( 'sbmanch_cta', array(
		'title'       => esc_html__( 'CTA Button', SBMANCH_TEXTDOMAIN ),
		'panel'       => 'sbmanch_general',
		'priority'    => 40,
	) );

	// CTA Button Text
	$wp_customize->add_setting( 'sbmanch_cta_text', array(
		'default'           => 'Donate Now',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sbmanch_cta_text', array(
		'label'       => esc_html__( 'Button Text', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_cta',
		'priority'    => 10,
	) );

	// CTA Button URL
	$wp_customize->add_setting( 'sbmanch_cta_url', array(
		'default'           => '#donate',
		'sanitize_callback' => 'sanitize_url',
	) );

	$wp_customize->add_control( 'sbmanch_cta_url', array(
		'label'       => esc_html__( 'Button URL', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_cta',
		'priority'    => 20,
	) );

	// Footer Section
	$wp_customize->add_section( 'sbmanch_footer', array(
		'title'       => esc_html__( 'Footer Settings', SBMANCH_TEXTDOMAIN ),
		'panel'       => 'sbmanch_general',
		'priority'    => 50,
	) );

	// Footer Copyright Text
	$wp_customize->add_setting( 'sbmanch_copyright_text', array(
		'default'           => sprintf( '&copy; %s Swarnim Bharat Manch. All Rights Reserved.', date( 'Y' ) ),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'sbmanch_copyright_text', array(
		'label'       => esc_html__( 'Copyright Text', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_footer',
		'priority'    => 10,
		'type'        => 'textarea',
	) );

	// Social Media Section
	$wp_customize->add_section( 'sbmanch_social', array(
		'title'       => esc_html__( 'Social Media', SBMANCH_TEXTDOMAIN ),
		'panel'       => 'sbmanch_general',
		'priority'    => 60,
	) );

	// Facebook URL
	$wp_customize->add_setting( 'sbmanch_facebook_url', array(
		'default'           => 'https://facebook.com',
		'sanitize_callback' => 'sanitize_url',
	) );

	$wp_customize->add_control( 'sbmanch_facebook_url', array(
		'label'       => esc_html__( 'Facebook URL', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_social',
		'priority'    => 10,
	) );

	// Twitter URL
	$wp_customize->add_setting( 'sbmanch_twitter_url', array(
		'default'           => 'https://twitter.com',
		'sanitize_callback' => 'sanitize_url',
	) );

	$wp_customize->add_control( 'sbmanch_twitter_url', array(
		'label'       => esc_html__( 'Twitter URL', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_social',
		'priority'    => 20,
	) );

	// LinkedIn URL
	$wp_customize->add_setting( 'sbmanch_linkedin_url', array(
		'default'           => 'https://linkedin.com',
		'sanitize_callback' => 'sanitize_url',
	) );

	$wp_customize->add_control( 'sbmanch_linkedin_url', array(
		'label'       => esc_html__( 'LinkedIn URL', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_social',
		'priority'    => 30,
	) );

	// Instagram URL
	$wp_customize->add_setting( 'sbmanch_instagram_url', array(
		'default'           => 'https://instagram.com',
		'sanitize_callback' => 'sanitize_url',
	) );

	$wp_customize->add_control( 'sbmanch_instagram_url', array(
		'label'       => esc_html__( 'Instagram URL', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_social',
		'priority'    => 40,
	) );

	// ============================================
	// Fonts Section
	// ============================================
	$wp_customize->add_section( 'sbmanch_fonts', array(
		'title'       => esc_html__( 'Fonts', SBMANCH_TEXTDOMAIN ),
		'panel'       => 'sbmanch_general',
		'priority'    => 15,
	) );

	// Heading Font Family
	$wp_customize->add_setting( 'sbmanch_heading_font', array(
		'default'           => 'Poppins',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'sbmanch_heading_font', array(
		'label'       => esc_html__( 'Heading Font Family', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_fonts',
		'priority'    => 10,
		'type'        => 'select',
		'choices'     => array(
			'Poppins'        => 'Poppins',
			'Roboto'         => 'Roboto',
			'Open Sans'      => 'Open Sans',
			'Lato'           => 'Lato',
			'Montserrat'     => 'Montserrat',
			'Playfair Display' => 'Playfair Display',
			'Raleway'        => 'Raleway',
			'Source Sans Pro' => 'Source Sans Pro',
			'Oswald'         => 'Oswald',
			'Merriweather'   => 'Merriweather',
		),
	) );

	// Body Font Family
	$wp_customize->add_setting( 'sbmanch_body_font', array(
		'default'           => 'Open Sans',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'sbmanch_body_font', array(
		'label'       => esc_html__( 'Body Font Family', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_fonts',
		'priority'    => 20,
		'type'        => 'select',
		'choices'     => array(
			'Open Sans'      => 'Open Sans',
			'Roboto'         => 'Roboto',
			'Poppins'       => 'Poppins',
			'Lato'           => 'Lato',
			'Montserrat'     => 'Montserrat',
			'Source Sans Pro' => 'Source Sans Pro',
			'Merriweather'   => 'Merriweather',
			'PT Sans'        => 'PT Sans',
			'Ubuntu'         => 'Ubuntu',
			'Inter'          => 'Inter',
		),
	) );

	// Heading Font Size
	$wp_customize->add_setting( 'sbmanch_heading_font_size', array(
		'default'           => '32',
		'sanitize_callback' => 'absint',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'sbmanch_heading_font_size', array(
		'label'       => esc_html__( 'Heading Font Size (px)', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_fonts',
		'priority'    => 30,
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 12,
			'max'  => 72,
			'step' => 1,
		),
	) );

	// Body Font Size
	$wp_customize->add_setting( 'sbmanch_body_font_size', array(
		'default'           => '16',
		'sanitize_callback' => 'absint',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'sbmanch_body_font_size', array(
		'label'       => esc_html__( 'Body Font Size (px)', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_fonts',
		'priority'    => 40,
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 12,
			'max'  => 24,
			'step' => 1,
		),
	) );

	// ============================================
	// Header Section
	// ============================================
	$wp_customize->add_section( 'sbmanch_header', array(
		'title'       => esc_html__( 'Header', SBMANCH_TEXTDOMAIN ),
		'panel'       => 'sbmanch_general',
		'priority'    => 25,
	) );

	// Header Layout
	$wp_customize->add_setting( 'sbmanch_header_layout', array(
		'default'           => 'default',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sbmanch_header_layout', array(
		'label'       => esc_html__( 'Header Layout', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_header',
		'priority'    => 10,
		'type'        => 'select',
		'choices'     => array(
			'default'    => 'Default',
			'centered'   => 'Centered Logo',
			'minimal'    => 'Minimal',
			'fullwidth'  => 'Full Width',
		),
	) );

	// Header Background Color
	$wp_customize->add_setting( 'sbmanch_header_bg_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sbmanch_header_bg_color', array(
		'label'       => esc_html__( 'Header Background Color', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_header',
		'priority'    => 20,
	) ) );

	// Header Text Color
	$wp_customize->add_setting( 'sbmanch_header_text_color', array(
		'default'           => '#333333',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sbmanch_header_text_color', array(
		'label'       => esc_html__( 'Header Text Color', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_header',
		'priority'    => 30,
	) ) );

	// Header Sticky
	$wp_customize->add_setting( 'sbmanch_header_sticky', array(
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
	) );

	$wp_customize->add_control( 'sbmanch_header_sticky', array(
		'label'       => esc_html__( 'Sticky Header', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_header',
		'priority'    => 40,
		'type'        => 'checkbox',
	) );

	// Header Search Icon
	$wp_customize->add_setting( 'sbmanch_header_search', array(
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
	) );

	$wp_customize->add_control( 'sbmanch_header_search', array(
		'label'       => esc_html__( 'Show Search Icon', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_header',
		'priority'    => 50,
		'type'        => 'checkbox',
	) );

	// ============================================
	// Posts/Pages Layout Section
	// ============================================
	$wp_customize->add_section( 'sbmanch_layout', array(
		'title'       => esc_html__( 'Posts/Pages Layout', SBMANCH_TEXTDOMAIN ),
		'panel'       => 'sbmanch_general',
		'priority'    => 35,
	) );

	// Default Page Layout
	$wp_customize->add_setting( 'sbmanch_default_page_layout', array(
		'default'           => 'right-sidebar',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sbmanch_default_page_layout', array(
		'label'       => esc_html__( 'Default Page Layout', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_layout',
		'priority'    => 10,
		'type'        => 'select',
		'choices'     => array(
			'full-width'     => 'Full Width',
			'right-sidebar'  => 'Right Sidebar',
			'left-sidebar'   => 'Left Sidebar',
			'no-sidebar'     => 'No Sidebar',
		),
	) );

	// Default Blog Layout
	$wp_customize->add_setting( 'sbmanch_default_blog_layout', array(
		'default'           => 'right-sidebar',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sbmanch_default_blog_layout', array(
		'label'       => esc_html__( 'Default Blog Layout', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_layout',
		'priority'    => 20,
		'type'        => 'select',
		'choices'     => array(
			'full-width'     => 'Full Width',
			'right-sidebar'  => 'Right Sidebar',
			'left-sidebar'   => 'Left Sidebar',
			'no-sidebar'     => 'No Sidebar',
		),
	) );

	// Single Post Layout
	$wp_customize->add_setting( 'sbmanch_single_post_layout', array(
		'default'           => 'right-sidebar',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sbmanch_single_post_layout', array(
		'label'       => esc_html__( 'Single Post Layout', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_layout',
		'priority'    => 30,
		'type'        => 'select',
		'choices'     => array(
			'full-width'     => 'Full Width',
			'right-sidebar'  => 'Right Sidebar',
			'left-sidebar'   => 'Left Sidebar',
			'no-sidebar'     => 'No Sidebar',
		),
	) );

	// Show Post Date
	$wp_customize->add_setting( 'sbmanch_show_post_date', array(
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
	) );

	$wp_customize->add_control( 'sbmanch_show_post_date', array(
		'label'       => esc_html__( 'Show Post Date', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_layout',
		'priority'    => 40,
		'type'        => 'checkbox',
	) );

	// Show Post Author
	$wp_customize->add_setting( 'sbmanch_show_post_author', array(
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
	) );

	$wp_customize->add_control( 'sbmanch_show_post_author', array(
		'label'       => esc_html__( 'Show Post Author', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_layout',
		'priority'    => 50,
		'type'        => 'checkbox',
	) );

	// Show Featured Image
	$wp_customize->add_setting( 'sbmanch_show_featured_image', array(
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
	) );

	$wp_customize->add_control( 'sbmanch_show_featured_image', array(
		'label'       => esc_html__( 'Show Featured Image', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_layout',
		'priority'    => 60,
		'type'        => 'checkbox',
	) );

	// ============================================
	// Search Results Section
	// ============================================
	$wp_customize->add_section( 'sbmanch_search', array(
		'title'       => esc_html__( 'Search Results', SBMANCH_TEXTDOMAIN ),
		'panel'       => 'sbmanch_general',
		'priority'    => 45,
	) );

	// Search Results Layout
	$wp_customize->add_setting( 'sbmanch_search_layout', array(
		'default'           => 'right-sidebar',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sbmanch_search_layout', array(
		'label'       => esc_html__( 'Search Results Layout', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_search',
		'priority'    => 10,
		'type'        => 'select',
		'choices'     => array(
			'full-width'     => 'Full Width',
			'right-sidebar'  => 'Right Sidebar',
			'left-sidebar'   => 'Left Sidebar',
			'no-sidebar'     => 'No Sidebar',
		),
	) );

	// Search Results Per Page
	$wp_customize->add_setting( 'sbmanch_search_per_page', array(
		'default'           => '10',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'sbmanch_search_per_page', array(
		'label'       => esc_html__( 'Results Per Page', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_search',
		'priority'    => 20,
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 50,
			'step' => 1,
		),
	) );

	// Show Search Excerpt
	$wp_customize->add_setting( 'sbmanch_search_excerpt', array(
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
	) );

	$wp_customize->add_control( 'sbmanch_search_excerpt', array(
		'label'       => esc_html__( 'Show Excerpt', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_search',
		'priority'    => 30,
		'type'        => 'checkbox',
	) );

	// Search Results Style
	$wp_customize->add_setting( 'sbmanch_search_style', array(
		'default'           => 'list',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sbmanch_search_style', array(
		'label'       => esc_html__( 'Results Style', SBMANCH_TEXTDOMAIN ),
		'section'     => 'sbmanch_search',
		'priority'    => 40,
		'type'        => 'select',
		'choices'     => array(
			'list'    => 'List View',
			'grid'    => 'Grid View',
		),
	) );
}

/**
 * Enqueue Google Fonts for Customizer
 */
add_action( 'wp_enqueue_scripts', 'sbmanch_enqueue_google_fonts' );
function sbmanch_enqueue_google_fonts() {
	$heading_font = get_theme_mod( 'sbmanch_heading_font', 'Poppins' );
	$body_font    = get_theme_mod( 'sbmanch_body_font', 'Open Sans' );

	$fonts = array(
		'Poppins'        => 'Poppins:400,500,600,700',
		'Roboto'         => 'Roboto:400,500,700',
		'Open Sans'      => 'Open+Sans:400,600,700',
		'Lato'           => 'Lato:400,700',
		'Montserrat'     => 'Montserrat:400,600,700',
		'Playfair Display' => 'Playfair+Display:400,700',
		'Raleway'        => 'Raleway:400,600,700',
		'Source Sans Pro' => 'Source+Sans+Pro:400,600',
		'Oswald'         => 'Oswald:400,600,700',
		'Merriweather'   => 'Merriweather:400,700',
		'PT Sans'        => 'PT+Sans:400,700',
		'Ubuntu'         => 'Ubuntu:400,700',
		'Inter'          => 'Inter:400,600,700',
	);

	$font_query = array();
	if ( isset( $fonts[ $heading_font ] ) ) {
		$font_query[] = $fonts[ $heading_font ];
	}
	if ( isset( $fonts[ $body_font ] ) && $body_font !== $heading_font ) {
		$font_query[] = $fonts[ $body_font ];
	}

	if ( ! empty( $font_query ) ) {
		$font_url = 'https://fonts.googleapis.com/css2?family=' . implode( '&family=', $font_query ) . '&display=swap';
		wp_enqueue_style( 'sbmanch-google-fonts', $font_url, array(), SBMANCH_VERSION );
	}
}

/**
 * Output dynamic font CSS
 */
add_action( 'wp_enqueue_scripts', 'sbmanch_custom_fonts_css', 20 );
function sbmanch_custom_fonts_css() {
	$heading_font = get_theme_mod( 'sbmanch_heading_font', 'Poppins' );
	$body_font    = get_theme_mod( 'sbmanch_body_font', 'Open Sans' );
	$heading_size = get_theme_mod( 'sbmanch_heading_font_size', '32' );
	$body_size    = get_theme_mod( 'sbmanch_body_font_size', '16' );

	$font_css = "
		h1, h2, h3, h4, h5, h6, .heading-font { font-family: '" . esc_html( $heading_font ) . "', sans-serif; }
		body, p, .body-font { font-family: '" . esc_html( $body_font ) . "', sans-serif; font-size: " . esc_html( $body_size ) . "px; }
		h1 { font-size: " . esc_html( $heading_size ) . "px; }
		h2 { font-size: " . intval( $heading_size * 0.75 ) . "px; }
		h3 { font-size: " . intval( $heading_size * 0.6 ) . "px; }
		h4 { font-size: " . intval( $heading_size * 0.5 ) . "px; }
		h5 { font-size: " . intval( $heading_size * 0.42 ) . "px; }
		h6 { font-size: " . intval( $heading_size * 0.35 ) . "px; }
	";

	wp_add_inline_style( 'sbmanch-style', $font_css );
}

/**
 * Helper function to get theme options
 */
function sbmanch_get_option( $option_name, $default = '' ) {
	$option = get_theme_mod( 'sbmanch_' . $option_name, $default );
	return $option ? $option : $default;
}

/**
 * Get layout class based on Customizer settings
 */
function sbmanch_get_layout_class() {
	$layout = 'right-sidebar';

	if ( is_page() ) {
		$layout = get_theme_mod( 'sbmanch_default_page_layout', 'right-sidebar' );
	} elseif ( is_single() ) {
		$layout = get_theme_mod( 'sbmanch_single_post_layout', 'right-sidebar' );
	} elseif ( is_home() || is_archive() ) {
		$layout = get_theme_mod( 'sbmanch_default_blog_layout', 'right-sidebar' );
	} elseif ( is_search() ) {
		$layout = get_theme_mod( 'sbmanch_search_layout', 'right-sidebar' );
	}

	// Apply filter for custom layouts
	$layout = apply_filters( 'sbmanch_layout_class', $layout );

	switch ( $layout ) {
		case 'full-width':
			return 'col-12';
		case 'left-sidebar':
			return 'col-md-8 order-2';
		case 'no-sidebar':
			return 'col-12';
		case 'right-sidebar':
		default:
			return 'col-md-8';
	}
}

/**
 * Get sidebar class
 */
function sbmanch_get_sidebar_class() {
	$layout = 'right-sidebar';

	if ( is_page() ) {
		$layout = get_theme_mod( 'sbmanch_default_page_layout', 'right-sidebar' );
	} elseif ( is_single() ) {
		$layout = get_theme_mod( 'sbmanch_single_post_layout', 'right-sidebar' );
	} elseif ( is_home() || is_archive() ) {
		$layout = get_theme_mod( 'sbmanch_default_blog_layout', 'right-sidebar' );
	} elseif ( is_search() ) {
		$layout = get_theme_mod( 'sbmanch_search_layout', 'right-sidebar' );
	}

	switch ( $layout ) {
		case 'left-sidebar':
			return 'col-md-4 order-1';
		case 'right-sidebar':
			return 'col-md-4';
		default:
			return '';
	}
}

/**
 * Check if sidebar should be displayed
 */
function sbmanch_has_sidebar() {
	$layout = 'right-sidebar';

	if ( is_page() ) {
		$layout = get_theme_mod( 'sbmanch_default_page_layout', 'right-sidebar' );
	} elseif ( is_single() ) {
		$layout = get_theme_mod( 'sbmanch_single_post_layout', 'right-sidebar' );
	} elseif ( is_home() || is_archive() ) {
		$layout = get_theme_mod( 'sbmanch_default_blog_layout', 'right-sidebar' );
	} elseif ( is_search() ) {
		$layout = get_theme_mod( 'sbmanch_search_layout', 'right-sidebar' );
	}

	return ! in_array( $layout, array( 'full-width', 'no-sidebar' ), true );
}

/**
 * Custom excerpt length
 */
add_filter( 'excerpt_length', 'sbmanch_excerpt_length' );
function sbmanch_excerpt_length( $length ) {
	return 25;
}

/**
 * Custom excerpt more text
 */
add_filter( 'excerpt_more', 'sbmanch_excerpt_more' );
function sbmanch_excerpt_more( $more ) {
	return '...';
}

/**
 * Remove automatic paragraph tags from widgets
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Add body class for theme
 */
add_filter( 'body_class', 'sbmanch_body_class' );
function sbmanch_body_class( $classes ) {
	$classes[] = 'sbmanch-theme';
	return $classes;
}

/**
 * Filter menu items for dynamic display
 */
add_filter( 'wp_nav_menu_objects', 'sbmanch_filter_nav_menu', 10, 2 );
function sbmanch_filter_nav_menu( $items, $args ) {
	return $items;
}

/**
 * Custom comment callback
 */
function sbmanch_comment_callback( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class( 'comment-item', $comment->comment_ID ); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment-content">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 50 ); ?>
				<cite class="fn">
					<?php comment_author_link(); ?>
				</cite>
				<span class="comment-meta">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php comment_time( 'F j, Y' ); ?>
					</a>
				</span>
			</div>
			<div class="comment-body">
				<?php comment_text(); ?>
			</div>
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
		</article>
	</li>
	<?php
}

/**
 * Sanitize hex color
 */
if ( ! function_exists( 'sanitize_hex_color' ) ) {
	function sanitize_hex_color( $color ) {
		if ( '' === $color ) {
			return '';
		}

		if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
			return $color;
		}

		return '';
	}
}

/**
 * Get featured image URL
 */
function sbmanch_get_featured_image_url( $post_id, $size = 'full' ) {
	if ( has_post_thumbnail( $post_id ) ) {
		$image_id = get_post_thumbnail_id( $post_id );
		$image    = wp_get_attachment_image_src( $image_id, $size );
		return $image[0];
	}
	return '';
}

/**
 * Custom navigation walker
 */
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

/**
 * Search results template redirect
 */
add_action( 'template_include', 'sbmanch_template_loader' );
function sbmanch_template_loader( $template ) {
	return $template;
}

/**
 * Enqueue customizer preview JS
 */
add_action( 'customize_preview_init', 'sbmanch_customize_preview_js' );
function sbmanch_customize_preview_js() {
	wp_enqueue_script(
		'sbmanch-customize-preview',
		SBMANCH_ASSETS . '/js/customize-preview.js',
		array( 'customize-preview' ),
		SBMANCH_VERSION,
		true
	);
}

/**
 * Load more posts via AJAX
 */
add_action( 'wp_ajax_sbmanch_load_more_posts', 'sbmanch_load_more_posts' );
add_action( 'wp_ajax_nopriv_sbmanch_load_more_posts', 'sbmanch_load_more_posts' );
function sbmanch_load_more_posts() {
	check_ajax_referer( 'sbmanch_nonce' );

	$paged = isset( $_POST['paged'] ) ? intval( $_POST['paged'] ) : 1;
	$post_type = isset( $_POST['post_type'] ) ? sanitize_text_field( $_POST['post_type'] ) : 'post';

	$args = array(
		'post_type'      => $post_type,
		'posts_per_page' => 6,
		'paged'          => $paged,
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part( 'template-parts/content', $post_type );
		}
		wp_reset_postdata();
	}

	die;
}

/**
 * Get stats for stats section
 */
function sbmanch_get_stats() {
	$stats = array(
		array(
			'number' => get_theme_mod( 'sbmanch_stat_1_number', '1500' ),
			'label'  => get_theme_mod( 'sbmanch_stat_1_label', 'Lives Impacted' ),
		),
		array(
			'number' => get_theme_mod( 'sbmanch_stat_2_number', '250' ),
			'label'  => get_theme_mod( 'sbmanch_stat_2_label', 'Active Volunteers' ),
		),
		array(
			'number' => get_theme_mod( 'sbmanch_stat_3_number', '50' ),
			'label'  => get_theme_mod( 'sbmanch_stat_3_label', 'Projects Completed' ),
		),
		array(
			'number' => get_theme_mod( 'sbmanch_stat_4_number', '100' ),
			'label'  => get_theme_mod( 'sbmanch_stat_4_label', 'Partners' ),
		),
	);

	return apply_filters( 'sbmanch_stats', $stats );
}

/**
 * Register hooks for content changes
 */
add_action( 'save_post', 'sbmanch_clear_cache' );
function sbmanch_clear_cache() {
	// Add cache clearing logic if using caching plugins
}
