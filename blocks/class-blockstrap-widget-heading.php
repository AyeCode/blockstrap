<?php

class BlockStrap_Widget_Heading extends WP_Super_Duper {


	public $arguments;

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$options = array(
			'textdomain'        => 'blockstrap',
			'output_types'      => array( 'block', 'shortcode' ),
			'block-icon'        => 'fas fa-heading',
			'block-category'    => 'layout',
			'block-keywords'    => "['heading','title','text']",
			'block-supports'    => array(
				'customClassName' => false,
			),

			'block-edit-return' => "wp.element.createElement(wp.blockEditor.RichText, Object.assign(wp.blockEditor.useBlockProps({className: sd_build_aui_class(props.attributes)}), {
                tagName: props.attributes.html_tag ? props.attributes.html_tag : 'h1',
                value: props.attributes.text,
                style: sd_build_aui_styles(props.attributes),
              //  allowedFormats: ['core/bold', 'core/italic'], // Allow the content to be made bold or italic, but do not allow other formatting options
                onChange: function (text) {
                    props.setAttributes({text: text}); // Store updated content as a block attribute
                },
                placeholder: __('Heading...'),
            }))",
			'block-save-return' => "wp.element.createElement( wp.blockEditor.RichText.Content, Object.assign( wp.blockEditor.useBlockProps.save({className: sd_build_aui_class(props.attributes)}), {
             tagName: props.attributes.html_tag ? props.attributes.html_tag : 'h1',
                value: props.attributes.text,
                style: sd_build_aui_styles(props.attributes),
            value: props.attributes.text
        } ) )",
			'block-wrap'        => '',
			'class_name'        => __CLASS__,
			'base_id'           => 'bs_heading',
			'name'              => __( 'BS > Heading', 'blockstrap' ),
			'widget_ops'        => array(
				'classname'   => 'bs-heading',
				'description' => esc_html__( 'A heading element', 'blockstrap' ),
			),
			'example'           => array(
				'attributes' => array(
					'after_text' => 'Earth',
				),
			),
			'no_wrap'           => true,
			'block_group_tabs'  => array(
				'content'  => array(
					'groups' => array( __( 'Title', 'blockstrap' ) ),
					'tab'    => array(
						'title'     => __( 'Content', 'blockstrap' ),
						'key'       => 'bs_tab_content',
						'tabs_open' => true,
						'open'      => true,
						'class'     => 'text-center flex-fill d-flex justify-content-center',
					),
				),
				'styles'   => array(
					'groups' => array( __( 'Typography', 'blockstrap' ) ),
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

		$arguments['text'] = array(
			'type'        => 'textarea',
			'title'       => __( 'Title', 'blockstrap' ),
			'placeholder' => __( 'Enter you title!', 'blockstrap' ),
			'default'     => __( 'Add Your Heading Text', 'blockstrap' ),
			'desc_tip'    => true,
			'group'       => __( 'Title', 'blockstrap' ),
		);

		$arguments['html_tag'] = array(
			'type'     => 'select',
			'title'    => __( 'HTML tag', 'blockstrap' ),
			'options'  => array(
				'h1'   => 'h1',
				'h2'   => 'h2',
				'h3'   => 'h3',
				'h4'   => 'h4',
				'h5'   => 'h5',
				'h6'   => 'h6',
				'span' => 'span',
				'div'  => 'div',
				'p'    => 'p',
			),
			'default'  => '',
			'desc_tip' => true,
			'group'    => __( 'Title', 'blockstrap' ),
		);

		// text color
		$arguments = $arguments + sd_get_text_color_input_group();

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

		// background
		$arguments = $arguments + sd_get_background_inputs( 'bg', array( 'group' => __( 'Wrapper Styles', 'blockstrap' ) ), array( 'group' => __( 'Wrapper Styles', 'blockstrap' ) ), array( 'group' => __( 'Wrapper Styles', 'blockstrap' ) ), false );

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

		$arguments['className'] = array(
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

		return $content;

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
		register_widget( 'BlockStrap_Widget_Heading' );
	}
);

