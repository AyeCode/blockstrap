<?php

class BlockStrap_Widget_Gallery extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'        => 'blockstrap',
			'output_types'      => array( 'block' ),
//			'nested-block'   => true,
			'block-icon'        => 'fas fa-th',
			'block-category'    => 'layout',
			'block-keywords'    => "['gallery','images','photo']",
			'block-supports'    => array(
				'customClassName' => false
			),
			'block-edit-return' => "el('div', wp.blockEditor.useBlockProps({
									dangerouslySetInnerHTML: {__html: onChangeContent()},
									style: {'minHeight': '30px'}
								}))",
			'block-wrap'        => '',
			'class_name'        => __CLASS__,
			'base_id'           => 'bs_gallery',
			'name'              => __( 'BS > Gallery', 'blockstrap' ),
			'widget_ops'        => array(
				'classname'   => 'bs-image',
				'description' => esc_html__( 'An image gallery.', 'blockstrap' ),
			),
			'example'           => array(
				'attributes' => array(
					'after_text' => "Earth",
				)
			),
			'no_wrap'           => true,
			'block_group_tabs'  => array(
				'content'  => array(
					'groups' => array( __( "Image", "geodirectory" ), __( "Captions", "geodirectory" ) ),
					'tab'    => array(
						'title'     => __( 'Content', 'geodirectory' ),
						'key'       => 'bs_tab_content',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					)
				),
				'styles'   => array(
					'groups' => array(
						__( "Gallery Styles", "geodirectory" ),
						__( "Image Styles", "geodirectory" ),
						__( "Typography", "geodirectory" )
					),
					'tab'    => array(
						'title'     => __( 'Styles', 'geodirectory' ),
						'key'       => 'bs_tab_styles',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					)
				),
				'advanced' => array(
					'groups' => array( __( "Wrapper Styles", "geodirectory" ), __( "Advanced", "geodirectory" ) ),
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
			'group'       => __( "Image", "geodirectory" ),
//			'element_require' => '[%img_src%]=="upload"'
		);

		$image_sizes = get_intermediate_image_sizes();

		$arguments['img_size'] = array(
			'type'     => 'select',
			'title'    => __( 'Image size', 'geodirectory' ),
			'options'  => array( '' => 'Select image size' ) + array_combine( $image_sizes, $image_sizes ) + array( 'full' => 'full' ),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( "Image", "geodirectory" ),
		);


		$arguments['lightbox_size'] = array(
			'type'     => 'select',
			'title'    => __( 'Lightbox', 'geodirectory' ),
			'options'  => array( '' => 'No' ) + array_combine( $image_sizes, $image_sizes ) + array( 'full' => 'full' ),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( "Image", "geodirectory" ),
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
			'group'    => __( "Captions", "geodirectory" ),
		);


		//$arguments = $arguments + sd_get_background_inputs('bg');

		$arguments['gallery_style'] = array(
			'title'    => __( 'Gallery style', 'geodirectory' ),
//			'desc' => __('For a more consistent image view you can set the aspect ratio of the image view port.', 'geodirectory'),
			'type'     => 'select',
			'options'  => array(
				'grid'  => __( "Grid (defaut)", "geodirectory" ),
				'1-2-5' => __( "1-2-5 Grid", "geodirectory" ),
				'1-2-2' => __( "1-2-2 Grid", "geodirectory" ),
			),
			'desc_tip' => true,
			'value'    => '',
			'default'  => 'grid',
//			'advanced' => true,
			'group'    => __( "Gallery Styles", "geodirectory" ),
		);

		// row-cols
		$arguments['row_cols']    = sd_get_row_cols_input( 'row_cols', array(
			'device_type'     => 'Mobile',
			'group'           => __( "Gallery Styles", "geodirectory" ),
			'element_require' => '',
			'title'           => __( 'Images per row', 'geodirectory' )
		) );
		$arguments['row_cols_md'] = sd_get_row_cols_input( 'row_cols', array(
			'device_type'     => 'Tablet',
			'group'           => __( "Gallery Styles", "geodirectory" ),
			'element_require' => '',
			'title'           => __( 'Images per row', 'geodirectory' )
		) );
		$arguments['row_cols_lg'] = sd_get_row_cols_input( 'row_cols', array(
			'device_type'     => 'Desktop',
			'group'           => __( "Gallery Styles", "geodirectory" ),
			'element_require' => '',
			'title'           => __( 'Images per row', 'geodirectory' )
		) );

		$arguments['img_aspect'] = array(
			'title'    => __( 'Aspect ratio', 'geodirectory' ),
			'desc'     => __( 'For a more consistent image view you can set the aspect ratio of the image view port.', 'geodirectory' ),
			'type'     => 'select',
			'options'  => array(
				'16by9' => __( "Default (16by9)", "geodirectory" ),
				'21by9' => __( "21by9", "geodirectory" ),
				'4by3'  => __( "4by3", "geodirectory" ),
				'1by1'  => __( "1by1 (square)", "geodirectory" ),
				''      => __( "No ratio (natural)", "geodirectory" ),
			),
			'desc_tip' => true,
			'value'    => '',
			'default'  => '16by9',
//			'advanced' => true,
			'group'    => __( "Gallery Styles", "geodirectory" ),
		);

		$arguments['img_cover'] = array(
			'title'    => __( 'Image cover type', 'geodirectory' ),
			'desc'     => __( 'This is how the image should cover the image viewport.', 'geodirectory' ),
			'type'     => 'select',
			'options'  => array(
				''  => __( "Default (cover both)", "geodirectory" ),
				'x' => __( "Width cover", "geodirectory" ),
				'y' => __( "height cover", "geodirectory" ),
				'n' => __( "No cover (contain)", "geodirectory" ),
			),
			'desc_tip' => true,
			'value'    => '',
			'default'  => '',
//			'advanced' => true,
			'group'    => __( "Gallery Styles", "geodirectory" ),
		);

		$arguments['row_gap_x'] = array(
			'title'    => __( 'Row gap X', 'geodirectory' ),
			'type'     => 'select',
			'options'  => array(
				''  => __( "Default", "geodirectory" ),
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
			),
			'desc_tip' => true,
			'value'    => '',
			'default'  => '',
			'group'    => __( "Gallery Styles", "geodirectory" ),
		);
		$arguments['row_gap_y'] = array(
			'title'    => __( 'Row gap Y', 'geodirectory' ),
			'type'     => 'select',
			'options'  => array(
				''  => __( "Default", "geodirectory" ),
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
			),
			'desc_tip' => true,
			'value'    => '',
			'default'  => '',
			'group'    => __( "Gallery Styles", "geodirectory" ),
		);


		// border
		$arguments['img_border']       = sd_get_border_input( 'border', array( 'group' => __( "Image Styles", "geodirectory" ) ) );
		$arguments['img_rounded']      = sd_get_border_input( 'rounded', array( 'group' => __( "Image Styles", "geodirectory" ) ) );
		$arguments['img_rounded_size'] = sd_get_border_input( 'rounded_size', array( 'group' => __( "Image Styles", "geodirectory" ) ) );

		// shadow
		$arguments['img_shadow'] = sd_get_shadow_input( 'shadow', array( 'group' => __( "Image Styles", "geodirectory" ) ) );


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
		$arguments['text_align']    = sd_get_text_align_input( 'text_align', array(
			'device_type'     => 'Mobile',
			'element_require' => '[%text_justify%]==""'
		) );
		$arguments['text_align_md'] = sd_get_text_align_input( 'text_align', array(
			'device_type'     => 'Tablet',
			'element_require' => '[%text_justify%]==""'
		) );
		$arguments['text_align_lg'] = sd_get_text_align_input( 'text_align', array(
			'device_type'     => 'Desktop',
			'element_require' => '[%text_justify%]==""'
		) );


		// background
//		$arguments = $arguments + sd_get_background_inputs('bg', array('group' => __("Wrapper Styles","geodirectory")),array('group' => __("Wrapper Styles","geodirectory")),array('group' => __("Wrapper Styles","geodirectory")),array('group' => __("Wrapper Styles","geodirectory")) );

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


		$arguments['css_class'] = array(
			'type'    => 'text',
			'title'   => __( 'Additional CSS class(es)', 'geodirectory' ),
			'desc'    => __( 'Separate multiple classes with spaces.', 'geodirectory' ),
			'default' => '',
			'group'   => __( "Advanced", "geodirectory" ),
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


		$output = '';

//            print_r($args);//exit;

		if ( $this->is_block_content_call() ) {
			$args['images'] = str_replace( '&quot;', '"', $args['images'] );
			$images         = json_decode( '[' . $args['images'] . ']', true );
		} else {
			$images = json_decode( '[' . $args['images'] . ']', true );
		}


		//print_r($images);//exit;


		$lightbox_size = $args['lightbox_size'] ? esc_attr( $args['lightbox_size'] ) : 'full';
		$image_src     = '';
		$image_size    = ! empty( $args['img_size'] ) ? esc_attr( $args['img_size'] ) : 'full';
//		$image_aspect = !empty($args['img_aspect']) ? esc_attr($args['img_aspect']) : 'full';
//		$image_cover = !empty($args['img_cover']) ? esc_attr($args['img_cover']) : 'full';
		$image       = '';
		$image_class = 'mw-100 w-100 embed-responsive-item';
//		$image_class .= !empty($args['img_border']) ? ' border border-'.esc_attr($args['img_border']) : '';
		$image_class .= ! empty( $args['img_border'] ) ? ' border border-' . esc_attr( $args['img_border'] ) : '';
		$image_class .= ! empty( $args['img_rounded'] ) ? ' ' . esc_attr( $args['img_rounded'] ) : '';
		$image_class .= ! empty( $args['img_rounded_size'] ) ? ' rounded-' . esc_attr( $args['img_rounded_size'] ) : '';
		$image_class .= ! empty( $args['img_shadow'] ) ? ' ' . esc_attr( $args['img_shadow'] ) : '';

		// img_cover.
		if ( ! empty( $args['img_cover'] ) ) {
			if ( $args['img_cover'] == 'x' ) {
				$image_class .= " embed-item-cover-x ";
			} elseif ( $args['img_cover'] == 'y' ) {
				$image_class .= " embed-item-cover-y ";
			} elseif ( $args['img_cover'] == 'n' ) {
				$image_class .= " embed-item-contain ";
			}
		} else {
			$image_class .= " embed-item-cover-xy ";
		}

		$fig_class = 'figure p-0 m-0';
		$fig_class .= ! empty( $args['img_aspect'] ) ? ' embed-responsive embed-responsive-' . esc_attr( $args['img_aspect'] ) : '';

		$col_class = '';
		$col_class .= ! empty( $args['row_gap_x'] ) ? ' px-' . absint( $args['row_gap_x'] ) : '';
		$col_class .= ! empty( $args['row_gap_y'] ) ? ' mb-' . absint( $args['row_gap_y'] ) : ' mb-4';

		$cols = array();
		if ( ! empty( $images ) ) {

			$i = 0;
			foreach ( $images as $image ) {

				$img_src = ! empty( $image['sizes'][ $image_size ]['url'] ) ? esc_url_raw( $image['sizes'][ $image_size ]['url'] ) : '';

				if ( $img_src ) {

					$img = sprintf(
						'<img src="%1$s" class="%2$s" />',
						$img_src,
						$image_class
					);

					$figcaption_class = 'figure-caption sr-only';
					$caption = !empty($image['caption']) ? sprintf(
						'<figcaption class="%1$s" style="position: initial;">%2$s</figcaption>',
						$figcaption_class,
						esc_attr($image['caption'])
					) : '';

					$fig = sprintf(
						'<figure class="%1$s">%2$s%3$s</figure>',
						$fig_class,
						$img,
						$caption
					);

					if ( $lightbox_size ) {
						$lightbox_src = ! empty( $image['sizes'][ $lightbox_size ]['url'] ) ? esc_url_raw( $image['sizes'][ $lightbox_size ]['url'] ) : '';
						$fig          = sprintf(
							'<a href="%1$s" class="aui-lightbox-image embed-has-action">%2$s<i class="fas fa-search-plus"></i></a>',
							$lightbox_src,
							$fig
						);
					}

					$cols[] = sprintf(
						'<div class="col %1$s">%2$s</div>',
						$col_class,
						$fig
					);

				}

			}

		}

		// maybe wrap
		if ( ! empty( $cols ) && ! empty( $args['gallery_style'] ) && $args['gallery_style'] != 'grid' ) {
			$i       = 0;
			$i_count = count( $cols );
			foreach ( $cols as $key => $col ) {
				$i ++;


				if ( $args['gallery_style'] == '1-2-2' ) {

					// grid
					if ( $i === 1 ) {
						$col          = str_replace( '<figure ', '<figure style="height: 100.6%" ', $col );
						$cols[ $key ] = sprintf(
							'<div class="col-12 col-md-6 p-0 m-0"><div class="row row-cols-1 p-0 m-0">%1$s</div></div>',
							$col
						);
					} elseif ( $i === 2 ) {
						$cols[ $key ] = '<div class="col-12 col-md-6 p-0 m-0"><div class="row row-cols-2 p-0 m-0">' . $col;
					} elseif ( $i === 5 ) {
						$more         = absint( $i_count - 5 );
						$more_text    = sprintf( _n( '+%s photo','+%s photos',$more, 'blockstrap' ), $more );
						$col          = $more ? str_replace( '</a>', '<button class="btn btn-sm btn-white position-absolute shadow border-dark" style="bottom: 15px; right: 20px;">' . esc_attr( $more_text ) . '</button></a>', $col ). '</div></div>' : $col . '</div></div>';
						$cols[ $key ] = $col;
					} elseif ( $i >= 6 ) {
						$cols[ $key ] = str_replace( 'class="', 'class="d-none ', $col );
					}
				} elseif ( $args['gallery_style'] == '1-2-5' ) {

					// grid
					if ( $i === 1 ) {
						$col          = str_replace( '<figure ', '<figure style="height: 100.3%" ', $col );
						$cols[ $key ] = sprintf(
							'<div class="col-12 col-md-8 p-0 m-0"><div class="row row-cols-1 p-0 m-0">%1$s</div></div>',
							$col
						);
					} elseif ( $i === 2 ) {
						$cols[ $key ] = '<div class="col-12 col-md-4 p-0 m-0"><div class="row row-cols-1 p-0 m-0">' . $col;
					} elseif ( $i === 3 ) {
						$cols[ $key ] .= '</div></div>';
					} elseif ( $i == 4 ) {
						$cols[ $key ] = '<div class="col-12 p-0 m-0"><div class="row row-cols-5 p-0 m-0">' . $col;
					} elseif ( $i === $i_count ) {
						$cols[ $key ] = '</div></div>';
					}elseif ( $i == 8 ) {
						$more         = absint( $i_count - 9 );
						$more_text    = sprintf( _n( '+%s photo','+%s photos',$more, 'blockstrap' ), $more );
						$col          = $more ? str_replace( '</a>', '<button class="btn btn-sm btn-white position-absolute shadow border-dark" style="bottom: 15px; right: 20px;">' . esc_attr( $more_text ) . '</button></a>', $col ) : $col . '</div></div>';
						$cols[ $key ] = $col;
					}elseif ( $i >= 9 ) {
						$cols[ $key ] = str_replace( 'class="', 'class="d-none ', $col );
					}
				}

			}

		}

		$cols = implode( "", $cols );

//        echo '###'.$cols;exit;

		// class
		$wrap_class        = sd_build_aui_class( $args );
		$wrap_class        = 'row aui-gallery ' . $wrap_class;
		$figure_attributes = $wrap_class ? 'class="overflow-hidden ' . sd_sanitize_html_classes( $wrap_class ) . '"' : '';

		// styles
		$wrap_styles = sd_build_aui_styles( $args );
//		$figure_attributes .= $wrap_class ? ' style="'.sd_sanitize_html_classes($wrap_styles).'"' : '';

//        print_r($args);

//        $figcaption_class = $args['text_color'] ? 'text-'.sd_sanitize_html_classes($args['text_color']) : '';
//		$figcaption = $args['text'] ? '<figcaption  class="figure-caption '.$figcaption_class.'">'.wp_kses_post($args['text']).'</figcaption>' :  '';
//		$figcaption = $args['text'] ? '<figcaption  class="figure-caption '.$figcaption_class.'">'.$args['text'].'</figcaption>' :  '';


		// maybe link


		$output .= sprintf(
			'<div class="%1$s" %2$s>%3$s</div>',
			$wrap_class,
			$wrap_styles,
			$cols
		);

		return $output;


	}

	public function block_global_js() {
		ob_start();
	if ( false ){
		?>
		<script><?php }
			?>

			function bs_build_heading_html($args) {

				let $html = '';

				$html += $args.text;


				return $html;
			}


		<?php
//		return str_replace("\n"," ",ob_get_clean()) ;
		return ob_get_clean();
	}

}

// register it.
add_action( 'widgets_init', function () {
	register_widget( 'BlockStrap_Widget_Gallery' );
} );

