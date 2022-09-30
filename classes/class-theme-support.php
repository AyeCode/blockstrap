<?php
/**
 * Theme support
 *
 * @package BlockStrap
 * @since 1.0.0
 */

namespace BlockStrap;

/**
 * Add theme support
 *
 * @since 1.0.0
 */
class Theme_Support {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'action_setup' ] );
		add_action( 'after_setup_theme', [ $this, 'action_content_width' ], 0 );

		add_filter('default_template_types',[ $this, 'default_template_types' ]);
		//echo '###';exit;
	}

	public function default_template_types($default_template_types){

		$default_template_types['xyz'] = array(
			'title'       => _x( 'XYZ', 'Template name' ),
			'description' => __( 'xyz description' ),
		);

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
			[
				'comment-form',
				'comment-list',
			]
		);

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

			// Enqueue editor styles.
		add_theme_support( 'editor-styles' );
		add_editor_style(
			array(
//				'./assets/css/style-shared.css',
				'./vendor/ayecode/wp-ayecode-ui/assets/css/ayecode-ui.css',
//				'./vendor/ayecode/wp-ayecode-ui/assets/css/ayecode-ui-compatibility.css', // this seems to break the wp inline CSS worker @todo https://github.com/WordPress/gutenberg/issues/33212#issuecomment-878053508
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Theme color pallets
		add_theme_support( 'editor-color-palette' );

		//add_theme_support( 'block-templates' );

		// Menus
		add_theme_support( 'menus' );


		// remove wp-container-X inline CSS helpers
		remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
		remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );


		// editor container styles
//		add_filter( 'block_editor_settings_all' , [ $this, 'remove_guten_wrapper_styles'] );


	}

	public function remove_guten_wrapper_styles( $settings ) {

		$setting = wp_get_global_settings();

//		if(!empty($setting['color']['palette']['theme'][0]['color']) && $setting['color']['palette']['theme'][0]['color']!='#1e73be'){
//			//echo self::css_primary($primary_color,$compatibility);
////			[css] => body { margin: 0; }body{background-color: var(--wp--preset--color--white);color: var(--wp--preset--color--dark);font-family: var(--wp--preset--font-family--system-fonts);font-size: 20px;margin-top: 0px;margin-right: 0px;margin-bottom: 0px;margin-left: 0px;}.wp-site-blocks > .alignleft { float: left; margin-right: 2em; }.wp-site-blocks > .alignright { float: right; margin-left: 2em; }.wp-site-blocks > .aligncenter { justify-content: center; margin-left: auto; margin-right: auto; }a{color: var(--wp--preset--color--dark-blue);}h1{color: var(--wp--preset--color--dark-blue);font-size: var(--wp--preset--font-size--extra-large);}h2{color: var(--wp--preset--color--dark-blue);font-size: var(--wp--preset--font-size--large);}h3{color: var(--wp--preset--color--dark-blue);}h4{color: var(--wp--preset--color--dark-blue);}h5{color: var(--wp--preset--color--dark-blue);}h6{color: var(--wp--preset--color--dark-blue);}.wp-block-post-title{font-size: var(--wp--preset--font-size--extra-large);}p{font-size: var(--wp--preset--font-size--normal);}.wp-block-post-date{font-size: var(--wp--preset--font-size--small);}.wp-block-post-terms{font-size: var(--wp--preset--font-size--small);}.wp-block-button__link{border-radius: 4px;border-width: 0px;}.wp-block-query-pagination a{background-color: var(--wp--preset--color--light-grey);border-radius: 4px;padding-top: calc(.667em + 2px);padding-right: calc(1.333em + 2px);padding-bottom: calc(.667em + 2px);padding-left: calc(1.333em + 2px);}.wp-block-post-excerpt a{background-color: var(--wp--preset--color--light-grey);border-radius: 4px;padding-top: calc(.667em + 2px);padding-right: calc(1.333em + 2px);padding-bottom: calc(.667em + 2px);padding-left: calc(1.333em + 2px);}.wp-block-post-navigation-link a{background-color: var(--wp--preset--color--light-grey);border-radius: 4px;padding-top: calc(.667em + 2px);padding-right: calc(1.333em + 2px);padding-bottom: calc(.667em + 2px);padding-left: calc(1.333em + 2px);}.wp-block-latest-posts{padding-left: 0px;}.wp-block-latest-comments{padding-left: 0px;}.wp-block-post-featured-image{margin-bottom: 2.5rem;}.wp-block-template-part{margin-bottom: 0px;}
////                    [__unstableType] => theme
////			[isGlobalStyles] => 1
//
////			$aui_settings = AyeCode_UI_Settings::instance();
////			$aui_settings->enqueue_flatpickr();
////			$settings['styles'][1000] = array(
////				'css' => \AyeCode_UI_Settings::css_primary( 'var(--wp--preset--color--primary)', false, true ),
////				'__unstableType'    => 'theme',
////				'isGlobalStyles'    => ''
////			);
//		}

		print_r(wp_get_global_settings());exit;
//		print_r( $settings );exit;
//		print_r( $settings['styles'] );exit;
//		unset($settings['styles'][0]);

		return $settings;
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

new Theme_Support();
