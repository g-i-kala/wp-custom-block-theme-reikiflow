<?php

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Functions for the Reikiflow theme
 *
 * @package reikiflow
 * @author  karo_ej
 * @license GNU General Public License v2 or later
 *
 */

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


    add_editor_style(
        array(
            './style.css',
            // Disable this if you don't want to include the CSS Framework in the editor - see my tutorial here: https://jakson.co/css-framework-tutorial
            //'/assets/css/css-framework.css',
            // Disable this if you don't want to include the Font Icons CSS in the editor - see my tutorial here: https://jakson.co/button-font-icons-tutorial
            '/assets/css/icon-fonts.css'
        )
    );


    remove_theme_support('core-block-patterns');

}
add_action('after_setup_theme', 'reikiflow_setup');


// Loads styles and scripts
function reikiflow_enqueue_scripts()
{

    wp_enqueue_style('reikiflow-theme-css', get_stylesheet_uri(), [], filemtime(get_stylesheet_directory() . '/style.css'));

    // Disable this if you want don't want to include the CSS Framework
    //wp_enqueue_style( 'css-framework', get_stylesheet_directory_uri() . '/assets/css/css-framework.css', [], filemtime(get_stylesheet_directory() . '/assets/css/css-framework.css') );
    // Disable this if you want don't want to include the Font Icons CSS
    wp_enqueue_style('icons-css', get_stylesheet_directory_uri() . '/assets/css/icon-fonts.css', [], wp_get_theme()->get('Version'));

    //wp_enqueue_script('reikiflow-js', get_stylesheet_directory_uri() . '/assets/js/js.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'reikiflow_enqueue_scripts');


// This registers the classes that appear the dropdown for the https://wordpress.org/plugins/css-class-manager/ - Tutorial: https://jakson.co/css-framework-tutorial
// IMPORTANT: in the CSS Class manager plugin preferences, the "Hide theme.json generated classes" option must be toggled off for these classes to show.
// Disable this if you want don't want to include the CSS Framework
function reikiflow_add_custom_css($css)
{

    //$css_framework = file_get_contents(__DIR__ . '/assets/css/css-framework.css');
    $css_icons = file_get_contents(__DIR__ . '/assets/css/icon-fonts.css');

    return $css . $css_framework . $css_icons;
}
add_filter('css_class_manager_theme_classes_css', 'reikiflow_add_custom_css');

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

// Register Block Styles Examples
function kc_bt_temp_register_block_styles()
{

    if (! function_exists('register_block_style')) {
        return;
    }

    // Blue Button - example of a custom colored button with hover state
    register_block_style(
        'core/button',
        array(
            'name'         => 'blue-btn',
            'label'        => __('Blue', 'kc-bt-temp'),
            'is_default'   => false,
        )
    );

    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => "kc-bt-temp-blue-btn",
            'src'    => get_theme_file_uri("assets/css/block-styles/blue-button.css"),
            'path'   => get_theme_file_path("assets/css/block-styles/blue-button.css"),
        )
    );

    // Text Only Button
    register_block_style(
        'core/button',
        array(
            'name'         => 'text-btn',
            'label'        => __('Text', 'kc-bt-temp'),
            'is_default'   => false,
        )
    );

    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => "kc-bt-temp-text-btn",
            'src'    => get_theme_file_uri("assets/css/block-styles/text-button.css"),
            'path'   => get_theme_file_path("assets/css/block-styles/text-button.css"),
        )
    );

    // Group Style - removes the default top margin
    register_block_style(
        'core/group',
        array(
            'name'         => 'starter-group',
            'label'        => __('margin-top-0', 'kc-bt-temp'),
            'is_default'   => false,
            'inline_style' => '
            .is-style-starter-group { margin-block-start: 0 !important; }
            ',
        )
    );

    // Check Mark List - simple unicode list style using "inline_style" as is very simple CSS
    register_block_style(
        'core/list',
        array(
            'name'         => 'checkmark-list',
            'label'        => __('Checkmark', 'kc-bt-temp'),
            'inline_style' => '
            ul.is-style-checkmark-list {
                list-style-type: "\2713";
            }

            ul.is-style-checkmark-list li {
                padding-inline-start: 10px;
                margin-left: -9px;
            }',
        )
    );


    // Arrow Right List - simple unicode list style
    register_block_style(
        'core/list',
        array(
            'name'         => 'arrow-list',
            'label'        => __('Arrow Right', 'kc-bt-temp'),
            'inline_style' => '
            ul.is-style-arrow-list {
                list-style-type: "\2192";
            }

            ul.is-style-arrow-list li {
                padding-inline-start: 10px;
                margin-left: -9px;
            }',
        )
    );

}
add_action('init', 'kc_bt_temp_register_block_styles');


/**
 * Enqueue front-end assets.
 */
function reikiflow_enqueue_assets()
{
    wp_enqueue_style(
        'reikiflow-theme-css',
        get_theme_file_uri('assets/css/theme.css'),
        array(),
        filemtime(get_theme_file_path('assets/css/theme.css'))
    );
}
add_action('wp_enqueue_scripts', 'reikiflow_enqueue_assets');

/**
 * Enqueue editor assets.
 */
function reikiflow_enqueue_editor_assets()
{
    wp_enqueue_style(
        'reikiflow-editor-css',
        get_theme_file_uri('assets/css/theme.css'),
        array(),
        filemtime(get_theme_file_path('assets/css/theme.css'))
    );
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
