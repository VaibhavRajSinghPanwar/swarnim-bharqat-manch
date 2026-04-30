# Swarnim Bharat Manch NGO Theme

A professional, modern WordPress theme designed specifically for NGO websites with fully responsive design, smooth animations, and advanced customization options.

## Features

### 🎨 Design & Layout
- **Modern Corporate Design** - Clean, professional look similar to Microsoft/IBM
- **Fully Responsive** - Perfect on mobile, tablet, and desktop devices
- **Smooth Animations** - Engaging transitions and hover effects
- **Bootstrap 5 Integration** - Built on the latest Bootstrap framework
- **Custom Color Scheme** - Customizable primary and secondary colors

### 📱 Header & Navigation
- **Sticky Navigation** - Stays visible while scrolling
- **Dynamic Menu Support** - Full WordPress menu integration
- **Logo Upload** - Editable custom logo via customizer
- **CTA Button** - Customizable call-to-action button (Donate/Join Us)
- **Mobile-Friendly Menu** - Hamburger menu for mobile devices

### 🏠 Homepage Sections
- **Hero Slider** - Eye-catching hero section with gradient background
- **About Section** - Customizable about us content with image
- **Statistics Counter** - Animated stats showing impact (donations, volunteers, etc.)
- **News & Updates** - Latest news from custom News post type
- **Projects Section** - Display and showcase NGO projects
- **Gallery** - Image gallery with lightbox and video support
- **Testimonials** - Client/beneficiary testimonials carousel style
- **Blog Section** - Full blog functionality with categories and tags

### 📝 Content Management
- **Custom Post Types**
  - News - For news updates
  - Projects - For project showcases
  - Events - For event management
  - Gallery - For image and video galleries

- **Custom Taxonomies**
  - News Categories
  - Project Categories
  - Event Categories
  - Gallery Categories

### 🛠️ Admin Features
- **Theme Customizer** - Full customization support
  - Primary & Secondary Colors
  - Site Logo & Branding
  - About Section Content
  - Contact Information
  - Social Media Links
  - Footer Copyright Text
  - CTA Button Text & URL

- **Widget Areas**
  - Footer Widget 1 (About)
  - Footer Widget 2 (Quick Links)
  - Footer Widget 3 (Contact Info)
  - Footer Widget 4 (Support/CTA)

- **Meta Boxes**
  - Project Progress (percentage)
  - Project Status (Ongoing/Completed)

### 📝 Blog System
- Full blog functionality
- Categories and tags support
- Comments enabled
- Related posts
- Post navigation
- SEO-friendly structure

### 🔧 Technical Features
- **WordPress Standards** - Follows WordPress coding standards and best practices
- **SEO Optimized** - SEO-friendly markup and structure
- **Fast Loading** - Optimized for performance
- **Accessibility** - WCAG compliance considerations
- **Contact Form Integration** - Ready for contact form plugins
- **Bootstrap 5** - Latest Bootstrap CSS framework
- **Font Awesome Icons** - Beautiful icon library
- **GLightbox** - Modern image/video lightbox
- **CountUp.js** - Animated number counter

## Installation

### Prerequisites
- WordPress 5.0 or later
- PHP 7.4 or higher
- Modern Web Browser

### Steps

1. **Download the Theme**
   - Download the `swarnim-bharat-manch` folder

2. **Upload to WordPress**
   - Via FTP: Upload to `/wp-content/themes/`
   - Via Admin: Go to Appearance → Themes → Upload Theme

3. **Activate the Theme**
   - Go to WordPress Admin Dashboard
   - Navigate to Appearance → Themes
   - Click "Activate" on "Swarnim Bharat Manch"

4. **Configure Theme Settings**
   - Go to Appearance → Customize
   - Configure your site colors, logo, and content
   - Save changes

## Configuration

### Homepage Setup

1. **Create a Static Homepage**
   - Go to Settings → Reading
   - Select "A static page"
   - Choose a page to display as homepage (or create one)
   - The theme will automatically use `front-page.php`

2. **Customize Homepage Sections**
   - Go to Appearance → Customize
   - Update:
     - Site Logo
     - Primary & Secondary Colors
     - About Section Title & Description
     - Contact Information
     - Social Media Links

### Create Menu

1. **Create Main Navigation Menu**
   - Go to Appearance → Menus
   - Create a new menu "Main Menu"
   - Add pages/links:
     - Home
     - About
     - News
     - Projects
     - Events
     - Gallery
     - Blog
     - Contact

2. **Assign Menu Locations**
   - Go to Appearance → Menus
   - Select "Display location" → Primary Menu
   - Save

### Customize Footer

1. **Add Footer Content**
   - Go to Appearance → Widgets
   - Add content to Footer Widget 1-4
   - Or use customizer to set contact info

2. **Footer Menu**
   - Create a menu "Footer Menu"
   - Go to Appearance → Menus
   - Assign to "Footer Menu" location

### Create Content

**News**
1. Go to Dashboard → News
2. Click "Add New"
3. Write your news post
4. Add featured image
5. Set category
6. Publish

**Projects**
1. Go to Dashboard → Projects
2. Click "Add New"
3. Add project details
4. Add featured image
5. Set project status (Ongoing/Completed)
6. Set progress percentage via meta box
7. Publish

**Gallery**
1. Go to Dashboard → Gallery
2. Click "Add New"
3. Add image
4. Add featured image
5. Set category
6. Publish

**Events**
1. Go to Dashboard → Events
2. Click "Add New"
3. Add event details
4. Add featured image
5. Publish

**Blog Posts**
1. Go to Dashboard → Posts
2. Click "Add New"
3. Write your post
4. Add featured image
5. Set category and tags
6. Publish

## Customizer Options

### Site Settings Panel

#### Colors
- **Primary Color** - Main brand color (Default: #1a47b3)
- **Secondary Color** - Accent color (Default: #ff6b35)

#### About Section
- **Title** - Show your NGO's mission
- **Description** - Brief description
- **Image** - About section image

#### Contact Information
- **Email** - Contact email address
- **Phone** - Contact phone number
- **Address** - Office address

#### CTA Button
- **Button Text** - Text to display (e.g., "Donate Now")
- **Button URL** - Where button links to

#### Social Media
- Facebook URL
- Twitter URL
- LinkedIn URL
- Instagram URL

#### Footer Settings
- **Copyright Text** - Custom copyright message

## File Structure

```
swarnim-bharat-manch/
├── assets/
│   ├── css/
│   │   ├── custom.css
│   │   └── admin.css
│   ├── js/
│   │   ├── main.js
│   │   └── customize-preview.js
│   └── images/
├── inc/
├── template-parts/
├── style.css
├── functions.php
├── header.php
├── footer.php
├── front-page.php
├── single.php
├── page.php
├── index.php
├── search.php
├── 404.php
└── README.md
```

## Key Theme Files

- **style.css** - Main stylesheet with all theme styles
- **functions.php** - Theme functionality, hooks, and post types
- **header.php** - Header template with navigation
- **footer.php** - Footer template with widgets
- **front-page.php** - Homepage template with all sections
- **single.php** - Single post template
- **page.php** - Page template
- **index.php** - Archive/blog index template
- **search.php** - Search results template

## Recommended Plugins

- **Elementor** - Page builder (optional)
- **WPForms** - Contact form builder
- **Yoast SEO** - SEO optimization
- **WooCommerce** - For e-commerce (donations)
- **Donation Plugin** - For accepting donations
- **User Role Editor** - User management
- **Wordfence** - Security

## Styling & Customization

### CSS Variables
The theme uses CSS custom properties for easy styling:

```css
--primary-color: #1a47b3;
--secondary-color: #ff6b35;
--accent-color: #00d4ff;
--text-dark: #1a1a1a;
--text-light: #666666;
--border-color: #e0e0e0;
--background-light: #f8f9fa;
```

### Custom CSS
Add custom CSS via:
1. Appearance → Customize → Additional CSS
2. Or create `custom.css` in `assets/css/`

### Modifying Colors
Edit the color variables in `style.css` or use the customizer.

## JavaScript Features

- **Header Scroll Effect** - Sticky header styling on scroll
- **Mobile Menu** - Responsive hamburger menu
- **Smooth Scrolling** - Anchor link smooth scrolling
- **Stats Animation** - Animated number counters
- **Lightbox Gallery** - Image gallery with lightbox
- **Form Validation** - Client-side form validation
- **Back to Top Button** - Floating button to scroll to top
- **Lazy Loading** - Images load on scroll

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance Tips

1. **Optimize Images**
   - Compress images before uploading
   - Use appropriate image sizes
   - Consider WebP format

2. **Caching**
   - Install a caching plugin (WP Super Cache, W3 Total Cache)
   - Enable browser caching

3. **CDN**
   - Use a CDN for static assets
   - Theme uses CDN for Bootstrap, FontAwesome, etc.

4. **Database Optimization**
   - Regularly clean up revisions
   - Use database optimization plugins

## Security Recommendations

1. Keep WordPress updated
2. Use strong admin passwords
3. Install security plugins (Wordfence, Sucuri)
4. Regular backups
5. Use HTTPS/SSL certificate
6. Limit login attempts

## Troubleshooting

### Hero Section Not Showing
- Ensure you have content on the homepage
- Check if `front-page.php` is being used
- Verify hero section CSS is loaded

### Mobile Menu Not Working
- Clear browser cache
- Check jQuery is loaded
- Verify JavaScript console for errors

### Custom Post Types Not Showing
- Go to Dashboard → Posts (News, Projects, etc.)
- Create at least one post
- Check custom post type is registered in functions.php

### Footer Widgets Not Showing
- Go to Appearance → Widgets
- Add content to Footer Widget areas
- Save changes

## Support & Documentation

For additional help:
- Check WordPress.org documentation
- Review hosted plugins documentation
- Consult theme customization guide

## License

This theme is provided as-is for use on NGO websites.

## Changelog

### Version 1.0.0
- Initial release
- All features implemented
- Bootstrap 5 integration
- Full customizer support

## Credits

- Bootstrap 5 - https://getbootstrap.com
- Font Awesome - https://fontawesome.com
- GLightbox - https://github.com/jbaylies/glightbox
- CountUp.js - https://inorganik.github.io/countUp.js/

---

**Theme Name:** Swarnim Bharat Manch NGO Theme  
**Version:** 1.0.0  
**Author:** Your Name/Organization  
**License:** GNU General Public License v2 or later  
**Requires:** WordPress 5.0+, PHP 7.4+

For questions or issues, please contact support.
