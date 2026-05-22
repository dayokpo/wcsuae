# WCS WordPress Theme v2.0 — Setup Guide

## Requirements
- WordPress 6.0+
- **Advanced Custom Fields (ACF)** — free version works (no Repeater needed)

---

## Installation

1. Upload the `wcs-theme` folder to `/wp-content/themes/`
2. Go to **Appearance → Themes** and activate **WCS Water & Carbon Solutions**
3. Install and activate the **Advanced Custom Fields** plugin

---

## Import ACF Fields

1. Go to **Custom Fields → Tools**
2. Under **Import Field Groups**, click **Choose File**
3. Select `acf-fields.json` from inside the theme folder
4. Click **Import File**

All three field groups appear instantly with default values pre-filled:
- **Homepage Content** — all page sections
- **Calculator Page** — calculator labels, disclaimer, and coefficients
- **WCS Site Settings** — global phone, email, footer text (under WCS Settings in sidebar)

---

## Create Pages

### Homepage
1. Pages → Add New → Title: `Home`
2. Page Attributes → Template → **Homepage**
3. Publish
4. Settings → Reading → set static front page to `Home`
5. Edit the page — all sections appear as ACF tabs

### Calculator
1. Pages → Add New → Title: `Calculator` (slug must be `calculator`)
2. Page Attributes → Template → **Calculator**
3. Publish

---

## Upload Team & Project Images via ACF

On the Homepage edit screen, under each tab you'll find image fields:
- **About tab** → About Image (right card)
- **Expertise tab** → Exp Card 1–4 images, Team 1–3 photos

Upload images directly through these ACF image fields — no need to use the Media Library separately.

The theme ships with the provided images as defaults inside `assets/images/`:
- `tarsheed.jpg`, `alghadeer.jpg`, `forest.jpg` — project cards
- `Christoph.png`, `Firas.png`, `Abhay.png` — team photos

---

## Global Settings

Go to **WCS Settings** in the left admin menu to edit:
- Phone, Email
- Footer tagline and philosophy quote
- Copyright text and location string

---

## File Structure

```
wcs-theme/
├── style.css                  ← Theme declaration
├── functions.php              ← Enqueue, helpers, ACF options page
├── header.php                 ← Navigation
├── footer.php                 ← Footer
├── index.php                  ← Fallback
├── template-homepage.php      ← Full homepage (Hero → Contact)
├── template-calculator.php    ← Savings calculator
├── acf-fields.json            ← Import this into ACF → Tools → Import
└── assets/
    ├── css/style.css
    ├── js/main.js
    └── images/
        ├── tarsheed.jpg
        ├── alghadeer.jpg
        ├── forest.jpg
        ├── Christoph.png
        ├── Firas.png
        ├── Abhay.png
        └── favicon.svg
```

---

## Sections on Homepage (in order)

| Section | ACF Tab | Key Content |
|---|---|---|
| Hero | Hero | Heading, sub, buttons, stats, tags |
| Proof Bar | Proof Bar | 4 service pillar labels |
| About | About Section | Body, image, card, 4 pillars, awards |
| Services | Services | 2 tabs × 9 service cards each |
| Process | Process | 6 steps |
| Calculator CTA | Calculator CTA | Heading, body, button |
| Team Experience | Expertise / Experience | 4 project cards, 3 international cards |
| Clients | Clients & Accreditations | 8 client pills |
| Accreditations | Clients & Accreditations | 12 accreditation pills |
| Why WCS | Why WCS | Body, 4 points, 4 sector cards |
| Team | Team | 3 team members with photos |
| Contact | Contact | Address, phone, email, form |
