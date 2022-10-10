<?php

class BlockStrap_Widget_Gallery extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'         => 'blockstrap',
			'output_types'       => array( 'block', 'shortcode' ),
			'nested-block'       => true,
			'block-icon'         => 'fas fa-th',
			'block-category'     => 'layout',
			'block-keywords'     => "['gallery','images','photo']",
			'block-supports'     => array(
				'customClassName' => false,
			),
			'block-edit-returnx' => "el('div', wp.blockEditor.useBlockProps({
									dangerouslySetInnerHTML: {__html: onChangeContent()},
									style: {'minHeight': '30px'}
								}))",
			'block-output'       => array(
				array(
					'element'          => 'innerBlocksProps',
					'blockProps'       => array(
						//                      'if_className' => 'props.attributes.styleid + " " [%WrapClass%]',
																'if_className' => 'props.attributes.styleid + " row " [%WrapClass%]',
						'style' => '{[%WrapStyle%]}',
						'if_id' => 'props.attributes.id ? props.attributes.id : props.clientId',
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
			),
			'block-wrap'         => '',
			'class_name'         => __CLASS__,
			'base_id'            => 'bs_gallery',
			'name'               => __( 'BS > Gallery', 'blockstrap' ),
			'widget_ops'         => array(
				'classname'   => 'bs-image',
				'description' => esc_html__( 'An image gallery.', 'blockstrap' ),
			),
			'example'            => array(
				'attributes' => array(
					'after_text' => 'Earth',
				),
			),
			'no_wrap'            => true,
			'block_group_tabs'   => array(
				'content'  => array(
					'groups' => array( __( 'Image', 'geodirectory' ), __( 'Captions', 'geodirectory' ) ),
					'tab'    => array(
						'title'     => __( 'Content', 'geodirectory' ),
						'key'       => 'bs_tab_content',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					),
				),
				'styles'   => array(
					'groups' => array(
						__( 'Gallery Styles', 'geodirectory' ),
						__( 'Image Styles', 'geodirectory' ),
						__( 'Typography', 'geodirectory' ),
					),
					'tab'    => array(
						'title'     => __( 'Styles', 'geodirectory' ),
						'key'       => 'bs_tab_styles',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					),
				),
				'advanced' => array(
					'groups' => array( __( 'Wrapper Styles', 'geodirectory' ), __( 'Advanced', 'geodirectory' ) ),
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

		$arguments['images'] = array(
			'type'        => 'images',
			'title'       => __( 'Custom image', 'geodirectory' ),
			'placeholder' => '',
			'default'     => '',
			'desc_tip'    => true,
			'group'       => __( 'Image', 'geodirectory' ),
		//          'element_require' => '[%img_src%]=="upload"'
		);

		$image_sizes = get_intermediate_image_sizes();

		$arguments['img_size'] = array(
			'type'     => 'select',
			'title'    => __( 'Image size', 'geodirectory' ),
			'options'  => array( '' => 'Select image size' ) + array_combine( $image_sizes, $image_sizes ) + array( 'full' => 'full' ),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Image', 'geodirectory' ),
		);

		$arguments['lightbox_size'] = array(
			'type'     => 'select',
			'title'    => __( 'Lightbox', 'geodirectory' ),
			'options'  => array( '' => 'No' ) + array_combine( $image_sizes, $image_sizes ) + array( 'full' => 'full' ),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Image', 'geodirectory' ),
		);

		$arguments['caption_show'] = array(
			'type'     => 'select',
			'title'    => __( 'Caption', 'geodirectory' ),
			'options'  => array(
				''           => __( 'Hide', 'geodirectory' ),
				'show'       => __( 'Show always', 'geodirectory' ),
				'hover_show' => __( 'Show on hover', 'geodirectory' ),
			),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Captions', 'geodirectory' ),
		);

		//$arguments = $arguments + sd_get_background_inputs('bg');

		// row-cols
		$arguments['row_cols']    = sd_get_row_cols_input(
			'row_cols',
			array(
				'device_type'     => 'Mobile',
				'group'           => __( 'Gallery Styles', 'geodirectory' ),
				'element_require' => '',
				'title'           => __( 'Images per row', 'geodirectory' ),
			)
		);
		$arguments['row_cols_md'] = sd_get_row_cols_input(
			'row_cols',
			array(
				'device_type'     => 'Tablet',
				'group'           => __( 'Gallery Styles', 'geodirectory' ),
				'element_require' => '',
				'title'           => __( 'Images per row', 'geodirectory' ),
			)
		);
		$arguments['row_cols_lg'] = sd_get_row_cols_input(
			'row_cols',
			array(
				'device_type'     => 'Desktop',
				'group'           => __( 'Gallery Styles', 'geodirectory' ),
				'element_require' => '',
				'title'           => __( 'Images per row', 'geodirectory' ),
			)
		);

		$arguments['aspect'] = array(
			'title'    => __( 'Aspect ratio', 'geodirectory' ) . ' ' . __( '(bootstrap only)', 'geodirectory' ),
			'desc'     => __( 'For a more consistent image view you can set the aspect ratio of the image view port.', 'geodirectory' ),
			'type'     => 'select',
			'options'  => array(
				''     => __( 'Default (16by9)', 'geodirectory' ),
				'21x9' => __( '21by9', 'geodirectory' ),
				'4x3'  => __( '4by3', 'geodirectory' ),
				'1x1'  => __( '1by1 (square)', 'geodirectory' ),
				'n'    => __( 'No ratio (natural)', 'geodirectory' ),
			),
			'desc_tip' => true,
			'value'    => '',
			'default'  => '',
			'advanced' => true,
			'group'    => __( 'Design', 'geodirectory' ),
		);
		$arguments['cover']  = array(
			'title'    => __( 'Image cover type:', 'geodirectory' ),
			'desc'     => __( 'This is how the image should cover the image viewport.', 'geodirectory' ),
			'type'     => 'select',
			'options'  => array(
				''  => __( 'Default (cover both)', 'geodirectory' ),
				'x' => __( 'Width cover', 'geodirectory' ),
				'y' => __( 'height cover', 'geodirectory' ),
				'n' => __( 'No cover (contain)', 'geodirectory' ),
			),
			'desc_tip' => true,
			'value'    => '',
			'default'  => '',
			'advanced' => true,
			'group'    => __( 'Design', 'geodirectory' ),
		);

		// border
		$arguments['img_border']       = sd_get_border_input( 'border', array( 'group' => __( 'Image Styles', 'geodirectory' ) ) );
		$arguments['img_rounded']      = sd_get_border_input( 'rounded', array( 'group' => __( 'Image Styles', 'geodirectory' ) ) );
		$arguments['img_rounded_size'] = sd_get_border_input( 'rounded_size', array( 'group' => __( 'Image Styles', 'geodirectory' ) ) );

		// shadow
		$arguments['img_shadow'] = sd_get_shadow_input( 'shadow', array( 'group' => __( 'Image Styles', 'geodirectory' ) ) );

		// Typography
		// text color
		$arguments['text_color'] = sd_get_text_color_input();

		// font size
		$arguments = $arguments + sd_get_font_size_input_group();

		// font size
		$arguments['font_weight'] = sd_get_font_weight_input();

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

		// background
		//      $arguments = $arguments + sd_get_background_inputs('bg', array('group' => __("Wrapper Styles","geodirectory")),array('group' => __("Wrapper Styles","geodirectory")),array('group' => __("Wrapper Styles","geodirectory")),array('group' => __("Wrapper Styles","geodirectory")) );

		$arguments['bg_on_text'] = array(
			'type'            => 'checkbox',
			'title'           => __( 'Background on text', 'geodirectory' ),
			'default'         => '',
			'value'           => '1',
			'desc_tip'        => false,
			'desc'            => __( 'This will show the background on the text.', 'geodirectory' ),
			'group'           => __( 'Wrapper Styles', 'geodirectory' ),
			'element_require' => '[%bg%]=="custom-gradient"',
		);

		// margins
		$arguments['mt'] = sd_get_margin_input( 'mt' );
		$arguments['mr'] = sd_get_margin_input( 'mr' );
		$arguments['mb'] = sd_get_margin_input( 'mb', array( 'default' => 3 ) );
		$arguments['ml'] = sd_get_margin_input( 'ml' );

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

		$arguments['css_class'] = array(
			'type'    => 'text',
			'title'   => __( 'Additional CSS class(es)', 'geodirectory' ),
			'desc'    => __( 'Separate multiple classes with spaces.', 'geodirectory' ),
			'default' => '',
			'group'   => __( 'Advanced', 'geodirectory' ),
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

		return $content;
	}

}

// register it.
add_action(
	'widgets_init',
	function () {
		register_widget( 'BlockStrap_Widget_Gallery' );
	}
);

