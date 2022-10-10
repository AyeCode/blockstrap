<?php
/**
 * Block styles.
 *
 * @package BlockStrap
 * @since 1.0.0
 */

/**
 * Register block styles
 */
function blockstrap_register_block_styles() {
	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/paragraph',
		array(
			'name'         => 'blockstrap-rounded-corners',
			'label'        => __( 'Rounded corners (Requires background color)', 'blockstrap' ),
			'inline_style' => '
			.is-style-blockstrap-rounded-corners {
				border-radius: 6px;
			}',
		)
	);

//	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
//		'core/template-part',
//		array(
//			'name'  => 'blockstrap-rounded-corners',
//			'label' => __( 'Rounded corners (Requires background color)', 'blockstrap' ),
//		)
//	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/cover',
		array(
			'name'         => 'blockstrap-circular-cover',
			'label'        => __( 'Circular image', 'blockstrap' ),
			'inline_style' => '
			.is-style-blockstrap-circular-cover.wp-block-cover,
			.is-style-blockstrap-circular-cover .wp-block-cover__image-background,
			.is-style-blockstrap-circular-cover.wp-block-cover-image,
			.is-style-blockstrap-circular-cover.wp-block-cover-image:before,
			.is-style-blockstrap-circular-cover.wp-block-cover.has-background-dim:not(.has-background-gradient):before {
				border-radius: 50% !important;
			}',
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/paragraph',
		array(
			'name'         => 'blockstrap-box-shadow',
			'label'        => __( 'Box shadow', 'blockstrap' ),
			'inline_style' => '
			.is-style-blockstrap-box-shadow {
				padding: 1.25em 2.375em;
				border-radius: 2px;
				box-shadow: 0 2px 5px rgb(0 0 0 / 2%), 0 4px 10px rgb(0 0 0 / 4%);
			}',
		)
	);

//	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
//		'core/template-part',
//		array(
//			'name'         => 'blockstrap-box-shadow-no-padding',
//			'label'        => __( 'Box shadow', 'blockstrap' ),
//			'inline_style' => '
//			.is-style-blockstrap-box-shadow-no-padding {
//				border-radius: 2px;
//				box-shadow: 0 2px 5px rgb(0 0 0 / 2%), 0 4px 10px rgb(0 0 0 / 4%);
//			}',
//		)
//	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/group',
		array(
			'name'  => 'blockstrap-box-shadow',
			'label' => __( 'Box shadow', 'blockstrap' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/column',
		array(
			'name'  => 'blockstrap-box-shadow',
			'label' => __( 'Box shadow', 'blockstrap' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/columns',
		array(
			'name'  => 'blockstrap-box-shadow',
			'label' => __( 'Box shadow', 'blockstrap' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/paragraph',
		array(
			'name'         => 'blockstrap-border',
			'label'        => __( 'Border', 'blockstrap' ),
			'inline_style' => '
			.is-style-blockstrap-border {
				border: 2px solid currentColor;
				padding: 0.5rem;
			}',
		)
	);

//	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
//		'core/template-part',
//		array(
//			'name'  => 'blockstrap-border',
//			'label' => __( 'Border', 'blockstrap' ),
//		)
//	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/heading',
		array(
			'name'         => 'blockstrap-top-bottom-border',
			'label'        => __( 'Top and bottom border', 'blockstrap' ),
			'inline_style' => '
			.is-style-blockstrap-top-bottom-border {
				border-top: 2px solid currentColor;
				border-bottom: 2px solid currentColor;
			}',
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/post-title',
		array(
			'name'  => 'blockstrap-top-bottom-border',
			'label' => __( 'Top and bottom border', 'blockstrap' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/site-title',
		array(
			'name'  => 'blockstrap-top-bottom-border',
			'label' => __( 'Top and bottom border', 'blockstrap' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/post-title',
		array(
			'name'         => 'blockstrap-vertical-text',
			'label'        => __( 'Vertical', 'blockstrap' ),
			'inline_style' => '
			.is-style-blockstrap-vertical-text {
				writing-mode: vertical-lr;
			}',
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/site-title',
		array(
			'name'  => 'blockstrap-vertical-text',
			'label' => __( 'Vertical', 'blockstrap' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/heading',
		array(
			'name'  => 'blockstrap-vertical-text',
			'label' => __( 'Vertical', 'blockstrap' ),

		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/paragraph',
		array(
			'name'  => 'blockstrap-vertical-text',
			'label' => __( 'Vertical', 'blockstrap' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/column',
		array(
			'name'         => 'blockstrap-column-border',
			'label'        => __( 'Inner borders', 'blockstrap' ),
			'inline_style' => '
			.is-style-blockstrap-column-border {
				border: 1px solid currentColor;
				padding: 1.25em 2.375em;
			}',
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/columns',
		array(
			'name'         => 'blockstrap-columns-border',
			'label'        => __( 'Border', 'blockstrap' ),
			'inline_style' => '
			.is-style-blockstrap-columns-border {
				border: 1px solid currentColor;
			}',
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/column',
		array(
			'name'         => 'blockstrap-column-r-l-borders',
			'label'        => __( 'Right and left borders', 'blockstrap' ),
			'inline_style' => '
			.is-style-blockstrap-column-r-l-borders {
				border-left: 1px solid currentColor;
				border-right: 1px solid currentColor;
				padding: 1.25em 2.375em;
			}',
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/media-text',
		array(
			'name'         => 'blockstrap-skewed',
			'label'        => __( 'Skewed', 'blockstrap' ),
			'inline_style' => '
			.is-style-blockstrap-skewed {
				transform: rotate(-0.8deg);
			}',
		)
	);

//	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
//		'core/post-title',
//		array(
//			'name'  => 'blockstrap-skewed',
//			'label' => __( 'Skewed', 'blockstrap' ),
//		)
//	);

//	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
//		'core/heading',
//		array(
//			'name'  => 'blockstrap-skewed',
//			'label' => __( 'Skewed', 'blockstrap' ),
//		)
//	);

//	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
//		'core/template-part',
//		array(
//			'name'  => 'blockstrap-sticky-header',
//			'label' => __( 'Sticky header', 'blockstrap' ),
//		)
//	);

//	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
//		'geodirectory/geodir-widget-search',
//		array(
//			'name'  => 'blockstrap-sticky-header',
//			'label' => __( 'Sticky header', 'blockstrap' ),
//			'is_default'   => true,
//		)
//	);
}
add_action( 'init', 'blockstrap_register_block_styles' );
