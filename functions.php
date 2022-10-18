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

// composer autoloader
require_once 'vendor/autoload.php';

// check for minimum Duper Duper version
if ( ! defined( 'SUPER_DUPER_VER' ) || version_compare( SUPER_DUPER_VER, '1.1.4', '<' ) ) {
	function bs_super_duper_update_notice() {
		$class   = 'notice notice-error';
		$message = __( 'Please IMMEDIATELY update any AyeCode plugins, your site will not load correctly as an older CLASS is detected.', 'blockstrap' );

		printf( '<div class="%1$s"><p><b>%2$s</b></p></div>', esc_attr( $class ), esc_html( $message ) );
	}
	add_action( 'admin_notices', 'bs_super_duper_update_notice' );
	return; // bail if older class, so we don't error out.
}

// Theme support.
require_once 'classes/class-blockstrap-theme-support.php';

// Filter Comments.
require_once 'classes/class-blockstrap-comments.php';

// Block Filters.
require_once 'classes/class-blockstrap-block-filters.php';

// Block styles.
require_once 'inc/block-styles.php';

// Block patterns.
require_once 'inc/block-patterns.php';

// Header block patterns.
require_once 'inc/header-block-patterns.php';

// Footer block patterns.
require_once 'inc/footer-block-patterns.php';

// Hero block patterns.
require_once 'inc/hero-block-patterns.php';

// Page layout block patterns.
require_once 'inc/page-layout-block-patterns.php';

// Query block patterns.
require_once 'inc/query-block-patterns.php';

// Blocks
require_once 'blocks/class-blockstrap-widget-container.php';
require_once 'blocks/class-blockstrap-widget-navbar.php';
require_once 'blocks/class-blockstrap-widget-navbar-brand.php';
require_once 'blocks/class-blockstrap-widget-nav.php';
require_once 'blocks/class-blockstrap-widget-nav-item.php';
require_once 'blocks/class-blockstrap-widget-nav-dropdown.php';
require_once 'blocks/class-blockstrap-widget-shape-divider.php';
require_once 'blocks/class-blockstrap-widget-button.php';
require_once 'blocks/class-blockstrap-widget-heading.php';
require_once 'blocks/class-blockstrap-widget-post-title.php';
require_once 'blocks/class-blockstrap-widget-archive-title.php';
require_once 'blocks/class-blockstrap-widget-image.php';
require_once 'blocks/class-blockstrap-widget-map.php';
require_once 'blocks/class-blockstrap-widget-counter.php';
require_once 'blocks/class-blockstrap-widget-gallery.php';
require_once 'blocks/class-blockstrap-widget-tabs.php';
require_once 'blocks/class-blockstrap-widget-tab.php';
require_once 'blocks/class-blockstrap-widget-icon-box.php';
require_once 'blocks/class-blockstrap-widget-skip-links.php';

/**
 * Enqueue the style.css file.
 *
 * @since 1.0.0
 */
function blockstrap_styles() {
	wp_enqueue_style(
		'blockstrap-style',
		get_theme_file_uri( 'assets/css/style.css' ),
		'',
		BLOCKSTRAP_VERSION
	);
	wp_enqueue_style(
		'blockstrap-shared-stylez',
		get_theme_file_uri( 'assets/css/style-shared.css' ),
		'',
		BLOCKSTRAP_VERSION
	);

	wp_enqueue_script( 'blockstrap-block-filters' );
}

add_action( 'wp_enqueue_scripts', 'blockstrap_styles' );

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
 * Force blocks to render shortcodes.
 *
 * There is a bug where shortcodes are not renders in template files.
 *
 * @todo remove this or make it more specific once this bug is resolved https://github.com/WordPress/gutenberg/issues/35258
 *
 * @param string $block_content The HTML content of the block.
 * @param array  $block The full block, including name and attributes.
 *
 * @return mixed
 */
function blockstrap_force_render_blocks_on_templates( $block_content, $block ) {
	return do_shortcode( $block_content );
}
add_filter( 'render_block', 'blockstrap_force_render_blocks_on_templates', 10, 2 );

/**
 * Add our BSUI body class.
 *
 * @param $classes
 *
 * @return mixed
 */
function bs_body_class( $classes ) {
	$classes[] = 'bsui';

	return $classes;
}
add_filter( 'body_class', 'bs_body_class' );

/**
 * Add our block filters.
 *
 * @return void
 */
function bs_enqueue_block_editor_assets() {

	wp_enqueue_script(
		'blockstrap-block-filters',
		get_template_directory_uri() . '/assets/js/blockstrap-block-filters.js',
		array( 'wp-block-library', 'wp-element', 'wp-i18n' ), // required dependencies for blocks
		BLOCKSTRAP_VERSION
	);

	wp_enqueue_style(
		'blockstrap-style',
		get_theme_file_uri( 'assets/css/style.css' ),
		'',
		BLOCKSTRAP_VERSION
	);

}
add_action( 'enqueue_block_editor_assets', 'bs_enqueue_block_editor_assets', 1000 );
