<?php
/**
 * Theme support
 *
 * @package BlockStrap
 * @since 1.0.0
 */

/**
 * Add theme support
 *
 * @since 1.0.0
 */
class BlockStrap_Theme_Support {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'load_translations' ) );
		add_action( 'after_setup_theme', array( $this, 'action_setup' ) );
		add_action( 'after_setup_theme', array( $this, 'action_content_width' ), 0 );
		add_filter( 'get_block_templates', array( $this, 'default_template_types' ), 20000, 3 );
	}

	/**
	 * Load the theme translation files.
	 *
	 * @return void
	 */
	public function load_translations() {
		load_theme_textdomain( 'blockstrapr', get_template_directory() . '/languages' );
	}

	/**
	 * Filter the theme FSE templates.
	 *
	 * @param $default_template_types
	 * @param $query
	 * @param $template_type
	 *
	 * @return mixed
	 */
	public function default_template_types( $default_template_types, $query, $template_type ) {

		foreach ( $default_template_types as $k => $t ) {

			if ( defined( 'GEODIRECTORY_VERSION' ) && defined( 'BLOCKSTRAP_BLOCKS_VERSION' ) && 'wp_template' === $template_type ) {
				if ( 'gd-single' === $t->slug ) {
					$default_template_types[ $k ]->title       = 'GD Single';
					$default_template_types[ $k ]->description = __( 'The default template for displaying any GD single post. Use the `add new` feature to add a template per CPT.', 'blockstrap' );
				}
			} else {
				// hide template if required plugins not installed
				if ( 'gd-single' === $t->slug || 'gd-archive' === $t->slug || 'gd-search' === $t->slug ) {
					unset( $default_template_types[ $k ] );
				}
			}
		}

		return $default_template_types;
	}

	/**
	 * Adds theme-supports.
	 *
	 * @access public
	 * @since 1.0.0
	 * @return void
	 */
	public function action_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );

		/*
		* Switch default core markup to output valid HTML5.
		* The comments block uses the markup from the comments template.
		*/
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
			)
		);

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Theme color pallets
		add_theme_support( 'editor-color-palette' );

		// Menus
		add_theme_support( 'menus' );

		// remove wp-container-X inline CSS helpers
		remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
		remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );

		// remove core WP patterns.
		remove_theme_support( 'core-block-patterns' );
	}


	/**
	 * Set the content width based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width Content width.
	 * @since 1.0.0
	 * @access public
	 */
	public function action_content_width() {
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'blockstrap_content_width', 920 );
	}

}

new BlockStrap_Theme_Support();
