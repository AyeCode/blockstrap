<?php
/**
 * Theme support
 *
 * @package BlockStrap
 * @since 1.0.0
 */

namespace BlockStrap;

/**
 * Add theme support
 *
 * @since 1.0.0
 */
class BlockStrap_Block_Filters {

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		add_filter( 'render_block', array($this,'post_template'), 10, 2 );
	}

	public function post_template( $block_content, $block ){

		if ( $block['blockName'] === 'core/post-template' ) {
			$block_content = str_replace(
				array(
					'wp-block-post-template',
					'wp-block-post ',
				),
				array(
					'row list-unstyled row-cols-1 row-cols-sm-2  row-cols-md-3',
					'wp-block-post col mb-4 ',
				),
				$block_content);
		}

		return $block_content;
	}


}

new BlockStrap_Block_Filters();
