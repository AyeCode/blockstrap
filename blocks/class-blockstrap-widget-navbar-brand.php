<?php

class BlockStrap_Widget_Navbar_Brand extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'     => 'blockstrap',
			'output_types'   => array( 'block' ),
//			'nested-block'   => true,
			'block-icon'     => 'far fa-square',
			'block-category' => 'layout',
			'block-keywords' => "['brand','navbar','nav']",
			'block-supports' => array(
				'customClassName' => false,
			),
			'block-output'   => array(
				array(
					'element'          => 'span',
					'className' => 'navbar-brand d-flex align-items-center [%WrapClass%]',
					'style'     => '{[%WrapStyle%]}',
					'element_require' => '[%type%]=="none"',
					array(
						'element' => 'img',
						'class'   => '',
						'element_require' => '[%icon_image%]!=""',
						'src'     => '[%icon_image%]',
						'style'    => '{maxWidth:\'[%img_max_width%]px\'}',

					),
					array(
						'element' => 'span',
						'class'   => 'mb-0 [%brand_font_size%] [%brand_font_weight%] [%brand_font_italic%]',
						'content' => '[%text%]',
					),

				),
				array(
					'element'          => 'a',
					'className' => 'navbar-brand d-flex align-items-center [%WrapClass%]',
					'style'     => '{[%WrapStyle%]}',
					'if_href'   => 'props.attributes.type == "home" ? "'.get_home_url().'" : props.attributes.type == "custom" ? [%custom_url%] : "" ',
					'element_require' => '[%type%]!="none"',
					array(
						'element' => 'img',
						'class'   => '',
						'element_require' => '[%icon_image%]!=""',
						'if_src'     => '[%icon_image%]=="Blockstrap-white.png" ? "'.get_template_directory_uri().'/assets/images/Blockstrap-white.png" : "[%icon_image%]"',
						'style'    => '{maxWidth:\'[%img_max_width%]px\'}',

					),
					array(
						'element' => 'span',
						'class'   => 'mb-0 [%brand_font_size%] [%brand_font_weight%] [%brand_font_italic%]',
						'content' => '[%text%]',
					),

				)


			),
			'block-wrap'    => '',
			'class_name'     => __CLASS__,
			'base_id'        => 'bs_navbar_brand',
			'name'           => __( 'BS > Navbar Brand', 'blockstrap' ),
			'widget_ops'     => array(
				'classname'   => 'bd-navbar-brand',
				'description' => esc_html__( 'A container for content', 'blockstrap' ),
			),
			'example'        => array(
				'attributes' => array(
					'after_text' => "Earth",
				)
			),
			'no_wrap'        => true,
			'block_group_tabs'   => array(
					'content'  => array(
						'groups' => array( __( 'Text', 'geodirectory' ),__( 'Icon', 'geodirectory' ),__( 'Link', 'geodirectory' ) ),
						'tab'    => array(
							'title'     => __( 'Content', 'geodirectory' ),
							'key'       => 'bs_tab_content',
							'tabs_open' => true,
							'open'      => true,
							'class'     => 'text-center flex-fill d-flex justify-content-center',
						),
					),
				'styles'   => array(
					'groups' => array( __( 'Typography', 'geodirectory' ) ),
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

		$arguments['text']  = array(
			'type' => 'text',
			'title' => __('Text', 'geodirectory'),
			'desc' => __('Brand text', 'geodirectory'),
			'placeholder' => __('My Awesome Site!', 'geodirectory'),
			'default' => get_bloginfo( 'name' ),
			'desc_tip' => true,
			'group'     => __("Text","geodirectory"),
		);
		$arguments['icon_image'] = array(
			'type' => 'image',
			'title' => __('Image', 'geodirectory'),
			'placeholder' => '',
			'focalpoint'  => 0,
			'default' => '',
			'desc_tip' => true,
			'group'     => __("Icon","geodirectory"),
		//	'element_require' => '( [%'.$type.'%]=="" || [%'.$type.'%]=="custom-color" || [%'.$type.'%]=="custom-gradient" || [%'.$type.'%]=="transparent" )'
		);

		$arguments['img_max_width']  = array(
			'type' => 'number',
			'title' => __('Max width', 'geodirectory'),
			'desc' => __('Set the image max width.', 'geodirectory'),
			'placeholder' => __('150', 'geodirectory'),
			'default' => '150',
			'desc_tip' => true,
			'group'     => __("Icon","geodirectory"),
		);

		$arguments['type'] = array(
			'type' => 'select',
			'title' => __('Link Type', 'geodirectory'),
			'options' =>  array(
				'home' => __('Home', 'geodirectory'),
				'custom' => __('Custom', 'geodirectory'),
				'none' => __('None', 'geodirectory'),
			),
			'default' => 'home',
			'desc_tip' => true,
			'group'     => __("Link","geodirectory")
		);

		$arguments['custom_url']  = array(
			'type' => 'text',
			'title' => __('Custom URL', 'geodirectory'),
			'desc' => __('Add custom link URL', 'geodirectory'),
			'placeholder' => __('https://example.com', 'geodirectory'),
			'default' => '',
			'desc_tip' => true,
			'group'     => __("Link","geodirectory"),
			'element_require' => '[%type%]=="custom"',
		);

		// text color
		$arguments['text_color'] = sd_get_text_color_input();

		// font size
		$arguments['brand_font_size'] = sd_get_font_size_input();

		// font size
		$arguments['brand_font_weight'] = sd_get_font_weight_input();

		$arguments['brand_font_italic'] = sd_get_font_italic_input();

		// Text justify
		$arguments['text_justify'] = sd_get_text_justify_input();

		// text align
		$arguments['text_align'] = sd_get_text_align_input('text_align',array('device_type' => 'Mobile','element_require' => '[%text_justify%]==""'));
		$arguments['text_align_md'] = sd_get_text_align_input('text_align',array('device_type' => 'Tablet','element_require' => '[%text_justify%]==""'));
		$arguments['text_align_lg'] = sd_get_text_align_input('text_align',array('device_type' => 'Desktop','element_require' => '[%text_justify%]==""'));


//		$arguments = $arguments + sd_get_background_inputs('bg');

		// background
//		$arguments['bg'] = sd_get_background_input( 'mt' );

		// background
		$arguments = $arguments + sd_get_background_inputs( 'bg', array( 'group' => __( "Wrapper Styles", "geodirectory" ) ), array( 'group' => __( "Wrapper Styles", "geodirectory" ) ), array( 'group' => __( "Wrapper Styles", "geodirectory" ) ), false );

		$arguments['bg_on_text'] = array(
			'type'            => 'checkbox',
			'title'           => __( 'Background on text', 'geodirectory' ),
			'default'         => '',
			'value'           => '1',
			'desc_tip'        => false,
			'desc'            => __( 'This will show the background on the text.', 'geodirectory' ),
			'group'           => __( "Wrapper Styles", "geodirectory" ),
			'element_require' => '[%bg%]=="custom-gradient"',
		);

		// margins
		$arguments['mt'] = sd_get_margin_input( 'mt' );
		$arguments['mr'] = sd_get_margin_input( 'mr' );
		$arguments['mb'] = sd_get_margin_input( 'mb', array( 'default' => 3 ) );
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

		return $content;

//		if ( empty( $content ) ) {
//			return '';
//		}elseif(strpos($content, 'class="wp-block-') !== false){//block
//			return $content;
//		}else{
//			$wrap_class = sd_build_aui_class( $args );
//			return '<section class="'.$wrap_class.'">'.$content.'</section>'; // shortcode
//		}

	}

}

// register it.
add_action( 'widgets_init', function () {
	register_widget( 'BlockStrap_Widget_Navbar_Brand' );
} );

