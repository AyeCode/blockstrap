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

// TGM Class
//require_once 'classes/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 *
 * @return void
 */
function blockstrap_register_required_plugins() {
	// plugins
	$plugins = array(
		array(
			'name'     => 'BlockStrap Page Builder',
			'slug'     => 'blockstrap-page-builder-blocks',
			'required' => true,
		),
	);

	// config
	$config = array(
		'id'           => 'blockstrap',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
//add_action( 'tgmpa_register', 'blockstrap_register_required_plugins' ); // chicken and egg, @todo uncomment this when plugin is approved.

// Theme support.
require_once 'classes/class-blockstrap-theme-support.php';

// Filter Comments.
require_once 'classes/class-blockstrap-comments.php';

// Block Filters.
require_once 'classes/class-blockstrap-block-filters.php';

// Block styles.
require_once 'inc/block-styles.php';

// Header block patterns.
require_once 'inc/header-block-patterns.php';

// Footer block patterns.
require_once 'inc/footer-block-patterns.php';

// Hero block patterns.
require_once 'inc/hero-block-patterns.php';

// Section block patterns.
require_once 'inc/section-block-patterns.php';

// Content block patterns.
require_once 'inc/content-block-patterns.php';

// Content block patterns.
require_once 'inc/template-part-block-patterns.php';

// Page layout block patterns.
require_once 'inc/page-layout-block-patterns.php';

// Query block patterns.
require_once 'inc/query-block-patterns.php';



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
	return strip_shortcodes( do_shortcode( $block_content ) );
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

	wp_enqueue_style(
		'blockstrap-style-admin',
		get_theme_file_uri( 'assets/css/block-editor.css' ),
		array( 'blockstrap-style' ),
		BLOCKSTRAP_VERSION
	);

}
add_action( 'enqueue_block_editor_assets', 'bs_enqueue_block_editor_assets', 1000 );
