<?php
/**
 * WCS Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// -------------------------------------------------------------------
// ENQUEUE STYLES & SCRIPTS
// -------------------------------------------------------------------
function wcs_enqueue_assets() {
    // Fonts
    wp_enqueue_style(
        'wcs-fonts',
        'https://api.fontshare.com/v2/css?f[]=cabinet-grotesk@400,500,700,800&f[]=satoshi@400,500,700&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'wcs-style',
        get_template_directory_uri() . '/assets/css/style.css',
        ['wcs-fonts'],
        '1.0.0'
    );

    // Main JS
    wp_enqueue_script(
        'wcs-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'wcs_enqueue_assets' );

// -------------------------------------------------------------------
// THEME SUPPORT
// -------------------------------------------------------------------
function wcs_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption' ] );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'menus' );

    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'wcs' ),
    ] );
}
add_action( 'after_setup_theme', 'wcs_theme_setup' );

// -------------------------------------------------------------------
// ACF FIELD GROUPS
// -------------------------------------------------------------------
function wcs_register_acf_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

    // ================================================================
    // HOMEPAGE FIELDS
    // ================================================================
    acf_add_local_field_group( [
        'key'    => 'group_wcs_homepage',
        'title'  => 'Homepage Content',
        'fields' => [

            // ── HERO ─────────────────────────────────────────────
            [ 'key' => 'field_hero_tab', 'label' => 'Hero Section', 'name' => '', 'type' => 'tab', 'placement' => 'top' ],
            [ 'key' => 'field_hero_eyebrow',  'label' => 'Eyebrow Text',    'name' => 'hero_eyebrow',  'type' => 'text',     'default_value' => 'Abu Dhabi, UAE · Est. 2025' ],
            [ 'key' => 'field_hero_heading',  'label' => 'Heading',         'name' => 'hero_heading',  'type' => 'textarea', 'rows' => 2, 'default_value' => "UAE's specialist in\nmeasurable water conservation" ],
            [ 'key' => 'field_hero_sub',      'label' => 'Sub-heading',     'name' => 'hero_sub',      'type' => 'textarea', 'rows' => 3, 'default_value' => 'WCS helps commercial property owners, hotels, resorts, and estates reduce outdoor water waste, lower operating costs, and protect landscape quality — through precision irrigation engineering and performance-based delivery.' ],
            [ 'key' => 'field_hero_btn1_text','label' => 'Button 1 Text',   'name' => 'hero_btn1_text','type' => 'text',     'default_value' => 'Book an Assessment' ],
            [ 'key' => 'field_hero_btn1_url', 'label' => 'Button 1 URL',    'name' => 'hero_btn1_url', 'type' => 'text',     'default_value' => '#contact' ],
            [ 'key' => 'field_hero_btn2_text','label' => 'Button 2 Text',   'name' => 'hero_btn2_text','type' => 'text',     'default_value' => 'Estimate My Savings' ],
            [ 'key' => 'field_hero_btn2_url', 'label' => 'Button 2 URL',    'name' => 'hero_btn2_url', 'type' => 'text',     'default_value' => '/calculator' ],
            [
                'key'   => 'field_hero_strip_items',
                'label' => 'Credibility Strip Items',
                'name'  => 'hero_strip_items',
                'type'  => 'repeater',
                'button_label' => 'Add Item',
                'sub_fields' => [
                    [ 'key' => 'field_hero_strip_item_text', 'label' => 'Text', 'name' => 'text', 'type' => 'text' ],
                ],
            ],

            // ── PROOF NUMBERS ────────────────────────────────────
            [ 'key' => 'field_proof_tab', 'label' => 'Proof Numbers', 'name' => '', 'type' => 'tab', 'placement' => 'top' ],
            [
                'key'   => 'field_proof_items',
                'label' => 'Proof Items',
                'name'  => 'proof_items',
                'type'  => 'repeater',
                'min'   => 1,
                'max'   => 4,
                'button_label' => 'Add Metric',
                'sub_fields' => [
                    [ 'key' => 'field_proof_number', 'label' => 'Number / Value', 'name' => 'number', 'type' => 'text' ],
                    [ 'key' => 'field_proof_label',  'label' => 'Label',          'name' => 'label',  'type' => 'text' ],
                    [ 'key' => 'field_proof_sub',    'label' => 'Sub-label',      'name' => 'sub',    'type' => 'text' ],
                ],
            ],

            // ── ABOUT ────────────────────────────────────────────
            [ 'key' => 'field_about_tab', 'label' => 'About Section', 'name' => '', 'type' => 'tab', 'placement' => 'top' ],
            [ 'key' => 'field_about_section_label', 'label' => 'Section Label',  'name' => 'about_section_label', 'type' => 'text', 'default_value' => 'About WCS' ],
            [ 'key' => 'field_about_heading',       'label' => 'Heading',        'name' => 'about_heading',       'type' => 'textarea', 'rows' => 2, 'default_value' => "Water is the UAE's most critical operating cost you're not controlling" ],
            [ 'key' => 'field_about_body_1',        'label' => 'Body Paragraph 1','name' => 'about_body_1',       'type' => 'textarea', 'rows' => 4 ],
            [ 'key' => 'field_about_body_2',        'label' => 'Body Paragraph 2','name' => 'about_body_2',       'type' => 'textarea', 'rows' => 4 ],
            [ 'key' => 'field_about_quote',         'label' => 'Pull Quote',      'name' => 'about_quote',        'type' => 'text', 'default_value' => '"To give each plant as much water as it needs — but not more."' ],
            [ 'key' => 'field_about_image',         'label' => 'About Image',     'name' => 'about_image',        'type' => 'image', 'return_format' => 'array' ],
            [ 'key' => 'field_about_stat_num',      'label' => 'Stat Number',     'name' => 'about_stat_num',     'type' => 'text', 'default_value' => '35–50%' ],
            [ 'key' => 'field_about_stat_label',    'label' => 'Stat Label',      'name' => 'about_stat_label',   'type' => 'text', 'default_value' => 'Typical potable water reduction per project' ],
            [
                'key'   => 'field_about_pillars',
                'label' => 'Pillars',
                'name'  => 'about_pillars',
                'type'  => 'repeater',
                'min'   => 1,
                'button_label' => 'Add Pillar',
                'sub_fields' => [
                    [ 'key' => 'field_pillar_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ],
                    [ 'key' => 'field_pillar_body',  'label' => 'Body',  'name' => 'body',  'type' => 'textarea', 'rows' => 3 ],
                ],
            ],

            // ── PROJECTS ─────────────────────────────────────────
            [ 'key' => 'field_projects_tab', 'label' => 'Projects Section', 'name' => '', 'type' => 'tab', 'placement' => 'top' ],
            [ 'key' => 'field_projects_section_label', 'label' => 'Section Label', 'name' => 'projects_section_label', 'type' => 'text', 'default_value' => 'Case Studies' ],
            [ 'key' => 'field_projects_heading',       'label' => 'Heading',       'name' => 'projects_heading',       'type' => 'textarea', 'rows' => 2, 'default_value' => "Delivered projects.\nVerified results." ],
            [ 'key' => 'field_projects_innovation_title', 'label' => 'Innovation Note Title', 'name' => 'projects_innovation_title', 'type' => 'text', 'default_value' => 'Innovation Project: Sponge City Prototype' ],
            [ 'key' => 'field_projects_innovation_body',  'label' => 'Innovation Note Body',  'name' => 'projects_innovation_body',  'type' => 'textarea', 'rows' => 2 ],
            [
                'key'   => 'field_projects_list',
                'label' => 'Projects',
                'name'  => 'projects_list',
                'type'  => 'repeater',
                'min'   => 1,
                'button_label' => 'Add Project',
                'sub_fields' => [
                    [ 'key' => 'field_proj_tag',      'label' => 'Tag',         'name' => 'tag',      'type' => 'text' ],
                    [ 'key' => 'field_proj_title',    'label' => 'Title',       'name' => 'title',    'type' => 'text' ],
                    [ 'key' => 'field_proj_desc',     'label' => 'Description', 'name' => 'desc',     'type' => 'textarea', 'rows' => 4 ],
                    [ 'key' => 'field_proj_featured', 'label' => 'Featured (large card)', 'name' => 'featured', 'type' => 'true_false', 'ui' => 1 ],
                    [ 'key' => 'field_proj_image',    'label' => 'Image',       'name' => 'image',    'type' => 'image', 'return_format' => 'array' ],
                    [
                        'key'   => 'field_proj_metrics',
                        'label' => 'Metrics',
                        'name'  => 'metrics',
                        'type'  => 'repeater',
                        'max'   => 4,
                        'button_label' => 'Add Metric',
                        'sub_fields' => [
                            [ 'key' => 'field_proj_metric_val',   'label' => 'Value', 'name' => 'value', 'type' => 'text' ],
                            [ 'key' => 'field_proj_metric_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ],
                        ],
                    ],
                ],
            ],
            [
                'key'   => 'field_clients',
                'label' => 'Client Badges',
                'name'  => 'clients',
                'type'  => 'repeater',
                'button_label' => 'Add Client',
                'sub_fields' => [
                    [ 'key' => 'field_client_name', 'label' => 'Name', 'name' => 'name', 'type' => 'text' ],
                ],
            ],

            // ── PROCESS ──────────────────────────────────────────
            [ 'key' => 'field_process_tab', 'label' => 'Process Section', 'name' => '', 'type' => 'tab', 'placement' => 'top' ],
            [ 'key' => 'field_process_section_label', 'label' => 'Section Label', 'name' => 'process_section_label', 'type' => 'text', 'default_value' => 'How We Work' ],
            [ 'key' => 'field_process_heading',       'label' => 'Heading',       'name' => 'process_heading',       'type' => 'textarea', 'rows' => 2, 'default_value' => "Structured. Accountable.\nPerformance-verified." ],
            [ 'key' => 'field_process_intro_body',    'label' => 'Intro Body',    'name' => 'process_intro_body',    'type' => 'textarea', 'rows' => 3 ],
            [
                'key'   => 'field_process_steps',
                'label' => 'Process Steps',
                'name'  => 'process_steps',
                'type'  => 'repeater',
                'min'   => 1,
                'button_label' => 'Add Step',
                'sub_fields' => [
                    [ 'key' => 'field_step_title', 'label' => 'Title',       'name' => 'title', 'type' => 'text' ],
                    [ 'key' => 'field_step_desc',  'label' => 'Description', 'name' => 'desc',  'type' => 'textarea', 'rows' => 3 ],
                    [ 'key' => 'field_step_tags',  'label' => 'Tags (comma-separated)', 'name' => 'tags', 'type' => 'text' ],
                ],
            ],
            [
                'key'   => 'field_delivery_models',
                'label' => 'Delivery Models',
                'name'  => 'delivery_models',
                'type'  => 'repeater',
                'max'   => 4,
                'button_label' => 'Add Model',
                'sub_fields' => [
                    [ 'key' => 'field_dm_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ],
                    [ 'key' => 'field_dm_body',  'label' => 'Body',  'name' => 'body',  'type' => 'textarea', 'rows' => 2 ],
                ],
            ],

            // ── CALCULATOR TEASER ────────────────────────────────
            [ 'key' => 'field_calc_tab', 'label' => 'Calculator Section', 'name' => '', 'type' => 'tab', 'placement' => 'top' ],
            [ 'key' => 'field_calc_section_label', 'label' => 'Section Label', 'name' => 'calc_section_label', 'type' => 'text', 'default_value' => 'Savings Estimator' ],
            [ 'key' => 'field_calc_heading',       'label' => 'Heading',       'name' => 'calc_heading',       'type' => 'textarea', 'rows' => 2, 'default_value' => 'How much are you paying for water you don\'t need?' ],
            [ 'key' => 'field_calc_body_1',        'label' => 'Body Paragraph 1', 'name' => 'calc_body_1', 'type' => 'textarea', 'rows' => 3 ],
            [ 'key' => 'field_calc_body_2',        'label' => 'Body Paragraph 2', 'name' => 'calc_body_2', 'type' => 'textarea', 'rows' => 3 ],
            [ 'key' => 'field_calc_btn_text',      'label' => 'Button Text',   'name' => 'calc_btn_text', 'type' => 'text', 'default_value' => 'Open Savings Calculator' ],
            [ 'key' => 'field_calc_page_url',      'label' => 'Calculator Page URL', 'name' => 'calc_page_url', 'type' => 'text', 'default_value' => '/calculator' ],
            [ 'key' => 'field_calc_note',          'label' => 'Disclaimer Note', 'name' => 'calc_note', 'type' => 'text' ],

            // ── CONTACT / BOOK ASSESSMENT ────────────────────────
            [ 'key' => 'field_contact_tab', 'label' => 'Book Assessment Section', 'name' => '', 'type' => 'tab', 'placement' => 'top' ],
            [ 'key' => 'field_contact_section_label', 'label' => 'Section Label', 'name' => 'contact_section_label', 'type' => 'text', 'default_value' => 'Get in Touch' ],
            [ 'key' => 'field_contact_heading',       'label' => 'Heading',       'name' => 'contact_heading',       'type' => 'textarea', 'rows' => 2, 'default_value' => "Reduce your water cost.\nProtect your landscape." ],
            [ 'key' => 'field_contact_body',          'label' => 'Body',          'name' => 'contact_body',          'type' => 'textarea', 'rows' => 3 ],
            [ 'key' => 'field_contact_office',        'label' => 'Office Address', 'name' => 'contact_office',       'type' => 'textarea', 'rows' => 4, 'default_value' => "Smart Station, First Floor\nIncubator Building\nMasdar City, Abu Dhabi\nUnited Arab Emirates" ],
            [ 'key' => 'field_contact_email',         'label' => 'Email',          'name' => 'contact_email',        'type' => 'email',    'default_value' => 'info@wcs-uae.com' ],
            [ 'key' => 'field_contact_phone',         'label' => 'Phone',          'name' => 'contact_phone',        'type' => 'text',     'default_value' => '+971 50 325 1183' ],
            [ 'key' => 'field_contact_license',       'label' => 'License Info',   'name' => 'contact_license',      'type' => 'textarea', 'rows' => 3, 'default_value' => "Water Conservation Services Limited\nMasdar City Free Zone · Abu Dhabi, UAE\nProvisional Approval — Under Formation" ],
            [ 'key' => 'field_contact_closing_quote', 'label' => 'Closing Quote',  'name' => 'contact_closing_quote','type' => 'textarea', 'rows' => 2 ],

        ],
        'location' => [
            [ [ 'param' => 'page_template', 'operator' => '==', 'value' => 'template-homepage.php' ] ],
        ],
        'menu_order' => 0,
        'style'      => 'seamless',
    ] );

    // ================================================================
    // CALCULATOR PAGE FIELDS
    // ================================================================
    acf_add_local_field_group( [
        'key'    => 'group_wcs_calculator',
        'title'  => 'Calculator Page Content',
        'fields' => [
            [ 'key' => 'field_calc_page_section_label', 'label' => 'Section Label',  'name' => 'calc_page_section_label', 'type' => 'text',     'default_value' => 'Savings Estimator' ],
            [ 'key' => 'field_calc_page_heading',       'label' => 'Page Heading',   'name' => 'calc_page_heading',       'type' => 'text',     'default_value' => 'Water Savings Calculator' ],
            [ 'key' => 'field_calc_page_subheading',    'label' => 'Sub-heading',    'name' => 'calc_page_subheading',    'type' => 'textarea', 'rows' => 2, 'default_value' => 'Estimate your irrigation savings potential based on your outdoor area, planting mix, and utility bills. Results are indicative — a site audit will provide verified figures.' ],
            [ 'key' => 'field_calc_page_disclaimer',   'label' => 'Disclaimer',     'name' => 'calc_page_disclaimer',   'type' => 'textarea', 'rows' => 2, 'default_value' => 'Indicative only. Final savings depend on site audit findings, irrigation hardware condition, operating schedules, water source, soil conditions, and applicable tariff structure. This calculator is a planning tool, not an engineering guarantee.' ],
            [ 'key' => 'field_calc_tariff_info',       'label' => 'Tariff Info Text','name' => 'calc_tariff_info',       'type' => 'textarea', 'rows' => 2, 'default_value' => 'Tariff reference: TAQA Abu Dhabi residential ≈ AED 2.95–6.65/m³ · DEWA Dubai ≈ AED 3.12–8.59/m³ · Commercial tariffs vary.' ],
            [ 'key' => 'field_calc_coefficients_note', 'label' => 'Coefficients Note', 'name' => 'calc_coefficients_note', 'type' => 'textarea', 'rows' => 3 ],
            // Default coefficients (editable)
            [ 'key' => 'field_coeff_palms',       'label' => 'Default Coeff: Palms (m³/palm/mo)',      'name' => 'coeff_palms',       'type' => 'number', 'default_value' => 2.5,   'step' => 0.1 ],
            [ 'key' => 'field_coeff_trees',       'label' => 'Default Coeff: Trees (m³/tree/mo)',      'name' => 'coeff_trees',       'type' => 'number', 'default_value' => 1.8,   'step' => 0.1 ],
            [ 'key' => 'field_coeff_shrubs',      'label' => 'Default Coeff: Shrubs (m³/m²/mo)',      'name' => 'coeff_shrubs',      'type' => 'number', 'default_value' => 0.018, 'step' => 0.001 ],
            [ 'key' => 'field_coeff_groundcover', 'label' => 'Default Coeff: Ground Cover (m³/m²/mo)','name' => 'coeff_groundcover', 'type' => 'number', 'default_value' => 0.012, 'step' => 0.001 ],
            [ 'key' => 'field_coeff_turf',        'label' => 'Default Coeff: Turf (m³/m²/mo)',        'name' => 'coeff_turf',        'type' => 'number', 'default_value' => 0.045, 'step' => 0.001 ],
        ],
        'location' => [
            [ [ 'param' => 'page_template', 'operator' => '==', 'value' => 'template-calculator.php' ] ],
        ],
        'menu_order' => 0,
        'style'      => 'seamless',
    ] );

    // ================================================================
    // GLOBAL / SITE SETTINGS
    // ================================================================
    acf_add_local_field_group( [
        'key'    => 'group_wcs_global',
        'title'  => 'WCS Site Settings',
        'fields' => [
            [ 'key' => 'field_global_tab_branding', 'label' => 'Branding', 'name' => '', 'type' => 'tab', 'placement' => 'top' ],
            [ 'key' => 'field_site_tagline',    'label' => 'Site Tagline',  'name' => 'site_tagline',    'type' => 'text', 'default_value' => 'UAE\'s specialist water conservation partner' ],
            [ 'key' => 'field_site_philosophy', 'label' => 'Philosophy Quote','name' => 'site_philosophy','type' => 'text', 'default_value' => '"To give each plant as much water as it needs — but not more."' ],
            [ 'key' => 'field_global_tab_contact', 'label' => 'Contact Info', 'name' => '', 'type' => 'tab', 'placement' => 'top' ],
            [ 'key' => 'field_global_email',    'label' => 'Email',         'name' => 'global_email',    'type' => 'email', 'default_value' => 'info@wcs-uae.com' ],
            [ 'key' => 'field_global_phone',    'label' => 'Phone',         'name' => 'global_phone',    'type' => 'text',  'default_value' => '+971 50 325 1183' ],
            [ 'key' => 'field_global_address',  'label' => 'Address',       'name' => 'global_address',  'type' => 'textarea', 'rows' => 4 ],
            [ 'key' => 'field_global_tab_footer', 'label' => 'Footer', 'name' => '', 'type' => 'tab', 'placement' => 'top' ],
            [ 'key' => 'field_footer_copy',     'label' => 'Copyright Text','name' => 'footer_copy',     'type' => 'text',  'default_value' => '© 2025 Water Conservation Services Limited. All rights reserved.' ],
            [ 'key' => 'field_footer_location', 'label' => 'Location Text', 'name' => 'footer_location', 'type' => 'text',  'default_value' => 'Masdar City Free Zone · Abu Dhabi, UAE' ],
        ],
        'location' => [
            [ [ 'param' => 'options_page', 'operator' => '==', 'value' => 'wcs-settings' ] ],
        ],
        'menu_order' => 0,
        'style'      => 'seamless',
    ] );
}
add_action( 'acf/init', 'wcs_register_acf_fields' );

// -------------------------------------------------------------------
// ACF OPTIONS PAGE (Global Settings)
// -------------------------------------------------------------------
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

// -------------------------------------------------------------------
// HELPERS
// -------------------------------------------------------------------

/**
 * Get a global option from ACF options page.
 */
function wcs_option( $key, $fallback = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $val = get_field( $key, 'option' );
        return $val ?: $fallback;
    }
    return $fallback;
}

/**
 * Get an ACF field with fallback.
 */
function wcs_field( $key, $fallback = '', $post_id = null ) {
    if ( function_exists( 'get_field' ) ) {
        $val = $post_id ? get_field( $key, $post_id ) : get_field( $key );
        return $val !== false && $val !== null && $val !== '' ? $val : $fallback;
    }
    return $fallback;
}

/**
 * Render section label.
 */
function wcs_section_label( $text, $class = '' ) {
    if ( ! $text ) return;
    printf( '<div class="section-label reveal%s">%s</div>', $class ? ' ' . esc_attr( $class ) : '', esc_html( $text ) );
}

/**
 * Render the WCS SVG logo mark.
 */
function wcs_logo_svg( $width = 40, $height = 40 ) {
    printf(
        '<svg class="nav__logo-mark" viewBox="0 0 40 40" width="%d" height="%d" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <rect width="40" height="40" rx="8" fill="#0C0F14" stroke="rgba(0,174,203,0.3)" stroke-width="1"/>
            <path d="M20 8 C20 8 12 18 12 24 C12 28.4 15.6 32 20 32 C24.4 32 28 28.4 28 24 C28 18 20 8 20 8Z" fill="none" stroke="#00AECB" stroke-width="1.5" stroke-linejoin="round"/>
            <path d="M16 26 Q18 22 20 24 Q22 26 24 22" stroke="#00AECB" stroke-width="1.2" stroke-linecap="round" fill="none" opacity="0.6"/>
            <circle cx="20" cy="19" r="1.5" fill="#00AECB" opacity="0.5"/>
        </svg>',
        $width, $height
    );
}

/**
 * ACF notice if plugin not active.
 */
function wcs_acf_notice() {
    if ( ! function_exists( 'get_field' ) ) {
        echo '<div class="notice notice-warning"><p><strong>WCS Theme:</strong> Advanced Custom Fields (ACF) plugin is required for editable content. Please install and activate ACF.</p></div>';
    }
}
add_action( 'admin_notices', 'wcs_acf_notice' );
