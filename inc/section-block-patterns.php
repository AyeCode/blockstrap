<?php
/**
 * Feature block patterns
 *
 * @package BlockStrap
 * @since 1.2.0
 */

/*
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {
	register_block_pattern_category(
		'feature-sections',
		array( 'label' => esc_html__( 'Feature Sections', 'blockstrap' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	register_block_pattern(
		'blockstrap/feature-home-default',
		array(
			'title'      => esc_html__( 'Hero home', 'blockstrap' ),
			'categories' => array( 'feature-sections' ),
			'content'    => defined( 'BLOCKSTRAP_BLOCKS_VERSION' ) ? apply_filters(
				'bs_pattern_feature_home_default',
				''
			) : '<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="wp-block-group"><!-- wp:paragraph -->
<p>' . __( 'This theme word best with the BlockStrap Page Builder Plugin (coming soon).', 'blockstrap' ) . '</p>
<!-- /wp:paragraph --></main>
<!-- /wp:group -->',
		)
	);

}
