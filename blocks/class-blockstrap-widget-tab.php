<?php

class BlockStrap_Widget_Tab extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'     => 'blockstrap',
			'output_types'   => array( 'block', 'shortcode' ),
			'nested-block'   => true,
			'block-icon'     => 'far fa-plus-square',
			'block-category' => 'layout',
			'block-keywords' => "['tabs','tab','content']",
			'block-supports' => array(
				'anchor' => 'true',
			),
			'block-outputx'  => array(
				array(
					'element'    => 'innerBlocksProps',
					'blockProps' => array(
//						'if_className' => 'props.isSelected || props.hasChildSelected ? props.attributes.styleid + " tab-pane fade show active zzz " [%WrapClass%] : props.attributes.styleid + " tab-pane fade xxx " [%WrapClass%]',
						'if_className' => 'props.attributes.styleid + " tab-pane fade " [%WrapClass%]',
						'style'        => '{[%WrapStyle%]}',
						'if_id'        => 'props.attributes.id ? props.attributes.id : props.clientId',
//						'id'        => 'zzzzzz',
						'role'         => 'tabpanel',
						'if_tab_name'  => 'props.attributes.text',

						'innerBlocksProps' => array(
							'orientation' => 'vertical',


						),

					),
				),
			),

			'block-edit-return'  => "el( 'div', wp.blockEditor.useBlockProps( {
										className: parentBlocks[parentBlocks.length - 1].innerBlocks[0].clientId === props.clientId ?  'tab-pane fade show active' : 'tab-pane fade'
										} ),

										 el( 'div', wp.blockEditor.useInnerBlocksProps( {className: 'tab-content'},  {orientation: 'horizontal',inner_element: 'div' }))

										), ",
			'block-save-returnx' => "el( 'div', wp.blockEditor.useBlockProps( {
										className: parentBlocks[parentBlocks.length - 1].innerBlocks[0].clientId === props.clientId ?  'tab-pane fade show active' : 'tab-pane fade'
										} ),

										 el( 'div', wp.blockEditor.useInnerBlocksProps( {className: 'tab-content'},  {orientation: 'horizontal',inner_element: 'div' }))

										), ",
//			'block-edit-return' => "el( 'div', wp.blockEditor.useInnerBlocksProps.save( wp.blockEditor.useBlockProps.save( {className: 'tab-pane fade',} ), {inner_element: 'div',},)), ",
			'block-wrap'         => '',
			'class_name'         => __CLASS__,
			'base_id'            => 'bs_tab',
			'name'               => __( 'BS > Tab', 'blockstrap' ),
			'widget_ops'         => array(
				'classname'   => 'bs-tab',
				'description' => esc_html__( 'A tab', 'blockstrap' ),
			),
			'no_wrap'            => true,
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


		$arguments['text'] = array(
			'type'        => 'text',
			'title'       => __( 'Name', 'geodirectory' ),
//			'desc' => __('Add custom link text or leave blank for dynamic', 'geodirectory'),
			'placeholder' => __( 'Tab1', 'geodirectory' ),
			'default'     => '',
			'desc_tip'    => true,
			'group'       => __( "Tab Name", "geodirectory" ),
		);

		$arguments['anchor'] = array(
			'type'    => 'text',
			'title'   => __( 'HTML anchor (required)', 'geodirectory' ),
//			'desc'            => __( 'Separate multiple classes with spaces.', 'geodirectory' ),
			'default' => '',
			'group'   => __( "Tab Name", "geodirectory" ),
		);

		// container class
//		$arguments['container'] = sd_get_container_class_input('container',array( 'default' => 'container' ) );

//		// row-cols
//		$arguments['row_cols']    = sd_get_row_cols_input( 'row_cols', array( 'device_type' => 'Mobile' ) );
//		$arguments['row_cols_md'] = sd_get_row_cols_input( 'row_cols', array( 'device_type' => 'Tablet' ) );
//		$arguments['row_cols_lg'] = sd_get_row_cols_input( 'row_cols', array( 'device_type' => 'Desktop' ) );
//
//		// columns
//		$arguments['col']    = sd_get_col_input( 'col', array( 'device_type' => 'Mobile' ) );
//		$arguments['col_md'] = sd_get_col_input( 'col', array( 'device_type' => 'Tablet' ) );
//		$arguments['col_lg'] = sd_get_col_input( 'col', array( 'device_type' => 'Desktop' ) );

		$arguments = $arguments + sd_get_background_inputs( 'bg' );

		$arguments['bg_on_text'] = array(
			'type'            => 'checkbox',
			'title'           => __( 'Background on text', 'geodirectory' ),
			'default'         => '',
			'value'           => '1',
			'desc_tip'        => false,
			'desc'            => __( 'This will show the background on the text.', 'geodirectory' ),
			'group'           => __( "Background", "geodirectory" ),
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
		$arguments['mb_lg'] = sd_get_margin_input( 'mb', array( 'device_type' => 'Desktop', 'default' => 3 ) );
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

		$arguments['sticky_offset_top']    = sd_get_sticky_offset_input( $type = 'top' );
		$arguments['sticky_offset_bottom'] = sd_get_sticky_offset_input( $type = 'bottom' );


		$arguments['display']    = sd_get_display_input( 'd', array( 'device_type' => 'Mobile' ) );
		$arguments['display_md'] = sd_get_display_input( 'd', array( 'device_type' => 'Tablet' ) );
		$arguments['display_lg'] = sd_get_display_input( 'd', array( 'device_type' => 'Desktop' ) );

		// text color
		$arguments['text_color'] = sd_get_text_color_input();

		// Text justify
		$arguments['text_justify'] = sd_get_text_justify_input();

		// text align
		$arguments['text_align']    = sd_get_text_align_input( 'text_align', array(
			'device_type'     => 'Mobile',
			'element_require' => '[%text_justify%]==""'
		) );
		$arguments['text_align_md'] = sd_get_text_align_input( 'text_align', array( 'device_type'     => 'Tablet',
		                                                                            'element_require' => '[%text_justify%]==""'
		) );
		$arguments['text_align_lg'] = sd_get_text_align_input( 'text_align', array( 'device_type'     => 'Desktop',
		                                                                            'element_require' => '[%text_justify%]==""'
		) );


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

		if ( $content ) {
			$wrap_class = sd_build_aui_class( $args );
			$id         = ! empty( $args['anchor'] ) ? sanitize_html_class( $args['anchor'] ) : '';
			$content    = sprintf(
				'<div id="%1$s" class="tab-pane fade %2$s" role="tabpanel" aria-labelledby="%3$s-tab">%4$s</div>',
				$id,
				$wrap_class,
				$id,
				$content
			);
		}

		return $content;

	}


}

// register it.
add_action( 'widgets_init', function () {
	register_widget( 'BlockStrap_Widget_Tab' );
} );

