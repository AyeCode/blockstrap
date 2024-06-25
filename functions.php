<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BlockStrap
 * @since 1.0.0
 */

/**
 * The theme version.
 *
 * @since 1.0.0
 */
define( 'BLOCKSTRAP_VERSION', wp_get_theme()->get( 'Version' ) );

/** Check if the WordPress version is 5.5 or higher, and if the PHP version is at least 7.2. If not, do not activate. */
if ( version_compare( $GLOBALS['wp_version'], '5.5', '<' ) || version_compare( PHP_VERSION_ID, '70200', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';

	return;
}

if ( is_admin() && defined( 'BLOCKSTRAP_BLOCKS_VERSION' ) ) {
	// Theme admin stuff
	require_once 'classes/class-blockstrap-admin.php';
}

function blockstrap_load_admin() {
	global $blockstrap_admin;
	if ( is_admin() ) {
		if ( class_exists( 'BlockStrap_Admin_Child' ) ) {
			$blockstrap_admin = new BlockStrap_Admin_Child();
		} elseif ( class_exists( 'BlockStrap_Admin' ) ) {
			$blockstrap_admin = new BlockStrap_Admin();
		}
	}
}
add_action( 'after_setup_theme', 'blockstrap_load_admin' );

// Helper functions
require_once 'inc/helper-functions.php';

// Theme support.
require_once 'classes/class-blockstrap-theme-support.php';

// Block Filters.
require_once 'classes/class-blockstrap-block-filters.php';

// Block Patterns
require_once 'classes/class-blockstrap-patterns.php';

// Block styles.
require_once 'inc/block-styles.php';

// Plugin functions
require_once 'inc/plugin-functions.php';






/**
 * Enqueue the style.css file.
 *
 * @since 1.0.0
 */
function blockstrap_styles() {

	$theme_settings = wp_get_global_styles();

	if ( ! defined( 'BLOCKSTRAP_BLOCKS_VERSION' ) ) {
		if ( ! is_admin() ) {
			wp_enqueue_style(
				'blockstrap-style',
				get_theme_file_uri( 'assets/css/style.css' ),
				'',
				BLOCKSTRAP_VERSION
			);
		}

		wp_enqueue_style(
			'blockstrap-shared-style',
			get_theme_file_uri( 'assets/css/style-shared.css' ),
			'',
			BLOCKSTRAP_VERSION
		);
	}

}

add_action( 'wp_enqueue_scripts', 'blockstrap_styles' );
add_action( 'admin_enqueue_scripts', 'blockstrap_styles' );

/**
 * Show '(No title)' if post has no title.
 */
add_filter(
	'the_title',
	function ( $title ) {
		if ( ! is_admin() && empty( $title ) ) {
			$title = __( '(No title)', 'blockstrap' );
		}

		return $title;
	}
);

/**
 * Add our BSUI body class.
 *
 * @param $classes
 *
 * @return mixed
 */
function blockstrap_body_class( $classes ) {
	$classes[] = 'bsui';

	return $classes;
}
add_filter( 'body_class', 'blockstrap_body_class' );

/**
 * Add our block filters.
 *
 * @return void
 */
function blockstrap_enqueue_block_editor_assets() {

	wp_enqueue_style(
		'blockstrap-style',
		get_theme_file_uri( 'assets/css/style.css' ),
		'',
		BLOCKSTRAP_VERSION
	);

	wp_enqueue_style(
		'blockstrap-style-admin',
		get_theme_file_uri( 'assets/css/block-editor.css' ),
		array( 'blockstrap-style' ),
		BLOCKSTRAP_VERSION
	);

}
add_action( 'enqueue_block_editor_assets', 'blockstrap_enqueue_block_editor_assets', 1000 );

/**
 * Add a basic meta description if no SEO plugin present.
 *
 * @return void
 */
function blockstrap_default_meta_description() {
	if (
		! defined( 'WPSEO_FILE' ) &&
		! defined( 'RANK_MATH_VERSION' ) &&
		! defined( 'AIOSEO_PHP_VERSION_DIR' ) &&
		! defined( 'SLIM_SEO_VER' ) &&
		! defined( 'SEOPRESS_VERSION' ) &&
		! defined( 'THE_SEO_FRAMEWORK_VERSION' )
	) {
		echo '<meta name="description" content="' . esc_attr( get_bloginfo( 'description', 'display' ) ) . '">';
	}
}
add_action( 'wp_head', 'blockstrap_default_meta_description' );
