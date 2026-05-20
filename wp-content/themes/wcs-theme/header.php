<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="dark">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>

  <!-- Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "WCS – Water Conservation Services",
    "description": "Specialist water conservation company reducing outdoor water waste for commercial and residential clients in the UAE.",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Smart Station, First Floor, Incubator Building",
      "addressLocality": "Masdar City",
      "addressRegion": "Abu Dhabi",
      "addressCountry": "AE"
    },
    "url": "<?php echo esc_url( home_url() ); ?>",
    "telephone": "<?php echo esc_js( wcs_option( 'global_phone', '+971503251183' ) ); ?>",
    "email": "<?php echo esc_js( wcs_option( 'global_email', 'info@wcs-uae.com' ) ); ?>"
  }
  </script>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip Link -->
<a href="#main" class="skip-link">Skip to content</a>

<!-- ===== NAVIGATION ===== -->
<nav class="nav<?php echo is_page_template( 'template-calculator.php' ) ? ' scrolled' : ''; ?>" id="nav" aria-label="Main navigation">
  <div class="nav__inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__logo" aria-label="WCS Home">
      <?php wcs_logo_svg(); ?>
      <div class="nav__logo-text">
        <span class="nav__logo-primary">WCS</span>
        <span class="nav__logo-secondary">Water Conservation Services</span>
      </div>
    </a>

    <!-- Desktop Nav -->
    <ul class="nav__links" role="list">
      <li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>">About</a></li>
      <li><a href="<?php echo esc_url( home_url( '/#projects' ) ); ?>">Projects</a></li>
      <li><a href="<?php echo esc_url( home_url( '/#process' ) ); ?>">Process</a></li>
      <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'calculator' ) ) ); ?>">Calculator</a></li>
      <li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="nav__cta">Book Assessment</a></li>
    </ul>

    <!-- Mobile Hamburger -->
    <button class="nav__hamburger" id="hamburger" aria-label="Open menu" aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</nav>

<!-- Mobile Nav Overlay -->
<div class="nav__mobile" id="mobileNav" role="navigation" aria-label="Mobile navigation">
  <a href="<?php echo esc_url( home_url( '/#about' ) ); ?>" class="mobile-link">About</a>
  <a href="<?php echo esc_url( home_url( '/#projects' ) ); ?>" class="mobile-link">Projects</a>
  <a href="<?php echo esc_url( home_url( '/#process' ) ); ?>" class="mobile-link">Process</a>
  <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'calculator' ) ) ); ?>" class="mobile-link">Calculator</a>
  <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="mobile-link">Contact</a>
</div>
