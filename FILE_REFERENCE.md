# Swarnim Bharat Manch Theme - File Structure Reference

## Complete File Listing

### Theme Root Directory
```
wp-content/themes/swarnim-bharat-manch/
```

### Core Files

| File | Purpose |
|------|---------|
| `style.css` | Main theme stylesheet with all styles |
| `functions.php` | Theme functions, hooks, custom post types |
| `header.php` | Header template with navigation |
| `footer.php` | Footer template with widgets |
| `front-page.php` | Homepage template |
| `single.php` | Single post/custom post type template |
| `page.php` | Page template |
| `index.php` | Archive/blog index template |
| `search.php` | Search results template |
| `404.php` | 404 error page template |

### Documentation Files

| File | Purpose |
|------|---------|
| `README.md` | Main theme documentation |
| `INSTALLATION.md` | Step-by-step installation guide |
| `CUSTOMIZATION.md` | Advanced customization guide |

### Assets Directory

```
assets/
├── css/
│   ├── custom.css      # Additional custom styles
│   └── admin.css       # Admin panel styles
├── js/
│   ├── main.js         # Main JavaScript functionality
│   └── customize-preview.js  # Customizer preview scripts
└── images/             # Theme images directory
```

## Quick Reference

### Key Theme Functions

| Function | File | Purpose |
|----------|------|---------|
| `sbmanch_setup()` | functions.php | Theme setup and registration |
| `sbmanch_enqueue_assets()` | functions.php | Load CSS/JS files |
| `sbmanch_register_post_types()` | functions.php | Register custom post types |
| `sbmanch_get_option()` | functions.php | Get theme customizer option |
| `sbmanch_get_featured_image_url()` | functions.php | Get post featured image |
| `sbmanch_get_stats()` | functions.php | Get stats section data |
| `sbmanch_customize_register()` | functions.php | Customizer settings |

### Constants

| Constant | Value |
|----------|-------|
| `SBMANCH_VERSION` | Theme version (1.0.0) |
| `SBMANCH_TEXTDOMAIN` | Text domain (swarnim-bharat-manch) |
| `SBMANCH_PATH` | Theme directory path |
| `SBMANCH_URI` | Theme directory URL |
| `SBMANCH_ASSETS` | Assets directory URL |

### Custom Post Types

| Post Type | Slug | Icon | Archive |
|-----------|------|------|---------|
| News | news | newspaper | /news |
| Projects | projects | briefcase | /projects |
| Events | events | calendar | /events |
| Gallery | gallery | image | /gallery |

### Widget Areas

| Widget Area | ID | Location |
|-------------|----|----|
| Footer Widget 1 | footer-1 | Footer Column 1 |
| Footer Widget 2 | footer-2 | Footer Column 2 |
| Footer Widget 3 | footer-3 | Footer Column 3 |
| Footer Widget 4 | footer-4 | Footer Column 4 |

### CSS Variables

```css
--primary-color: #1a47b3        /* Main brand color */
--secondary-color: #ff6b35      /* Accent color */
--accent-color: #00d4ff         /* Additional highlight */
--text-dark: #1a1a1a            /* Main text color */
--text-light: #666666           /* Secondary text color */
--border-color: #e0e0e0         /* Border color */
--background-light: #f8f9fa     /* Light background */
--success-color: #28a745        /* Success state */
--warning-color: #ffc107        /* Warning state */
--danger-color: #dc3545         /* Error/danger state */
--transition: all 0.3s ease-in-out  /* Default transition */
```

### Key Classes

| Class | Use |
|-------|-----|
| `.container` | Main content container, max-width 1200px |
| `.hero-section` | Hero banner section |
| `.about-section` | About section |
| `.stats-section` | Statistics section |
| `.blog-section` | Blog/news section |
| `.projects-section` | Projects section |
| `.gallery-section` | Gallery section |
| `.testimonials-section` | Testimonials section |
| `.card` | Generic card component |
| `.btn` | Button styling |
| `.cta-button` | Call-to-action button |
| `.post-card` | Blog post card |
| `.project-card` | Project card |
| `.section-title` | Section heading styling |
| `.post-article` | Single post article |
| `.page-article` | Page article |

### Front-end URLs

| URL | Template | Purpose |
|-----|----------|---------|
| `/` | front-page.php | Homepage |
| `/news` | index.php | News archive |
| `/news/{post}` | single.php | Single news item |
| `/projects` | index.php | Projects archive |
| `/projects/{post}` | single.php | Single project |
| `/events` | index.php | Events archive |
| `/events/{post}` | single.php | Single event |
| `/gallery` | index.php | Gallery archive |
| `/gallery/{post}` | single.php | Single gallery item |
| `/blog` | index.php | Blog/posts archive |
| `/{page}` | page.php | Custom page |
| `/?s=term` | search.php | Search results |
| `/404` | 404.php | Not found page |

### Admin URLs

| URL | Purpose |
|-----|---------|
| `/wp-admin/edit.php?post_type=news` | News management |
| `/wp-admin/edit.php?post_type=projects` | Projects management |
| `/wp-admin/edit.php?post_type=events` | Events management |
| `/wp-admin/edit.php?post_type=gallery` | Gallery management |
| `/wp-admin/edit.php` | Blog posts |
| `/wp-admin/customize.php` | Theme customizer |
| `/wp-admin/widgets.php` | Widget management |
| `/wp-admin/nav-menus.php` | Menu management |
| `/wp-admin/options-general.php` | General settings |

## Customizer Path

```
Appearance → Customize
├── Site Settings
│   ├── Colors
│   ├── About Section
│   ├── Contact Information
│   ├── CTA Button
│   ├── Footer Settings
│   └── Social Media
```

## Action Hooks

Hooks available for adding custom functionality:

```
do_action( 'sbmanch_after_header' )
do_action( 'sbmanch_heroes_content' )
do_action( 'sbmanch_after_hero' )
do_action( 'sbmanch_before_footer' )
do_action( 'wp_body_open' )
```

## Filter Hooks

Available filters for modifying data:

```
apply_filters( 'sbmanch_stats', $stats )
apply_filters( 'excerpt_length', $length )
apply_filters( 'wp_nav_menu_objects', $items, $args )
apply_filters( 'nav_menu_item_class', $classes, $item, $args, $depth )
```

## External Libraries

| Library | Version | Source | Path |
|---------|---------|--------|------|
| Bootstrap | 5.3.0 | CDN | css/bootstrap |
| Font Awesome | 6.4.0 | CDN | css/fontawesome |
| GLightbox | 3.2.0 | CDN | js/glightbox |
| CountUp.js | 2.4.0 | CDN | js/countup |
| jQuery | bundled | WordPress | wp-includes |

## Meta Boxes (Post Meta)

| Key | Post Type | Default |
|-----|-----------|---------|
| `_project_status` | projects | "Ongoing" |
| `_project_progress` | projects | "" |
| `_event_date` | events | "" |
| `_event_time` | events | "" |
| `_event_location` | events | "" |

## Customizer Options

| Setting | Option Key | Default |
|---------|-----------|---------|
| Primary Color | sbmanch_primary_color | #1a47b3 |
| Secondary Color | sbmanch_secondary_color | #ff6b35 |
| About Title | sbmanch_about_title | About Our NGO |
| About Description | sbmanch_about_description | We are committed... |
| About Image | sbmanch_about_image | "" |
| Contact Email | sbmanch_contact_email | info@example.com |
| Contact Phone | sbmanch_contact_phone | +91 98765 43210 |
| Contact Address | sbmanch_contact_address | Swarnim Bharat, India |
| CTA Text | sbmanch_cta_text | Donate Now |
| CTA URL | sbmanch_cta_url | #donate |
| Copyright Text | sbmanch_copyright_text | © 2026 ... |
| Facebook URL | sbmanch_facebook_url | https://facebook.com |
| Twitter URL | sbmanch_twitter_url | https://twitter.com |
| LinkedIn URL | sbmanch_linkedin_url | https://linkedin.com |
| Instagram URL | sbmanch_instagram_url | https://instagram.com |

## Navigation Menus

| Menu | Location | Template |
|------|----------|----------|
| Primary Menu | primary-menu | header.php |
| Footer Menu | footer-menu | footer.php |

## AJAX Actions

| Action | Endpoint | Auth | Purpose |
|--------|----------|------|---------|
| sbmanch_load_more_posts | admin-ajax.php | Both | Load more posts |
| sbmanch_submit_contact_form | admin-ajax.php | Both | Submit contact form |

## File Sizes (Approx)

| File | Size |
|------|------|
| style.css | ~50 KB |
| functions.php | ~30 KB |
| main.js | ~15 KB |
| custom.css | ~20 KB |

## Performance

- External CSS files: 2 (Bootstrap, FontAwesome)
- External JS files: 3 (Bootstrap, GLightbox, CountUp)
- Internal CSS files: 2 (style.css, custom.css)
- Internal JS files: 1 (main.js)
- Custom Post Types: 4
- Custom Taxonomies: 4
- Widget Areas: 4
- Menu Locations: 2

## Backup Files

Always backup these critical files:

- `functions.php` - Theme functionality
- `style.css` - Theme styling
- Header/footer templates
- Custom templates
- Content/uploads

## Useful Commands

### Via FTP
```
Upload: Put theme folder to wp-content/themes/
Download: Get theme folder from wp-content/themes/
Delete: Remove old theme files
```

### Via WordPress CLI (if available)
```bash
wp theme activate swarnim-bharat-manch
wp theme list
wp theme status
```

## Important Notes

1. **Never edit core files directly** in production
2. **Always test changes** on staging first
3. **Backup regularly** before making changes
4. **Use child themes** for customization
5. **Follow WordPress standards** for any new code
6. **Keep plugins updated** for security
7. **Monitor performance** regularly

---

For detailed information about each file, refer to:
- README.md - Full documentation
- INSTALLATION.md - Setup guide
- CUSTOMIZATION.md - Advanced customization

Version: 1.0.0
Last Updated: 2026
