# Swarnim Bharat Manch NGO Theme - Installation & Setup Guide

## Quick Start Guide

### Step 1: Activate the Theme

1. **Log in to WordPress Admin Dashboard**
   - Go to `http://localhost/dntgroup/wp-admin`
   - Enter your WordPress credentials

2. **Navigate to Themes**
   - Go to **Appearance** → **Themes**

3. **Activate Swarnim Bharat Manch Theme**
   - Look for "Swarnim Bharat Manch" theme
   - Click **Activate**

### Step 2: Create Homepage

1. **Create a Static Homepage**
   - Go to **Settings** → **Reading**
   - Select **"A static page (select below)"**
   - Create a new page called "Home"
   - Set "Home" as your Front Page
   - Click **Save Changes**

### Step 3: Configure Theme Settings

1. **Access Customizer**
   - Go to **Appearance** → **Customize**

2. **Set Site Colors**
   - Go to **Site Settings** → **Colors**
   - Primary Color: `#1a47b3` (Blue)
   - Secondary Color: `#ff6b35` (Orange)

3. **Upload Logo**
   - Go to **Site Identity**
   - Click **Select Logo**
   - Upload your NGO logo
   - Set appropriate dimensions

4. **Configure About Section**
   - Go to **Site Settings** → **About Section**
   - Enter: Title, Description, and About Image

5. **Add Contact Information**
   - Go to **Site Settings** → **Contact Information**
   - Email: Your NGO email
   - Phone: Contact number
   - Address: Office location

6. **Setup CTA Button**
   - Go to **Site Settings** → **CTA Button**
   - Button Text: "Donate Now" or "Join Us"
   - Button URL: `/donate` or `#donate-section`

7. **Add Social Media Links**
   - Go to **Site Settings** → **Social Media**
   - Facebook URL: https://facebook.com/yourpage
   - Twitter URL: https://twitter.com/yourpage
   - LinkedIn URL: https://linkedin.com/company/yourpage
   - Instagram URL: https://instagram.com/yourpage

8. **Footer Settings**
   - Go to **Site Settings** → **Footer Settings**
   - Copyright Text: "© 2026 Swarnim Bharat Manch. All Rights Reserved."

9. **Save Changes**
   - Click **Publish** or **Save & Close**

### Step 4: Create Navigation Menus

1. **Create Primary Menu**
   - Go to **Appearance** → **Menus**
   - Click **Create a new menu**
   - Name: "Main Navigation"
   - Click **Create Menu**

2. **Add Menu Items**
   - Add these items:
     - Home
     - About (link to #about section of home page)
     - News
     - Projects
     - Events
     - Gallery
     - Blog
     - Contact

3. **Assign Menu Location**
   - Go to **Appearance** → **Menus**
   - Select your menu
   - Check **Display location**: Primary Menu
   - Click **Save Menu**

4. **Create Footer Menu** (Optional)
   - Repeat above steps
   - Name: "Footer Navigation"
   - Assign to: Footer Menu

### Step 5: Create Content Categories

1. **Create News Categories**
   - Go to **News** → **Categories**
   - Add categories:
     - Updates
     - Announcements
     - Achievements
     - Events

2. **Create Project Categories**
   - Go to **Projects** → **Categories**
   - Add categories:
     - Education
     - Health
     - Environment
     - Community

3. **Create Event Categories**
   - Go to **Events** → **Categories**
   - Add categories:
     - Webinar
     - Workshop
     - Seminar
     - Community Event

4. **Create Post Categories** (For Blog)
   - Go to **Posts** → **Categories**
   - Add categories:
     - Insights
     - Tips
     - Stories
     - News

### Step 6: Create Sample Content

#### Create News

1. Go to **Dashboard** → **News** → **Add New**
2. Fill in details:
   - **Title**: "NGO Launch Success"
   - **Content**: Write your news content
   - **Featured Image**: Add an image
   - **Category**: Select "Announcements"
3. Click **Publish**

#### Create Project

1. Go to **Dashboard** → **Projects** → **Add New**
2. Fill in details:
   - **Title**: "Community Health Awareness"
   - **Content**: Project description
   - **Featured Image**: Project image
   - **Category**: Select "Health"
3. Scroll down to **Project Details** meta box:
   - **Project Status**: Ongoing
   - **Project Progress**: 65 (percentage)
4. Click **Publish**

#### Create Gallery Item

1. Go to **Dashboard** → **Gallery** → **Add New**
2. Fill in details:
   - **Title**: "Community Activity - Month 1"
   - **Content**: Photo description (optional)
   - **Featured Image**: Gallery photo
   - **Category**: Select appropriate category
3. Click **Publish**

#### Create Event

1. Go to **Dashboard** → **Events** → **Add New**
2. Fill in details:
   - **Title**: "Health Awareness Webinar"
   - **Content**: Event description
   - **Featured Image**: Event banner
   - **Category**: Select "Webinar"
3. Click **Publish**

#### Create Blog Post

1. Go to **Dashboard** → **Posts** → **Add New**
2. Fill in details:
   - **Title**: "Health Tips for Community"
   - **Content**: Full blog post
   - **Featured Image**: Blog header image
   - **Category**: Select "Tips"
   - **Tags**: Add relevant tags
3. Click **Publish**

### Step 7: Configure Footer Widgets

1. **Go to Appearance** → **Widgets**

2. **Footer Widget 1** (About)
   - Add **Custom HTML** widget
   - Content:
   ```html
   <h3>About Swarnim Bharat Manch</h3>
   <p>We are dedicated to creating positive change in our community through various initiatives and programs.</p>
   ```

3. **Footer Widget 2** (Quick Links)
   - Add **Navigation Menu** widget
   - Select your menu
   - OR add **Custom Links** widget

4. **Footer Widget 3** (Contact)
   - Already configured via customizer
   - Shows contact info automatically

5. **Footer Widget 4** (Support)
   - Add **Custom HTML** widget
   - Content:
   ```html
   <h3>Support Our Mission</h3>
   <p>Your donation helps us make a difference!</p>
   ```

### Step 8: Set Reading Settings

1. Go to **Settings** → **Reading**
2. **Blog pages show at most**: 6 posts
3. Click **Save Changes**

### Step 9: Configure Discussion Settings

1. Go to **Settings** → **Discussion**
2. Check:
   - ✅ Allow people to post comments
   - ✅ Enable threaded comments
3. Click **Save Changes**

### Step 10: SEO Setup

1. **Install Yoast SEO Plugin** (Recommended)
   - Go to **Plugins** → **Add New**
   - Search for "Yoast SEO"
   - Install and Activate

2. **Configure SEO Settings**
   - Go to **SEO** → **General**
   - Set your website title and tagline

### Step 11: Test Everything

1. **Check Homepage**
   - Visit front-end: `http://localhost/dntgroup`
   - Verify all sections display correctly

2. **Test Navigation**
   - Click menu items
   - Test smooth scrolling
   - Test mobile menu (resize browser)

3. **Test Forms**
   - Submit contact form (if present)
   - Check comment functionality

4. **Test Responsiveness**
   - Open DevTools (F12)
   - Test different screen sizes
   - Verify mobile layout

5. **Test Gallery**
   - Click gallery images
   - Verify lightbox works

## Default Credentials

| Item | Value |
|------|-------|
| Primary Color | #1a47b3 (Blue) |
| Secondary Color | #ff6b35 (Orange) |
| Accent Color | #00d4ff (Cyan) |
| Hero Title | "Welcome to Swarnim Bharat Manch" |
| CTA Button Text | "Donate Now" |

## Important Notes

### File Locations
- Theme files: `wp-content/themes/swarnim-bharat-manch/`
- Custom CSS: `assets/css/custom.css`
- JavaScript: `assets/js/main.js`

### Customization
- Do NOT edit theme files directly
- Use **Appearance** → **Customize** for settings
- Use **Appearance** → **Additional CSS** for custom styling

### Backup
- Always backup before making changes
- Use WordPress backup plugins
- Keep regular database backups

### Performance
- Use image optimization plugins
- Enable caching (WP Super Cache, W3 Total Cache)
- Minimize CSS/JS (via plugins)

## Common Issues & Solutions

### Hero Section Not Showing
- ✅ Ensure front-page.php is active
- ✅ Check if you're on the homepage
- ✅ Verify page is set as homepage in Settings

### Mobile Menu Not Working
- ✅ Clear browser cache (Ctrl+Shift+Delete)
- ✅ Check JavaScript console (F12 → Console)
- ✅ Ensure jQuery is loaded

### Colors Not Changing
- ✅ Try clearing browser cache
- ✅ Publish customizer changes
- ✅ Check CSS cascade priority

### Images Not Showing
- ✅ Verify image upload completed
- ✅ Check image file size
- ✅ Ensure correct image format

### Widgets Not Appearing
- ✅ Go to Widgets and add content
- ✅ Verify widget area is active
- ✅ Check widget sidebar code

## Support & Resources

### Official Documentation
- [WordPress.org](https://wordpress.org)
- [Bootstrap 5 Docs](https://getbootstrap.com)
- [Font Awesome Icons](https://fontawesome.com)

### Helpful Plugins
- WPForms or Gravity Forms (Contact Forms)
- Yoast SEO (Search Engine Optimization)
- WP Super Cache (Performance)
- Wordfence (Security)

## Next Steps

1. ✅ Customize homepage sections
2. ✅ Create content (News, Projects, Events)
3. ✅ Set up forms and contact information
4. ✅ Configure SEO settings
5. ✅ Install security plugins
6. ✅ Set up regular backups
7. ✅ Test on mobile devices
8. ✅ Go live!

## Troubleshooting Contact

If you encounter issues:

1. **Check Theme Documentation** - See README.md
2. **Review WordPress Logs** - Check error logs
3. **Test in Debug Mode** - Enable WP_DEBUG in wp-config.php
4. **Update Plugins** - Keep all plugins current
5. **Check Conflicts** - Disable plugins one by one

---

**Congratulations!** Your Swarnim Bharat Manch NGO website is now ready! 🎉

For ongoing maintenance and updates, regularly:
- ✅ Update WordPress core
- ✅ Update plugins and theme
- ✅ Backup your website
- ✅ Monitor performance
- ✅ Keep content fresh

Happy website building!
