<?php

class BlockStrap_Widget_Navbar extends WP_Super_Duper {


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
			'block-keywords' => "['nav','navbar']",
			'block-output'   => array(
				array(
					'element'   => 'nav',
					//'class'     => 'container',
					'className' => 'navbar navbar-expand-lg [%WrapClass%]',
					'style'     => '{[%WrapStyle%]}',
					array(
						'element'          => 'innerBlocksProps',
						'inner_element' => 'div',
						'blockProps'       => array(
							'className' => '[%inner_container%]',
//							'className' => 'navbar navbar-expand-lg [%WrapClass%]',
//							'style'     => '{[%WrapStyle%]}',
						),
						'innerBlocksProps' => array(
							'orientation' => 'horizontal',
							'template'    => "
						[
							[ 'blockstrap/blockstrap-widget-row', {}, [[ 'core/paragraph', { placeholder: 'Summaryx' } ],] ],
                            
                        ]
    "
						),
					)
				)



			),
			'block-wrap'    => '',
			'class_name'     => __CLASS__,
			'base_id'        => 'bs_navbar',
			'name'           => __( 'BS > Navbar', 'blockstrap' ),
			'widget_ops'     => array(
				'classname'   => 'bd-navbar',
				'description' => esc_html__( 'A container for content', 'blockstrap' ),
			),
			'example'        => array(
				'attributes' => array(
					'after_text' => "Earth",
				)
			),
			'no_wrap'        => true,
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

//		$arguments['bg_color']  = array(
//			'type' => 'color',
//			'title' => __('Badge background color:', 'geodirectory'),
//			'desc' => __('Color for the badge background.', 'geodirectory'),
//			'placeholder' => '',
//			'default' => '#0073aa',
//			'desc_tip' => true,
//			'group'     => __("Design","geodirectory"),
//		);
//
//		$arguments['x_color']  = array(
//			'type' => 'gradient',
//			'title' => __('Color Gradient', 'geodirectory'),
//			'desc' => __('Color for the badge background.', 'geodirectory'),
//			'placeholder' => '',
//			'default' => 'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)',
//			'desc_tip' => true,
//			'group'     => __("Design","geodirectory"),
//		);
//
//		$arguments['x_file']  = array(
//			'type' => 'file',
//			'title' => __('File upload', 'geodirectory'),
//			'desc' => __('Color for the badge background.', 'geodirectory'),
//			'placeholder' => '',
//			//'default' => 'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)',
//			'desc_tip' => true,
//			'group'     => __("Design","geodirectory"),
//		);

		$arguments = $arguments + sd_get_background_inputs('bg');

		// transparent until scroll
		$arguments['bgtus'] = array(
			'type' => 'checkbox',
			'title' => __('Transparent until scroll', 'geodirectory'),
			'default' => '',
			'value'  => '1',
			'desc_tip' => false,
			'desc' => __('This may not show in block preview.','geodirectory'),
			'group'     => __("Background","geodirectory")
		);



		// container class
		$arguments['container'] = array(
			'type' => 'select',
			'title' => __('Color scheme', 'geodirectory'),
			'options' =>  array(
				''  => __('None','geodirectory'),
				'navbar-dark'  => __('Dark','geodirectory'),
				'navbar-light'  => __('Light','geodirectory'),
			),
			'default' => '',
			'desc_tip' => true,
			'group'     => __("Color scheme","geodirectory")
		);

		// background
//		$arguments['bg'] = sd_get_background_input( 'mt' );

		// container class
		$arguments['inner_container'] = array(
			'type' => 'select',
			'title' => __('Content Container', 'geodirectory'),
			'options' =>  array(
				'd-flex w-100'  => __('Full width','geodirectory'),
				'container'  => __('Contain','geodirectory'),
			),
			'default' => '',
			'desc_tip' => true,
			'group'     => __("Content Container","geodirectory")
		);

		// margins
		$arguments['mt'] = sd_get_margin_input( 'mt' );
		$arguments['mr'] = sd_get_margin_input( 'mr' );
		$arguments['mb'] = sd_get_margin_input( 'mb' );
		$arguments['ml'] = sd_get_margin_input( 'ml' );

		// margins mobile
		$arguments['mt']  = sd_get_margin_input('mt', array('device_type' => 'Mobile'));
		$arguments['mr']  = sd_get_margin_input('mr', array('device_type' => 'Mobile'));
		$arguments['mb']  = sd_get_margin_input('mb', array('device_type' => 'Mobile'));
		$arguments['ml']  = sd_get_margin_input('ml', array('device_type' => 'Mobile'));

		// margins tablet
		$arguments['mt_md']  = sd_get_margin_input('mt', array('device_type' => 'Tablet'));
		$arguments['mr_md']  = sd_get_margin_input('mr', array('device_type' => 'Tablet'));
		$arguments['mb_md']  = sd_get_margin_input('mb', array('device_type' => 'Tablet'));
		$arguments['ml_md']  = sd_get_margin_input('ml', array('device_type' => 'Tablet'));

		// margins desktop
		$arguments['mt_lg']  = sd_get_margin_input('mt', array('device_type' => 'Desktop'));
		$arguments['mr_lg']  = sd_get_margin_input('mr', array('device_type' => 'Desktop'));
		$arguments['mb_lg']  = sd_get_margin_input('mb',array('device_type' => 'Desktop','default'=>3));
		$arguments['ml_lg']  = sd_get_margin_input('ml', array('device_type' => 'Desktop'));

		// padding
		$arguments['pt'] = sd_get_padding_input( 'pt', array('device_type' => 'Mobile') );
		$arguments['pr'] = sd_get_padding_input( 'pr', array('device_type' => 'Mobile') );
		$arguments['pb'] = sd_get_padding_input( 'pb', array('device_type' => 'Mobile') );
		$arguments['pl'] = sd_get_padding_input( 'pl', array('device_type' => 'Mobile') );

		// padding tablet
		$arguments['pt_md'] = sd_get_padding_input( 'pt', array('device_type' => 'Tablet') );
		$arguments['pr_md'] = sd_get_padding_input( 'pr', array('device_type' => 'Tablet') );
		$arguments['pb_md'] = sd_get_padding_input( 'pb', array('device_type' => 'Tablet') );
		$arguments['pl_md'] = sd_get_padding_input( 'pl', array('device_type' => 'Tablet') );

		// padding desktop
		$arguments['pt_lg'] = sd_get_padding_input( 'pt', array('device_type' => 'Desktop') );
		$arguments['pr_lg'] = sd_get_padding_input( 'pr', array('device_type' => 'Desktop') );
		$arguments['pb_lg'] = sd_get_padding_input( 'pb', array('device_type' => 'Desktop') );
		$arguments['pl_lg'] = sd_get_padding_input( 'pl', array('device_type' => 'Desktop') );

		// border
		$arguments['border']       = sd_get_border_input( 'border' );
		$arguments['rounded']      = sd_get_border_input( 'rounded' );
		$arguments['rounded_size'] = sd_get_border_input( 'rounded_size' );

		// shadow
		$arguments['shadow'] = sd_get_shadow_input( 'shadow' );

		// position
		$arguments['position'] = sd_get_position_class_input('position',array('options' => array(
			''  => __('Default','geodirectory'),
			'fixed-top'  => __('Fixed top','geodirectory'),
			'fixed-bottom'  => __('Fixed bottom','geodirectory'),
			'sticky-top'  => __('Sticky top','geodirectory'),
		)));

		$arguments['sticky_offset_top'] = sd_get_sticky_offset_input($type = 'top');
		$arguments['sticky_offset_bottom'] = sd_get_sticky_offset_input($type = 'bottom');



//		// text color
//		$arguments['text_color'] = sd_get_text_color_input();
//
//		// Text justify
//		$arguments['text_justify'] = sd_get_text_justify_input();
//
//		// text align
//		$arguments['text_align'] = sd_get_text_align_input('text_align',array('device_type' => 'Mobile','element_require' => '[%text_justify%]==""'));
//		$arguments['text_align_md'] = sd_get_text_align_input('text_align',array('device_type' => 'Tablet','element_require' => '[%text_justify%]==""'));
//		$arguments['text_align_lg'] = sd_get_text_align_input('text_align',array('device_type' => 'Desktop','element_require' => '[%text_justify%]==""'));



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


		if ( empty( $content ) ) {
			return '';
		}elseif(strpos($content, 'class="wp-block-') !== false){//block
			return $content;
		}else{
			$wrap_class = sd_build_aui_class( $args );
			return '<section class="'.$wrap_class.'">'.$content.'</section>'; // shortcode
		}

	}

}

// register it.
add_action( 'widgets_init', function () {
	register_widget( 'BlockStrap_Widget_Navbar' );
} );

