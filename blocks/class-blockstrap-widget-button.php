<?php

class BlockStrap_Widget_Button extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$rand = wp_rand();

		$options = array(
			'textdomain'       => 'blockstrap',
			'output_types'     => array( 'block', 'shortcode' ),
			'block-icon'       => 'fas fa-stop',
			'block-category'   => 'layout',
			'block-keywords'   => "['button','nav','icon']",
			'block-wrap'       => '',
			'block-supports'=> array(
				'customClassName'   => false
			),
//			'block-output'   => array(
//				array(
//					'element'          => 'BlocksProps',
//					'if_inner_element' => 'props.attributes.type == "none" ? "span" :  "a"',
//					'content' => '[%text%]',
//					'blockProps'       => array(
//						'if_className' => 'blockstrap_build_button_class(props.attributes)',// + "[%WrapClass%]"',
//						//'style'     => '{[%WrapStyle%]}',
//						'href'   => '#',
//					),
//				),
//			),
//			'block-edit-return' => "el(props.attributes.type == 'none' ? 'span' :  'a', wp.blockEditor.useBlockProps({
//									dangerouslySetInnerHTML: {__html: onChangeContent()},
//									className: props.attributes.link_type ? 'nav-item form-inline ' + sd_build_aui_class(props.attributes) : 'nav-item ' + sd_build_aui_class(props.attributes) ,
//								}))",
			'block-edit-return' => "el('span', wp.blockEditor.useBlockProps({
									dangerouslySetInnerHTML: {__html: onChangeContent()},
									style: {'minHeight': '30px'},
									className: '',
								}))",
			'class_name'       => __CLASS__,
			'base_id'          => 'bs_button',
			'name'             => __( 'BS > Button', 'blockstrap' ),
			'widget_ops'       => array(
				'classname'   => 'bs-button',
				'description' => esc_html__( 'A bootstrap button, badge or iconbox.', 'blockstrap' ),
			),
			'example'          => array(
				'attributes' => array(
					'after_text' => "Earth",
				)
			),
			'no_wrap'          => true,
			'block_group_tabs' => array(
				'content'  => array(
					'groups' => array( __( "Link", "geodirectory" ) ),
					'tab'    => array(
						'title'     => __( 'Content', 'geodirectory' ),
						'key'       => 'bs_tab_content',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					)
				),
				'styles'   => array(
					'groups' => array( __( "Button", "geodirectory" ),__( "Typography", "geodirectory" ) ),
					'tab'    => array(
						'title'     => __( 'Styles', 'geodirectory' ),
						'key'       => 'bs_tab_styles',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					)
				),
				'advanced' => array(
					'groups' => array( __( "Wrapper Styles", "geodirectory" ) ,__( "Advanced", "geodirectory" ) ),
					'tab'    => array(
						'title'     => __( 'Advanced', 'geodirectory' ),
						'key'       => 'bs_tab_advanced',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					)
				)
			)
		);


		parent::__construct( $options );
	}

	public function link_types() {
		$links = array(
			'home'    => __( 'Home', 'geodirectory' ),
			'none'    => __( 'None (non link)', 'geodirectory' ),
			'page'    => __( 'Page', 'geodirectory' ),
			'post-id' => __( 'Post ID', 'geodirectory' ),
			'custom'  => __( 'Custom URL', 'geodirectory' ),
		);

		if ( defined( 'GEODIRECTORY_VERSION' ) ) {
			$post_types           = geodir_get_posttypes( 'options-plural' );
			$links["gd_search"]   = __( 'GD Search', 'blockstrap' );
			$links["gd_location"] = __( 'GD Location', 'blockstrap' );
			foreach ( $post_types as $cpt => $cpt_name ) {
				$links[ $cpt ]          = sprintf( __( '%s (archive)', 'blockstrap' ), $cpt_name );
				$links[ "add_" . $cpt ] = sprintf( __( '%s (add listing)', 'blockstrap' ), $cpt_name );
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

		$arguments['type'] = array(
			'type'     => 'select',
			'title'    => __( 'Link Type', 'geodirectory' ),
			'options'  => $this->link_types(),
			'default'  => 'home',
			'desc_tip' => true,
			'group'    => __( "Link", "geodirectory" ),
		);

		$arguments['page_id'] = array(
			'type'            => 'select',
			'title'           => __( 'Page', 'geodirectory' ),
			'options'         => $this->get_pages_array(),
			'placeholder'     => __( 'Select Page', 'geodirectory' ),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( "Link", "geodirectory" ),
			'element_require' => '[%type%]=="page"',
		);

		$arguments['post_id'] = array(
			'type'            => 'number',
			'title'           => __( 'Post ID', 'geodirectory' ),
			'placeholder'     => 123,
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( "Link", "geodirectory" ),
			'element_require' => '[%type%]=="post-id"',
		);

		$arguments['custom_url'] = array(
			'type'            => 'text',
			'title'           => __( 'Custom URL', 'geodirectory' ),
			'desc'            => __( 'Add custom link URL', 'geodirectory' ),
			'placeholder'     => __( 'https://example.com', 'geodirectory' ),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( "Link", "geodirectory" ),
			'element_require' => '[%type%]=="custom"',
		);

		$arguments['text'] = array(
			'type'        => 'text',
			'title'       => __( 'Link Text', 'geodirectory' ),
			'desc'        => __( 'Add custom link text or leave blank for dynamic', 'geodirectory' ),
			'placeholder' => __( 'Home', 'geodirectory' ),
			'default'     => '',
			'desc_tip'    => true,
			'group'       => __( "Link", "geodirectory" ),
		);

		$arguments['icon_class'] = array(
			'type'        => 'text',
			'title'       => __( 'Icon class', 'geodirectory' ),
			'desc'        => __( 'Enter a font awesome icon class.', 'geodirectory' ),
			'placeholder' => __( 'fas fa-ship', 'geodirectory' ),
			'default'     => '',
			'desc_tip'    => true,
			'group'       => __( "Link", "geodirectory" ),
		);

		$arguments['icon_position'] = array(
			'type'            => 'select',
			'title'           => __( 'Icon position', 'geodirectory' ),
			'options'         => array(
				'left'  =>  __( 'Left', 'geodirectory' ),
				'right'  =>  __( 'right', 'geodirectory' ),
			),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( "Link", "geodirectory" ),
			'element_require' => '[%icon_class%]!=""',
		);

		// button styles
		$arguments['link_type'] = array(
			'type'     => 'select',
			'title'    => __( 'Link style', 'geodirectory' ),
			'options'  => array(
				''             => __( 'None', 'geodirectory' ),
				'btn'          => __( 'Button', 'geodirectory' ),
				'btn-round'    => __( 'Button rounded', 'geodirectory' ),
				'iconbox'      => __( 'Iconbox bordered', 'geodirectory' ),
				'iconbox-fill' => __( 'Iconbox filled', 'geodirectory' ),
				'badge' => __( 'Badge', 'geodirectory' ),
				'badge-pill' => __( 'Pill Badge', 'geodirectory' ),
			),
			'default'  => 'btn',
			'desc_tip' => true,
			'group'    => __( "Button", "geodirectory" )
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
			'group'    => __( "Button", "geodirectory" ),
			'element_require' => '[%link_type%]!="badge" && [%link_type%]!="badge-pill"',
		);

		$arguments['badge_size_notice']  = array(
			'type' => 'notice',
			'desc' => __('Badge size is inherited from the parent text size', 'geodirectory'),
			'status' => 'info',
			'group'     => __("Button","geodirectory"),
			'element_require' => '([%link_type%]=="badge" || [%link_type%]=="badge-pill")',
		);

		$arguments['link_bg'] = array(
			'title'           => __( 'Color', 'geodirectory' ),
			'desc'            => __( 'Select the color.', 'geodirectory' ),
			'type'            => 'select',
			'options'         => array(
				                     "" => __( 'Custom colors', 'geodirectory' ),
			                     ) + sd_aui_colors( true, true, true ),
			'default'         => 'primary',
			'desc_tip'        => true,
			'advanced'        => false,
			'group'           => __( "Button", "geodirectory" ),
			'element_require' => '[%link_type%]!="iconbox"',
		);

		// text color
		$arguments['text_color'] = sd_get_text_color_input('text_color', array('group'     => __("Button","geodirectory")));


		// Typography
		// custom font size
		$arguments['font_size_custom'] = sd_get_font_custom_size_input();

		// font weight.
		$arguments['font_weight'] = sd_get_font_weight_input();

		// font weight.
		$arguments['font_weight'] = sd_get_font_weight_input();

		// font case
		$arguments['font_case'] = sd_get_font_case_input();







		// background
		//		$arguments['bg'] = sd_get_background_input( 'mt' );

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




		$arguments['className'] = array(
			'type'            => 'text',
			'title'           => __( 'Additional CSS class(es)', 'geodirectory' ),
			'desc'            => __( 'Separate multiple classes with spaces.', 'geodirectory' ),
//			'placeholder'     => __( 'btn', 'geodirectory' ),
			'default'         => '',
//			'desc_tip'        => true,
			'group'           => __( "Advanced", "geodirectory" ),
//			'element_require' => '[%type%]=="custom"',
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
//print_r($args);//exit;
//print_r($widget_args);//exit;
		//return $content;

//		if ( empty( $content ) ) {
//			return '';
//		}elseif(strpos($content, 'class="wp-block-') !== false){//block
//			return $content;
//		}else{
//			$wrap_class = sd_build_aui_class( $args );
//			return '<section class="'.$wrap_class.'">'.$content.'</section>'; // shortcode
//		}

		$content = '';

		$tag = 'a';
		$link      = '#';
		$link_text = '';
		if ( $args['type'] == 'none' ) {
			$tag = 'span';

		} elseif ( $args['type'] == 'home' ) {
			$link      = get_home_url();
			$link_text = __( 'Home', 'blockstrap' );
		} elseif ( $args['type'] == 'page' || $args['type'] == 'post-id' ) {
			$page_id = ! empty( $args['page_id'] ) ? absint( $args['page_id'] ) : 0;
			$post_id = ! empty( $args['post_id'] ) ? absint( $args['post_id'] ) : 0;
			$id      = $args['type'] == 'page' ? $page_id : $post_id;
			if ( $id ) {
				$page = get_post( $id );
				if ( ! empty( $page->post_title ) ) {
					$link      = get_permalink( $id );
					$link_text = esc_attr( $page->post_title );
				}
			}
		} elseif ( $args['type'] == 'custom' ) {
			$link      = ! empty( $args['type'] ) ? esc_url_raw( $args['type'] ) : '#';
			$link_text = __( 'Custom', 'blockstrap' );
		} elseif ( $args['type'] == 'gd_search' ) {
			$link      = geodir_search_page_base_url();
			$link_text = __( 'Search', 'blockstrap' );
		} elseif ( $args['type'] == 'gd_location' ) {
			$link      = get_permalink( geodir_location_page_id() );
			$link_text = __( 'Location', 'blockstrap' );
		} elseif ( substr( $args['type'], 0, 3 ) === "gd_" ) {
			$post_types = geodir_get_posttypes( 'options-plural' );
			if ( ! empty( $post_types ) ) {
				foreach ( $post_types as $cpt => $cpt_name ) {
					if ( $args['type'] == $cpt ) {
						$link      = get_post_type_archive_link( $cpt );
						$link_text = $cpt_name;
					}
				}
			}
		} elseif ( substr( $args['type'], 0, 7 ) === "add_gd_" ) {
			$post_types = geodir_get_posttypes( 'options' );
			if ( ! empty( $post_types ) ) {
				foreach ( $post_types as $cpt => $cpt_name ) {
					if ( $args['type'] == "add_" . $cpt ) {
						$link      = geodir_add_listing_page_url( $cpt );
						$link_text = sprintf( __( 'Add %s', 'blockstrap' ), $cpt_name );
					}
				}
			}
		}

		// maybe set custom link text
		$link_text = ! empty( $args['text'] ) ? esc_attr( $args['text'] ) : $link_text;

		// link type
		$link_class = "nav-link";

		if ( ! empty( $args['link_type'] ) ) {

			if ( $args['link_type'] == 'btn' ) {
				$link_class = "btn";
			} elseif ( $args['link_type'] == 'btn-round' ) {
				$link_class = "btn btn-round";
			} elseif ( $args['link_type'] == 'iconbox' ) {
				$link_class = "iconbox rounded-circle";
			} elseif ( $args['link_type'] == 'iconbox-fill' ) {
				$link_class = "iconbox fill rounded-circle";
			} elseif ( $args['link_type'] == 'badge' ) {
				$link_class = "badge";
			} elseif ( $args['link_type'] == 'badge-pill' ) {
				$link_class = "badge badge-pill";
			}

			// colour prefix

			if ( $args['link_type'] == 'btn' || $args['link_type'] == 'btn-round' ) {
				$link_class .= " btn-" . sanitize_html_class( $args['link_bg'] );
				if ( empty( $args['link_size'] ) || $args['link_size'] == 'medium' ) {
					// no need for size
				} elseif ( $args['link_size'] == 'small' ) {
					$link_class .= " btn-sm";
				} elseif ( $args['link_size'] == 'large' ) {
					$link_class .= " btn-lg";
				}
			} elseif( $args['link_type'] == 'badge' || $args['link_type'] == 'badge-pill' ) {
				$link_class .= " badge-" . sanitize_html_class( $args['link_bg'] );
			} else {
				$link_class .= $args['link_type'] == 'iconbox-fill' ? " btn-" . sanitize_html_class( $args['link_bg'] ) : '';
				if ( empty( $args['link_size'] ) || $args['link_size'] == 'small' ) {
					$link_class .= " iconsmall";
				} elseif ( $args['link_size'] == 'medium' ) {
					$link_class .= " iconmedium";
				} elseif ( $args['link_size'] == 'large' ) {
					$link_class .= " iconlarge";
				}
			}

		}

		if ( ! empty( $args['text_color'] ) ) {
			$link_class .= ' text-' . esc_attr( $args['text_color'] );
		}

		if ( ! empty( $args['className'] ) ) {
			$link_class .= ' ' . sd_sanitize_html_classes( className );
		}

		$icon_left = '';
		$icon_right = '';
		if ( ! empty( $args['icon_class'] ) ) {
			// remove default text if icon exists.
			if ( empty( $args['text'] ) ) {
				$link_text = '';
			}

			if($args['icon_position']=='right'){
				$icon_right = ! empty( $link_text ) ? '<i class="' . esc_attr( $args['icon_class'] ) . ' ml-2"></i>' : '<i class="' . esc_attr( $args['icon_class'] ) . '"></i>';
			}else{
				$icon_left = ! empty( $link_text ) ? '<i class="' . esc_attr( $args['icon_class'] ) . ' mr-2"></i>' : '<i class="' . esc_attr( $args['icon_class'] ) . '"></i>';
			}

		}


		$wrap_class = sd_build_aui_class( $args );

		// if a button add form-inline
//		if ( ! empty( $args['link_type'] ) ) {
//			$wrap_class .= ' form-inline';
//		}

		$href = $tag == 'a' ? 'href="'.esc_url_raw($link).'"' : '';

		if($this->is_preview()){
			$href = '';//'href="#"';
		}

		$styles = sd_build_aui_styles( $args );
		$style = $styles ? 'style="'.$styles.'"' : '';

		return $link_text || $icon_left || $icon_right ? '<'.esc_attr($tag).' '.$style .' '.$href.' class="' . esc_attr( $link_class ) . ' '.esc_attr($wrap_class).'">' . $icon_left . esc_attr( $link_text ) . $icon_right . '</'.esc_attr($tag).'> ' : ''; // shortcode


	}


}

// register it.
add_action( 'widgets_init', function () {
	register_widget( 'BlockStrap_Widget_Button' );
} );

