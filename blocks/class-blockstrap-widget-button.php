<?php

class BlockStrap_Widget_Button extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'        => 'blockstrap',
			'output_types'      => array( 'block', 'shortcode' ),
			'block-icon'        => 'fas fa-stop',
			'block-category'    => 'layout',
			'block-keywords'    => "['button','nav','icon']",
			'block-wrap'        => '',
			'block-supports'    => array(
				'customClassName' => false,
			),
			'block-edit-return' => "el('span', wp.blockEditor.useBlockProps({
									dangerouslySetInnerHTML: {__html: onChangeContent()},
									style: {'minHeight': '30px'},
									className: '',
								}))",
			'class_name'        => __CLASS__,
			'base_id'           => 'bs_button',
			'name'              => __( 'BS > Button', 'blockstrap' ),
			'widget_ops'        => array(
				'classname'   => 'bs-button',
				'description' => esc_html__( 'A bootstrap button, badge or iconbox.', 'blockstrap' ),
			),
			'example'           => array(
				'attributes' => array(
					'after_text' => 'Earth',
				),
			),
			'no_wrap'           => true,
			'block_group_tabs'  => array(
				'content'  => array(
					'groups' => array( __( 'Link', 'blockstrap' ) ),
					'tab'    => array(
						'title'     => __( 'Content', 'blockstrap' ),
						'key'       => 'bs_tab_content',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					),
				),
				'styles'   => array(
					'groups' => array( __( 'Button', 'blockstrap' ), __( 'Typography', 'blockstrap' ) ),
					'tab'    => array(
						'title'     => __( 'Styles', 'blockstrap' ),
						'key'       => 'bs_tab_styles',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					),
				),
				'advanced' => array(
					'groups' => array( __( 'Wrapper Styles', 'blockstrap' ), __( 'Advanced', 'blockstrap' ) ),
					'tab'    => array(
						'title'     => __( 'Advanced', 'blockstrap' ),
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

		$arguments['type'] = array(
			'type'     => 'select',
			'title'    => __( 'Link Type', 'blockstrap' ),
			'options'  => $this->link_types(),
			'default'  => 'home',
			'desc_tip' => true,
			'group'    => __( 'Link', 'blockstrap' ),
		);

		$arguments['page_id'] = array(
			'type'            => 'select',
			'title'           => __( 'Page', 'blockstrap' ),
			'options'         => $this->get_pages_array(),
			'placeholder'     => __( 'Select Page', 'blockstrap' ),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Link', 'blockstrap' ),
			'element_require' => '[%type%]=="page"',
		);

		$arguments['post_id'] = array(
			'type'            => 'number',
			'title'           => __( 'Post ID', 'blockstrap' ),
			'placeholder'     => 123,
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Link', 'blockstrap' ),
			'element_require' => '[%type%]=="post-id"',
		);

		$arguments['custom_url'] = array(
			'type'            => 'text',
			'title'           => __( 'Custom URL', 'blockstrap' ),
			'desc'            => __( 'Add custom link URL', 'blockstrap' ),
			'placeholder'     => __( 'https://example.com', 'blockstrap' ),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Link', 'blockstrap' ),
			'element_require' => '[%type%]=="custom"',
		);

		$arguments['text'] = array(
			'type'        => 'text',
			'title'       => __( 'Link Text', 'blockstrap' ),
			'desc'        => __( 'Add custom link text or leave blank for dynamic', 'blockstrap' ),
			'placeholder' => __( 'Home', 'blockstrap' ),
			'default'     => '',
			'desc_tip'    => true,
			'group'       => __( 'Link', 'blockstrap' ),
		);

		$arguments['icon_class'] = array(
			'type'        => 'text',
			'title'       => __( 'Icon class', 'blockstrap' ),
			'desc'        => __( 'Enter a font awesome icon class.', 'blockstrap' ),
			'placeholder' => __( 'fas fa-ship', 'blockstrap' ),
			'default'     => '',
			'desc_tip'    => true,
			'group'       => __( 'Link', 'blockstrap' ),
		);

		$arguments['icon_position'] = array(
			'type'            => 'select',
			'title'           => __( 'Icon position', 'blockstrap' ),
			'options'         => array(
				'left'  => __( 'Left', 'blockstrap' ),
				'right' => __( 'right', 'blockstrap' ),
			),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Link', 'blockstrap' ),
			'element_require' => '[%icon_class%]!=""',
		);

		// button styles
		$arguments['link_type'] = array(
			'type'     => 'select',
			'title'    => __( 'Link style', 'blockstrap' ),
			'options'  => array(
				''             => __( 'None', 'blockstrap' ),
				'btn'          => __( 'Button', 'blockstrap' ),
				'btn-round'    => __( 'Button rounded', 'blockstrap' ),
				'iconbox'      => __( 'Iconbox bordered', 'blockstrap' ),
				'iconbox-fill' => __( 'Iconbox filled', 'blockstrap' ),
				'badge'        => __( 'Badge', 'blockstrap' ),
				'badge-pill'   => __( 'Pill Badge', 'blockstrap' ),
			),
			'default'  => 'btn',
			'desc_tip' => true,
			'group'    => __( 'Button', 'blockstrap' ),
		);

		$arguments['link_size'] = array(
			'type'            => 'select',
			'title'           => __( 'Size', 'blockstrap' ),
			'options'         => array(
				''       => __( 'Default', 'blockstrap' ),
				'small'  => __( 'Small', 'blockstrap' ),
				'medium' => __( 'Medium', 'blockstrap' ),
				'large'  => __( 'Large', 'blockstrap' ),
			),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Button', 'blockstrap' ),
			'element_require' => '[%link_type%]!="badge" && [%link_type%]!="badge-pill"',
		);

		$arguments['badge_size_notice'] = array(
			'type'            => 'notice',
			'desc'            => __( 'Badge size is inherited from the parent text size', 'blockstrap' ),
			'status'          => 'info',
			'group'           => __( 'Button', 'blockstrap' ),
			'element_require' => '([%link_type%]=="badge" || [%link_type%]=="badge-pill")',
		);

		$arguments['link_bg'] = array(
			'title'           => __( 'Color', 'blockstrap' ),
			'type'            => 'select',
			'options'         => array(
				'' => __( 'Default (primary)', 'blockstrap' ),
			) + sd_aui_colors( true, true, true ),
			'default'         => 'primary',
			'desc_tip'        => true,
			'advanced'        => false,
			'group'           => __( 'Button', 'blockstrap' ),
			'element_require' => '[%link_type%]!="iconbox"',
			'tab'             => array(
				'title'     => __( 'Normal', 'blockstrap' ),
				'key'       => 'button_normal',
				'tabs_open' => true,
				'open'      => true,
				'class'     => 'text-center w-50 d-flex justify-content-center',
			),
		);

		$arguments['text_color'] = sd_get_text_color_input(
			'text_color',
			array(
				'group' => __( 'Button', 'blockstrap' ),
				'tab'   => array(
					'close' => true,
				),
			)
		);

		$arguments['link_bg_hover'] = array(
			'title'           => __( 'Color', 'blockstrap' ),
			'type'            => 'select',
			'options'         => array(
				'' => __( 'Default (primary)', 'blockstrap' ),
			) + sd_aui_colors( true, true, true ),
			'default'         => 'primary',
			'desc_tip'        => true,
			'advanced'        => false,
			'group'           => __( 'Button', 'blockstrap' ),
			'element_require' => '[%link_type%]!="iconbox"',
			'tab'             => array(
				'title' => __( 'Hover', 'blockstrap' ),
				'key'   => 'button_hover',
				'open'  => true,
				'class' => 'text-center w-50 d-flex justify-content-center',
			),
		);

		// text color
		$arguments['text_color_hover'] = sd_get_text_color_input(
			'text_color',
			array(
				'group' => __( 'Button', 'blockstrap' ),
				'tab'   => array(
					'close'      => true,
					'tabs_close' => true,
				),
			)
		);

		// Typography
		// custom font size
		$arguments['font_size_custom'] = sd_get_font_custom_size_input();

		// font weight.
		$arguments['font_weight'] = sd_get_font_weight_input();

		// font case
		$arguments['font_case'] = sd_get_font_case_input();

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

		$arguments['css_class'] = sd_get_class_input();

		return $arguments;
	}

	public function link_types() {
		$links = array(
			'home'    => __( 'Home', 'blockstrap' ),
			'none'    => __( 'None (non link)', 'blockstrap' ),
			'page'    => __( 'Page', 'blockstrap' ),
			'post-id' => __( 'Post ID', 'blockstrap' ),
			'custom'  => __( 'Custom URL', 'blockstrap' ),
		);

		if ( defined( 'GEODIRECTORY_VERSION' ) ) {
			$post_types           = geodir_get_posttypes( 'options-plural' );
			$links['gd_search']   = __( 'GD Search', 'blockstrap' );
			$links['gd_location'] = __( 'GD Location', 'blockstrap' );
			foreach ( $post_types as $cpt => $cpt_name ) {
				/* translators: Custom Post Type name. */
				$links[ $cpt ] = sprintf( __( '%s (archive)', 'blockstrap' ), $cpt_name );
				/* translators: Custom Post Type name. */
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
	 * This is the output function for the widget, shortcode and block (front end).
	 *
	 * @param array $args The arguments values.
	 * @param array $widget_args The widget arguments when used.
	 * @param string $content The shortcode content argument
	 *
	 * @return string
	 */
	public function output( $args = array(), $widget_args = array(), $content = '' ) {

		$tag       = 'a';
		$link      = '#';
		$link_text = '';
		if ( 'none' === $args['type'] ) {
			$tag = 'span';

		} elseif ( 'home' === $args['type'] ) {
			$link      = get_home_url();
			$link_text = __( 'Home', 'blockstrap' );
		} elseif ( 'page' === $args['type'] || 'post-id' === $args['type'] ) {
			$page_id = ! empty( $args['page_id'] ) ? absint( $args['page_id'] ) : 0;
			$post_id = ! empty( $args['post_id'] ) ? absint( $args['post_id'] ) : 0;
			$id      = 'page' === $args['type'] ? $page_id : $post_id;
			if ( $id ) {
				$page = get_post( $id );
				if ( ! empty( $page->post_title ) ) {
					$link      = get_permalink( $id );
					$link_text = esc_attr( $page->post_title );
				}
			}
		} elseif ( 'custom' === $args['type'] ) {
			$link      = ! empty( $args['custom_url'] ) ? esc_url_raw( $args['custom_url'] ) : '#';
			$link_text = __( 'Custom', 'blockstrap' );
		} elseif ( 'gd_search' === $args['type'] ) {
			$link      = function_exists( 'geodir_search_page_base_url' ) ? geodir_search_page_base_url() : '#';
			$link_text = __( 'Search', 'blockstrap' );
		} elseif ( 'gd_location' === $args['type'] ) {
			$link      = function_exists( 'geodir_location_page_id' ) ? get_permalink( geodir_location_page_id() ) : '#';
			$link_text = __( 'Location', 'blockstrap' );
		} elseif ( substr( $args['type'], 0, 3 ) === 'gd_' ) {
			$post_types = function_exists( 'geodir_get_posttypes' ) ? geodir_get_posttypes( 'options-plural' ) : '';
			if ( ! empty( $post_types ) ) {
				foreach ( $post_types as $cpt => $cpt_name ) {
					if ( $cpt === $args['type'] ) {
						$link      = get_post_type_archive_link( $cpt );
						$link_text = $cpt_name;
					}
				}
			}
		} elseif ( substr( $args['type'], 0, 7 ) === 'add_gd_' ) {
			$post_types = function_exists( 'geodir_get_posttypes' ) ? geodir_get_posttypes( 'options' ) : '';
			if ( ! empty( $post_types ) ) {
				foreach ( $post_types as $cpt => $cpt_name ) {
					if ( 'add_' . $cpt === $args['type'] ) {
						$link = function_exists( 'geodir_add_listing_page_url' ) ? geodir_add_listing_page_url( $cpt ) : '';
						/* translators: Custom Post Type name. */
						$link_text = sprintf( __( 'Add %s', 'blockstrap' ), $cpt_name );
					}
				}
			}
		}

		// maybe set custom link text
		$link_text = ! empty( $args['text'] ) ? esc_attr( $args['text'] ) : $link_text;

		// link type
		$link_class = 'nav-link';

		if ( ! empty( $args['link_type'] ) ) {

			if ( 'btn' === $args['link_type'] ) {
				$link_class = 'btn';
			} elseif ( 'btn-round' === $args['link_type'] ) {
				$link_class = 'btn btn-round';
			} elseif ( 'iconbox' === $args['link_type'] ) {
				$link_class = 'iconbox rounded-circle';
			} elseif ( 'iconbox-fill' === $args['link_type'] ) {
				$link_class = 'iconbox fill rounded-circle';
			} elseif ( 'badge' === $args['link_type'] ) {
				$link_class = 'badge';
			} elseif ( 'badge-pill' === $args['link_type'] ) {
				$link_class = 'badge badge-pill';
			}

			// colour prefix

			if ( 'btn' === $args['link_type'] || 'btn-round' === $args['link_type'] ) {
				$link_class .= ' btn-' . sanitize_html_class( $args['link_bg'] );
				if ( 'small' === $args['link_size'] ) {
					$link_class .= ' btn-sm';
				} elseif ( 'large' === $args['link_size'] ) {
					$link_class .= ' btn-lg';
				}
			} elseif ( 'badge' === $args['link_type'] || 'badge-pill' === $args['link_type'] ) {
				$link_class .= ' badge-' . sanitize_html_class( $args['link_bg'] );
			} else {
				$link_class .= 'iconbox-fill' === $args['link_type'] ? ' btn-' . sanitize_html_class( $args['link_bg'] ) : '';
				if ( empty( $args['link_size'] ) || 'small' === $args['link_size'] ) {
					$link_class .= ' iconsmall';
				} elseif ( 'medium' === $args['link_size'] ) {
					$link_class .= ' iconmedium';
				} elseif ( 'large' === $args['link_size'] ) {
					$link_class .= ' iconlarge';
				}
			}
		}

		if ( ! empty( $args['text_color'] ) ) {
			$link_class .= ' text-' . esc_attr( $args['text_color'] );
		}

		if ( ! empty( $args['css_class'] ) ) {
			$link_class .= ' ' . sd_sanitize_html_classes( $args['css_class'] );
		}

		$icon_left  = '';
		$icon_right = '';
		if ( ! empty( $args['icon_class'] ) ) {
			// remove default text if icon exists.
			if ( empty( $args['text'] ) ) {
				$link_text = '';
			}

			if ( 'right' === $args['icon_position'] ) {
				$icon_right = ! empty( $link_text ) ? '<i class="' . esc_attr( $args['icon_class'] ) . ' ml-2"></i>' : '<i class="' . esc_attr( $args['icon_class'] ) . '"></i>';
			} else {
				$icon_left = ! empty( $link_text ) ? '<i class="' . esc_attr( $args['icon_class'] ) . ' mr-2"></i>' : '<i class="' . esc_attr( $args['icon_class'] ) . '"></i>';
			}
		}

		$wrap_class = sd_build_aui_class( $args );

		// if a button add form-inline
		//      if ( ! empty( $args['link_type'] ) ) {
		//          $wrap_class .= ' form-inline';
		//      }

		$href = 'a' === $tag ? 'href="' . esc_url_raw( $link ) . '"' : '';

		if ( $this->is_preview() ) {
			$href = '';//'href="#"';
		}

		$styles = sd_build_aui_styles( $args );
		$style  = $styles ? 'style="' . $styles . '"' : '';

		return $link_text || $icon_left || $icon_right ? '<' . esc_attr( $tag ) . ' ' . $style . ' ' . $href . ' class="' . esc_attr( $link_class ) . ' ' . esc_attr( $wrap_class ) . '">' . $icon_left . esc_attr( $link_text ) . $icon_right . '</' . esc_attr( $tag ) . '> ' : ''; // shortcode

	}


}


// register it.
add_action(
	'widgets_init',
	function () {
		register_widget( 'BlockStrap_Widget_Button' );
	}
);

