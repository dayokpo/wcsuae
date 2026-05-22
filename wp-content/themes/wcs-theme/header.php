<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="dark">
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon.svg' ); ?>" type="image/svg+xml" />
  <?php wp_head(); ?>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"LocalBusiness","name":"WCS – Water & Carbon Solutions LLC","description":"Water conservation, environmental compliance, and sustainability advisory for governments, developers, and private clients across Abu Dhabi.","address":{"@type":"PostalAddress","addressLocality":"Masdar City","addressRegion":"Abu Dhabi","addressCountry":"AE"},"url":"<?php echo esc_js( home_url() ); ?>","telephone":"<?php echo esc_js( wcs_option('global_phone','+97156927010') ); ?>","email":"<?php echo esc_js( wcs_option('global_email','info@wcs-uae.com') ); ?>"}
  </script>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a href="#main" class="skip-link">Skip to content</a>

<nav class="nav<?php echo is_page_template('template-calculator.php') ? ' scrolled' : ''; ?>" id="nav" aria-label="Main navigation">
  <div class="nav__inner">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="nav__logo" aria-label="WCS Home">
      <?php wcs_logo_svg(); ?>
      <div class="nav__logo-text">
        <span class="nav__logo-primary">WCS</span>
        <span class="nav__logo-secondary">Water &amp; Carbon Solutions</span>
      </div>
    </a>
    <ul class="nav__links" role="list">
      <li><a href="<?php echo esc_url( home_url('/#about') ); ?>">About</a></li>
      <li><a href="<?php echo esc_url( home_url('/#services') ); ?>">Services</a></li>
      <li><a href="<?php echo esc_url( home_url('/#process') ); ?>">How We Work</a></li>
      <li><a href="<?php echo esc_url( home_url('/#expertise') ); ?>">Experience</a></li>
      <li><a href="<?php echo esc_url( home_url('/#team') ); ?>">Team</a></li>
      <li><a href="<?php echo esc_url( home_url('/#contact') ); ?>" class="nav__cta">Discuss Your Project</a></li>
    </ul>
    <button class="nav__hamburger" id="hamburger" aria-label="Open menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<div class="nav__mobile" id="mobileNav" role="navigation" aria-label="Mobile navigation">
  <a href="<?php echo esc_url( home_url('/#about') ); ?>" class="mobile-link">About</a>
  <a href="<?php echo esc_url( home_url('/#services') ); ?>" class="mobile-link">Services</a>
  <a href="<?php echo esc_url( home_url('/#process') ); ?>" class="mobile-link">How We Work</a>
  <a href="<?php echo esc_url( home_url('/#expertise') ); ?>" class="mobile-link">Experience</a>
  <a href="<?php echo esc_url( home_url('/#team') ); ?>" class="mobile-link">Team</a>
  <a href="<?php echo esc_url( home_url('/#contact') ); ?>" class="mobile-link">Contact</a>
  <a href="<?php echo esc_url( home_url('/calculator') ); ?>" class="mobile-link">Calculator</a>
</div>
