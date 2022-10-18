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
			'block-icon'     => 'fas fa-bars',
			'block-category' => 'layout',
			'block-keywords' => "['nav','navbar']",
			'block-output'   => array(
				array(
					'element'   => 'nav',
					'className' => 'navbar navbar-expand-lg [%WrapClass%]',
					'style'     => '{[%WrapStyle%]}',
					array(
						'element'          => 'innerBlocksProps',
						'inner_element'    => 'div',
						'blockProps'       => array(
							'className' => '[%inner_container%]',
						),
						'innerBlocksProps' => array(
							'orientation' => 'horizontal',
						),
					),
				),

			),
			'block-wrap'     => '',
			'class_name'     => __CLASS__,
			'base_id'        => 'bs_navbar',
			'name'           => __( 'BS > Navbar', 'blockstrap' ),
			'widget_ops'     => array(
				'classname'   => 'bd-navbar',
				'description' => esc_html__( 'Navbar container, this holds the nav and navbar brand.', 'blockstrap' ),
			),
			'example'        => array(
				'attributes' => array(
					'after_text' => 'Earth',
				),
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

		$arguments = $arguments + sd_get_background_inputs( 'bg' );

		// transparent until scroll
		$arguments['bgtus'] = array(
			'type'     => 'checkbox',
			'title'    => __( 'Transparent until scroll', 'blockstrap' ),
			'default'  => '',
			'value'    => '1',
			'desc_tip' => false,
			'desc'     => __( 'This may not show in block preview.', 'blockstrap' ),
			'group'    => __( 'Background', 'blockstrap' ),
			'element_require' => '[%bg_color%]!="" || [%bg_image%]!=""',
		);

		// container class
		$arguments['container'] = array(
			'type'     => 'select',
			'title'    => __( 'Color scheme', 'blockstrap' ),
			'options'  => array(
				''             => __( 'None', 'blockstrap' ),
				'navbar-dark'  => __( 'Dark', 'blockstrap' ),
				'navbar-light' => __( 'Light', 'blockstrap' ),
			),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Color scheme', 'blockstrap' ),
		);

		// container class
		$arguments['inner_container'] = array(
			'type'     => 'select',
			'title'    => __( 'Content Container', 'blockstrap' ),
			'options'  => array(
				'd-flex w-100' => __( 'Full width', 'blockstrap' ),
				'container'    => __( 'Contain', 'blockstrap' ),
			),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Content Container', 'blockstrap' ),
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
		$arguments['position'] = sd_get_position_class_input(
			'position',
			array(
				'options' => array(
					''             => __( 'Default', 'blockstrap' ),
					'fixed-top'    => __( 'Fixed top', 'blockstrap' ),
					'fixed-bottom' => __( 'Fixed bottom', 'blockstrap' ),
					'sticky-top'   => __( 'Sticky top', 'blockstrap' ),
				),
			)
		);

		$arguments['sticky_offset_top']    = sd_get_sticky_offset_input( 'top' );
		$arguments['sticky_offset_bottom'] = sd_get_sticky_offset_input( 'bottom' );

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
		} elseif ( strpos( $content, 'class="wp-block-' ) !== false ) {//block
			return $content;
		} else {
			$wrap_class = sd_build_aui_class( $args );
			return '<section class="' . $wrap_class . '">' . $content . '</section>'; // shortcode
		}

	}

}

// register it.
add_action(
	'widgets_init',
	function () {
		register_widget( 'BlockStrap_Widget_Navbar' );
	}
);

