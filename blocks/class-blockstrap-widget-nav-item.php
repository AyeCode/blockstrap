<?php

class BlockStrap_Widget_Nav_Item extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'        => 'blockstrap',
			'output_types'      => array( 'block', 'shortcode' ),
			'block-icon'        => 'fas fa-link',
			'block-category'    => 'layout',
			'block-keywords'    => "['menu','nav','item']",
			'block-label'       => "attributes.text ? '" . __( 'BS > Nav', 'blockstrap' ) . " ('+ attributes.text+')' : ''",
			'block-supports'    => array(
				'customClassName' => false,
			),
			'block-edit-return' => "el('li', wp.blockEditor.useBlockProps({
									dangerouslySetInnerHTML: {__html: onChangeContent()},
									className: props.attributes.link_type ? 'nav-item form-inline ' + sd_build_aui_class(props.attributes) : 'nav-item ' + sd_build_aui_class(props.attributes) ,
								}))",
			'block-wrap'        => '',
			'class_name'        => __CLASS__,
			'base_id'           => 'bs_nav_item',
			'name'              => __( 'BS > Nav Item', 'blockstrap' ),
			'widget_ops'        => array(
				'classname'   => 'bd-nav-item',
				'description' => esc_html__( 'A navigation item for the navbar.', 'blockstrap' ),
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
					'groups' => array( __( 'Link styles', 'blockstrap' ), __( 'Typography', 'blockstrap' ) ),
					'tab'    => array(
						'title'     => __( 'Styles', 'blockstrap' ),
						'key'       => 'bs_tab_styles',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					),
				),
				'advanced' => array(
					'groups' => array(
						__( 'Wrapper Styles', 'blockstrap' ),
						__( 'Advanced', 'blockstrap' ),
					),
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

	public function link_types() {
		$links = array(
			'home'    => __( 'Home', 'blockstrap' ),
			'page'    => __( 'Page', 'blockstrap' ),
			'post-id' => __( 'Post ID', 'blockstrap' ),
			'custom'  => __( 'Custom URL', 'blockstrap' ),
		);

		if ( defined( 'GEODIRECTORY_VERSION' ) ) {
			$post_types           = function_exists( 'geodir_get_posttypes' ) ? geodir_get_posttypes( 'options-plural' ) : array();
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

		// link styles
		$arguments['link_type'] = array(
			'type'     => 'select',
			'title'    => __( 'Link style', 'blockstrap' ),
			'options'  => array(
				''             => __( 'None', 'blockstrap' ),
				'btn'          => __( 'Button', 'blockstrap' ),
				'btn-round'    => __( 'Button rounded', 'blockstrap' ),
				'iconbox'      => __( 'Iconbox bordered', 'blockstrap' ),
				'iconbox-fill' => __( 'Iconbox filled', 'blockstrap' ),
			),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Link styles', 'blockstrap' ),
		);

		$arguments['link_size'] = array(
			'type'     => 'select',
			'title'    => __( 'Size', 'blockstrap' ),
			'options'  => array(
				''       => __( 'Default', 'blockstrap' ),
				'small'  => __( 'Small', 'blockstrap' ),
				'medium' => __( 'Medium', 'blockstrap' ),
				'large'  => __( 'Large', 'blockstrap' ),
			),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Link styles', 'blockstrap' ),
		);

		$arguments['link_bg'] = array(
			'title'           => __( 'Color', 'blockstrap' ),
			'desc'            => __( 'Select the color.', 'blockstrap' ),
			'type'            => 'select',
			'options'         => array(
				'' => __( 'Custom colors', 'blockstrap' ),
			) + sd_aui_colors( true, true, true ),
			'default'         => '',
			'desc_tip'        => true,
			'advanced'        => false,
			'group'           => __( 'Link styles', 'blockstrap' ),
			'element_require' => '[%link_type%]!="iconbox" && [%link_type%]!=""',
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

		$content = '';

		$link      = '#';
		$link_text = '';
		if ( 'home' === $args['type'] ) {
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
			$link      = function_exists( 'geodir_search_page_base_url' ) ? geodir_search_page_base_url() : '';
			$link_text = __( 'Search', 'blockstrap' );
		} elseif ( 'gd_location' === $args['type'] ) {
			$link      = function_exists( 'geodir_location_page_id' ) ? get_permalink( geodir_location_page_id() ) : '';
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
			}

			if ( 'btn' === $args['link_type'] || 'btn-round' === $args['link_type'] ) {
				$link_class .= ' btn-' . sanitize_html_class( $args['link_bg'] );
				if ( 'small' === $args['link_size'] ) {
					$link_class .= ' btn-sm';
				} elseif ( 'large' === $args['link_size'] ) {
					$link_class .= ' btn-lg';
				}
			} else {
				$link_class .= 'iconbox-fill' === $args['link_type'] ? ' bg-' . sanitize_html_class( $args['link_bg'] ) : '';
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

		$icon = '';
		if ( ! empty( $args['icon_class'] ) ) {
			// remove default text if icon exists.
			if ( empty( $args['text'] ) ) {
				$link_text = '';
			}
			$icon = ! empty( $link_text ) ? '<i class="' . esc_attr( $args['icon_class'] ) . ' mr-2"></i>' : '<i class="' . esc_attr( $args['icon_class'] ) . '"></i>';

		}

		$wrap_class = sd_build_aui_class( $args );

		// if a button add form-inline
		if ( ! empty( $args['link_type'] ) ) {
			$wrap_class .= ' form-inline';
		}

		if ( $this->is_block_content_call() ) {
			$is_sub = ! empty( $_REQUEST['block_parent_name'] ) && 'blockstrap/blockstrap-widget-nav-dropdown' === $_REQUEST['block_parent_name']; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( $is_sub ) {
				$link_class = str_replace( 'nav-link', 'dropdown-item', $link_class );
			}
			return $link_text || $icon ? '<a href="#' . esc_url_raw( $link ) . '" class="' . esc_attr( $link_class ) . '">' . $icon . esc_attr( $link_text ) . '</a>' : ''; // shortcode

		} else {
			return $link_text || $icon ? '<li class="nav-item ' . $wrap_class . '"><a href="' . esc_url_raw( $link ) . '" class="' . esc_attr( $link_class ) . '">' . $icon . esc_attr( $link_text ) . '</a></li>' : ''; // shortcode

		}

	}

}

// register it.
add_action(
	'widgets_init',
	function () {
		register_widget( 'BlockStrap_Widget_Nav_Item' );
	}
);

