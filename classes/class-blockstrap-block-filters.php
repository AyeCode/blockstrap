<?php
/**
 * Block filters to change the appearance of some core blocks.
 *
 * @package BlockStrap
 * @since 1.0.0
 */

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
		add_filter( 'render_block', array( $this, 'post_template' ), 10, 2 );
	}

	public function post_template( $block_content, $block ) {

		if ( 'core/post-templateZZZ' === $block['blockName'] ) {

			//          print_r( $block );
			$block_content = str_replace(
				array(
					'wp-block-post-template',
					'wp-block-post ',
				),
				array(
					'row list-unstyled row-cols-1 row-cols-sm-2  row-cols-md-3',
					'wp-block-post col mb-4 ',
				),
				$block_content
			);
		}

		if ( 'core/query' === $block['blockName'] ) {
			$columns  = isset( $block['attrs']['displayLayout']['columns'] ) ? absint( $block['attrs']['displayLayout']['columns'] ) : 1;
			$colCount = isset( $block['attrs']['displayLayout']['type'] ) && $block['attrs']['displayLayout']['type'] === 'flex' ? $columns : 1;
			$colMd    = ' row-cols-md-' . $colCount;
			$colSm    = ' row-cols-sm-' . $colCount > 1 ? ( $colCount - 1 ) : $colCount;
			$rowClass = ' row list-unstyled row-cols-1 ' . $colSm . $colMd;

			$block_content = str_replace(
				array(
					'wp-block-post-template',
					'wp-block-post ',
				),
				array(
					'row list-unstyled row-cols-1' . $rowClass,
					'wp-block-post col mb-4 ',
				),
				$block_content
			);
		}

		return $block_content;
	}


}

new BlockStrap_Block_Filters();
