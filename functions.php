<?php

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup.
 */
function reikiflow_setup()
{
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'reikiflow'),
        )
    );

    register_block_pattern_category(
        'reikiflow',
        array(
            'label' => __('ReikiFlow', 'reikiflow'),
        )
    );
}
add_action('after_setup_theme', 'reikiflow_setup');

/**
 * Register blocks.
 */
function reikiflow_register_blocks()
{
    $blocks_dir = get_theme_file_path('blocks');

    if (!is_dir($blocks_dir)) {
        return;
    }

    foreach (glob($blocks_dir . '/*/block.json') as $block_json) {
        register_block_type(dirname($block_json));
    }
}
add_action('init', 'reikiflow_register_blocks');

/**
 * Register custom block categories.
 */
function reikiflow_block_categories($categories)
{
    return array_merge(
        array(
            array(
                'slug'  => 'reikiflow',
                'title' => __('ReikiFlow', 'reikiflow'),
            ),
        ),
        $categories
    );
}
add_filter('block_categories_all', 'reikiflow_block_categories');

/**
 * Enqueue front-end assets.
 */
function reikiflow_enqueue_assets()
{
    $css_path = get_theme_file_path('assets/dist/css/theme.css');

    if (file_exists($css_path)) {
        wp_enqueue_style(
            'reikiflow-theme-css',
            get_theme_file_uri('assets/dist/css/theme.css'),
            array(),
            filemtime($css_path)
        );
    }
}
add_action('wp_enqueue_scripts', 'reikiflow_enqueue_assets');

/**
 * Enqueue editor assets.
 */
function reikiflow_enqueue_editor_assets()
{
    $css_path = get_theme_file_path('assets/dist/css/theme.css');

    if (file_exists($css_path)) {
        wp_enqueue_style(
            'reikiflow-editor-css',
            get_theme_file_uri('assets/dist/css/theme.css'),
            array(),
            filemtime($css_path)
        );
    }
}
add_action('enqueue_block_editor_assets', 'reikiflow_enqueue_editor_assets');

/**
 * ---------------------------------------------------------------------------
 * Language Switch
 * ---------------------------------------------------------------------------
 * Shortcode + callable function that renders EN | PL links pointing to the
 * current page's counterpart (assumes /pl/ prefix for Polish). Falls back to
 * home_url() when there is no request URI (CLI, feed, etc.). Also sets
 * hreflang attributes for SEO.
 */

function reikiflow_lang_switch_shortcode()
{
    ob_start();
    reikiflow_lang_switch();
    return ob_get_clean();
}
add_shortcode('reikiflow_lang_switch', 'reikiflow_lang_switch_shortcode');

function reikiflow_lang_switch()
{
    $current_locale = determine_locale();
    $is_english     = ($current_locale === 'en_US');

    $current_path = '';
    if (isset($_SERVER['REQUEST_URI'])) {
        $current_path = esc_url_raw(wp_unslash($_SERVER['REQUEST_URI']));
        $current_path = parse_url($current_path, PHP_URL_PATH) ?: '';
    }

    // Determine EN and PL URLs based on current path.
    if ($current_path && $current_path !== '/') {
        $has_pl_prefix = str_starts_with($current_path, '/pl/');

        if ($has_pl_prefix) {
            $en_path = substr($current_path, 3) ?: '/';
            $pl_path = $current_path;
        } else {
            $en_path = $current_path;
            $pl_path = '/pl' . $current_path;
        }

        $en_url = home_url($en_path);
        $pl_url = home_url($pl_path);
    } else {
        $en_url = home_url('/');
        $pl_url = home_url('/pl/');
    }

    $en_class = $is_english ? 'lang-link is-active' : 'lang-link';
    $pl_class = $is_english ? 'lang-link' : 'lang-link is-active';

    printf(
        '<div class="lang-switch">
			<a href="%s" class="%s" hreflang="en-US" lang="en-US" aria-label="Switch to English"%s>EN</a>
			<span class="lang-separator" aria-hidden="true">|</span>
			<a href="%s" class="%s" hreflang="pl-PL" lang="pl-PL" aria-label="Przełącz na polski"%s>PL</a>
		</div>',
        esc_url($en_url),
        esc_attr($en_class),
        $is_english ? ' aria-current="true"' : '',
        esc_url($pl_url),
        esc_attr($pl_class),
        ! $is_english ? ' aria-current="true"' : ''
    );
}

/**
 * ---------------------------------------------------------------------------
 * WS-Form helpers
 * ---------------------------------------------------------------------------
 */

function reikiflow_newsletter_form_shortcode()
{
    $current_locale = determine_locale();
    $is_english     = ($current_locale === 'en_US');
    $form_id        = $is_english ? 1 : 3;

    return do_shortcode(sprintf('[ws_form id="%d"]', $form_id));
}
add_shortcode('reikiflow_newsletter', 'reikiflow_newsletter_form_shortcode');

function reikiflow_contact_form_shortcode()
{
    $current_locale = determine_locale();
    $is_english     = ($current_locale === 'en_US');
    $form_id        = $is_english ? 2 : 4;

    return do_shortcode(sprintf('[ws_form id="%d"]', $form_id));
}
add_shortcode('reikiflow_contact_form', 'reikiflow_contact_form_shortcode');


/**
 * ---------------------------------------------------------------------------
 * Require plugins
 * ---------------------------------------------------------------------------
 */

require_once get_theme_file_path('inc/plugins.php');
