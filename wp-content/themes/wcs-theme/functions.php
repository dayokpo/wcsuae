<?php
/**
 * WCS Theme Functions
 * No ACF Repeater required — all fields are flat/individual.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function wcs_enqueue_assets() {
    wp_enqueue_style( 'wcs-fonts',
        'https://api.fontshare.com/v2/css?f[]=cabinet-grotesk@400,500,700,800&f[]=satoshi@400,500,700&display=swap',
        [], null );
    wp_enqueue_style( 'wcs-style',
        get_template_directory_uri() . '/assets/css/style.css',
        ['wcs-fonts'], '1.0.0' );
    wp_enqueue_script( 'wcs-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [], '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wcs_enqueue_assets' );

function wcs_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', ['search-form','comment-form','gallery','caption'] );
    add_theme_support( 'custom-logo' );
    register_nav_menus( ['primary' => __( 'Primary Navigation', 'wcs' )] );
}
add_action( 'after_setup_theme', 'wcs_theme_setup' );

function wcs_register_options_page() {
    add_menu_page(
        'WCS Site Settings',
        'WCS Settings',
        'manage_options',
        'wcs-settings',
        'wcs_render_options_page',
        'dashicons-admin-site',
        20
    );
}
add_action( 'admin_menu', 'wcs_register_options_page' );

function wcs_render_options_page() {
    if ( ! current_user_can( 'manage_options' ) ) return;

    $sections = [
        'Branding'     => [ 'site_tagline' => 'Site Tagline', 'site_philosophy' => 'Philosophy Quote' ],
        'Contact Info' => [ 'global_email' => 'Email',        'global_phone'    => 'Phone' ],
        'Footer'       => [ 'footer_copy'  => 'Copyright Text', 'footer_location' => 'Location Text' ],
    ];

    $saved = false;
    if (
        isset( $_POST['wcs_settings_nonce'] ) &&
        wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['wcs_settings_nonce'] ) ), 'wcs_save_settings' )
    ) {
        foreach ( $sections as $fields ) {
            foreach ( array_keys( $fields ) as $key ) {
                update_option( 'wcs_' . $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ?? '' ) ) );
            }
        }
        $saved = true;
    }

    echo '<div class="wrap"><h1>WCS Site Settings</h1>';
    if ( $saved ) echo '<div class="notice notice-success is-dismissible"><p>Settings saved.</p></div>';
    echo '<form method="post">';
    wp_nonce_field( 'wcs_save_settings', 'wcs_settings_nonce' );

    foreach ( $sections as $section => $fields ) {
        echo '<h2>' . esc_html( $section ) . '</h2><table class="form-table"><tbody>';
        foreach ( $fields as $key => $label ) {
            $val = esc_attr( get_option( 'wcs_' . $key, '' ) );
            echo "<tr><th><label for=\"{$key}\">{$label}</label></th>"
               . "<td><input type=\"text\" id=\"{$key}\" name=\"{$key}\" value=\"{$val}\" class=\"large-text\"></td></tr>";
        }
        echo '</tbody></table>';
    }

    submit_button();
    echo '</form></div>';
}

function wcs_option( $key, $fallback = '' ) {
    $val = get_option( 'wcs_' . $key, '' );
    return ( $val !== false && $val !== '' ) ? $val : $fallback;
}

function wcs_field( $key, $fallback = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $val = get_field( $key );
        return ( $val !== false && $val !== null && $val !== '' ) ? $val : $fallback;
    }
    return $fallback;
}

function wcs_section_label( $text ) {
    if ( ! $text ) return;
    echo '<div class="section-label reveal">' . esc_html( $text ) . '</div>';
}

function wcs_logo_svg() {
    echo '<svg class="nav__logo-mark" viewBox="0 0 40 40" width="40" height="40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <rect width="40" height="40" rx="8" fill="#0C0F14" stroke="rgba(0,174,203,0.3)" stroke-width="1"/>
        <path d="M20 8 C20 8 12 18 12 24 C12 28.4 15.6 32 20 32 C24.4 32 28 28.4 28 24 C28 18 20 8 20 8Z" fill="none" stroke="#00AECB" stroke-width="1.5" stroke-linejoin="round"/>
        <path d="M16 26 Q18 22 20 24 Q22 26 24 22" stroke="#00AECB" stroke-width="1.2" stroke-linecap="round" fill="none" opacity="0.6"/>
        <circle cx="20" cy="19" r="1.5" fill="#00AECB" opacity="0.5"/>
    </svg>';
}

function wcs_acf_notice() {
    if ( ! function_exists( 'get_field' ) ) {
        echo '<div class="notice notice-warning"><p><strong>WCS Theme:</strong> Advanced Custom Fields (ACF) plugin is required. Please install and activate it.</p></div>';
    }
}
add_action( 'admin_notices', 'wcs_acf_notice' );
