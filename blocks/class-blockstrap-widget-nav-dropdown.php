<?php

class BlockStrap_Widget_Nav_Dropdown extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'     => 'blockstrap',
			'output_types'   => array( 'block', 'shortcode' ),
			'nested-block'   => true,
			'block-icon'     => 'far fa-square',
			'block-category' => 'layout',
			'block-keywords' => "['menu','nav','item']",
			'block-label'    => "attributes.text ? '" . __( 'BS > Dropdown', 'blockstrap' ) . " ('+ attributes.text+')' : ''",
			'block-output'   => array(

				array(
					'element'   => 'li',
					'className' => 'nav-item dropdown',
					array(
						'element'           => 'a',
						'class'             => 'dropdown-toggle nav-link',
						'href'              => '#',
						'content'           => '[%text%]',
						'roll'              => 'button',
						'\'data-toggle\''   => 'dropdown',
						'\'aria-expanded\'' => 'false',
					),
					array(
						'element'          => 'innerBlocksProps',
						'inner_element'    => 'ul',
						'blockProps'       => array(
							'className' => 'dropdown-menu',
						),
						'innerBlocksProps' => array(
							'orientation' => 'horizontal',
						),
					),

				),
			),
			'block-wrap'     => '',
			'class_name'     => __CLASS__,
			'base_id'        => 'bs_nav_dropdown',
			'name'           => __( 'BS > Nav Dropdown', 'blockstrap' ),
			'widget_ops'     => array(
				'classname'   => 'bd-nav-dropdown',
				'description' => esc_html__( 'A container for content', 'blockstrap' ),
			),
			'example'        => array(
				'attributes' => array(
					'after_text' => 'Earth',
				),
			),
			'no_wrap'        => true,
		);

		parent::__construct( $options );
	}

	/**
	 * Get the link types.
	 *
	 * @return array
	 */
	public function link_types() {
		$links = array(
			'home'    => __( 'Home', 'geodirectory' ),
			'page'    => __( 'Page', 'geodirectory' ),
			'post-id' => __( 'Post ID', 'geodirectory' ),
			'custom'  => __( 'Custom URL', 'geodirectory' ),
		);

		if ( defined( 'GEODIRECTORY_VERSION' ) ) {
			$post_types           = geodir_get_posttypes( 'options-plural' );
			$links['gd_search']   = __( 'GD Search', 'blockstrap' );
			$links['gd_location'] = __( 'GD Location', 'blockstrap' );
			foreach ( $post_types as $cpt => $cpt_name ) {
				/* Translators: Custom Post Type name. */
				$links[ $cpt ] = sprintf( __( '%s (archive)', 'blockstrap' ), $cpt_name );
				/* Translators: Custom Post Type name. */
				$links[ 'add_' . $cpt ] = sprintf( __( '%s (add listing)', 'blockstrap' ), $cpt_name );
			}
		}

		return $links;
	}

	public function get_pages_array() {
		$options = array( '' => __( 'Select Page', 'blockstrap' ) );

		$pages = get_pages();

		if ( ! empty( $pages ) ) {
			foreach ( $pages as $page ) {
				if ( $page->post_title ) {
					$options[ $page->ID ] = esc_attr( $page->post_title );
				}
			}
		}

		return $options;
	}

	/**
	 * Set the arguments later.
	 *
	 * @return array
	 */
	public function set_arguments() {

		$arguments = array();

		$arguments['text'] = array(
			'type'        => 'text',
			'title'       => __( 'Link Text', 'geodirectory' ),
			'desc'        => __( 'Add the text that will reveal the dropdown items.', 'geodirectory' ),
			'placeholder' => __( 'Home', 'geodirectory' ),
			'default'     => '',
			'desc_tip'    => true,
			'group'       => __( 'Link', 'geodirectory' ),
		);

		$arguments['icon_class'] = array(
			'type'        => 'text',
			'title'       => __( 'Icon class', 'geodirectory' ),
			'desc'        => __( 'Enter a font awesome icon class.', 'geodirectory' ),
			'placeholder' => __( 'fas fa-ship', 'geodirectory' ),
			'default'     => '',
			'desc_tip'    => true,
			'group'       => __( 'Link', 'geodirectory' ),
		);

		// link styles
		$arguments['link_type'] = array(
			'type'     => 'select',
			'title'    => __( 'Link style', 'geodirectory' ),
			'options'  => array(
				''             => __( 'None', 'geodirectory' ),
				'btn'          => __( 'Button', 'geodirectory' ),
				'btn-round'    => __( 'Button rounded', 'geodirectory' ),
				'iconbox'      => __( 'Iconbox bordered', 'geodirectory' ),
				'iconbox-fill' => __( 'Iconbox filled', 'geodirectory' ),
			),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Link styles', 'geodirectory' ),
		);

		$arguments['link_size'] = array(
			'type'     => 'select',
			'title'    => __( 'Size', 'geodirectory' ),
			'options'  => array(
				''       => __( 'Default', 'geodirectory' ),
				'small'  => __( 'Small', 'geodirectory' ),
				'medium' => __( 'Medium', 'geodirectory' ),
				'large'  => __( 'Large', 'geodirectory' ),
			),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Link styles', 'geodirectory' ),
		);

		$arguments['link_bg'] = array(
			'title'           => __( 'Color', 'geodirectory' ),
			'desc'            => __( 'Select the color.', 'geodirectory' ),
			'type'            => 'select',
			'options'         => array(
				'' => __( 'Custom colors', 'geodirectory' ),
			) + sd_aui_colors( true, true, true ),
			'default'         => '',
			'desc_tip'        => true,
			'advanced'        => false,
			'group'           => __( 'Link styles', 'geodirectory' ),
			'element_require' => '[%link_type%]!="iconbox"',
		);

		// margins mobile
		$arguments['mt'] = sd_get_margin_input( 'mt', array( 'device_type' => 'Mobile' ) );
		$arguments['mr'] = sd_get_margin_input( 'mr', array( 'device_type' => 'Mobile' ) );
		$arguments['mb'] = sd_get_margin_input( 'mb', array( 'device_type' => 'Mobile' ) );
		$arguments['ml'] = sd_get_margin_input( 'ml', array( 'device_type' => 'Mobile' ) );

		// margins tablet
		$arguments['mt_md'] = sd_get_margin_input( 'mt', array( 'device_type' => 'Tablet' ) );
		$arguments['mr_md'] = sd_get_margin_input( 'mr', array( 'device_type' => 'Tablet' ) );
		$arguments['mb_md'] = sd_get_margin_input( 'mb', array( 'device_type' => 'Tablet' ) );
		$arguments['ml_md'] = sd_get_margin_input( 'ml', array( 'device_type' => 'Tablet' ) );

		// margins desktop
		$arguments['mt_lg'] = sd_get_margin_input( 'mt', array( 'device_type' => 'Desktop' ) );
		$arguments['mr_lg'] = sd_get_margin_input( 'mr', array( 'device_type' => 'Desktop' ) );
		$arguments['mb_lg'] = sd_get_margin_input( 'mb', array( 'device_type' => 'Desktop' ) );
		$arguments['ml_lg'] = sd_get_margin_input( 'ml', array( 'device_type' => 'Desktop' ) );

		// padding
		$arguments['pt'] = sd_get_padding_input( 'pt', array( 'device_type' => 'Mobile' ) );
		$arguments['pr'] = sd_get_padding_input( 'pr', array( 'device_type' => 'Mobile' ) );
		$arguments['pb'] = sd_get_padding_input( 'pb', array( 'device_type' => 'Mobile' ) );
		$arguments['pl'] = sd_get_padding_input( 'pl', array( 'device_type' => 'Mobile' ) );

		// padding tablet
		$arguments['pt_md'] = sd_get_padding_input( 'pt', array( 'device_type' => 'Tablet' ) );
		$arguments['pr_md'] = sd_get_padding_input( 'pr', array( 'device_type' => 'Tablet' ) );
		$arguments['pb_md'] = sd_get_padding_input( 'pb', array( 'device_type' => 'Tablet' ) );
		$arguments['pl_md'] = sd_get_padding_input( 'pl', array( 'device_type' => 'Tablet' ) );

		// padding desktop
		$arguments['pt_lg'] = sd_get_padding_input( 'pt', array( 'device_type' => 'Desktop' ) );
		$arguments['pr_lg'] = sd_get_padding_input( 'pr', array( 'device_type' => 'Desktop' ) );
		$arguments['pb_lg'] = sd_get_padding_input( 'pb', array( 'device_type' => 'Desktop' ) );
		$arguments['pl_lg'] = sd_get_padding_input( 'pl', array( 'device_type' => 'Desktop' ) );

		// border
		$arguments['border']       = sd_get_border_input( 'border' );
		$arguments['rounded']      = sd_get_border_input( 'rounded' );
		$arguments['rounded_size'] = sd_get_border_input( 'rounded_size' );

		// shadow
		$arguments['shadow'] = sd_get_shadow_input( 'shadow' );

		// text color
		$arguments['text_color'] = sd_get_text_color_input();

		// Text justify
		$arguments['text_justify'] = sd_get_text_justify_input();

		// text align
		$arguments['text_align']    = sd_get_text_align_input(
			'text_align',
			array(
				'device_type'     => 'Mobile',
				'element_require' => '[%text_justify%]==""',
			)
		);
		$arguments['text_align_md'] = sd_get_text_align_input(
			'text_align',
			array(
				'device_type'     => 'Tablet',
				'element_require' => '[%text_justify%]==""',
			)
		);
		$arguments['text_align_lg'] = sd_get_text_align_input(
			'text_align',
			array(
				'device_type'     => 'Desktop',
				'element_require' => '[%text_justify%]==""',
			)
		);

		return $arguments;
	}


	/**
	 * This is the output function for the widget, shortcode and block (front end).
	 *
	 * @param array $args The arguments values.
	 * @param array $widget_args The widget arguments when used.
	 * @param string $content The shortcode content argument
	 *
	 * @return string
	 */
	public function output( $args = array(), $widget_args = array(), $content = '' ) {

		if ( ! empty( $content ) ) {
			//$content = str_replace(array('<li class="nav-item form-inline ">','</li>'),"",$content);
			$content = str_replace( '"nav-link', '"dropdown-item', $content );
		}
		return $content;

	}

}

// register it.
add_action(
	'widgets_init',
	function () {
		register_widget( 'BlockStrap_Widget_Nav_Dropdown' );
	}
);

