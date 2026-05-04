<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue frontend and editor assets for ReikiFlow theme.
 */

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
