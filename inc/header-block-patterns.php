<?php
/**
 * Header block patterns
 *
 * @package BlockStrap
 * @since 1.2.0
 */

/*
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {
	register_block_pattern_category(
		'site-header',
		array( 'label' => esc_html__( 'Site headers', 'blockstrap' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	register_block_pattern(
		'blockstrap/header-default',
		array(
			'title'      => esc_html__( 'Default Header', 'blockstrap' ),
			'categories' => array( 'site-header' ),
			'content'    => '<!-- wp:blockstrap/blockstrap-widget-skip-links {"content":""} -->
[bs_skip_links text1=\'Skip to main content\'  hash1=\'main\'  text2=\'\'  hash2=\'\'  text3=\'\'  hash3=\'\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-skip-links -->

<!-- wp:blockstrap/blockstrap-widget-navbar {"bg":"dark","bg_color":"#0d1b48","bgtus":true,"container":"navbar-dark","inner_container":"container","mb_lg":"","shadow":"shadow","position":"fixed-top"} -->
[bs_navbar bg=\'dark\'  bg_color=\'#0d1b48\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bgtus=\'true\'  container=\'navbar-dark\'  inner_container=\'container\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'shadow\'  position=\'fixed-top\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\' ]<nav class="navbar navbar-expand-lg bg-dark bg-transparent-until-scroll navbar-dark fixed-top shadow"><div class="wp-block-blockstrap-blockstrap-widget-navbar container"><!-- wp:blockstrap/blockstrap-widget-navbar-brand {"text":"","icon_image":"' . esc_url( get_theme_file_uri( 'assets/images/Blockstrap-white.png' ) ) . '","img_max_width":150,"type":"custom","custom_url":"/","brand_font_size":"h1","brand_font_weight":"font-weight-normal","brand_font_italic":"font-italic","bg_gradient":"linear-gradient(135deg,rgb(34,227,7) 0%,rgb(245,245,245) 100%)","bg_on_text":true,"mb_lg":"","pt_lg":"0","pr_lg":"3","pb_lg":"0","rounded_size":"lg"} -->
[bs_navbar_brand text=\'\'  icon_image=\'' . esc_url( get_theme_file_uri( 'assets/images/Blockstrap-white.png' ) ) . '\'  img_max_width=\'150\'  type=\'custom\'  custom_url=\'/\'  text_color=\'\'  brand_font_size=\'h1\'  brand_font_weight=\'font-weight-normal\'  brand_font_italic=\'font-italic\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgb(34,227,7) 0%,rgb(245,245,245) 100%)\'  bg_on_text=\'true\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'0\'  pr_lg=\'3\'  pb_lg=\'0\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'lg\'  shadow=\'\'  css_class=\'\' ]<a class="navbar-brand d-flex align-items-center pt-0 pr-3 pb-0 rounded-lg" href="/"><img class="" src="' . esc_url( get_theme_file_uri( 'assets/images/Blockstrap-white.png' ) ) . '" style="max-width:150px"/><span class="mb-0 h1 font-weight-normal font-italic"></span></a>[/bs_navbar_brand]
<!-- /wp:blockstrap/blockstrap-widget-navbar-brand -->

<!-- wp:blockstrap/blockstrap-widget-nav {"inside_navbar":"1","ml_lg":"","rounded_size":"lg","width":"w-100"} -->
[bs_nav inside_navbar=\'1\'  flex_direction=\'\'  nav_style=\'\'  nav_fill=\'\'  bg=\'\'  mt=\'\'  mr=\'auto\'  mb=\'\'  ml=\'auto\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'0\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'lg\'  shadow=\'\'  width=\'w-100\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\' ]<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav_1"><span class="navbar-toggler-icon"></span></button><div class="wp-block-blockstrap-blockstrap-widget-nav collapse navbar-collapse" id="navbarNav_1"><ul class="wp-block-blockstrap-blockstrap-widget-nav navbar-nav mr-auto ml-auto mr-lg-0 rounded-lg w-100"><!-- wp:blockstrap/blockstrap-widget-nav-item {"page_id":"70","custom_url":"#about","text":"Home","text_color":"white","ml_lg":"auto","content":"\u003ca href=\u0022#http://localhost\u0022 class=\u0022nav-link text-white\u0022\u003eHome\u003c/a\u003e"} -->
[bs_nav_item type=\'home\'  page_id=\'70\'  post_id=\'\'  custom_url=\'#about\'  text=\'Home\'  icon_class=\'\'  link_type=\'\'  link_size=\'\'  link_bg=\'\'  text_color=\'white\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'auto\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"type":"custom","custom_url":"#about","text":"About","text_color":"white","content":"\u003ca href=\u0022##about\u0022 class=\u0022nav-link text-white\u0022\u003eAbout\u003c/a\u003e"} -->
[bs_nav_item type=\'custom\'  page_id=\'\'  post_id=\'\'  custom_url=\'#about\'  text=\'About\'  icon_class=\'\'  link_type=\'\'  link_size=\'\'  link_bg=\'\'  text_color=\'white\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-dropdown {"text":"Dropdown","link_bg":"success"} -->
[bs_nav_dropdown text=\'Dropdown\'  icon_class=\'\'  link_type=\'\'  link_size=\'\'  link_bg=\'success\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]<li class="wp-block-blockstrap-blockstrap-widget-nav-dropdown nav-item dropdown form-inline"><a class="dropdown-toggle nav-link nav-link text-" href="#" roll="button" data-toggle="dropdown" aria-expanded="false">Dropdown</a><ul class="wp-block-blockstrap-blockstrap-widget-nav-dropdown dropdown-menu"><!-- wp:blockstrap/blockstrap-widget-nav-item {"type":"gd_place","text":"Item","content":"\u003ca href=\u0022#http://localhost/places/\u0022 class=\u0022dropdown-item\u0022\u003eItem\u003c/a\u003e"} -->
[bs_nav_item type=\'gd_place\'  page_id=\'\'  post_id=\'\'  custom_url=\'\'  text=\'Item\'  icon_class=\'\'  link_type=\'\'  link_size=\'\'  link_bg=\'\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"type":"gd_place","text":"Item with icon","icon_class":"fas fa-ship","content":"\u003ca href=\u0022#http://localhost/places/\u0022 class=\u0022dropdown-item\u0022\u003e\u003ci class=\u0022fas fa-ship mr-2\u0022\u003e\u003c/i\u003eItem with icon\u003c/a\u003e"} -->
[bs_nav_item type=\'gd_place\'  page_id=\'\'  post_id=\'\'  custom_url=\'\'  text=\'Item with icon\'  icon_class=\'fas fa-ship\'  link_type=\'\'  link_size=\'\'  link_bg=\'\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item --></ul></li>[/bs_nav_dropdown]
<!-- /wp:blockstrap/blockstrap-widget-nav-dropdown -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"type":"custom","custom_url":"#facebook","icon_class":"fab fa-facebook","link_bg":"outline-light","text_color":"white","mt_lg":"0","mb_lg":"0","pt_lg":"0","pr_lg":"0","pb_lg":"0","pl_lg":"0","content":"\u003ca href=\u0022##facebook\u0022 class=\u0022nav-link text-white\u0022\u003e\u003ci class=\u0022fab fa-facebook\u0022\u003e\u003c/i\u003e\u003c/a\u003e"} -->
[bs_nav_item type=\'custom\'  page_id=\'\'  post_id=\'\'  custom_url=\'#facebook\'  text=\'\'  icon_class=\'fab fa-facebook\'  link_type=\'\'  link_size=\'\'  link_bg=\'outline-light\'  text_color=\'white\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'0\'  mr_lg=\'\'  mb_lg=\'0\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'0\'  pr_lg=\'0\'  pb_lg=\'0\'  pl_lg=\'0\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"type":"custom","custom_url":"#twitter","icon_class":"fab fa-twitter","link_bg":"outline-light","text_color":"white","mt_lg":"0","mb_lg":"0","pt_lg":"0","pr_lg":"0","pb_lg":"0","pl_lg":"0","content":"\u003ca href=\u0022##twitter\u0022 class=\u0022nav-link text-white\u0022\u003e\u003ci class=\u0022fab fa-twitter\u0022\u003e\u003c/i\u003e\u003c/a\u003e"} -->
[bs_nav_item type=\'custom\'  page_id=\'\'  post_id=\'\'  custom_url=\'#twitter\'  text=\'\'  icon_class=\'fab fa-twitter\'  link_type=\'\'  link_size=\'\'  link_bg=\'outline-light\'  text_color=\'white\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'0\'  mr_lg=\'\'  mb_lg=\'0\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'0\'  pr_lg=\'0\'  pb_lg=\'0\'  pl_lg=\'0\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"type":"custom","custom_url":"#instagram","icon_class":"fab fa-instagram","link_bg":"outline-light","text_color":"white","mt_lg":"0","mb_lg":"0","pt_lg":"0","pr_lg":"0","pb_lg":"0","pl_lg":"0","content":"\u003ca href=\u0022##instagram\u0022 class=\u0022nav-link text-white\u0022\u003e\u003ci class=\u0022fab fa-instagram\u0022\u003e\u003c/i\u003e\u003c/a\u003e"} -->
[bs_nav_item type=\'custom\'  page_id=\'\'  post_id=\'\'  custom_url=\'#instagram\'  text=\'\'  icon_class=\'fab fa-instagram\'  link_type=\'\'  link_size=\'\'  link_bg=\'outline-light\'  text_color=\'white\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'0\'  mr_lg=\'\'  mb_lg=\'0\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'0\'  pr_lg=\'0\'  pb_lg=\'0\'  pl_lg=\'0\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"type":"custom","custom_url":"https://wpblockstrap.com/","text":"Buy now","icon_class":"fas fa-shopping-bag","link_type":"btn-round","link_bg":"danger","text_align_lg":"text-lg-right","mt_lg":"0","mb_lg":"0","ml_lg":"3","pt_lg":"0","pr_lg":"0","pb_lg":"0","pl_lg":"0","content":"\u003ca href=\u0022#https://wpblockstrap.com/\u0022 class=\u0022btn btn-round btn-danger\u0022\u003e\u003ci class=\u0022fas fa-shopping-bag mr-2\u0022\u003e\u003c/i\u003eBuy now\u003c/a\u003e"} -->
[bs_nav_item type=\'custom\'  page_id=\'\'  post_id=\'\'  custom_url=\'https://wpblockstrap.com/\'  text=\'Buy now\'  icon_class=\'fas fa-shopping-bag\'  link_type=\'btn-round\'  link_size=\'\'  link_bg=\'danger\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'text-lg-right\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'0\'  mr_lg=\'\'  mb_lg=\'0\'  ml_lg=\'3\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'0\'  pr_lg=\'0\'  pb_lg=\'0\'  pl_lg=\'0\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item --></ul></div>[/bs_nav]
<!-- /wp:blockstrap/blockstrap-widget-nav --></div></nav>[/bs_navbar]
<!-- /wp:blockstrap/blockstrap-widget-navbar -->',
		)
	);

}
