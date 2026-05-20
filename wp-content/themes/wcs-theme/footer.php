<!-- ===== FOOTER ===== -->
<footer class="footer">
  <div class="container">
    <div class="footer__inner">

      <!-- Brand -->
      <div class="footer__brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__logo" aria-label="WCS Home" style="text-decoration:none;">
          <svg width="36" height="36" viewBox="0 0 40 40" fill="none" aria-hidden="true">
            <rect width="40" height="40" rx="8" fill="#111520" stroke="rgba(0,174,203,0.25)" stroke-width="1"/>
            <path d="M20 8 C20 8 12 18 12 24 C12 28.4 15.6 32 20 32 C24.4 32 28 28.4 28 24 C28 18 20 8 20 8Z" fill="none" stroke="#00AECB" stroke-width="1.5"/>
            <path d="M16 26 Q18 22 20 24 Q22 26 24 22" stroke="#00AECB" stroke-width="1.2" stroke-linecap="round" fill="none" opacity="0.6"/>
          </svg>
          <div class="nav__logo-text">
            <span class="nav__logo-primary">WCS</span>
            <span class="nav__logo-secondary">Water Conservation Services</span>
          </div>
        </a>
        <p class="footer__tagline"><?php echo esc_html( wcs_option( 'site_tagline', "UAE's specialist water conservation partner — irrigation engineering, demand-side management, and performance-based delivery for commercial and high-value residential assets." ) ); ?></p>
        <p class="footer__philosophy"><?php echo esc_html( wcs_option( 'site_philosophy', '"To give each plant as much water as it needs — but not more."' ) ); ?></p>
      </div>

      <!-- Links -->
      <div class="footer__links">
        <div>
          <div class="footer__links-group-label">Navigation</div>
          <ul class="footer__links-list" role="list">
            <li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>">About WCS</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#projects' ) ); ?>">Projects</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#process' ) ); ?>">Our Process</a></li>
            <li><a href="<?php echo esc_url( get_permalink( get_page_by_path( 'calculator' ) ) ); ?>">Savings Calculator</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact</a></li>
          </ul>
        </div>
      </div>

    </div>

    <div class="footer__bottom">
      <div class="footer__copy"><?php echo esc_html( wcs_option( 'footer_copy', '© 2025 Water Conservation Services Limited. All rights reserved.' ) ); ?></div>
      <div class="footer__masdar"><?php echo esc_html( wcs_option( 'footer_location', 'Masdar City Free Zone · Abu Dhabi, UAE' ) ); ?></div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
