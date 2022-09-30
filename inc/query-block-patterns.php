<?php
/**
 * Block patterns
 *
 * @package BlockStrap
 * @since 1.2.2
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {
	register_block_pattern_category(
		'blog',
		array( 'label' => esc_html__( 'Blog / post list', 'blockstrap' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'blockstrap/query-one',
		array(
			'title'      => esc_html__( 'Posts in a 3 column grid with post meta, author and excerpt', 'blockstrap' ),
			'categories' => array( 'query', 'blog' ),
			'blockTypes' => array( 'core/query' ),
			'content'    => '
			<!-- wp:query {"queryId":1,"query":{"pages":"100","offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","sticky":"","exclude":[],"perPage":6,"inherit":true},"displayLayout":{"type":"flex","columns":3},"align":"wide"} --><div class="wp-block-query alignwide">
			<!-- wp:post-template -->
			<!-- wp:post-title {"isLink":true,"fontSize":"large"} /-->
			<!-- wp:group {"className":"is-style-blockstrap-box-shadow post-meta","backgroundColor":"light-grey"} -->
			<div class="wp-block-group is-style-blockstrap-box-shadow post-meta has-light-grey-background-color has-background">
				<!-- wp:post-date /-->
				<!-- wp:post-terms {"term":"category"} /-->
				<!-- wp:spacer {"height":20} -->
				<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- /wp:spacer -->
				<!-- wp:post-author /-->
				<!-- wp:post-terms {"term":"post_tag","style":{"spacing":{"padding":{"top":"2em"}}}} /-->
			</div><!-- /wp:group -->
			<!-- wp:spacer {"height":30} -->
			<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->
			<!-- wp:post-excerpt {"wordCount":19,"moreText":"Continue reading"} /-->
			<!-- wp:spacer {"height":20} -->
			<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->
			<!-- /wp:post-template -->
			<!-- wp:query-pagination -->
			<div class="wp-block-query-pagination">
				<!-- wp:query-pagination-previous /-->
				<!-- wp:query-pagination-next /-->
			</div>
			<!-- /wp:query-pagination --></div>
			<!-- /wp:query -->
		',
		)
	);

}
