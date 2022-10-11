<?php

class BlockStrap_Widget_Container extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'       => 'blockstrap',
			'output_types'     => array( 'block', 'shortcode' ),
			'nested-block'     => true,
			'block-icon'       => 'far fa-square',
			'block-category'   => 'layout',
			'block-keywords'   => "['container','content']",
			'block-label'      => "attributes.container ? '" . __( 'BS > ', 'blockstrap' ) . " ('+ attributes.container +')' : '" . __( 'BS > Container', 'blockstrap' ) . "'",
			'block-supports'   => array(
				//'anchor' => 'true',
				'customClassName' => false,
			),
			'block-output'     => array(
				array(
					'element'          => 'innerBlocksProps',
					'blockProps'       => array(
						//                      'if_className' => 'props.attributes.styleid + " " [%WrapClass%]',
						'if_className' => 'props.attributes.styleid + " " [%WrapClass%]',
						'style'        => '{[%WrapStyle%]}',
						'if_id'        => 'props.attributes.anchor ? props.attributes.anchor : props.clientId',
						//                      '\'data-styleid\'' => "block-" . wp_rand(15),
						//                      'if_\'data-styleid\'' => 'props.attributes.anchor ? props.attributes.anchor : props.attributes.styleid',
						//                      'if_id'        => 'props.attributes.anchor ? props.attributes.anchor : "vvvv"',
						//                      'if_id'        => 'props.attributes.bg',
						//                      'ID'        => 'cccccccccccccc',
					),
					'innerBlocksProps' => array(
						'orientation' => 'vertical',
						//                      'template'    => "
						//                      [
						//                          [ 'blockstrap/blockstrap-widget-row', {}, [[ 'core/paragraph', { placeholder: 'Summaryx' } ],] ],
						//
						//                        ]
						//    "
					),

				),
				//              array(
				//                  'element'   => 'style',
				//                  //'className' => 'blockstrap-shape',
				//                  'if_content'   => "build_shape_divider_css( props.attributes )",
				//              )

			),
			'block-wrap'       => '',
			'class_name'       => __CLASS__,
			'base_id'          => 'bs_container',
			'name'             => __( 'BS > Container', 'blockstrap' ),
			'widget_ops'       => array(
				'classname'   => 'bd-container',
				'description' => esc_html__( 'A container for content', 'blockstrap' ),
			),
			'example'          => array(
				'attributes' => array(
					'after_text' => 'Earth',
				),
			),
			'no_wrap'          => true,
			'block_group_tabs' => array(
				'content'  => array(
					'groups' => array( __( 'Container', 'geodirectory' ) ),
					'tab'    => array(
						'title'     => __( 'Content', 'geodirectory' ),
						'key'       => 'bs_tab_content',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					),
				),
				'styles'   => array(
					'groups' => array( __( 'Background', 'geodirectory' ), __( 'Typography', 'geodirectory' ) ),
					'tab'    => array(
						'title'     => __( 'Styles', 'geodirectory' ),
						'key'       => 'bs_tab_styles',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					),
				),
				'advanced' => array(
					'groups' => array(
						__( 'Wrapper Styles', 'geodirectory' ),
						__( 'Advanced', 'geodirectory' ),
					),
					'tab'    => array(
						'title'     => __( 'Advanced', 'geodirectory' ),
						'key'       => 'bs_tab_advanced',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					),
				),
			),
		);

		parent::__construct( $options );
	}

	/**
	 * Set the arguments later.
	 *
	 * @return array
	 */
	public function set_arguments() {

		$arguments = array();

		// container class
		$arguments['container'] = sd_get_container_class_input( 'container', array( 'default' => 'container' ) );

		// row-cols
		$arguments['row_cols']    = sd_get_row_cols_input( 'row_cols', array( 'device_type' => 'Mobile' ) );
		$arguments['row_cols_md'] = sd_get_row_cols_input( 'row_cols', array( 'device_type' => 'Tablet' ) );
		$arguments['row_cols_lg'] = sd_get_row_cols_input( 'row_cols', array( 'device_type' => 'Desktop' ) );


		// columns
		$arguments['col']    = sd_get_col_input( 'col', array( 'device_type' => 'Mobile' ) );
		$arguments['col_md'] = sd_get_col_input( 'col', array( 'device_type' => 'Tablet' ) );
		$arguments['col_lg'] = sd_get_col_input( 'col', array( 'device_type' => 'Desktop' ) );

		$arguments = $arguments + sd_get_background_inputs( 'bg' );

		$arguments['bg_on_text'] = array(
			'type'            => 'checkbox',
			'title'           => __( 'Background on text', 'geodirectory' ),
			'default'         => '',
			'value'           => '1',
			'desc_tip'        => false,
			'desc'            => __( 'This will show the background on the text.', 'geodirectory' ),
			'group'           => __( 'Background', 'geodirectory' ),
			'element_require' => '[%bg%]=="custom-gradient"',
		);

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

		// margins mobile
		$arguments['mt'] = sd_get_margin_input( 'mt', array( 'device_type' => 'Mobile' ) );
		$arguments['mr'] = sd_get_margin_input( 'mr', array( 'device_type' => 'Mobile' ) );
		$arguments['mb'] = sd_get_margin_input(
			'mb',
			array(
				'device_type' => 'Mobile',
				'default'     => 3,
			)
		);
		$arguments['ml'] = sd_get_margin_input( 'ml', array( 'device_type' => 'Mobile' ) );

		// margins tablet
		$arguments['mt_md'] = sd_get_margin_input( 'mt', array( 'device_type' => 'Tablet' ) );
		$arguments['mr_md'] = sd_get_margin_input( 'mr', array( 'device_type' => 'Tablet' ) );
		$arguments['mb_md'] = sd_get_margin_input( 'mb', array( 'device_type' => 'Tablet' ) );
		$arguments['ml_md'] = sd_get_margin_input( 'ml', array( 'device_type' => 'Tablet' ) );

		// margins desktop
		$arguments['mt_lg'] = sd_get_margin_input( 'mt', array( 'device_type' => 'Desktop' ) );
		$arguments['mr_lg'] = sd_get_margin_input( 'mr', array( 'device_type' => 'Desktop' ) );
		$arguments['mb_lg'] = sd_get_margin_input(
			'mb',
			array(
				'device_type' => 'Desktop',
				'default'     => 3,
			)
		);
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

		// position
		$arguments['position'] = sd_get_position_class_input( 'position' );

		$arguments['sticky_offset_top']    = sd_get_sticky_offset_input( 'top' );
		$arguments['sticky_offset_bottom'] = sd_get_sticky_offset_input( 'bottom' );

		$arguments['display']    = sd_get_display_input( 'd', array( 'device_type' => 'Mobile' ) );
		$arguments['display_md'] = sd_get_display_input( 'd', array( 'device_type' => 'Tablet' ) );
		$arguments['display_lg'] = sd_get_display_input( 'd', array( 'device_type' => 'Desktop' ) );

		// flex align items
		$arguments = $arguments + sd_get_flex_align_items_input_group( 'flex_align_items' );
		$arguments = $arguments + sd_get_flex_justify_content_input_group( 'flex_justify_content' );
		$arguments = $arguments + sd_get_flex_align_self_input_group( 'flex_align_self' );
		$arguments = $arguments + sd_get_flex_order_input_group( 'flex_order' );


		// advanced
		$arguments['anchor'] = sd_get_anchor_input();

		$arguments['css_class'] = sd_get_class_input();

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

		if ( ! empty( $args['bg_image_use_featured'] ) ) {
			global $post;
			$featured_image = get_the_post_thumbnail_url( $post, 'full' );
			if ( ! $featured_image && ! empty( $args['bg_image'] ) ) {
				$featured_image = esc_url( $args['bg_image'] );
			} elseif ( ! $featured_image ) {
				$featured_image = '';
			}
			$content = preg_replace( '/:url\(\w+:\/\/\S*\/icons\/placeholder.png/', ':url(' . $featured_image, $content );
		}

		$content = str_replace( '&lt;', '<', $content );

		if ( empty( $content ) ) {
			return '';
		} elseif ( strpos( $content, 'class="wp-block-' ) !== false ) {//block
			return $content;
		} else {
			$wrap_class = sd_build_aui_class( $args );

			return '<section class="' . $wrap_class . '">' . $content . '</section>'; // shortcode
		}

	}


}

// register it.
add_action(
	'widgets_init',
	function () {
		register_widget( 'BlockStrap_Widget_Container' );
	}
);

