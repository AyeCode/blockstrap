<?php
/**
 * Block patterns
 *
 * @package BlockStrap
 * @since 1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {
	register_block_pattern_category(
		'elements',
		array( 'label' => esc_html__( 'Design elements', 'blockstrap' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'blockstrap/media-overlap',
		array(
			'title'      => esc_html__( 'Overlapping Media and Text', 'blockstrap' ),
			'categories' => array( 'elements' ),
			'content'    => '
			<!-- wp:media-text {"mediaPosition":"right","mediaId":1932,"mediaType":"image","verticalAlignment":"top","imageFill":false} -->
			<div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-top"><figure class="wp-block-media-text__media">
			<img src="' . esc_url( get_theme_file_uri( 'assets/images/placeholder.png' ) ) . '"	alt="" class="wp-image-1932 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:spacer -->
			<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->
			<!-- wp:paragraph {"placeholder":"Content…","fontSize":"large"} -->
			<p class="has-large-font-size"><strong>' . esc_html_x( 'This text was added to show how you can create designs using block patterns.', 'sample content', 'blockstrap' ) . '</strong></p>
			<!-- /wp:paragraph -->
			<!-- wp:group {"backgroundColor":"black","textColor":"white","className":"is-style-blockstrap-media-overlap"} -->
			<div class="wp-block-group is-style-blockstrap-media-overlap has-white-color has-black-background-color has-text-color has-background">
			<!-- wp:heading {"textColor":"white"} --><h2 class="has-white-color has-text-color">Heading</h2><!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>' . esc_html_x( 'Sample content. Replace the text with your own content.', 'sample content', 'blockstrap' ) . '</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:group --></div></div>
			<!-- /wp:media-text -->
		',
		)
	);

}
