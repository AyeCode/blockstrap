<?php

// add admin notice if required plugins not active/installed
add_action( 'admin_notices', 'blockstrap_theme_plugin_suggestions' );

if ( ! function_exists( 'blockstrap_theme_plugin_suggestions' ) ) {
	/**
	 * Suggested plugins.
	 *
	 * @return void
	 */
	function blockstrap_theme_plugin_suggestions() {
		global $blockstrap_admin;

		// Bail if not loaded
		if ( empty( $blockstrap_admin ) ) {
			return;
		}

		$required_plugins_count = $blockstrap_admin->required_plugins_count();

		if ( $required_plugins_count && (!isset($_REQUEST['page']) || ( isset($_REQUEST['page'])) && $_REQUEST['page'] !== 'blockstrap' ) ) {
			$setup_url = add_query_arg(
				array(
					'page' => 'blockstrap',
				),
				admin_url( 'themes.php' )
			);

			printf(
				'<div class="%1$s"><h3 class="h5 font-bold mt-2">%2$s</h3><p>%3$s</p><p><a href="%4$s" class="button button-primary">%5$s</a></p></div>',
				'notice notice-warning is-dismissible',
				esc_attr( __( 'Required Plugins', 'blockstrap' ) ),
				/* translators: The theme active theme name */
				esc_html( sprintf( __( '%s theme requires some plugins for complete functionality', 'blockstrap' ), $blockstrap_admin->get_theme_title() ) ),
				esc_url_raw( $setup_url ),
				esc_html__( 'Setup Theme', 'blockstrap' )
			);
		}

	}
}

