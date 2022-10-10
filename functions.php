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
require_once( 'vendor/autoload.php' );

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

// Sport block patterns.
require_once 'inc/sport-block-patterns.php';

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

//add_filter( 'register_block_type_args', 'core_image_block_type_args', 10, 3 );
//function core_image_block_type_args( $args, $name ) {
//	echo $name.'###'." \n";
//	return $args;
//}


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

	wp_enqueue_script('blockstrap-block-filters' );
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
//	print_r($block);
	return do_shortcode( $block_content );
}

add_filter( 'render_block', 'blockstrap_force_render_blocks_on_templates', 10, 2 );


//add_action( 'after_setup_theme', function(){
//	global $editor_styles;
//	print_r( $editor_styles );echo '###';exit;
////		$editor_styles = (array)$editor_styles;
////		$bootstrap = './../../plugins/' . basename( __DIR__ ) . '/assets/css/bootstrap.min.css';
////		if( ! in_array( $bootstrap, $editor_styles ) ){
////			array_unshift( $editor_styles, $bootstrap );
////		}
//});

function my_plugin_body_class( $classes) {
	$classes[] = 'bsui';

	return $classes;
}

add_filter( 'body_class', 'my_plugin_body_class' );

// only work if the file has a class "wp-block-*" in it
//function myplugin_enqueue_block_editor_assets() {
//
//	wp_enqueue_style(
//		'davesmith-editor',
//		'https://use.fontawesome.com/releases/v5.15.4/css/all.css?wpfas=true', //get_theme_file_uri( 'test-editor.css' ),
//		//array( 'wp-edit-blocks' )
//	);
//
//	wp_enqueue_style(
//		'davesmith-block',
//		get_theme_file_uri( 'test-block.css'),
//		array( 'wp-edit-blocks' )
//	);
//
//}
//add_action( 'enqueue_block_editor_assets', 'myplugin_enqueue_block_editor_assets' );

//function cc_mime_types($mimes) {
//	$mimes['svg'] = 'image/svg+xml';
//	return $mimes;
//}
//add_filter('upload_mimes', 'cc_mime_types');


//WP_Theme_JSON_Resolver::clean_cached_data();


//function wporg_block_wrapper( $block_content, $block ) {
//
//	print_r($block);
//	if ( $block['blockName'] === 'core/template-part' ) {
//
//		$block_content = str_replace(array('<header class="alignfull site-header wp-block-template-part">','</header>'),'',$block_content);
////		echo $block_content;exit;
////		$content = '<div class="wp-block-paragraph">';
////		$content .= $block_content;
////		$content .= '</div>';
////		return $content;
//	}
//	return $block_content;
//}
//
//add_filter( 'render_block', 'wporg_block_wrapper', 10, 2 );


function myplugin_enqueue_block_editor_assets() {

	wp_enqueue_script(
		'blockstrap-block-filters',
		get_template_directory_uri() . '/assets/js/blockstrap-block-filters.js',
		[ 'wp-block-library', 'wp-element', 'wp-i18n' ], // required dependencies for blocks
	);

//	wp_enqueue_style(
//		'davesmith-block',
//		get_theme_file_uri( 'test-block.css'),
//		array( 'wp-edit-blocks' )
//	);

}
add_action( 'enqueue_block_editor_assets', 'myplugin_enqueue_block_editor_assets', 1000 );

//wp_register_script(
//	'blockstrap-block-filters',
//	get_template_directory_uri() . '/assets/js/blockstrap-block-filters.js',
//	['wp-element', 'wp-i18n', 'wp-editor', 'wp-hooks'],
//	BLOCKSTRAP_VERSION,
//	true
//);



//add_filter('register_block_type_args', function ($settings, $name) {
//	if ($name == 'core/post-template') {
//
////		print_r($settings);exit;
//		$settings['render_callback'] = 'render_block_core_post_templatex';
//	}
//	return $settings;
//}, null, 2);


/**
 * Renders the `core/post-template` block on the server.
 *
 * @param array    $attributes Block attributes.
 * @param string   $content    Block default content.
 * @param WP_Block $block      Block instance.
 *
 * @return string Returns the output of the query, structured using the layout defined by the block's inner blocks.
 */
function render_block_core_post_templatex( $attributes, $content, $block ) {
	$page_key = isset( $block->context['queryId'] ) ? 'query-' . $block->context['queryId'] . '-page' : 'query-page';
	$page     = empty( $_GET[ $page_key ] ) ? 1 : (int) $_GET[ $page_key ];

	$query_args = build_query_vars_from_query_block( $block, $page );
	// Override the custom query with the global query if needed.
	$use_global_query = ( isset( $block->context['query']['inherit'] ) && $block->context['query']['inherit'] );
	if ( $use_global_query ) {
		global $wp_query;
		if ( $wp_query && isset( $wp_query->query_vars ) && is_array( $wp_query->query_vars ) ) {
			// Unset `offset` because if is set, $wp_query overrides/ignores the paged parameter and breaks pagination.
			unset( $query_args['offset'] );
			$query_args = wp_parse_args( $wp_query->query_vars, $query_args );

			if ( empty( $query_args['post_type'] ) && is_singular() ) {
				$query_args['post_type'] = get_post_type( get_the_ID() );
			}
		}
	}

	$query = new WP_Query( $query_args );

	if ( ! $query->have_posts() ) {
		return '';
	}

	if ( block_core_post_template_uses_featured_image( $block->inner_blocks ) ) {
		update_post_thumbnail_cache( $query );
	}

	$classnames = '';
	if ( isset( $block->context['displayLayout'] ) && isset( $block->context['query'] ) ) {
		if ( isset( $block->context['displayLayout']['type'] ) && 'flex' === $block->context['displayLayout']['type'] ) {
			$classnames = "is-flex-container columns-{$block->context['displayLayout']['columns']}";
		}
	}

	$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $classnames ) );

	$content = '';
	while ( $query->have_posts() ) {
		$query->the_post();
		$block_content = (
		new WP_Block(
			$block->parsed_block,
			array(
				'postType' => get_post_type(),
				'postId'   => get_the_ID(),
			)
		)
		)->render( array( 'dynamic' => false ) );
		$post_classes  = implode( ' ', get_post_class( 'wp-block-post' ) );
		$content      .= '<li class="zzz ' . esc_attr( $post_classes ) . '">' . $block_content . '</li>';
	}

	wp_reset_postdata();

	return sprintf(
		'<x %1$s>%2$s</x><b>works</b>',
		$wrapper_attributes,
		$content
	);
}
