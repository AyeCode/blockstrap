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
		'hero-sections',
		array( 'label' => esc_html__( 'Hero Sections', 'blockstrap' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	register_block_pattern(
		'blockstrap/hero-home',
		array(
			'title'      => esc_html__( 'Hero home', 'blockstrap' ),
			'categories' => array( 'hero-sections' ),
			'content'    => '<!-- wp:blockstrap/blockstrap-widget-container {"container":"container-fluid","bg":"custom-gradient","mb_lg":"","pt_lg":"5","pb_lg":"5","position":"position-relative"} -->
[bs_container container=\'container-fluid\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'\'  col_md=\'\'  col_lg=\'\'  bg=\'custom-gradient\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'false\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'5\'  pr_lg=\'\'  pb_lg=\'5\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'position-relative\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 pt-5 pb-5 bg-custom-gradient container-fluid position-relative" style="background-image:linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)"><!-- wp:blockstrap/blockstrap-widget-shape-divider {"sd":"mountains","sd_position":"bottom","sd_color":"white","styleid":"block-lwftvovh12"} -->
[bs_shape_divider sd=\'mountains\'  sd_position=\'bottom\'  sd_color=\'white\'  sd_custom_color=\'#0073aa\'  sd_width=\'200\'  sd_height=\'100\'  sd_flip=\'false\'  sd_invert=\'false\'  sd_btf=\'false\'  styleid=\'block-lwftvovh12\' ]<div class="wp-block-blockstrap-blockstrap-widget-shape-divider block-lwftvovh12 blockstrap-shape blockstrap-shape-bottom position-absolute"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">	<path class="bg-white blockstrap-shape-fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"/>	<path class="bg-white blockstrap-shape-fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"/>	<path class="bg-white blockstrap-shape-fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"/></svg></div><style>.block-lwftvovh12 { pointer-events: none;background-repeat: no-repeat;bottom:  -1px; left: -1px;right: -1px;line-height: 0;overflow: hidden;-webkit-transform: rotate(180deg); transform: rotate(180deg);}.block-lwftvovh12 svg{ height: 100px;width: calc(200% + 1.3px);left: 50%;position: relative;display: block;-webkit-transform: translateX(-50%); -ms-transform: translateX(-50%); transform: translateX(-50%);}.block-lwftvovh12 svg path{ }</style>[/bs_shape_divider]
<!-- /wp:blockstrap/blockstrap-widget-shape-divider -->

<!-- wp:blockstrap/blockstrap-widget-container {"pt_lg":"5","pb_lg":"5"} -->
[bs_container container=\'container\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'\'  col_md=\'\'  col_lg=\'\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'false\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'3\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'5\'  pr_lg=\'\'  pb_lg=\'5\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 mb-lg-3 pt-5 pb-5 container"><!-- wp:blockstrap/blockstrap-widget-container {"container":"row","pt_lg":"5","pb_lg":"5","className":"align-items-center"} -->
[bs_container container=\'row\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'\'  col_md=\'\'  col_lg=\'\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'false\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'3\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'5\'  pr_lg=\'\'  pb_lg=\'5\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 mb-lg-3 pt-5 pb-5 row"><!-- wp:blockstrap/blockstrap-widget-container {"container":"col","col_lg":"7","bg_gradient":"linear-gradient(90deg,rgb(0,252,13) 5%,rgb(155,81,224) 100%)","bg_on_text":true} -->
[bs_container container=\'col\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'\'  col_md=\'\'  col_lg=\'7\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(90deg,rgb(0,252,13) 5%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'true\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'3\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 mb-lg-3 col-7 col"><!-- wp:blockstrap/blockstrap-widget-heading {"text":"BlockStrap, build \u003cem\u003ewebsites \u003c/em\u003efaster!","html_tag":"h1","text_color":"light","font_size":"custom","font_size_custom":5,"bg":"custom-gradient","bg_gradient":"linear-gradient(139deg,rgb(18,255,1) 4%,rgb(175,236,241) 57%)","bg_on_text":true,"content":"Please \u003ca href=\u0022http://localhost/t2/\u0022 data-type=\u0022page\u0022 data-id=\u0022505\u0022 target=\u0022_blank\u0022 rel=\u0022noreferrer noopener\u0022\u003eselect\u003c/a\u003e the attributes in the block settings"} -->
<h1 class="wp-block-blockstrap-blockstrap-widget-heading mb-3 bg-custom-gradient text-light" style="background-image:linear-gradient(139deg,rgb(18,255,1) 4%,rgb(175,236,241) 57%);background-clip:text;-webkit-background-clip:text;text-fill-color:transparent;-webkit-text-fill-color:transparent;font-size:5rem">BlockStrap, build <em>websites </em>faster!</h1>
<!-- /wp:blockstrap/blockstrap-widget-heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.6"}},"textColor":"white","fontSize":"medium"} -->
<p class="has-white-color has-text-color has-medium-font-size" style="line-height:1.6">Welcome to BlockStrap, a mashup of the famous BootStrap UI and the new WordPress Block Theme technology. The answer to beautiful sites that load super fast.</p>
<!-- /wp:paragraph -->

<!-- wp:blockstrap/blockstrap-widget-button {"type":"custom","custom_url":"https://wpblockstrap.com/","text":"Learn more","icon_position":"left","link_bg":"success","font_weight":"font-weight-bold font-italic","pr_lg":"2","pl_lg":"2","content":"\u003ca   class=\u0022btn btn-success pr-2 pl-2 font-weight-bold font-italic \u0022\u003eLearn more\u003c/a\u003e "} -->
[bs_button type=\'custom\'  page_id=\'\'  post_id=\'\'  custom_url=\'https://wpblockstrap.com/\'  text=\'Learn more\'  icon_class=\'\'  icon_position=\'left\'  link_type=\'btn\'  link_size=\'\'  link_bg=\'success\'  text_color=\'\'  link_bg_hover=\'primary\'  text_color_hover=\'\'  font_size_custom=\'\'  font_weight=\'font-weight-bold font-italic\'  font_case=\'\'  mt=\'\'  mr=\'\'  mb=\'\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'2\'  pb_lg=\'\'  pl_lg=\'2\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  css_class=\'\' ]
<!-- /wp:blockstrap/blockstrap-widget-button --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container -->

<!-- wp:blockstrap/blockstrap-widget-container {"container":"col"} -->
[bs_container container=\'col\'  row_cols=\'\'  row_cols_md=\'\'  row_cols_lg=\'\'  col=\'\'  col_md=\'\'  col_lg=\'\'  bg=\'\'  bg_color=\'#0073aa\'  bg_gradient=\'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)\'  bg_image_fixed=\'false\'  bg_image_use_featured=\'false\'  bg_image=\'\'  bg_image_id=\'\'  bg_image_xy=\'{x:undefined,y:undefined}\'  bg_on_text=\'false\'  text_color=\'\'  text_justify=\'false\'  text_align=\'\'  text_align_md=\'\'  text_align_lg=\'\'  mt=\'\'  mr=\'\'  mb=\'3\'  ml=\'\'  mt_md=\'\'  mr_md=\'\'  mb_md=\'\'  ml_md=\'\'  mt_lg=\'\'  mr_lg=\'\'  mb_lg=\'3\'  ml_lg=\'\'  pt=\'\'  pr=\'\'  pb=\'\'  pl=\'\'  pt_md=\'\'  pr_md=\'\'  pb_md=\'\'  pl_md=\'\'  pt_lg=\'\'  pr_lg=\'\'  pb_lg=\'\'  pl_lg=\'\'  border=\'\'  rounded=\'\'  rounded_size=\'\'  shadow=\'\'  position=\'\'  sticky_offset_top=\'\'  sticky_offset_bottom=\'\'  display=\'\'  display_md=\'\'  display_lg=\'\'  anchor=\'\'  css_class=\'\' ]<div class="wp-block-blockstrap-blockstrap-widget-container undefined mb-3 mb-lg-3 col"><!-- wp:image {"id":1659,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'assets/images/placeholder-home.png' ) ) . '" alt="" class="wp-image-1659"/></figure>
<!-- /wp:image --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container --></div>[/bs_container]
<!-- /wp:blockstrap/blockstrap-widget-container -->',
		)
	);

}
