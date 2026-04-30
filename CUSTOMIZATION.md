# Swarnim Bharat Manch Theme - Customization Guide

## Advanced Customization

This guide provides detailed information for advanced customizations to the theme.

## Theme Structure

### Main Theme Files

```
swarnim-bharat-manch/
├── functions.php          # Theme functions and hooks
├── style.css             # Main stylesheet
├── header.php            # Header template
├── footer.php            # Footer template
├── front-page.php        # Homepage template
├── single.php            # Single post template
├── page.php              # Page template
├── index.php             # Archive/blog index
├── search.php            # Search results
├── 404.php               # 404 error page
├── README.md             # Theme documentation
├── INSTALLATION.md       # Installation guide
├── assets/
│   ├── css/
│   │   ├── custom.css
│   │   └── admin.css
│   ├── js/
│   │   ├── main.js
│   │   └── customize-preview.js
│   └── images/
└── inc/                  # Include files (optional)
```

## Customizing Colors

### Via WordPress Customizer (Easiest)
1. Go to **Appearance** → **Customize**
2. Navigate to **Site Settings** → **Colors**
3. Change Primary and Secondary colors
4. Click **Publish**

### Via CSS Custom Properties

Edit `style.css` and find the `:root` section:

```css
:root {
  --primary-color: #1a47b3;
  --secondary-color: #ff6b35;
  --accent-color: #00d4ff;
  --text-dark: #1a1a1a;
  --text-light: #666666;
  --border-color: #e0e0e0;
  --background-light: #f8f9fa;
}
```

Change values and save.

### Via Additional CSS

1. Go to **Appearance** → **Customize** → **Additional CSS**
2. Add custom CSS:

```css
:root {
  --primary-color: #2c3e50;
  --secondary-color: #e74c3c;
}
```

## Customizing Fonts

### Change Font Stack

Edit `style.css` body section:

```css
body {
  font-family: 'Your Font', 'Segoe UI', Tahoma, Geneva, sans-serif;
}
```

### Use Google Fonts

1. Add to `functions.php` in `sbmanch_enqueue_assets()`:

```php
wp_enqueue_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap',
    array(),
    null
);
```

2. Update body font:

```css
body {
  font-family: 'Poppins', sans-serif;
}
```

## Modifying Layouts

### Hero Section

Edit `front-page.php`:

```php
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <!-- Modify this section -->
        </div>
    </div>
</section>
```

### About Section

Change layout from 2 columns to full width:

```css
.about-content {
  grid-template-columns: 1fr; /* Changed from 1fr 1fr */
  gap: 60px;
  align-items: center;
}
```

### Projects Layout

Change grid columns in `front-page.php`:

```html
<div class="row">
  <!-- Change col-md-4 to col-md-6 for 2 columns instead of 3 -->
  <div class="col-md-6">
```

## Adding New Sections

### Example: Adding a Testimonials Section

1. **Create Template File** - `template-parts/section-testimonials.php`:

```php
<section class="testimonials-section">
    <div class="container">
        <div class="section-title">
            <h2><?php esc_html_e( 'What People Say', 'sbmanch' ); ?></h2>
        </div>
        <!-- Testimonials content -->
    </div>
</section>
```

2. **Add Styles** - In `assets/css/custom.css`:

```css
.testimonials-section {
  background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
  padding: 80px 0;
  color: white;
}
```

3. **Include in Template** - In `front-page.php`:

```php
<?php get_template_part( 'template-parts/section', 'testimonials' ); ?>
```

## Custom Post Types

### Register Custom Post Type

In `functions.php`, add:

```php
register_post_type( 'team_member', array(
    'label'              => 'Team Members',
    'public'             => true,
    'show_in_menu'       => true,
    'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'menu_icon'          => 'dashicons-groups',
    'has_archive'        => true,
) );
```

### Display Custom Post Type

In any template:

```php
$args = array(
    'post_type'      => 'team_member',
    'posts_per_page' => 12,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        // Display content
    }
    wp_reset_postdata();
}
```

## Custom Taxonomies

### Register Taxonomy

```php
register_taxonomy( 'team_role', 'team_member', array(
    'label'       => 'Team Roles',
    'rewrite'     => array( 'slug' => 'team-role' ),
    'show_in_rest' => true,
) );
```

### Display Terms

```php
$terms = get_the_terms( get_the_ID(), 'team_role' );
if ( $terms ) {
    foreach ( $terms as $term ) {
        echo '<span class="term-badge">' . $term->name . '</span>';
    }
}
```

## Customizer Settings

### Add New Customizer Section

In `functions.php`:

```php
$wp_customize->add_section( 'sbmanch_team', array(
    'title'       => 'Team Settings',
    'panel'       => 'sbmanch_general',
    'priority'    => 70,
) );

// Add setting
$wp_customize->add_setting( 'sbmanch_team_title', array(
    'default'           => 'Our Team',
    'sanitize_callback' => 'wp_kses_post',
) );

// Add control
$wp_customize->add_control( 'sbmanch_team_title', array(
    'label'       => 'Team Section Title',
    'section'     => 'sbmanch_team',
    'type'        => 'text',
) );
```

## Hooks & Filters

### Action Hooks

Available hooks for customization:

```php
// After header
do_action( 'sbmanch_after_header' );

// Before footer
do_action( 'sbmanch_before_footer' );

// In hero section
do_action( 'sbmanch_hero_content' );

// After hero
do_action( 'sbmanch_after_hero' );
```

### Filter Hooks

```php
// Filter stats
apply_filters( 'sbmanch_stats', $stats );

// Filter post excerpt length
apply_filters( 'excerpt_length', 25 );

// Filter nav menu items
apply_filters( 'wp_nav_menu_objects', $items, $args );
```

### Using Hooks

Add to `functions.php`:

```php
// Add custom content after hero
add_action( 'sbmanch_after_hero', 'my_custom_content' );
function my_custom_content() {
    echo '<section class="container my-5"><h2>Custom Section</h2></section>';
}
```

## Creating Child Theme

### Why Create a Child Theme?

- Preserve modifications when updating parent theme
- Organize custom code separately
- Share code between installations

### Create Child Theme

1. **Create Directory** - `wp-content/themes/sbmanch-child/`

2. **Create style.css**:

```css
/*
 Theme Name: Swarnim Bharat Manch Child
 Theme URI: https://example.com
 Description: Child theme for customization
 Author: Your Name
 Author URI: https://example.com
 Template: swarnim-bharat-manch
 Version: 1.0.0
 License: GNU General Public License v2 or later
 License URI: https://www.gnu.org/licenses/gpl-2.0.html
 Text Domain: sbmanch-child
 Domain Path: /languages
*/

@import url("../swarnim-bharat-manch/style.css");

/* Your custom styles here */
```

3. **Create functions.php**:

```php
<?php
/**
 * Child Theme Functions
 */

// Enqueue child theme stylesheet
add_action( 'wp_enqueue_scripts', 'sbmanch_child_enqueue_styles' );
function sbmanch_child_enqueue_styles() {
    wp_enqueue_style(
        'sbmanch-child',
        get_stylesheet_uri(),
        array( 'sbmanch-style' ),
        '1.0.0'
    );
}

// Your custom functions here
```

4. **Activate Child Theme** - Go to Appearance → Themes, Activate

## Overriding Templates

### Create Template Override

1. **Create template file** in child theme
2. **Same path** as parent theme

Example - Override `single.php`:

```
Parent: wp-content/themes/swarnim-bharat-manch/single.php
Child:  wp-content/themes/sbmanch-child/single.php
```

## JavaScript Customization

### Add Custom JavaScript

1. **Create file** - `assets/js/custom.js`

2. **Enqueue in functions.php**:

```php
wp_enqueue_script(
    'sbmanch-custom',
    SBMANCH_ASSETS . '/js/custom.js',
    array( 'sbmanch-main' ),
    SBMANCH_VERSION,
    true
);
```

### Modify JavaScript

Edit `assets/js/main.js` to add custom functionality:

```javascript
// Add to sbmanchTheme.init()
this.customFeature();

// Add new method
customFeature: function() {
    // Your code here
}
```

## Form Customization

### Modify Contact Form

Edit form in `front-page.php` or create new form with plugin:
- WPForms
- Gravity Forms
- Contact Form 7

Example with WPForms:

```php
<?php echo do_shortcode( '[wpforms id="1"]' ); ?>
```

## Widget Customization

### Create Custom Widget

```php
class SBMANCH_Custom_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct( 'sbmanch_custom', 'Custom Widget' );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo '<h3>' . $instance['title'] . '</h3>';
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>"
                   value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        return $instance;
    }
}

// Register widget
add_action( 'widgets_init', function() {
    register_widget( 'SBMANCH_Custom_Widget' );
});
```

## Performance Optimization

### Optimize for Speed

1. **Minimize CSS/JavaScript**
   - Use minification plugins
   - Remove unused code

2. **Lazy Load Images**
   - Already implemented in main.js
   - Uses native lazy loading

3. **Optimize Images**
   - Use plugins: Smush, Imagify
   - Proper image sizes

4. **Enable Caching**
   - WP Super Cache
   - W3 Total Cache

5. **Use CDN**
   - CloudFlare
   - MaxCDN

## Security

### Security Best Practices

1. **Always sanitize input**:
```php
$safe_input = sanitize_text_field( $_POST['field'] );
```

2. **Escape output**:
```php
echo esc_html( $data );
echo esc_url( $url );
echo esc_attr( $attr );
```

3. **Use nonces**:
```php
wp_verify_nonce( $_POST['nonce'], 'action_name' );
```

4. **Validate permissions**:
```php
current_user_can( 'edit_posts' );
```

## Debugging

### Enable Debug Mode

Edit `wp-config.php`:

```php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
```

Check logs at: `wp-content/debug.log`

## Resources

- [WordPress Plugin Development](https://developer.wordpress.org/plugins/)
- [WordPress Theme Development](https://developer.wordpress.org/themes/)
- [PHP Documentation](https://www.php.net/docs.php)
- [Bootstrap Documentation](https://getbootstrap.com/docs/)

## Common Customization Examples

### Change Hero Background

In `style.css`:

```css
.hero-section {
  background: linear-gradient(135deg, #your-color-1, #your-color-2);
}
```

### Add Border to Sections

```css
section {
  border-bottom: 1px solid var(--border-color);
}
```

### Change Font Size

```css
h1 {
  font-size: 3rem;
}
```

### Add Box Shadow

```css
.card {
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
```

---

For more information, see README.md and INSTALLATION.md files.

Happy customizing! 🎨
