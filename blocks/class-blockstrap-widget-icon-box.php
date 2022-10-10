<?php

class BlockStrap_Widget_Icon_Box extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'        => 'blockstrap',
			'output_types'      => array( 'block', 'shortcode' ),
			'block-icon'        => 'fas fa-star',
			'block-category'    => 'layout',
			'block-keywords'    => "['icon','iconbox','box']",
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
			'base_id'           => 'bs_iconbox',
			'name'              => __( 'BS > Icon Box', 'blockstrap' ),
			'widget_ops'        => array(
				'classname'   => 'bs-button',
				'description' => esc_html__( 'A bootstrap iconbox.', 'blockstrap' ),
			),
			'example'           => array(
				'attributes' => array(
					'after_text' => 'Earth',
				),
			),
			'no_wrap'           => true,
			'block_group_tabs'  => array(
				'content'  => array(
					'groups' => array( __( 'Icon Box', 'geodirectory' ), __( 'Link', 'geodirectory' ) ),
					'tab'    => array(
						'title'     => __( 'Content', 'geodirectory' ),
						'key'       => 'bs_tab_content',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					),
				),
				'styles'   => array(
					'groups' => array( __( 'Icon Style', 'geodirectory' ), __( 'Title Style', 'geodirectory' ), __( 'Description Style', 'geodirectory' ) ),
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

		$arguments['icon_class'] = array(
			'type'        => 'text',
			'title'       => __( 'Icon class', 'geodirectory' ),
			'desc'        => __( 'Enter a font awesome icon class.', 'geodirectory' ),
			'placeholder' => __( 'fas fa-ship', 'geodirectory' ),
			'default'     => '',
			'desc_tip'    => true,
			'group'       => __( 'Icon Box', 'geodirectory' ),
		);

		$arguments['title'] = array(
			'type'        => 'text',
			'title'       => __( 'Title', 'geodirectory' ),
			'placeholder' => __( 'fas fa-ship', 'geodirectory' ),
			'default'     => __( 'Title of the iconbox', 'geodirectory' ),
			'desc_tip'    => true,
			'group'       => __( 'Icon Box', 'geodirectory' ),
		);

		$arguments['title_tag'] = array(
			'type'     => 'select',
			'title'    => __( 'Title Tag', 'geodirectory' ),
			'options'  => array(
				'h1'  => 'h1',
				'h2'  => 'h2',
				'h4'  => 'h3',
				'h5'  => 'h4',
				'h6'  => 'h5',
				'div' => 'div',
			),
			'default'  => 'h3',
			'desc_tip' => true,
			'group'    => __( 'Icon Box', 'geodirectory' ),
		);

		$arguments['description'] = array(
			'type'     => 'textarea',
			'title'    => __( 'Description', 'geodirectory' ),
			'default'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris risus magna, dignissim sit amet aliquam consequat, dignissim non ex.',
			'desc_tip' => true,
			'group'    => __( 'Icon Box', 'geodirectory' ),
		);

		$arguments['type'] = array(
			'type'     => 'select',
			'title'    => __( 'Link Type', 'geodirectory' ),
			'options'  => $this->link_types(),
			'default'  => 'home',
			'desc_tip' => true,
			'group'    => __( 'Link', 'geodirectory' ),
		);

		$arguments['page_id'] = array(
			'type'            => 'select',
			'title'           => __( 'Page', 'geodirectory' ),
			'options'         => $this->get_pages_array(),
			'placeholder'     => __( 'Select Page', 'geodirectory' ),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Link', 'geodirectory' ),
			'element_require' => '[%type%]=="page"',
		);

		$arguments['post_id'] = array(
			'type'            => 'number',
			'title'           => __( 'Post ID', 'geodirectory' ),
			'placeholder'     => 123,
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Link', 'geodirectory' ),
			'element_require' => '[%type%]=="post-id"',
		);

		$arguments['custom_url'] = array(
			'type'            => 'text',
			'title'           => __( 'Custom URL', 'geodirectory' ),
			'desc'            => __( 'Add custom link URL', 'geodirectory' ),
			'placeholder'     => __( 'https://example.com', 'geodirectory' ),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Link', 'geodirectory' ),
			'element_require' => '[%type%]=="custom"',
		);

		$arguments['icon_position'] = array(
			'type'            => 'select',
			'title'           => __( 'Icon position', 'geodirectory' ),
			'options'         => array(
				'left'  => __( 'Left', 'geodirectory' ),
				'right' => __( 'right', 'geodirectory' ),
			),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Link', 'geodirectory' ),
			'element_require' => '[%icon_class%]!=""',
		);

		// icon styles
		$arguments['icon_type'] = array(
			'type'     => 'select',
			'title'    => __( 'Icon style', 'geodirectory' ),
			'options'  => array(
				''             => __( 'Icon', 'geodirectory' ),
				'iconbox'      => __( 'Iconbox bordered', 'geodirectory' ),
				'iconbox-fill' => __( 'Iconbox filled', 'geodirectory' ),
			),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Icon Style', 'geodirectory' ),
		);

		$arguments['iconbox_size'] = array(
			'type'            => 'select',
			'title'           => __( 'Size', 'geodirectory' ),
			'options'         => array(
				''       => __( 'Default', 'geodirectory' ),
				'small'  => __( 'Small', 'geodirectory' ),
				'medium' => __( 'Medium', 'geodirectory' ),
				'large'  => __( 'Large', 'geodirectory' ),
			),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Icon Style', 'geodirectory' ),
			'element_require' => '[%icon_type%]!=""',
		);

		$arguments = $arguments + sd_get_font_size_input_group(
			'icon_size',
			array(
				'group'           => __( 'Icon Style', 'geodirectory' ),
				'element_require' => '[%icon_type%]==""',
				'default'         => 'h3',
			),
			array(
				'group' => __( 'Icon Style', 'geodirectory' ),
			)
		);

		// text color
		$arguments = $arguments + sd_get_text_color_input_group(
			'icon_color',
			array(
				'group' => __( 'Icon Style', 'geodirectory' ),
			//                  'element_require' => '[%icon_type%]==""',
			//                  'default'         => 'h3',
			),
			array(
				'group' => __( 'Icon Style', 'geodirectory' ),
			)
		);

		$arguments['icon_bg'] = array(
			'title'           => __( 'Background Color', 'geodirectory' ),
			'type'            => 'select',
			'options'         => array(
				'' => __( 'Default (primary)', 'geodirectory' ),
			) + sd_aui_colors( true, true, true ),
			'default'         => 'primary',
			'desc_tip'        => true,
			'advanced'        => false,
			'group'           => __( 'Icon Style', 'geodirectory' ),
			'element_require' => '[%icon_type%]=="iconbox-fill"',
		);

		// text align
		$arguments['icon_text_align']    = sd_get_text_align_input(
			'text_align',
			array(
				'device_type'     => 'Mobile',
				'element_require' => '[%text_justify%]==""',
				'group'           => __( 'Icon Style', 'geodirectory' ),
			)
		);
		$arguments['icon_text_align_md'] = sd_get_text_align_input(
			'text_align',
			array(
				'device_type'     => 'Tablet',
				'element_require' => '[%text_justify%]==""',
				'group'           => __( 'Icon Style', 'geodirectory' ),
			)
		);
		$arguments['icon_text_align_lg'] = sd_get_text_align_input(
			'text_align',
			array(
				'device_type'     => 'Desktop',
				'element_require' => '[%text_justify%]==""',
				'default'         => 'text-lg-center',
				'group'           => __( 'Icon Style', 'geodirectory' ),
			)
		);

		// icon padding bottom
		$arguments['icon_pb'] = sd_get_padding_input(
			'pb',
			array(
				'group' => __( 'Icon Style', 'geodirectory' ),
			)
		);

		// Title
		$arguments = $arguments + sd_get_font_size_input_group(
			'title_size',
			array(
				'group'           => __( 'Title Style', 'geodirectory' ),
				'element_require' => '[%icon_type%]==""',
				'default'         => 'h3',
			),
			array(
				'group' => __( 'Title Style', 'geodirectory' ),
			)
		);

		// text color
		$arguments = $arguments + sd_get_text_color_input_group(
			'title_color',
			array(
				'group' => __( 'Title Style', 'geodirectory' ),
					//                  'element_require' => '[%icon_type%]==""',
					//                  'default'         => 'h3',
			),
			array(
				'group' => __( 'Title Style', 'geodirectory' ),
			)
		);

		// font weight.
		$arguments['title_font_weight'] = sd_get_font_weight_input(
			'title_font_weight',
			array(
				'group' => __( 'Title Style', 'geodirectory' ),
			)
		);

		// font case
		$arguments['title_font_case'] = sd_get_font_case_input(
			'title_font_case',
			array(
				'group' => __( 'Title Style', 'geodirectory' ),
			)
		);

		// Text justify
		$arguments['title_text_justify'] = sd_get_text_justify_input(
			'title_jext_justify',
			array(
				'group' => __( 'Title Style', 'geodirectory' ),
			)
		);

		// text align
		$arguments['title_text_align']    = sd_get_text_align_input(
			'text_align',
			array(
				'device_type'     => 'Mobile',
				'element_require' => '[%title_text_justify%]==""',
				'group'           => __( 'Title Style', 'geodirectory' ),
			)
		);
		$arguments['title_text_align_md'] = sd_get_text_align_input(
			'text_align',
			array(
				'device_type'     => 'Tablet',
				'element_require' => '[%title_text_justify%]==""',
				'group'           => __( 'Title Style', 'geodirectory' ),
			)
		);
		$arguments['title_text_align_lg'] = sd_get_text_align_input(
			'text_align',
			array(
				'device_type'     => 'Desktop',
				'element_require' => '[%title_text_justify%]==""',
				'default'         => 'text-lg-center',
				'group'           => __( 'Title Style', 'geodirectory' ),
			)
		);

		// icon padding bottom
		$arguments['title_pb'] = sd_get_padding_input(
			'pb',
			array(
				'group' => __( 'Title Style', 'geodirectory' ),
			)
		);

		//Description

		// Title
		$arguments = $arguments + sd_get_font_size_input_group(
			'desc_size',
			array(
				'group' => __( 'Description Style', 'geodirectory' ),
			),
			array(
				'group' => __( 'Description Style', 'geodirectory' ),
			)
		);

		// text color
		$arguments = $arguments + sd_get_text_color_input_group(
			'desc_color',
			array(
				'group' => __( 'Description Style', 'geodirectory' ),
			),
			array(
				'group' => __( 'Description Style', 'geodirectory' ),
			)
		);

		// font weight.
		$arguments['desc_font_weight'] = sd_get_font_weight_input(
			'desc_font_weight',
			array(
				'group' => __( 'Description Style', 'geodirectory' ),
			)
		);

		// font case
		$arguments['desc_font_case'] = sd_get_font_case_input(
			'desc_font_case',
			array(
				'group' => __( 'Description Style', 'geodirectory' ),
			)
		);

		// Text justify
		$arguments['desc_text_justify'] = sd_get_text_justify_input(
			'desc_jext_justify',
			array(
				'group' => __( 'Description Style', 'geodirectory' ),
			)
		);

		// text align
		$arguments['desc_text_align']    = sd_get_text_align_input(
			'text_align',
			array(
				'device_type'     => 'Mobile',
				'element_require' => '[%desc_text_justify%]==""',
				'group'           => __( 'Description Style', 'geodirectory' ),
			)
		);
		$arguments['desc_text_align_md'] = sd_get_text_align_input(
			'text_align',
			array(
				'device_type'     => 'Tablet',
				'element_require' => '[%desc_text_justify%]==""',
				'group'           => __( 'Description Style', 'geodirectory' ),
			)
		);
		$arguments['desc_text_align_lg'] = sd_get_text_align_input(
			'text_align',
			array(
				'device_type'     => 'Desktop',
				'element_require' => '[%desc_text_justify%]==""',
				'default'         => 'text-lg-center',
				'group'           => __( 'Description Style', 'geodirectory' ),
			)
		);

		// icon padding bottom
		$arguments['desc_pb'] = sd_get_padding_input(
			'pb',
			array(
				'group' => __( 'Description Style', 'geodirectory' ),
			)
		);

		// background
		$arguments = $arguments + sd_get_background_inputs( 'bg', array( 'group' => __( 'Wrapper Styles', 'geodirectory' ) ), array( 'group' => __( 'Wrapper Styles', 'geodirectory' ) ), array( 'group' => __( 'Wrapper Styles', 'geodirectory' ) ), array( 'group' => __( 'Wrapper Styles', 'geodirectory' ) ) );

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
			'home'    => __( 'Home', 'geodirectory' ),
			'none'    => __( 'None (non link)', 'geodirectory' ),
			'page'    => __( 'Page', 'geodirectory' ),
			'post-id' => __( 'Post ID', 'geodirectory' ),
			'custom'  => __( 'Custom URL', 'geodirectory' ),
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

		$icon_html        = $this->build_icon( $args );
		$title_html       = $this->build_title( $args );
		$description_html = $this->build_description( $args );
		$tag              = 'div';
		$wrap_class       = sd_build_aui_class( $args );

		$styles = sd_build_aui_styles( $args );
		$style  = $styles ? ' style="' . $styles . '"' : '';

		return $icon_html || $title_html || $description_html ? sprintf(
			'<%1$s class="blockstrap-iconbox %2$s" %3$s >%4$s%5$s%6$s</%1$s>',
			$tag,
			sd_sanitize_html_classes( $wrap_class ),
			$style,
			$icon_html,
			$title_html,
			$description_html,
		) : '';

	}


	public function build_icon( $args ) {
		$html = '';

		if ( ! empty( $args['icon_class'] ) ) {
			$tag        = 'div';
			$icon_class = '';
			if ( ! empty( $args['icon_type'] ) ) {
				if ( 'iconbox' === $args['icon_type'] ) {
					$icon_class .= ' iconbox rounded-circle';
				} elseif ( 'iconbox-fill' === $args['icon_type'] ) {
					$icon_class .= ' iconbox fill rounded-circle';

					if ( ! empty( $args['icon_bg'] ) ) {
						$icon_class .= ' ' . sd_build_aui_class(
							array(
								'bg' => $args['icon_bg'],
							)
						);
					}
				}

				if ( empty( $args['iconbox_size'] ) || 'small' === $args['iconbox_size'] ) {
					$icon_class .= ' iconsmall';
				} elseif ( 'medium' === $args['iconbox_size'] ) {
					$icon_class .= ' iconmedium';
				} elseif ( 'large' === $args['iconbox_size'] ) {
					$icon_class .= ' iconlarge';
				}
			}

			$icon = '<i class="' . sd_sanitize_html_classes( $args['icon_class'] ) . ' ' . sd_sanitize_html_classes( $icon_class ) . '"></i>';

			$wrap_class = sd_build_aui_class(
				array(
					'font_size'     => empty( $args['icon_type'] ) ? $args['icon_size'] : '',
					'text_color'    => $args['icon_color'],
					'pb'            => $args['icon_pb'],
					'text_align'    => $args['icon_text_align'],
					'text_align_md' => $args['icon_text_align_md'],
					'text_align_lg' => $args['icon_text_align_lg'],
				)
			);

			$styles = sd_build_aui_styles(
				array(
					'font_size_custom'  => 'custom' === $args['icon_size'] ? $args['icon_size_custom'] : '',
					'text_color_custom' => $args['icon_color_custom'],
				)
			);
			$style  = $styles ? ' style="' . $styles . '"' : '';

			$html = sprintf(
				'<%1$s class="blockstrap-iconbox-icon %2$s" %3$s >%4$s</%1$s>',
				$tag,
				sd_sanitize_html_classes( $wrap_class ),
				$style,
				$icon
			);

		}

		return $html;
	}

	/**
	 * Build the iconbox title.
	 *
	 * @param $args
	 *
	 * @return string
	 */
	public function build_title( $args ) {
		$html = '';

		if ( ! empty( $args['title'] ) ) {
			$tag = ! empty( $args['title_tag'] ) ? esc_attr( $args['title_tag'] ) : 'h3';

			$wrap_class = sd_build_aui_class(
				array(
					'font_size'     => $args['title_size'],
					'text_color'    => $args['title_color'],
					'pb'            => $args['title_pb'],
					'text_align'    => $args['title_text_align'],
					'text_align_md' => $args['title_text_align_md'],
					'text_align_lg' => $args['title_text_align_lg'],
					'font_weight'   => $args['title_font_weight'],
					'font_case'     => $args['title_font_case'],
					'text_justify'  => $args['title_text_justify'],
				)
			);

			$styles = sd_build_aui_styles(
				array(
					'font_size_custom'  => 'custom' === $args['title_size'] ? $args['title_size_custom'] : '',
					'text_color_custom' => $args['title_color_custom'],
				)
			);
			$style  = $styles ? ' style="' . $styles . '"' : '';

			$html = sprintf(
				'<%1$s class="blockstrap-iconbox-title %2$s" %3$s >%4$s</%1$s>',
				$tag,
				sd_sanitize_html_classes( $wrap_class ),
				$style,
				esc_attr( $args['title'] )
			);
		}

		return $html;
	}

	public function build_description( $args ) {
		$html = '';

		if ( ! empty( $args['description'] ) ) {
			$html = '<div class="">' . wp_kses_post( $args['description'] ) . '</div>';

			$wrap_class = sd_build_aui_class(
				array(
					'font_size'     => $args['desc_size'],
					'text_color'    => $args['desc_color'],
					'pb'            => $args['desc_pb'],
					'text_align'    => $args['desc_text_align'],
					'text_align_md' => $args['desc_text_align_md'],
					'text_align_lg' => $args['desc_text_align_lg'],
					'font_weight'   => $args['desc_font_weight'],
					'font_case'     => $args['desc_font_case'],
					'text_justify'  => $args['desc_text_justify'],
				)
			);

			$styles = sd_build_aui_styles(
				array(
					'font_size_custom'  => 'custom' === $args['desc_size'] ? $args['desc_size_custom'] : '',
					'text_color_custom' => $args['desc_color_custom'],
				)
			);
			$style  = $styles ? ' style="' . $styles . '"' : '';

			$html = sprintf(
				'<div class="blockstrap-iconbox-desc %1$s" %2$s >%3$s</div>',
				sd_sanitize_html_classes( $wrap_class ),
				$style,
				wp_kses_post( $args['description'] )
			);
		}

		return $html;
	}


}


// register it.
add_action(
	'widgets_init',
	function () {
		register_widget( 'BlockStrap_Widget_Icon_Box' );
	}
);

