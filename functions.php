<?php

if (! defined('ABSPATH')) {
    exit;
}

// Functions for the ReikiFlow theme.
// @package reikiflow
// @author  karo_ej
// @license GNU General Public License v2 or later

// Theme setup.
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
            'style.css',
            // Disable this if you do not want to include the CSS framework in the editor.
            // 'assets/css/css-framework.css',
            // Disable this if you do not want to include the Font Icons CSS in the editor.
            'assets/css/icon-fonts.css',
        )
    );

    remove_theme_support('core-block-patterns');
}
add_action('after_setup_theme', 'reikiflow_setup');

// Enqueue front-end theme assets.
function reikiflow_enqueue_assets()
{
    $theme_css_path = get_theme_file_path('assets/dist/css/theme.css');
    $theme_css_uri   = get_theme_file_uri('assets/dist/css/theme.css');

    if (file_exists($theme_css_path)) {
        wp_enqueue_style(
            'reikiflow-theme-css',
            $theme_css_uri,
            array(),
            filemtime($theme_css_path)
        );
    }

    // Load the main theme stylesheet.
    wp_enqueue_style(
        'reikiflow-style',
        get_stylesheet_uri(),
        array(),
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    // Disable this if you do not want to include the CSS framework.
    // wp_enqueue_style(
    // 	'css-framework',
    // 	get_stylesheet_directory_uri() . '/assets/css/css-framework.css',
    // 	array(),
    // 	filemtime( get_stylesheet_directory() . '/assets/css/css-framework.css' )
    // );

    // Disable this if you do not want to include the Font Icons CSS.
    wp_enqueue_style(
        'icons-css',
        get_stylesheet_directory_uri() . '/assets/css/icon-fonts.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/icon-fonts.css')
    );

    // Uncomment if you need the theme JS.
    // wp_enqueue_script(
    // 	'reikiflow-js',
    // 	get_stylesheet_directory_uri() . '/assets/js/js.js',
    // 	array( 'jquery' ),
    // 	'1.0',
    // 	true
    // );
}
add_action('wp_enqueue_scripts', 'reikiflow_enqueue_assets');

// Enqueue editor assets.
function reikiflow_enqueue_editor_assets()
{
    $theme_css_path = get_theme_file_path('assets/dist/css/theme.css');
    $theme_css_uri   = get_theme_file_uri('assets/dist/css/theme.css');

    if (file_exists($theme_css_path)) {
        wp_enqueue_style(
            'reikiflow-editor-css',
            $theme_css_uri,
            array(),
            filemtime($theme_css_path)
        );
    }
}
add_action('enqueue_block_editor_assets', 'reikiflow_enqueue_editor_assets');

// Registers the classes that appear in the dropdown for the CSS Class Manager plugin.
// Important: in the CSS Class Manager plugin preferences, the "Hide theme.json generated classes" option must be toggled off for these classes to show.
function reikiflow_add_custom_css($css)
{
    $css_framework = '';
    $css_icons     = '';

    // Disable this if you do not want to include the CSS framework.
    // if ( file_exists( __DIR__ . '/assets/css/css-framework.css' ) ) {
    // 	$css_framework = file_get_contents( __DIR__ . '/assets/css/css-framework.css' );
    // }

    if (file_exists(__DIR__ . '/assets/css/icon-fonts.css')) {
        $css_icons = file_get_contents(__DIR__ . '/assets/css/icon-fonts.css');
    }

    return $css . $css_framework . $css_icons;
}
add_filter('css_class_manager_theme_classes_css', 'reikiflow_add_custom_css');

// Register theme blocks from /blocks.
function reikiflow_register_blocks()
{
    $blocks_dir = get_theme_file_path('blocks');

    if (! is_dir($blocks_dir)) {
        return;
    }

    foreach (glob($blocks_dir . '/*/block.json') as $block_json) {
        register_block_type(dirname($block_json));
    }
}
add_action('init', 'reikiflow_register_blocks');

// Register custom block categories.
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

// Register block styles.
function reikiflow_register_block_styles()
{
    if (! function_exists('register_block_style')) {
        return;
    }

    // Blue button.
    register_block_style(
        'core/button',
        array(
            'name'       => 'blue-btn',
            'label'      => __('Blue', 'reikiflow'),
            'is_default' => false,
        )
    );

    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => 'reikiflow-blue-btn',
            'src'    => get_theme_file_uri('assets/css/block-styles/blue-button.css'),
            'path'   => get_theme_file_path('assets/css/block-styles/blue-button.css'),
        )
    );

    // Text button.
    register_block_style(
        'core/button',
        array(
            'name'       => 'text-btn',
            'label'      => __('Text', 'reikiflow'),
            'is_default' => false,
        )
    );

    wp_enqueue_block_style(
        'core/button',
        array(
            'handle' => 'reikiflow-text-btn',
            'src'    => get_theme_file_uri('assets/css/block-styles/text-button.css'),
            'path'   => get_theme_file_path('assets/css/block-styles/text-button.css'),
        )
    );

    // Group style - removes the default top margin.
    register_block_style(
        'core/group',
        array(
            'name'         => 'starter-group',
            'label'        => __('Margin Top 0', 'reikiflow'),
            'is_default'   => false,
            'inline_style' => '
			.is-style-starter-group { margin-block-start: 0 !important; }
			',
        )
    );

    // Checkmark list.
    register_block_style(
        'core/list',
        array(
            'name'         => 'checkmark-list',
            'label'        => __('Checkmark', 'reikiflow'),
            'inline_style' => '
			ul.is-style-checkmark-list {
				list-style-type: "\\2713";
			}

			ul.is-style-checkmark-list li {
				padding-inline-start: 10px;
				margin-left: -9px;
			}
			',
        )
    );

    // Arrow list.
    register_block_style(
        'core/list',
        array(
            'name'         => 'arrow-list',
            'label'        => __('Arrow Right', 'reikiflow'),
            'inline_style' => '
			ul.is-style-arrow-list {
				list-style-type: "\\2192";
			}

			ul.is-style-arrow-list li {
				padding-inline-start: 10px;
				margin-left: -9px;
			}
			',
        )
    );
}
add_action('init', 'reikiflow_register_block_styles');

// Language switch shortcode + renderer.
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

// WS Form helpers.
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

// Require plugins.
require_once get_theme_file_path('inc/plugins.php');
