<?php

class BlockStrap_Widget_Map extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'        => 'blockstrap',
			'output_types'      => array( 'block', 'shortcode' ),
			'block-icon'        => 'fas fa-map-marked-alt',
			'block-category'    => 'layout',
			'block-keywords'    => "['map','google','osm']",
			'block-supports'    => array(
				'customClassName' => false,
			),
			'block-edit-return' => "el('span', wp.blockEditor.useBlockProps({
									dangerouslySetInnerHTML: {__html: onChangeContent()},
									style: {'minHeight': '30px'}
								}))",
			'block-wrap'        => '',
			'class_name'        => __CLASS__,
			'base_id'           => 'bs_map',
			'name'              => __( 'BS > Map', 'blockstrap' ),
			'widget_ops'        => array(
				'classname'   => 'bs-map',
				'description' => esc_html__( 'A simple lazy load iframe Google or OSM map.', 'blockstrap' ),
			),
			'no_wrap'           => true,
			'block_group_tabs'  => array(
				'content'  => array(
					'groups' => array( __( 'Map', 'blockstrap' ) ),
					'tab'    => array(
						'title'     => __( 'Content', 'blockstrap' ),
						'key'       => 'bs_tab_content',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					),
				),
				'styles'   => array(
					'groups' => array( __( 'Map Styles', 'blockstrap' ) ),
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

		$arguments['map_type'] = array(
			'type'     => 'select',
			'title'    => __( 'Map source', 'blockstrap' ),
			'options'  => array(
				'google' => __( 'Google', 'blockstrap' ),
				'osm'    => __( 'Open Street Maps', 'blockstrap' ),
			),
			'default'  => 'upload',
			'desc_tip' => true,
			'group'    => __( 'Map', 'blockstrap' ),
		);

		$arguments['address'] = array(
			'type'            => 'text',
			'title'           => __( 'Address', 'blockstrap' ),
			'placeholder'     => __( 'Golden Gate Bridge', 'blockstrap' ),
			'default'         => '',
			'group'           => __( 'Map', 'blockstrap' ),
			'element_require' => '[%map_type%]=="google"',
		);

		$arguments['gps'] = array(
			'type'            => 'text',
			'title'           => __( 'GPS', 'blockstrap' ),
			'placeholder'     => '56.9808, -7.4628',
			'default'         => '',
			/* translators: 1: Link open, 2: Link close. */
			'desc'            => sprintf( __( 'Right click anywhere on a %1$sGoogle map%2$s and then click the GPS and past here.', 'blockstrap' ), '<a href="https://www.google.com/maps" target="_blank">', '</a>' ),
			'group'           => __( 'Map', 'blockstrap' ),
			'element_require' => '[%map_type%]=="osm"',
		);

		$arguments['map_zoom'] = array(
			'type'     => 'select',
			'title'    => __( 'Map zoom', 'blockstrap' ),
			'options'  => array(
				'1'  => '1',
				'2'  => '2',
				'3'  => '3',
				'4'  => '4',
				'5'  => '5',
				'6'  => '6',
				'7'  => '7',
				'8'  => '8',
				'9'  => '9',
				'10' => '10',
				'11' => '11',
				'12' => '12',
				'13' => '13',
				'14' => '14',
				'15' => '15',
				'16' => '16',
				'17' => '17',
				'18' => '18',
				'19' => '19',
			),
			'default'  => '10',
			'desc_tip' => true,
			'group'    => __( 'Map', 'blockstrap' ),
		);

		$arguments['map_view_google'] = array(
			'type'            => 'select',
			'title'           => __( 'Map view', 'blockstrap' ),
			'options'         => array(
				''  => __( 'Map', 'blockstrap' ),
				'k' => __( 'Satellite', 'blockstrap' ),
				'h' => __( 'Hybrid', 'blockstrap' ),
				'p' => __( 'Terrain', 'blockstrap' ),
			),
			'default'         => '',
			'desc_tip'        => true,
			'group'           => __( 'Map', 'blockstrap' ),
			'element_require' => '[%map_type%]=="google"',
		);

		$arguments['map_view_osm'] = array(
			'type'            => 'select',
			'title'           => __( 'Map view', 'blockstrap' ),
			'options'         => array(
				'mapnik'       => __( 'Standard', 'blockstrap' ),
				'cyclosm'      => __( 'CyclOSM', 'blockstrap' ),
				'cyclemap'     => __( 'Cycle OSM', 'blockstrap' ),
				'transportmap' => __( 'Transport Map', 'blockstrap' ),
				'opnvkarte'    => __( 'ÖPNVKarte', 'blockstrap' ),
				'hot'          => __( 'Humanitarian', 'blockstrap' ),
			),
			'default'         => 'mapnik',
			'desc_tip'        => true,
			'group'           => __( 'Map', 'blockstrap' ),
			'element_require' => '[%map_type%]=="osm"',
		);

		$arguments['map_aspect'] = array(
			'type'     => 'select',
			'title'    => __( 'Responsive ratios', 'blockstrap' ),
			'options'  => array(
				'4by3'  => '4x3',
				'16by9' => '16x9',
				'21by9' => '21x9',
				'1by1'  => '1x1',
			),
			'default'  => '4by3',
			'desc_tip' => true,
			'group'    => __( 'Map', 'blockstrap' ),
		);

		// columns
		$arguments['col']    = sd_get_col_input(
			'col',
			array(
				'device_type'     => 'Mobile',
				'group'           => __( 'Map Styles', 'blockstrap' ),
				'element_require' => '',
				'title'           => __( 'Responsive width', 'blockstrap' ),
			)
		);
		$arguments['col_md'] = sd_get_col_input(
			'col',
			array(
				'device_type'     => 'Tablet',
				'group'           => __( 'Map Styles', 'blockstrap' ),
				'element_require' => '',
				'title'           => __( 'Responsive width', 'blockstrap' ),
			)
		);
		$arguments['col_lg'] = sd_get_col_input(
			'col',
			array(
				'device_type'     => 'Desktop',
				'group'           => __( 'Map Styles', 'blockstrap' ),
				'element_require' => '',
				'title'           => __( 'Responsive width', 'blockstrap' ),
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

		$arguments['mask'] = array(
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

		$arguments['mask_position'] = array(
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

		// class
		$wrap_class  = sd_build_aui_class( $args );
		$wrap_class .= ' embed-responsive';
		$wrap_class .= $args['map_aspect'] ? ' embed-responsive-' . esc_attr( $args['map_aspect'] ) : '';
		$class       = $wrap_class ? 'class="overflow-hidden ' . $wrap_class . '"' : '';

		// styles
		$wrap_styles = sd_build_aui_styles( $args );

		// map mask
		$wrap_styles .= ! empty( $args['mask'] ) ? '-webkit-mask-image: url("' . get_template_directory_uri() . '/assets/masks/' . esc_attr( $args['mask'] ) . '.svg");' : '';
		$wrap_styles .= ! empty( $args['mask'] ) ? '-webkit-mask-size: contain;-webkit-mask-repeat: no-repeat;' : '';
		$wrap_styles .= ! empty( $args['mask'] ) && ! empty( $args['mask_position'] ) ? '-webkit-mask-position: ' . esc_attr( $args['mask_position'] ) . ';' : '';

		$style = $wrap_styles ? "style='$wrap_styles'" : '';

		$src     = '';
		$address = $args['address'] ? esc_attr( $args['address'] ) : 'Isle of Barra';

		if ( 'osm' === $args['map_type'] ) {
			$zoom        = $args['map_zoom'] ? absint( $args['map_zoom'] ) : '10';
			$layer       = $args['map_view_osm'] ? esc_attr( $args['map_view_osm'] ) : 'mapnik';
			$gps         = $args['gps'] ? explode( ',', $args['gps'] ) : array(
				'56.98381687584503',
				'-7.46814054212338',
			);
			$lat         = trim( esc_attr( $gps[0] ) );
			$lon         = trim( esc_attr( $gps[1] ) );
			$zoom_bounds = 5242.88 / ( pow( 2, $zoom ) );
			$bounds_arr  = $this->getBoundingBox( $lat, $lon, $zoom_bounds );
			$bounds      = implode( ',', $bounds_arr );
			$src         = "https://www.openstreetmap.org/export/embed.html?bbox=$bounds&amp;layer=$layer&amp;marker=" . trim( esc_attr( $gps[0] ) ) . ',' . trim( esc_attr( $gps[1] ) );
		} else {
			$zoom  = $args['map_zoom'] ? absint( $args['map_zoom'] ) : '10';
			$layer = $args['map_view_google'] ? esc_attr( $args['map_view_google'] ) : 'm';
			$src   = "https://maps.google.com/maps?q=$address&amp;t=$layer&amp;z=$zoom&amp;output=embed&amp;iwloc=near";//&width=100%&height=200";
		}

		$iframe = sprintf(
			'<iframe src="%1$s" class="embed-responsive-item overflow-hidden" loading="lazy" width="100%%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>',
			$src
		);

		return sprintf(
			'<div %1$s %2$s>%3$s</div>',
			$class,
			$style,
			$iframe
		);

	}


	/**
	 * Get a bbox arguments for OSM map.
	 *
	 * -7.9302954427418655,56.831693202354835,-7.073361848991865,57.10380640339102
	 * @param $lat
	 * @param $lng
	 * @param $radiusInKm
	 *
	 * @return array
	 */
	public function getBoundingBox( $lat_degrees, $lon_degrees, $distance_in_miles ) {

		$radius = 3963.1; // of earth in miles

		// bearings - FIX
		$due_north = deg2rad( 0 );
		$due_south = deg2rad( 180 );
		$due_east  = deg2rad( 90 );
		$due_west  = deg2rad( 270 );

		// convert latitude and longitude into radians
		$lat_r = deg2rad( $lat_degrees );
		$lon_r = deg2rad( $lon_degrees );

		// find the northmost, southmost, eastmost and westmost corners $distance_in_miles away
		// original formula from
		// http://www.movable-type.co.uk/scripts/latlong.html

		$northmost = asin( sin( $lat_r ) * cos( $distance_in_miles / $radius ) + cos( $lat_r ) * sin( $distance_in_miles / $radius ) * cos( $due_north ) );
		$southmost = asin( sin( $lat_r ) * cos( $distance_in_miles / $radius ) + cos( $lat_r ) * sin( $distance_in_miles / $radius ) * cos( $due_south ) );

		$eastmost = $lon_r + atan2( sin( $due_east ) * sin( $distance_in_miles / $radius ) * cos( $lat_r ), cos( $distance_in_miles / $radius ) - sin( $lat_r ) * sin( $lat_r ) );
		$westmost = $lon_r + atan2( sin( $due_west ) * sin( $distance_in_miles / $radius ) * cos( $lat_r ), cos( $distance_in_miles / $radius ) - sin( $lat_r ) * sin( $lat_r ) );

		$northmost = rad2deg( $northmost );
		$southmost = rad2deg( $southmost );
		$eastmost  = rad2deg( $eastmost );
		$westmost  = rad2deg( $westmost );

		// sort the lat and long so that we can use them for a between query
		if ( $northmost > $southmost ) {
			$lat1 = $southmost;
			$lat2 = $northmost;

		} else {
			$lat1 = $northmost;
			$lat2 = $southmost;
		}

		if ( $eastmost > $westmost ) {
			$lon1 = $westmost;
			$lon2 = $eastmost;

		} else {
			$lon1 = $eastmost;
			$lon2 = $westmost;
		}

		return array( $lon1, $lat1, $lon2, $lat2 );
	}

	public function block_global_js() {
		ob_start();
		if ( false ) {
			?>
		<script>
			<?php
		}
		?>

			function bs_build_heading_html($args) {

				let $html = '';

				$html += $args.text;


				return $html;
			}


		<?php

		return ob_get_clean();
	}

}

// register it.
add_action(
	'widgets_init',
	function () {
		register_widget( 'BlockStrap_Widget_Map' );
	}
);

