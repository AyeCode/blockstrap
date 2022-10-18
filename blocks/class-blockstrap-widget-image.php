<?php

class BlockStrap_Widget_Image extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'        => 'blockstrap',
			'output_types'      => array( 'block', 'shortcode' ),
			'block-icon'        => 'far fa-image',
			'block-category'    => 'layout',
			'block-keywords'    => "['image','images','photo']",
			'block-supports'    => array(
				'customClassName' => false,
			),
			'block-edit-return' => "el('span', wp.blockEditor.useBlockProps({
									dangerouslySetInnerHTML: {__html: onChangeContent()},
									style: {'minHeight': '30px'}
								}))",
			'block-wrap'        => '',
			'class_name'        => __CLASS__,
			'base_id'           => 'bs_image',
			'name'              => __( 'BS > Image', 'blockstrap' ),
			'widget_ops'        => array(
				'classname'   => 'bs-image',
				'description' => esc_html__( 'A image element', 'blockstrap' ),
			),
			'example'           => array(
				'attributes' => array(
					'after_text' => 'Earth',
				),
			),
			'no_wrap'           => true,
			'block_group_tabs'  => array(
				'content'  => array(
					'groups' => array(
						__( 'Image', 'blockstrap' ),
						__( 'Link', 'blockstrap' ),
						__( 'Caption', 'blockstrap' ),
					),
					'tab'    => array(
						'title'     => __( 'Content', 'blockstrap' ),
						'key'       => 'bs_tab_content',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					),
				),
				'styles'   => array(
					'groups' => array( __( 'Image Styles', 'blockstrap' ), __( 'Typography', 'blockstrap' ) ),
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
						__( 'Image Mask', 'blockstrap' ),
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

	/**
	 * Set the arguments later.
	 *
	 * @return array
	 */
	public function set_arguments() {

		$arguments = array();

		$arguments['img_src'] = array(
			'type'     => 'select',
			'title'    => __( 'Image source', 'blockstrap' ),
			'options'  => array(
				'upload'   => __( 'Upload', 'blockstrap' ),
				'url'      => __( 'URL', 'blockstrap' ),
				'featured' => __( 'Featured image', 'blockstrap' ),
			),
			'default'  => 'upload',
			'desc_tip' => true,
			'group'    => __( 'Image', 'blockstrap' ),
		);

		$type                          = 'img';
		$arguments[ $type . '_image' ] = array(
			'type'            => 'image',
			'title'           => __( 'Custom image', 'blockstrap' ),
			'placeholder'     => '',
			'default'         => '',
			'desc_tip'        => true,
			'focalpoint'      => false,
			'group'           => __( 'Image', 'blockstrap' ),
			'element_require' => '[%img_src%]=="upload"',
		);

		$arguments[ $type . '_image_id' ] = array(
			'type'        => 'hidden',
			'hidden_type' => 'number',
			'title'       => '',
			'placeholder' => '',
			'default'     => '',
			'group'       => __( 'Image', 'blockstrap' ),
		);

		$image_sizes = get_intermediate_image_sizes();

		$arguments['img_size'] = array(
			'type'            => 'select',
			'title'           => __( 'Image size', 'blockstrap' ),
			'options'         => array( '' => 'Select image size' ) + array_combine( $image_sizes, $image_sizes ) + array( 'full' => 'full' ),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Image', 'blockstrap' ),
			'element_require' => '[%img_src%]!="url"',
		);

		$arguments['img_url'] = array(
			'type'            => 'text',
			'title'           => __( 'Image URL', 'blockstrap' ),
			'placeholder'     => __( 'https://example.com/uploads/my-iamge.jpg', 'blockstrap' ),
			'group'           => __( 'Image', 'blockstrap' ),
			'element_require' => '[%img_src%]=="url"',
		);

		$arguments['fallback_img_src'] = array(
			'type'     => 'select',
			'title'    => __( 'Fallback image source', 'blockstrap' ),
			'options'  => array(
				''        => __( 'None', 'blockstrap' ),
				'default' => __( 'Default', 'blockstrap' ),
				'upload'  => __( 'Upload', 'blockstrap' ),
			),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Image', 'blockstrap' ),
		);

		$type                          = 'fallback_img';
		$arguments[ $type . '_image' ] = array(
			'type'            => 'image',
			'title'           => __( 'Fallback image', 'blockstrap' ),
			'placeholder'     => '',
			'default'         => '',
			'desc_tip'        => true,
			'focalpoint'      => false,
			'group'           => __( 'Image', 'blockstrap' ),
			'element_require' => '[%img_src%]=="featured" && [%fallback_img_src%]=="upload" ',
		);

		$arguments[ $type . '_image_id' ] = array(
			'type'        => 'hidden',
			'hidden_type' => 'number',
			'title'       => '',
			'placeholder' => '',
			'default'     => '',
			'group'       => __( 'Image', 'blockstrap' ),
		);

		$arguments['img_link_to'] = array(
			'type'     => 'select',
			'title'    => __( 'Link to', 'blockstrap' ),
			'options'  => array(
				''       => __( 'None', 'blockstrap' ),
				'post'   => __( 'Post', 'blockstrap' ),
				'media'  => __( 'Media', 'blockstrap' ),
				'custom' => __( 'Custom', 'blockstrap' ),
			),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Link', 'blockstrap' ),
		);

		$arguments['img_link'] = array(
			'type'            => 'text',
			'title'           => __( 'Link', 'blockstrap' ),
			'placeholder'     => __( 'https://example.com', 'blockstrap' ),
			'group'           => __( 'Link', 'blockstrap' ),
			'element_require' => '[%img_link_to%]=="custom"',
		);

		$arguments['img_link_lightbox'] = array(
			'type'            => 'select',
			'title'           => __( 'Lightbox', 'blockstrap' ),
			'options'         => array(
				''  => __( 'No', 'blockstrap' ),
				'1' => __( 'Yes', 'blockstrap' ),
			),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Link', 'blockstrap' ),
			'element_require' => '[%img_link_to%]=="media"',
		);

		$arguments['lightbox_size'] = array(
			'type'            => 'select',
			'title'           => __( 'Lightbox size', 'blockstrap' ),
			'options'         => array( '' => 'No' ) + array_combine( $image_sizes, $image_sizes ) + array( 'full' => 'full' ),
			'default'         => 'full',
			'desc_tip'        => true,
			'group'           => __( 'Link', 'blockstrap' ),
			'element_require' => '[%img_link_to%]=="media" && [%img_link_lightbox%]!="" && [%img_src%]!="url"',
		);

		// caption
		$arguments['text'] = array(
			'type'        => 'textarea',
			'title'       => __( 'Caption', 'blockstrap' ),
			'placeholder' => __( 'Enter a caption!', 'blockstrap' ),
			'desc_tip'    => true,
			'group'       => __( 'Caption', 'blockstrap' ),
		);

		// columns
		$arguments['col']    = sd_get_col_input(
			'col',
			array(
				'device_type'     => 'Mobile',
				'group'           => __( 'Image Styles', 'blockstrap' ),
				'element_require' => '',
				'title'           => __( 'Responsive width', 'blockstrap' ),
			)
		);
		$arguments['col_md'] = sd_get_col_input(
			'col',
			array(
				'device_type'     => 'Tablet',
				'group'           => __( 'Image Styles', 'blockstrap' ),
				'element_require' => '',
				'title'           => __( 'Responsive width', 'blockstrap' ),
			)
		);
		$arguments['col_lg'] = sd_get_col_input(
			'col',
			array(
				'device_type'     => 'Desktop',
				'group'           => __( 'Image Styles', 'blockstrap' ),
				'element_require' => '',
				'title'           => __( 'Responsive width', 'blockstrap' ),
			)
		);

		$arguments['img_aspect'] = array(
			'title'    => __( 'Aspect ratio', 'blockstrap' ),
			'desc'     => __( 'For a more consistent image view you can set the aspect ratio of the image view port.', 'blockstrap' ),
			'type'     => 'select',
			'options'  => array(
				'16by9' => __( 'Default (16by9)', 'blockstrap' ),
				'21by9' => __( '21by9', 'blockstrap' ),
				'4by3'  => __( '4by3', 'blockstrap' ),
				'1by1'  => __( '1by1 (square)', 'blockstrap' ),
				''      => __( 'No ratio (natural)', 'blockstrap' ),
			),
			'desc_tip' => true,
			'value'    => '',
			'default'  => '16by9',
			'group'    => __( 'Image Styles', 'blockstrap' ),
		);

		$arguments['img_cover'] = array(
			'title'    => __( 'Image cover type', 'blockstrap' ),
			'desc'     => __( 'This is how the image should cover the image viewport.', 'blockstrap' ),
			'type'     => 'select',
			'options'  => array(
				''  => __( 'Default (cover both)', 'blockstrap' ),
				'x' => __( 'Width cover', 'blockstrap' ),
				'y' => __( 'height cover', 'blockstrap' ),
				'n' => __( 'No cover (contain)', 'blockstrap' ),
			),
			'desc_tip' => true,
			'value'    => '',
			'default'  => '',
			'group'    => __( 'Image Styles', 'blockstrap' ),
		);

		// border
		$arguments['img_border']       = sd_get_border_input( 'border', array( 'group' => __( 'Image Styles', 'blockstrap' ) ) );
		$arguments['img_rounded']      = sd_get_border_input( 'rounded', array( 'group' => __( 'Image Styles', 'blockstrap' ) ) );
		$arguments['img_rounded_size'] = sd_get_border_input( 'rounded_size', array( 'group' => __( 'Image Styles', 'blockstrap' ) ) );

		// shadow
		$arguments['img_shadow'] = sd_get_shadow_input( 'shadow', array( 'group' => __( 'Image Styles', 'blockstrap' ) ) );

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

		$arguments['bg_on_text'] = array(
			'type'            => 'checkbox',
			'title'           => __( 'Background on text', 'blockstrap' ),
			'default'         => '',
			'value'           => '1',
			'desc_tip'        => false,
			'desc'            => __( 'This will show the background on the text.', 'blockstrap' ),
			'group'           => __( 'Wrapper Styles', 'blockstrap' ),
			'element_require' => '[%bg%]=="custom-gradient"',
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

		$arguments['img_mask'] = array(
			'type'     => 'select',
			'title'    => __( 'Mask', 'blockstrap' ),
			'options'  => array(
				''         => __( 'None', 'blockstrap' ),
				'blob1'    => 'blob1',
				'blob2'    => 'blob2',
				'blob3'    => 'blob3',
				'circle'   => __( 'circle', 'blockstrap' ),
				'diamond'  => __( 'Diamond', 'blockstrap' ),
				'flower'   => __( 'Flower', 'blockstrap' ),
				'hexagon'  => __( 'Hexagon', 'blockstrap' ),
				'rounded'  => __( 'Rounded', 'blockstrap' ),
				'sketch'   => __( 'sketch', 'blockstrap' ),
				'triangle' => __( 'triangle', 'blockstrap' ),
			),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Image Mask', 'blockstrap' ),
		);

		$arguments['img_mask_position'] = array(
			'type'            => 'select',
			'title'           => __( 'Position', 'blockstrap' ),
			'options'         => array(
				'center center' => __( 'Center Center', 'blockstrap' ),
				'center left'   => __( 'Center Left', 'blockstrap' ),
				'center right'  => __( 'Center Right', 'blockstrap' ),
				'top center'    => __( 'Top Center', 'blockstrap' ),
				'top left'      => __( 'Top Left', 'blockstrap' ),
				'top right'     => __( 'Top Right', 'blockstrap' ),
				'bottom center' => __( 'Bottom Center', 'blockstrap' ),
				'bottom left'   => __( 'bottom left', 'blockstrap' ),
				'bottom right'  => __( 'bottom right', 'blockstrap' ),
			),
			'default'         => 'center center',
			'desc_tip'        => true,
			'group'           => __( 'Image Mask', 'blockstrap' ),
			'element_require' => '[%img_mask%]!=""',
		);

		$arguments['css_class'] = array(
			'type'    => 'text',
			'title'   => __( 'Additional CSS class(es)', 'blockstrap' ),
			'desc'    => __( 'Separate multiple classes with spaces.', 'blockstrap' ),
			'default' => '',
			'group'   => __( 'Advanced', 'blockstrap' ),
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
		global $post;

		$link_to      = $args['img_link_to'] ? esc_attr( $args['img_link_to'] ) : '';
		$image_src    = '';
		$image_size   = ! empty( $args['img_size'] ) ? esc_attr( $args['img_size'] ) : 'full';
		$image        = '';
		$image_class  = 'mw-100 w-100';
		$image_class .= ! empty( $args['img_border'] ) ? ' border border-' . esc_attr( $args['img_border'] ) : '';
		$image_class .= ! empty( $args['img_rounded'] ) ? ' ' . esc_attr( $args['img_rounded'] ) : '';
		$image_class .= ! empty( $args['img_rounded_size'] ) ? ' rounded-' . esc_attr( $args['img_rounded_size'] ) : '';
		$image_class .= ! empty( $args['img_shadow'] ) ? ' ' . esc_attr( $args['img_shadow'] ) : '';
		$image_class .= ! empty( $args['img_aspect'] ) ? ' embed-responsive-item' : '';

		// image mask
		$image_styles  = ! empty( $args['img_mask'] ) ? '-webkit-mask-image: url("' . get_template_directory_uri() . '/assets/masks/' . esc_attr( $args['img_mask'] ) . '.svg");' : '';
		$image_styles .= ! empty( $args['img_mask'] ) ? '-webkit-mask-size: contain;-webkit-mask-repeat: no-repeat;' : '';
		$image_styles .= ! empty( $args['img_mask'] ) && ! empty( $args['img_mask_position'] ) ? '-webkit-mask-position: ' . esc_attr( $args['img_mask_position'] ) . ';' : '';
		$image_style   = $image_styles ? "style='$image_styles'" : '';

		if ( ! empty( $args['img_cover'] ) ) {
			if ( 'x' === $args['img_cover'] ) {
				$image_class .= ' embed-item-cover-x ';
			} elseif ( 'y' === $args['img_cover'] ) {
				$image_class .= ' embed-item-cover-y ';
			} elseif ( 'n' === $args['img_cover'] ) {
				$image_class .= ' embed-item-contain ';
			}
		} else {
			$image_class .= ' embed-item-cover-xy ';
		}

		if ( 'url' === $args['img_src'] ) {
			$image_src = $args['img_url'] ? esc_url_raw( $args['img_url'] ) : '';
		} elseif ( 'featured' === $args['img_src'] ) {
			$image     = get_the_post_thumbnail( $post, $image_size, array( 'class' => $image_class ) );
			$image_src = get_the_post_thumbnail_url( $post, 'large' );
		} elseif ( ! empty( $args['img_image_id'] ) ) {
			$image         = wp_get_attachment_image( absint( $args['img_image_id'] ), $image_size, false, array( 'class' => $image_class ) );
			$image_src_arr = wp_get_attachment_image_src( absint( $args['img_image_id'] ), 'large' );
			$image_src     = ! empty( $image_src_arr[0] ) ? esc_url_raw( $image_src_arr[0] ) : '';
		}

		if ( ! $image_src && $this->is_block_content_call() ) {
			$image = '<img src="' . get_template_directory_uri() . '/assets/images/block-image-placeholder.jpg" class="' . sd_sanitize_html_classes( $image_class ) . '" />';
		} elseif ( ! $image ) {

			if ( 'featured' === $args['img_src'] && 'upload' === $args['fallback_img_src'] && ! empty( $args['fallback_img_image_id'] ) ) {
				$image         = wp_get_attachment_image( absint( $args['fallback_img_image_id'] ), $image_size, false, array( 'class' => $image_class ) );
				$image_src_arr = wp_get_attachment_image_src( absint( $args['fallback_img_image_id'] ), 'large' );
				$image_src     = ! empty( $image_src_arr[0] ) ? esc_url_raw( $image_src_arr[0] ) : '';
			} elseif ( 'featured' === $args['img_src'] && 'default' === $args['fallback_img_src'] ) {
				$image_src = get_template_directory_uri() . '/assets/images/block-image-placeholder.jpg';
				$image     = '<img src="' . esc_url_raw( $image_src ) . '" class="' . sd_sanitize_html_classes( $image_class ) . '" />';
			} else {
				$image = '<img src="' . esc_url_raw( $image_src ) . '" class="' . sd_sanitize_html_classes( $image_class ) . '" />';
			}
		}

		if ( ! $image_src && ! $this->is_preview() ) {
			return;
		}

		// maybe add image styles
		if ( $image_style && $image ) {
			$image = str_replace( ' src=', ' ' . $image_style . ' src=', $image );
		}

		// class
		$wrap_class        = sd_build_aui_class( $args );
		$wrap_class        = $args['img_link_lightbox'] ? 'aui-gallery ' . $wrap_class : $wrap_class;
		$figure_attributes = $wrap_class ? 'class="overflow-hidden ' . sd_sanitize_html_classes( $wrap_class ) . '"' : '';

		// styles
		$wrap_styles        = sd_build_aui_styles( $args );
		$figure_attributes .= $wrap_class ? ' style="' . sd_sanitize_html_classes( $wrap_styles ) . '"' : '';

		$figcaption_class = $args['text_color'] ? 'text-' . sd_sanitize_html_classes( $args['text_color'] ) : '';
		$figcaption       = $args['text'] ? '<figcaption  class="figure-caption ' . $figcaption_class . '">' . wp_kses_post( $args['text'] ) . '</figcaption>' : '';

		// maybe link
		$ratio_cover_class = '';

		$ratio_cover_class .= ! empty( $args['img_aspect'] ) ? ' embed-responsive embed-responsive-' . esc_attr( $args['img_aspect'] ) . ' ' : '';

		if ( 'media' === $link_to ) {
			$image = sprintf(
				'<a href="%1$s" class="%2$s aui-lightbox-image  embed-has-action position-relative">%3$s<i class="fas fa-search-plus"></i></a>',
				$image_src,
				$ratio_cover_class,
				$image
			);
		} elseif ( 'custom' === $link_to ) {
			$image = sprintf(
				'<a href="%1$s" class="%2$s">%3$s</a>',
				$this->is_block_content_call() ? '#' : esc_url_raw( $args['img_link'] ),
				$ratio_cover_class,
				$image
			);
		} elseif ( 'post' === $link_to ) {
			$image = sprintf(
				'<a href="%1$s" class="%2$s embed-has-action position-relative" >%3$s<i class="fas fa-link"></i></a>',
				$this->is_block_content_call() ? '#' : esc_url_raw( get_post_permalink() ),
				$ratio_cover_class,
				$image
			);
		} else {
			$figure_attributes = str_replace( 'class="', 'class=" ' . $ratio_cover_class, $figure_attributes );
		}

		$figure = sprintf(
			'<figure %1$s>%2$s%3$s</figure>',
			$figure_attributes,
			$image,
			$figcaption
		);

		return $image ? $figure : '';

	}


}

// register it.
add_action(
	'widgets_init',
	function () {
		register_widget( 'BlockStrap_Widget_Image' );
	}
);

