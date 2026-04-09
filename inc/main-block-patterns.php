<?php
/**
 * Main wrapper block patterns
 *
 * These are used for the <main> wrapper blocks.
 *
 * @package BlockStrap
 * @since 1.0.0
 */

/*
 * Register Block Pattern Category.
 */
if (function_exists('register_block_pattern_category')) {
	register_block_pattern_category(
		'blockstrap-page-content',
		array('label' => esc_html__('Page Content', 'blockstrap'))
	);
}

/**
 * Register Block Patterns.
 */
if (function_exists('register_block_pattern')) {


	register_block_pattern(
		'blockstrap/main-home',
		array(
			'title' => esc_html__('Main Home', 'blockstrap'),
			'inserter' => false,
			'content' => apply_filters(
				'blockstrap_pattern_main_home_default',
				'<!-- wp:pattern {"slug":"blockstrap/hero-home-default"} /-->

<!-- wp:pattern {"slug":"blockstrap/feature-home-default"} /-->'
			)
		)
	);
}
