<?php

class BlockStrap_Widget_Nav extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		global $bs_navbar_count;

		$bs_navbar_count++;

		$options = array(
			'textdomain'     => 'blockstrap',
			'output_types'   => array( 'block', 'shortcode' ),
			'nested-block'   => true,
			'block-icon'     => 'far fa-square',
			'block-category' => 'layout',
//			'block-supports' => array(
//				'color' => array(
//					'__experimentalDefaultControls' => array(
//						'background' => true,
//						'text' => true,
//					)
//				),
//			),
			'block-keywords' => "['menu','navigation','nav']",
			'block-output'   => array(
				array(
					'element'          => 'button',
					//'content' => '[%text%]',
					'className' => 'navbar-toggler',
					'type'  => 'button',
					'"data-toggle"'   => 'collapse',
					'"data-target"'   => '#navbarNav_'.$bs_navbar_count ,
					'element_require' => '[%inside_navbar%]=="1"',
					array(
						'element' => 'span',
						'class'   => 'navbar-toggler-icon',
						'content' => '',
					)

				),
				array(
					'element'          => 'BlocksProps',
					'inner_element'     => 'div',
					//'content' => '[%text%]',
					//'className' => 'collapse navbar-collapse',
					'if_className'   => '[%inside_navbar%]=="1" ? "collapse navbar-collapse" : ""',
					'style'     => '{[%WrapStyle%]}',
					'id'    => 'navbarNav_'.$bs_navbar_count ,
					//'element_require' => '[%inside_navbar%]=="1"',

					array(
						'element'          => 'innerBlocksProps',
							'inner_element'    => 'ul',
						'blockProps'       => array(
							//'className' => 'navbar-nav [%WrapClass%]',
							'if_className'   => '[%inside_navbar%]=="1" ? "navbar-nav [%WrapClass%]" : "nav [%WrapClass%]"',
						),
						'innerBlocksProps' => array(
							'orientation' => 'horizontal',
//								'template'    => "[[ 'core/heading', { placeholder: 'Book Title' } ],
//    [ 'core/paragraph', { placeholder: 'Summary' } ],]"
						),
					)
//					array(
//						'element' => 'ul',
//						'class'   => 'navbar-nav mr-auto',
//
//					),

				)


			),
//			'block-output'   => array( // the block visual output elements as an array
//
//				array(
//					'element' => 'div',
//					'class'   => '[%WrapClass%]',
//					array(
//						'element' => 'InnerBlocks',
////					'content' => 'Hello: [%after_text%]' // block properties can be added by wrapping them in [%name%]
//					)
//				)
//
//			),
			'block-wrap'    => '',
			'class_name'     => __CLASS__,
			'base_id'        => 'bs_nav',
			'name'           => __( 'BS > Nav', 'blockstrap' ),
			'widget_ops'     => array(
				'classname'   => 'bd-nav',
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

//		$arguments['text']  = array(
//			'type' => 'text',
//			'title' => __('Text', 'geodirectory'),
//			'desc' => __('Brand text', 'geodirectory'),
//			'placeholder' => __('My Awesome Site!', 'geodirectory'),
//			'default' => get_bloginfo( 'name' ),
//			'desc_tip' => true,
//			'group'     => __("Text","geodirectory"),
//		);
//		$arguments['icon_image'] = array(
//			'type' => 'image',
//			'title' => __('Image', 'geodirectory'),
//			'placeholder' => '',
//			'focalpoint'  => 0,
//			'default' => '',
//			'desc_tip' => true,
//			'group'     => __("Icon","geodirectory"),
//			//	'element_require' => '( [%'.$type.'%]=="" || [%'.$type.'%]=="custom-color" || [%'.$type.'%]=="custom-gradient" || [%'.$type.'%]=="transparent" )'
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

		//$arguments = $arguments + sd_get_background_inputs('bg');

		//
		$arguments['inside_navbar'] = array(
			'type' => 'select',
			'title' => __('Usage', 'geodirectory'),
			'options' =>  array(
				'1'  => __('Inside Navbar (collapse on mobile)','geodirectory'),
				'0'  => __('Standalone (never collapse)','geodirectory'),
			),
			'default' => '',
			'desc_tip' => true,
			'group'     => __("Nav Styles","geodirectory")
		);

		// flex direction
		$arguments['flex_direction'] = array(
			'type' => 'select',
			'title' => __('Horizontal / Vertical', 'geodirectory'),
			'options' =>  array(
				''  => __('Horizontal','geodirectory'),
				'flex-column'  => __('Vertical','geodirectory'),
			),
			'default' => '',
			'desc_tip' => true,
			'group'     => __("Nav Styles","geodirectory")
		);

		// Nav style
		$arguments['nav_style'] = array(
			'type' => 'select',
			'title' => __('Nav style', 'geodirectory'),
			'options' =>  array(
				''  => __('Default','geodirectory'),
				'nav-tabs'  => __('Tabs','geodirectory'),
				'nav-pills'  => __('Pills','geodirectory'),
			),
			'default' => '',
			'desc_tip' => true,
			'group'     => __("Nav Styles","geodirectory")
		);

//		// horizontal_alignment
//		$arguments['horizontal_alignment'] = array(
//			'type' => 'select',
//			'title' => __('Alignment', 'geodirectory'),
//			'options' =>  array(
//				''  => __('Default (left)','geodirectory'),
//				'justify-content-center'  => __('Center','geodirectory'),
//				'justify-content-end'  => __('Right','geodirectory'),
//			),
//			'default' => '',
//			'desc_tip' => true,
//			'group'     => __("Nav Styles","geodirectory")
//		);

		// fill / justify
		$arguments['nav_fill'] = array(
			'type' => 'select',
			'title' => __('Fill / Justify', 'geodirectory'),
			'options' =>  array(
				''  => __('No','geodirectory'),
				'nav-fill'  => __('Justify','geodirectory'),
				'nav-justified'  => __('Justify equal width','geodirectory'),
			),
			'default' => '',
			'desc_tip' => true,
			'group'     => __("Nav Styles","geodirectory")
		);



		// background
		$arguments['bg'] = sd_get_background_input( 'bg' );

		// margins
		$arguments['mt'] = sd_get_margin_input( 'mt' );
		$arguments['mr'] = sd_get_margin_input( 'mr' );
		$arguments['mb'] = sd_get_margin_input( 'mb' );
		$arguments['ml'] = sd_get_margin_input( 'ml' );

		// margins mobile
		$arguments['mt']  = sd_get_margin_input('mt', array('device_type' => 'Mobile'));
		$arguments['mr']  = sd_get_margin_input('mr', array('device_type' => 'Mobile', 'default'=>'auto'));
		$arguments['mb']  = sd_get_margin_input('mb', array('device_type' => 'Mobile'));
		$arguments['ml']  = sd_get_margin_input('ml', array('device_type' => 'Mobile', 'default'=>'auto'));

		// margins tablet
		$arguments['mt_md']  = sd_get_margin_input('mt', array('device_type' => 'Tablet'));
		$arguments['mr_md']  = sd_get_margin_input('mr', array('device_type' => 'Tablet'));
		$arguments['mb_md']  = sd_get_margin_input('mb', array('device_type' => 'Tablet'));
		$arguments['ml_md']  = sd_get_margin_input('ml', array('device_type' => 'Tablet'));

		// margins desktop
		$arguments['mt_lg']  = sd_get_margin_input('mt', array('device_type' => 'Desktop'));
		$arguments['mr_lg']  = sd_get_margin_input('mr', array('device_type' => 'Desktop', 'default'=> 0));
		$arguments['mb_lg']  = sd_get_margin_input('mb', array('device_type' => 'Desktop'));
		$arguments['ml_lg']  = sd_get_margin_input('ml', array('device_type' => 'Desktop', 'default'=>'auto'));

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

		$arguments['width'] = array(
			'type' => 'select',
			'title' => __('Width', 'geodirectory'),
			'options' =>  array(
				''  => __('Default','geodirectory'),
				'w-auto'  => __('Auto','geodirectory'),
				'w-25'  => '25%',
				'w-50'  => '50%',
				'w-75'  => '75%',
				'w-100'  => '100%',
			),
			'default' => '',
			'desc_tip' => true,
			'group'     => __("Wrapper Styles","geodirectory")
		);


		// text color
//		$arguments['text_color'] = sd_get_text_color_input();

		// Text justify
		$arguments['text_justify'] = sd_get_text_justify_input();

		// text align
		$arguments['text_align'] = sd_get_text_align_input('text_align',array('device_type' => 'Mobile','element_require' => '[%text_justify%]==""'));
		$arguments['text_align_md'] = sd_get_text_align_input('text_align',array('device_type' => 'Tablet','element_require' => '[%text_justify%]==""'));
		$arguments['text_align_lg'] = sd_get_text_align_input('text_align',array('device_type' => 'Desktop','element_require' => '[%text_justify%]==""'));



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
		}else{
			return $content;
		}

//		if ( empty( $content ) ) {
//			return '';
//		}elseif(strpos($content, 'class="wp-block-') !== false){//block
//			return $content;
//		}else{
//			$wrap_class = sd_build_aui_class( $args );
//			return '<section class="'.$wrap_class.' zzz">'.$content.'</section>'; // shortcode
//		}

	}

}

// register it.
add_action( 'widgets_init', function () {
	register_widget( 'BlockStrap_Widget_Nav' );
} );

