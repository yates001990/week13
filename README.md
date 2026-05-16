# Nexus Red Team - PHP Web Application

## Project Overview

This is a professional security operations dashboard website built with HTML, CSS, and PHP. The site features a responsive design, dark/light theme toggle, and a functional MPG (Miles Per Gallon) calculator built entirely in PHP.

**Assignment:** Week 12 - Publish Prototype of Term Project  
**Completion Date:** May 2026

## Pages Included (5 Pages)

### 1. **Home (index.php)**
- Welcome page with hero section
- Core features overview
- Mission statement and pillars
- Responsive multi-column layout

### 2. **About (about.php)**
- Company/project mission and values
- Feature highlights
- Key capabilities and benefits
- Professional content panels

### 3. **Applications (applications.php)**
Includes the PHP-powered MPG calculator for fuel efficiency estimation.

### 4. **Portfolio (portfolio.php)**
Project highlights and prototype artifacts

### 5. **Contact (contact.php)** PHP-Powered

## Technical Features

### Navigation
- **Responsive Navigation Menu** on all pages
- Mobile hamburger menu for smaller screens
- Smooth interactions with JavaScript
- Active page highlighting
├── applications.php         # MPG Calculator (PHP-powered)
### Styling
- **Professional CSS** with complete responsive design
- Dark mode (default) and Light mode toggle
- CSS Custom Properties (variables) for consistent theming
- Responsive breakpoints for all device sizes:
  - Desktop (960px+)
  - Tablet (820px)
  - Mobile (640px)

### PHP Implementation
- Server-side form processing
- Input validation and sanitization
- HTML escaping for security
- Number formatting for calculator results
- Session-independent operation (no database required)

### Responsiveness
- Fully responsive layouts across all pages
- Mobile-first CSS approach
- Flexible grid system
- Touch-friendly interface elements
- Optimized for all screen sizes

## Folder Structure

```
portfolio-php/
├── index.php                 # Home page
├── about.php                 # About page
├── applications.php          # Applications overview
├── applications.php          # MPG Calculator (PHP-powered)
├── contact.php              # Contact page (PHP-powered)
├── css/
│   └── style.css            # Main stylesheet (2666 lines)
├── js/
│   └── main.js              # Navigation & theme toggle
├── images/
│   └── stock/               # Stock images
└── README.md                # This file
```

## How to Deploy

### Option 1: InfinityFree (Recommended)
1. Go to https://infinityfree.net
2. Sign up for a free account
3. Create a new website
4. Download FileZilla (https://filezilla-project.org/)
5. Connect to your server using FTP credentials from InfinityFree
6. Upload all files to the public_html folder
7. Access your site at your assigned domain

### Option 2: 000WebHost
1. Go to https://www.000webhost.com
2. Sign up and create a new website
3. Use the File Manager to upload files OR use FTP
4. Upload all PHP, CSS, and image files
5. Your site will be live immediately

### Option 3: Other Free PHP Hosts
- AwardSpace: https://www.awardspace.com
- FreeHosting: https://www.freehosting.com

## File Upload Instructions

1. **Create directory structure:**
   - Upload all .php files to root directory
   - Create a `css` folder and upload `style.css`
   - Create a `js` folder and upload `main.js`
   - Create an `images` folder and upload image files

2. **Using FTP (FileZilla):**
   - Connect with provided FTP credentials
   - Drag and drop files maintaining folder structure
   - Verify all files uploaded correctly

3. **Using Web File Manager:**
   - Upload files through hosting control panel
   - Create folders as needed
   - Ensure proper file permissions

## Features Checklist ✅

Meeting Week 12 Assignment Requirements:

- ✅ **At least 3 pages:** 5 pages created
- ✅ **CSS Navigation Menu:** Professional navigation on every page
- ✅ **Calculator with PHP:** MPG calculator converted to PHP with server-side processing
- ✅ **Responsive Design:** Works on all devices
- ✅ **Professional Styling:** Modern, clean design
- ✅ **Clean Layout:** Professional appearance
- ✅ **Functional URL:** Ready for hosting
- ✅ **All links working:** Internal navigation functional
- ✅ **Dark/Light theme toggle:** Added bonus feature

### Grading Rubric Alignment

| Criteria | Points | Status |
|---|---|---|
| Functional URL with site online | 30 pts | ✅ Ready |
| CSS-styled menu on all pages | 20 pts | ✅ Complete |
| Calculator functionality works | 20 pts | ✅ PHP-powered |
| Clean design and good layout | 10 pts | ✅ Professional |
| At least 3 pages included | 10 pts | ✅ 5 pages |
| Posted to discussion forum on time | 10 pts | ⏰ Submit URL |
| **Total** | **100 pts** | **Ready** |

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Security Features

- HTML escaping for user input
- Form validation before processing
- No external dependencies
- Self-contained application
- No database required

## Future Enhancements

- Database integration for form submissions
- Email notifications
- User accounts
- Data persistence
- Advanced analytics

## Contact Information

For deployment questions or technical support:
- Email: ops@nexusredteam.dev
- Hours: Mon-Fri, 9am-6pm ET

## Version

**Version 1.0** - Initial Release  
**Created:** May 2026  
**Last Updated:** May 2026

---

**Ready for deployment to InfinityFree, 000WebHost, or similar PHP hosting platform.**
