# WCS WordPress Theme — Setup Guide

## Requirements
- WordPress 6.0+
- **Advanced Custom Fields (ACF)** plugin — free or Pro (required for all editable content)

---

## Installation

1. Upload the `wcs-theme` folder to `/wp-content/themes/`
2. In WordPress Admin → Appearance → Themes, activate **WCS Water Conservation Services**
3. Install and activate the **Advanced Custom Fields** plugin

---

## Creating Pages

### Homepage
1. Go to Pages → Add New
2. Title: `Home`
3. Under **Page Attributes** → Template → select **Homepage**
4. Publish the page
5. Go to Settings → Reading → set "Your homepage displays" to "A static page" → select `Home`
6. All 6 content sections now appear as ACF tabs when editing the page:
   - **Hero Section** — eyebrow, heading, sub-heading, CTA buttons, credibility strip items
   - **Proof Numbers** — repeater for metric cards (number, label, sub-label)
   - **About Section** — image, headings, body paragraphs, quote, pillars repeater
   - **Projects Section** — projects repeater (image, tag, title, desc, metrics), client badges
   - **Process Section** — steps repeater (title, desc, tags), delivery models repeater
   - **Calculator Section** — heading, body, button text + URL
   - **Book Assessment Section** — heading, body, contact details, closing quote

### Calculator Page
1. Go to Pages → Add New
2. Title: `Calculator` (slug must be `calculator`)
3. Template → **Calculator**
4. Publish
5. ACF fields appear: section label, page heading, subheading, disclaimer, tariff info, coefficients note, and 5 default coefficient values (editable from WP Admin — change the "planning defaults" without touching code)

---

## Global Site Settings
Go to **WCS Settings** (left menu, below Dashboard) to edit:
- Site tagline & philosophy quote (used in footer)
- Global email, phone, address
- Footer copyright text & location string

---

## Images
Upload project and about images through the ACF image fields on each page. Default SVG placeholders are included in `assets/images/` and will display until replaced.

---

## Contact Form
The contact form on the homepage uses a simulated success state by default (client-side only). To connect it to a real backend:
- Use a plugin like **WPForms**, **CF7**, or **Gravity Forms** and replace the `<form>` block in `template-homepage.php` → Contact section, OR
- Add a server-side handler via `wp-ajax` in `functions.php`

---

## File Structure
```
wcs-theme/
├── style.css                  ← Theme declaration
├── functions.php              ← ACF registration, enqueue, helpers
├── header.php                 ← Navigation
├── footer.php                 ← Footer
├── index.php                  ← Fallback template
├── template-homepage.php      ← Homepage page template (all 6 sections)
├── template-calculator.php    ← Calculator page template
└── assets/
    ├── css/style.css          ← All styles (copied from original)
    ├── js/main.js             ← Nav, scroll reveal, form (copied from original)
    └── images/                ← Default SVG images
```
