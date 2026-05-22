<footer class="footer">
  <div class="container">
    <div class="footer__inner">
      <div>
        <a href="<?php echo esc_url( home_url('/') ); ?>" class="nav__logo" aria-label="WCS Home" style="text-decoration:none;">
          <?php wcs_logo_svg(32,32); ?>
          <div class="nav__logo-text">
            <span class="nav__logo-primary">WCS</span>
            <span class="nav__logo-secondary">Water &amp; Carbon Solutions LLC</span>
          </div>
        </a>
        <p class="footer__tagline"><?php echo esc_html( wcs_option('footer_tagline','Water conservation, environmental compliance, and sustainability advisory for governments, developers, corporate clients, and private individuals across Abu Dhabi and the wider region.') ); ?></p>
        <p class="footer__philosophy"><?php echo esc_html( wcs_option('footer_philosophy','"To give each plant as much water as it needs — but not more."') ); ?></p>
      </div>
      <div>
        <div class="footer__links-label">Navigation</div>
        <ul class="footer__links-list" role="list">
          <li><a href="<?php echo esc_url( home_url('/#about') ); ?>">About WCS</a></li>
          <li><a href="<?php echo esc_url( home_url('/#services') ); ?>">Services</a></li>
          <li><a href="<?php echo esc_url( home_url('/#process') ); ?>">How We Work</a></li>
          <li><a href="<?php echo esc_url( home_url('/#expertise') ); ?>">Team Experience</a></li>
          <li><a href="<?php echo esc_url( home_url('/#team') ); ?>">Our Team</a></li>
          <li><a href="<?php echo esc_url( home_url('/calculator') ); ?>">Water Savings Calculator</a></li>
        </ul>
      </div>
      <div>
        <div class="footer__links-label">Contact</div>
        <ul class="footer__links-list" role="list">
          <li><a href="<?php echo esc_url( home_url('/#contact') ); ?>">Discuss Your Project</a></li>
          <li><a href="tel:<?php echo esc_attr( preg_replace('/\s+/','', wcs_option('global_phone','+97156927010')) ); ?>"><?php echo esc_html( wcs_option('global_phone','+971 56 927 0100') ); ?></a></li>
          <li><a href="mailto:<?php echo esc_attr( wcs_option('global_email','info@wcs-uae.com') ); ?>"><?php echo esc_html( wcs_option('global_email','info@wcs-uae.com') ); ?></a></li>
          <li style="color:var(--text-3);font-size:.82rem;margin-top:.75rem;line-height:1.6;">Masdar City Free Zone<br>Abu Dhabi, UAE</li>
        </ul>
      </div>
    </div>
    <div class="footer__bottom">
      <div><?php echo esc_html( wcs_option('footer_copy','© 2026 WCS – Water & Carbon Solutions LLC. All rights reserved.') ); ?></div>
      <div><?php echo esc_html( wcs_option('footer_location','Masdar City Free Zone · Abu Dhabi, UAE') ); ?></div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
