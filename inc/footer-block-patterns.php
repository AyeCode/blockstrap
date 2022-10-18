<?php
/**
 * Block patterns
 *
 * @package BlockStrap
 * @since 1.2.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {
	register_block_pattern_category(
		'site-footer',
		array( 'label' => esc_html__( 'Site footers', 'blockstrap' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	register_block_pattern(
		'blockstrap/footer-default',
		array(
			'title'      => esc_html__( 'Default Footer', 'blockstrap' ),
			'categories' => array( 'site-footer' ),
			'content'    => '<!-- wp:blockstrap/blockstrap-widget-container {"container":"container-fluid","bg":"custom-color","bg_color":"#352e35","mb_lg":"0","pt_lg":"5","position":"position-relative","anchor":"footer","className":"block-1618467995"} -->
[bs_container container=\'container-fluid\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'\'  col_md=\'\'  col_lg=\'\'  bg=\'custom-color\'  bg_color=\'#352e35\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'false\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'0\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'5\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'position-relative\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  flex_align_items=\'\'  flex_align_items_md=\'\'  flex_align_items_lg=\'\'  flex_justify_content=\'\'  flex_justify_content_md=\'\'  flex_justify_content_lg=\'\'  flex_align_self=\'\'  flex_align_self_md=\'\'  flex_align_self_lg=\'\'  flex_order=\'\'  flex_order_md=\'\'  flex_order_lg=\'\'  anchor=\'footer\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 mb-lg-0 pt-5 bg-custom-color container-fluid position-relative" style="background-color:#352e35" id="footer"><!-- wp:blockstrap/blockstrap-widget-shape-divider {"sd":"curve","sd_color":"white","sd_width":"138","sd_height":"86","styleid":"block-gwgv5jfy4g"} -->
[bs_shape_divider sd=\'curve\'  sd_position=\'\'  sd_color=\'white\'  sd_custom_color=\'#0073aa\'  sd_width=\'138\'  sd_height=\'86\'  sd_flip=\'false\'  sd_invert=\'false\'  sd_btf=\'false\'  styleid=\'block-gwgv5jfy4g\' ]<div class="wp-block-blockstrap-blockstrap-widget-shape-divider block-gwgv5jfy4g blockstrap-shape blockstrap-shape- position-absolute"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">    <path class="bg-white blockstrap-shape-fill" d="M1000,4.3V0H0v4.3C0.9,23.1,126.7,99.2,500,100S1000,22.7,1000,4.3z"/></svg></div><style>.block-gwgv5jfy4g { pointer-events: none;background-repeat: no-repeat;left: -1px;right: -1px;top: -1px;line-height: 0;overflow: hidden;}.block-gwgv5jfy4g svg{ height: 86px;width: calc(138% + 1.3px);left: 50%;position: relative;display: block;-webkit-transform: translateX(-50%); -ms-transform: translateX(-50%); transform: translateX(-50%);}.block-gwgv5jfy4g svg path{ }</style>[/bs_shape_divider]
<!-- /wp:blockstrap/blockstrap-widget-shape-divider -->

<!-- wp:blockstrap/blockstrap-widget-container {"mb_lg":"","pt_lg":"5","className":"block-1618467995"} -->
[bs_container container=\'container\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'\'  col_md=\'\'  col_lg=\'\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'false\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'5\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  flex_align_items=\'\'  flex_align_items_md=\'\'  flex_align_items_lg=\'\'  flex_justify_content=\'\'  flex_justify_content_md=\'\'  flex_justify_content_lg=\'\'  flex_align_self=\'\'  flex_align_self_md=\'\'  flex_align_self_lg=\'\'  flex_order=\'\'  flex_order_md=\'\'  flex_order_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 pt-5 container"><!-- wp:blockstrap/blockstrap-widget-container {"container":"row","pt_lg":"5","position":"position-relative","className":"block-1618467995"} -->
[bs_container container=\'row\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'\'  col_md=\'\'  col_lg=\'\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'false\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'3\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'5\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'position-relative\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  flex_align_items=\'\'  flex_align_items_md=\'\'  flex_align_items_lg=\'\'  flex_justify_content=\'\'  flex_justify_content_md=\'\'  flex_justify_content_lg=\'\'  flex_align_self=\'\'  flex_align_self_md=\'\'  flex_align_self_lg=\'\'  flex_order=\'\'  flex_order_md=\'\'  flex_order_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 mb-lg-3 pt-5 row position-relative"><!-- wp:blockstrap/blockstrap-widget-container {"container":"col","col":"12","col_md":"6","col_lg":"3","bg_on_text":true,"text_color":"white","mt_lg":"n2","className":"block-1618467995"} -->
[bs_container container=\'col\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'12\'  col_md=\'6\'  col_lg=\'3\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'true\'  text_color=\'white\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'n2\'  mr_lg=\'\'  mb_lg=\'3\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  flex_align_items=\'\'  flex_align_items_md=\'\'  flex_align_items_lg=\'\'  flex_justify_content=\'\'  flex_justify_content_md=\'\'  flex_justify_content_lg=\'\'  flex_align_self=\'\'  flex_align_self_md=\'\'  flex_align_self_lg=\'\'  flex_order=\'\'  flex_order_md=\'\'  flex_order_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 mt-n2 mb-lg-3 col-12 col-md-6 col-lg-3 text-white col"><!-- wp:heading {"textColor":"white","className":"is-style-default"} -->
<h2 class="is-style-default has-white-color has-text-color">BlockStrap</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray","className":"mt-3"} -->
<p class="mt-3 has-gray-color has-text-color">Combining the power of the block editor with bootstrap.</p>
<!-- /wp:paragraph --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container -->

<!-- wp:blockstrap/blockstrap-widget-container {"container":"col","col":"12","col_md":"6","col_lg":"3","text_color":"white","content":"","className":"block-1618467995"} -->
[bs_container container=\'col\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'12\'  col_md=\'6\'  col_lg=\'3\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'false\'  text_color=\'white\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'3\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  flex_align_items=\'\'  flex_align_items_md=\'\'  flex_align_items_lg=\'\'  flex_justify_content=\'\'  flex_justify_content_md=\'\'  flex_justify_content_lg=\'\'  flex_align_self=\'\'  flex_align_self_md=\'\'  flex_align_self_lg=\'\'  flex_order=\'\'  flex_order_md=\'\'  flex_order_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 mb-lg-3 col-12 col-md-6 col-lg-3 text-white col"><!-- wp:heading {"style":{"typography":{"fontSize":"1.3rem"}},"textColor":"white"} -->
<h2 class="has-white-color has-text-color" style="font-size:1.3rem">AyeCode Ltd</h2>
<!-- /wp:heading -->

<!-- wp:blockstrap/blockstrap-widget-nav {"inside_navbar":"0","flex_direction":"flex-column","mr_lg":"","ml_lg":"n3","pl_lg":"0"} -->
[bs_nav inside_navbar=\'0\'  flex_direction=\'flex-column\'  nav_style=\'\'  nav_fill=\'\'  bg=\'\'  mt=\'\'  mr=\'auto\'  mb=\'\'  ml=\'auto\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'n3\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'0\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  width=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-nav" id="navbarNav_1"><ul class="wp-block-blockstrap-blockstrap-widget-nav nav mr-auto ml-auto ml-lg-n3 pl-0 flex-column"><!-- wp:blockstrap/blockstrap-widget-nav-item {"text":"Blog","link_bg":"gray","text_color":"gray","ml_lg":"0","pl_lg":"0","content":"\u003ca href=\u0022#http://localhost\u0022 class=\u0022nav-link text-gray\u0022\u003eBlog\u003c/a\u003e"} -->
[bs_nav_item type=\'home\'  page_id=\'\'  post_id=\'\'  custom_url=\'\'  text=\'Blog\'  icon_class=\'\'  link_type=\'\'  link_size=\'\'  link_bg=\'gray\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'0\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'0\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"text":"Products","link_bg":"gray","text_color":"gray","content":""} -->
[bs_nav_item type=\'home\'  page_id=\'\'  post_id=\'\'  custom_url=\'\'  text=\'Products\'  icon_class=\'\'  link_type=\'\'  link_size=\'\'  link_bg=\'gray\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"text":"About us","text_color":"gray","content":""} -->
[bs_nav_item type=\'home\'  page_id=\'\'  post_id=\'\'  custom_url=\'\'  text=\'About us\'  icon_class=\'\'  link_type=\'\'  link_size=\'\'  link_bg=\'\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"text":"Contact us","text_color":"gray","content":""} -->
[bs_nav_item type=\'home\'  page_id=\'\'  post_id=\'\'  custom_url=\'\'  text=\'Contact us\'  icon_class=\'\'  link_type=\'\'  link_size=\'\'  link_bg=\'\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item --></ul></div>[/bs_nav]
<!-- /wp:blockstrap/blockstrap-widget-nav --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container -->

<!-- wp:blockstrap/blockstrap-widget-container {"container":"col","col":"12","col_md":"6","col_lg":"3","text_color":"white","content":"","className":"block-1618467995"} -->
[bs_container container=\'col\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'12\'  col_md=\'6\'  col_lg=\'3\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'false\'  text_color=\'white\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'3\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  flex_align_items=\'\'  flex_align_items_md=\'\'  flex_align_items_lg=\'\'  flex_justify_content=\'\'  flex_justify_content_md=\'\'  flex_justify_content_lg=\'\'  flex_align_self=\'\'  flex_align_self_md=\'\'  flex_align_self_lg=\'\'  flex_order=\'\'  flex_order_md=\'\'  flex_order_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 mb-lg-3 col-12 col-md-6 col-lg-3 text-white col"><!-- wp:heading {"style":{"typography":{"fontSize":"1.3rem"}},"textColor":"white"} -->
<h2 class="has-white-color has-text-color" style="font-size:1.3rem">Other</h2>
<!-- /wp:heading -->

<!-- wp:blockstrap/blockstrap-widget-nav {"inside_navbar":"0","flex_direction":"flex-column","mr_lg":"","ml_lg":"n3","pl_lg":"0"} -->
[bs_nav inside_navbar=\'0\'  flex_direction=\'flex-column\'  nav_style=\'\'  nav_fill=\'\'  bg=\'\'  mt=\'\'  mr=\'auto\'  mb=\'\'  ml=\'auto\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'n3\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'0\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  width=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-nav" id="navbarNav_1"><ul class="wp-block-blockstrap-blockstrap-widget-nav nav mr-auto ml-auto ml-lg-n3 pl-0 flex-column"><!-- wp:blockstrap/blockstrap-widget-nav-item {"text":"Documentation","text_color":"gray","ml_lg":"0","pl_lg":"0","content":""} -->
[bs_nav_item type=\'home\'  page_id=\'\'  post_id=\'\'  custom_url=\'\'  text=\'Documentation\'  icon_class=\'\'  link_type=\'\'  link_size=\'\'  link_bg=\'\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'0\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'0\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"text":"Changelog","text_color":"gray","content":""} -->
[bs_nav_item type=\'home\'  page_id=\'\'  post_id=\'\'  custom_url=\'\'  text=\'Changelog\'  icon_class=\'\'  link_type=\'\'  link_size=\'\'  link_bg=\'\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"text":"Support","text_color":"gray","content":""} -->
[bs_nav_item type=\'home\'  page_id=\'\'  post_id=\'\'  custom_url=\'\'  text=\'Support\'  icon_class=\'\'  link_type=\'\'  link_size=\'\'  link_bg=\'\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"text":"License","text_color":"gray","content":""} -->
[bs_nav_item type=\'home\'  page_id=\'\'  post_id=\'\'  custom_url=\'\'  text=\'License\'  icon_class=\'\'  link_type=\'\'  link_size=\'\'  link_bg=\'\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item --></ul></div>[/bs_nav]
<!-- /wp:blockstrap/blockstrap-widget-nav --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container -->

<!-- wp:blockstrap/blockstrap-widget-container {"container":"col","col":"12","col_md":"6","col_lg":"3","text_color":"white","content":"","className":"block-1618467995"} -->
[bs_container container=\'col\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'12\'  col_md=\'6\'  col_lg=\'3\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'false\'  text_color=\'white\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'3\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  flex_align_items=\'\'  flex_align_items_md=\'\'  flex_align_items_lg=\'\'  flex_justify_content=\'\'  flex_justify_content_md=\'\'  flex_justify_content_lg=\'\'  flex_align_self=\'\'  flex_align_self_md=\'\'  flex_align_self_lg=\'\'  flex_order=\'\'  flex_order_md=\'\'  flex_order_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 mb-lg-3 col-12 col-md-6 col-lg-3 text-white col"><!-- wp:heading {"style":{"typography":{"fontSize":"1.3rem"}},"textColor":"white"} -->
<h2 class="has-white-color has-text-color" style="font-size:1.3rem">Get in touch</h2>
<!-- /wp:heading -->

<!-- wp:blockstrap/blockstrap-widget-nav {"inside_navbar":"0","flex_direction":"flex-column","ml_lg":"n3","pl_lg":"0"} -->
[bs_nav inside_navbar=\'0\'  flex_direction=\'flex-column\'  nav_style=\'\'  nav_fill=\'\'  bg=\'\'  mt=\'\'  mr=\'auto\'  mb=\'\'  ml=\'auto\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'0\'  mb_lg=\'\'  ml_lg=\'n3\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'0\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  width=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-nav" id="navbarNav_1"><ul class="wp-block-blockstrap-blockstrap-widget-nav nav mr-auto ml-auto mr-lg-0 ml-lg-n3 pl-0 flex-column"><!-- wp:blockstrap/blockstrap-widget-nav-item {"text":"info@ayecode.io","icon_class":"far fa-envelope","link_bg":"white","text_color":"gray","content":""} -->
[bs_nav_item type=\'home\'  page_id=\'\'  post_id=\'\'  custom_url=\'\'  text=\'info@ayecode.io\'  icon_class=\'far fa-envelope\'  link_type=\'\'  link_size=\'\'  link_bg=\'white\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"text":"+44 1010101010","icon_class":"fas fa-mobile-alt","link_bg":"white","text_color":"gray","content":""} -->
[bs_nav_item type=\'home\'  page_id=\'\'  post_id=\'\'  custom_url=\'\'  text=\'+44 1010101010\'  icon_class=\'fas fa-mobile-alt\'  link_type=\'\'  link_size=\'\'  link_bg=\'white\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item --></ul></div>[/bs_nav]
<!-- /wp:blockstrap/blockstrap-widget-nav -->

<!-- wp:blockstrap/blockstrap-widget-nav {"inside_navbar":"0","ml_lg":"n3"} -->
[bs_nav inside_navbar=\'0\'  flex_direction=\'\'  nav_style=\'\'  nav_fill=\'\'  bg=\'\'  mt=\'\'  mr=\'auto\'  mb=\'\'  ml=\'auto\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'0\'  mb_lg=\'\'  ml_lg=\'n3\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  width=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-nav" id="navbarNav_1"><ul class="wp-block-blockstrap-blockstrap-widget-nav nav mr-auto ml-auto mr-lg-0 ml-lg-n3"><!-- wp:blockstrap/blockstrap-widget-nav-item {"type":"custom","custom_url":"#facebook","icon_class":"fab fa-facebook","link_bg":"white","text_color":"gray","content":""} -->
[bs_nav_item type=\'custom\'  page_id=\'\'  post_id=\'\'  custom_url=\'#facebook\'  text=\'\'  icon_class=\'fab fa-facebook\'  link_type=\'\'  link_size=\'\'  link_bg=\'white\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"type":"custom","custom_url":"#twriiter","icon_class":"fab fa-twitter","link_bg":"white","text_color":"gray","content":""} -->
[bs_nav_item type=\'custom\'  page_id=\'\'  post_id=\'\'  custom_url=\'#twriiter\'  text=\'\'  icon_class=\'fab fa-twitter\'  link_type=\'\'  link_size=\'\'  link_bg=\'white\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"type":"custom","custom_url":"#instagram","icon_class":"fab fa-instagram","link_bg":"white","text_color":"gray","content":""} -->
[bs_nav_item type=\'custom\'  page_id=\'\'  post_id=\'\'  custom_url=\'#instagram\'  text=\'\'  icon_class=\'fab fa-instagram\'  link_type=\'\'  link_size=\'\'  link_bg=\'white\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"type":"custom","custom_url":"#wordpress","icon_class":"fab fa-wordpress-simple","link_bg":"white","text_color":"gray","content":""} -->
[bs_nav_item type=\'custom\'  page_id=\'\'  post_id=\'\'  custom_url=\'#wordpress\'  text=\'\'  icon_class=\'fab fa-wordpress-simple\'  link_type=\'\'  link_size=\'\'  link_bg=\'white\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item -->

<!-- wp:blockstrap/blockstrap-widget-nav-item {"type":"custom","custom_url":"#github","icon_class":"fab fa-github","link_bg":"white","text_color":"gray","content":""} -->
[bs_nav_item type=\'custom\'  page_id=\'\'  post_id=\'\'  custom_url=\'#github\'  text=\'\'  icon_class=\'fab fa-github\'  link_type=\'\'  link_size=\'\'  link_bg=\'white\'  text_color=\'gray\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-nav-item --></ul></div>[/bs_nav]
<!-- /wp:blockstrap/blockstrap-widget-nav --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container -->

<!-- wp:blockstrap/blockstrap-widget-container {"container":"row","mt_lg":"1","mb_lg":"","pt_lg":"4","className":"border-top border-gray-dark"} -->
[bs_container container=\'row\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'\'  col_md=\'\'  col_lg=\'\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'false\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'1\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'4\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  flex_align_items=\'\'  flex_align_items_md=\'\'  flex_align_items_lg=\'\'  flex_justify_content=\'\'  flex_justify_content_md=\'\'  flex_justify_content_lg=\'\'  flex_align_self=\'\'  flex_align_self_md=\'\'  flex_align_self_lg=\'\'  flex_order=\'\'  flex_order_md=\'\'  flex_order_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 mt-1 pt-4 row"><!-- wp:blockstrap/blockstrap-widget-container {"container":"col","text_align_lg":"text-lg-center","className":"block-1618467995"} -->
[bs_container container=\'col\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'\'  col_md=\'\'  col_lg=\'\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'false\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'text-lg-center\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'3\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  flex_align_items=\'\'  flex_align_items_md=\'\'  flex_align_items_lg=\'\'  flex_justify_content=\'\'  flex_justify_content_md=\'\'  flex_justify_content_lg=\'\'  flex_align_self=\'\'  flex_align_self_md=\'\'  flex_align_self_lg=\'\'  flex_order=\'\'  flex_order_md=\'\'  flex_order_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 mb-lg-3 text-center col"><!-- wp:paragraph {"textColor":"gray-dark","fontSize":"small"} -->
<p class="has-gray-dark-color has-text-color has-small-font-size">Copyright © ' . esc_attr( get_bloginfo( 'name' ) ) . ' ' . date( 'Y' ) . '. All rights reserved.</p>
<!-- /wp:paragraph --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container -->',
		)
	);

}
