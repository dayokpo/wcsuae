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
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page( [
            'page_title' => 'WCS Site Settings',
            'menu_title' => 'WCS Settings',
            'menu_slug'  => 'wcs-settings',
            'capability' => 'manage_options',
            'icon_url'   => 'dashicons-admin-site',
            'position'   => 20,
        ] );
    }
}
add_action( 'acf/init', 'wcs_register_options_page' );

function wcs_option( $key, $fallback = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $val = get_field( $key, 'option' );
        return ( $val !== false && $val !== null && $val !== '' ) ? $val : $fallback;
    }
    return $fallback;
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
