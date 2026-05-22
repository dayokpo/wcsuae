<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// ENQUEUE
function wcs_enqueue_assets() {
    wp_enqueue_style( 'wcs-fonts', 'https://api.fontshare.com/v2/css?f[]=cabinet-grotesk@400,500,700,800&f[]=satoshi@400,500,700&display=swap', [], null );
    wp_enqueue_style( 'wcs-style', get_template_directory_uri() . '/assets/css/style.css', ['wcs-fonts'], '2.0.0' );
    wp_enqueue_script( 'wcs-main', get_template_directory_uri() . '/assets/js/main.js', [], '2.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wcs_enqueue_assets' );

// THEME SUPPORT
function wcs_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', ['search-form','comment-form','gallery','caption'] );
    add_theme_support( 'custom-logo' );
    register_nav_menus( ['primary' => 'Primary Navigation'] );
}
add_action( 'after_setup_theme', 'wcs_theme_setup' );

// SITE SETTINGS PAGE
function wcs_register_settings_page() {
    add_options_page(
        'WCS Site Settings',
        'WCS Settings',
        'manage_options',
        'wcs-settings',
        'wcs_render_settings_page'
    );
}
add_action( 'admin_menu', 'wcs_register_settings_page' );

function wcs_register_settings() {
    register_setting( 'wcs_settings_group', 'global_phone', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    register_setting( 'wcs_settings_group', 'global_email', [ 'sanitize_callback' => 'sanitize_email' ] );
    register_setting( 'wcs_settings_group', 'footer_tagline', [ 'sanitize_callback' => 'sanitize_textarea_field' ] );
    register_setting( 'wcs_settings_group', 'footer_philosophy', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    register_setting( 'wcs_settings_group', 'footer_copy', [ 'sanitize_callback' => 'sanitize_text_field' ] );
    register_setting( 'wcs_settings_group', 'footer_location', [ 'sanitize_callback' => 'sanitize_text_field' ] );
}
add_action( 'admin_init', 'wcs_register_settings' );

function wcs_setting_default( $key ) {
    $defaults = [
        'global_phone'     => '+971 56 927 0100',
        'global_email'     => 'info@wcs-uae.com',
        'footer_tagline'   => 'Water conservation, environmental compliance, and sustainability advisory for governments, developers, corporate clients, and private individuals across Abu Dhabi and the wider region.',
        'footer_philosophy'=> '"To give each plant as much water as it needs - but not more."',
        'footer_copy'      => '(c) 2026 WCS - Water & Carbon Solutions LLC. All rights reserved.',
        'footer_location'  => 'Masdar City Free Zone - Abu Dhabi, UAE',
    ];

    return isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
}

function wcs_setting_value( $key ) {
    $saved = get_option( $key, null );
    if ( null === $saved || '' === $saved ) {
        return wcs_setting_default( $key );
    }
    return $saved;
}

function wcs_render_settings_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( esc_html__( 'Sorry, you are not allowed to access this page.' ) );
    }
    ?>
    <div class="wrap">
        <h1>WCS Site Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'wcs_settings_group' ); ?>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="global_phone">Phone</label></th>
                    <td><input name="global_phone" id="global_phone" type="text" class="regular-text" value="<?php echo esc_attr( wcs_setting_value( 'global_phone' ) ); ?>"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="global_email">Email</label></th>
                    <td><input name="global_email" id="global_email" type="email" class="regular-text" value="<?php echo esc_attr( wcs_setting_value( 'global_email' ) ); ?>"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="footer_tagline">Footer Tagline</label></th>
                    <td><textarea name="footer_tagline" id="footer_tagline" rows="3" class="large-text"><?php echo esc_textarea( wcs_setting_value( 'footer_tagline' ) ); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row"><label for="footer_philosophy">Footer Philosophy Quote</label></th>
                    <td><input name="footer_philosophy" id="footer_philosophy" type="text" class="regular-text" value="<?php echo esc_attr( wcs_setting_value( 'footer_philosophy' ) ); ?>"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="footer_copy">Copyright Text</label></th>
                    <td><input name="footer_copy" id="footer_copy" type="text" class="regular-text" value="<?php echo esc_attr( wcs_setting_value( 'footer_copy' ) ); ?>"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="footer_location">Footer Location</label></th>
                    <td><input name="footer_location" id="footer_location" type="text" class="regular-text" value="<?php echo esc_attr( wcs_setting_value( 'footer_location' ) ); ?>"></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function wcs_redirect_legacy_settings_url() {
    global $pagenow;

    if ( 'admin.php' !== $pagenow ) {
        return;
    }

    if ( isset( $_GET['page'] ) && 'wcs-settings' === $_GET['page'] ) {
        wp_safe_redirect( admin_url( 'options-general.php?page=wcs-settings' ) );
        exit;
    }
}
add_action( 'admin_init', 'wcs_redirect_legacy_settings_url' );

// HELPERS
function wcs_field( $key, $fallback = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $val = get_field( $key );
        return ( $val !== false && $val !== null && $val !== '' ) ? $val : $fallback;
    }
    return $fallback;
}
function wcs_option( $key, $fallback = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $val = get_field( $key, 'option' );
        if ( $val !== false && $val !== null && $val !== '' ) {
            return $val;
        }
    }
    $val = get_option( $key, null );
    if ( $val !== null && $val !== '' ) {
        return $val;
    }
    return $fallback;
}
function wcs_img( $key, $fallback_file = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $img = get_field( $key );
        if ( ! empty( $img['url'] ) ) return $img;
    }
    return [ 'url' => get_template_directory_uri() . '/assets/images/' . $fallback_file, 'alt' => '' ];
}

// ACF NOTICE
function wcs_acf_notice() {
    if ( ! function_exists( 'get_field' ) ) {
        echo '<div class="notice notice-warning"><p><strong>WCS Theme:</strong> Advanced Custom Fields (ACF) plugin is required. Please install and activate it.</p></div>';
    }
}
add_action( 'admin_notices', 'wcs_acf_notice' );

// LOGO SVG
function wcs_logo_svg( $w = 36, $h = 36 ) {
    printf( '<svg class="nav__logo-mark" viewBox="0 0 40 40" width="%d" height="%d" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <rect width="40" height="40" rx="8" fill="#0C0F14" stroke="rgba(0,174,203,0.3)" stroke-width="1"/>
        <path d="M20 8 C20 8 12 18 12 24 C12 28.4 15.6 32 20 32 C24.4 32 28 28.4 28 24 C28 18 20 8 20 8Z" fill="none" stroke="#00AECB" stroke-width="1.5" stroke-linejoin="round"/>
        <path d="M16 26 Q18 22 20 24 Q22 26 24 22" stroke="#00AECB" stroke-width="1.2" stroke-linecap="round" fill="none" opacity="0.6"/>
        <circle cx="20" cy="19" r="1.5" fill="#00AECB" opacity="0.5"/>
    </svg>', $w, $h );
}
