<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function reikiflow_enqueue_assets() {
	$css_path = get_theme_file_path( 'assets/dist/css/theme.css' );

	if ( file_exists( $css_path ) ) {
		wp_enqueue_style(
			'reikiflow-theme-css',
			get_theme_file_uri( 'assets/dist/css/theme.css' ),
			array(),
			filemtime( $css_path )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'reikiflow_enqueue_assets' );

function reikiflow_enqueue_editor_assets() {
	$css_path = get_theme_file_path( 'assets/dist/css/theme.css' );

	if ( file_exists( $css_path ) ) {
		wp_enqueue_style(
			'reikiflow-editor-css',
			get_theme_file_uri( 'assets/dist/css/theme.css' ),
			array(),
			filemtime( $css_path )
		);
	}
}
add_action( 'enqueue_block_editor_assets', 'reikiflow_enqueue_editor_assets' );

function reikiflow_lang_switch_shortcode() {
	ob_start();
	reikiflow_lang_switch();
	return ob_get_clean();
}
add_shortcode( 'reikiflow_lang_switch', 'reikiflow_lang_switch_shortcode' );

function reikiflow_lang_switch() {
	$current_locale = determine_locale();
	$is_english     = ( $current_locale === 'en_US' );

	$en_url = $is_english ? '#' : home_url( '/' );
	$pl_url = $is_english ? home_url( '/pl/' ) : '#';

	$en_class = $is_english ? 'lang-link is-active' : 'lang-link';
	$pl_class = $is_english ? 'lang-link' : 'lang-link is-active';

	printf(
		'<div class="lang-switch">
			<a href="%s" class="%s" aria-label="Switch to English"%s>EN</a>
			<span class="lang-separator">|</span>
			<a href="%s" class="%s"%s>PL</a>
		</div>',
		esc_url( $en_url ),
		esc_attr( $en_class ),
		$is_english ? ' aria-current="true"' : '',
		esc_url( $pl_url ),
		esc_attr( $pl_class ),
		! $is_english ? ' aria-current="true"' : ''
	);
}
