<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/*
* Add-on Name: Portfolio module
*/
class WPBakeryShortCode_Dfd_Portfolio_Presentation_Module extends WPBakeryShortCode {}

vc_map(
	array(
		'name' => esc_attr__('Portfolio Presentation','dfd-native'),
		'base' => 'dfd_portfolio_presentation_module',
		'class' => 'dfd_portfolio_presentation dfd_shortcode',
		'icon' => 'dfd_portfolio_presentation dfd_shortcode',
		'category' => esc_html__('Native','dfd-native'),
		'description' => esc_html__('Present Portfolio items','dfd-native'),
		'admin_enqueue_js' => DFD_EXTENSIONS_PLUGIN_URL.'vc_custom/admin/js/custom-dependency.js',
		'front_enqueue_js' => DFD_EXTENSIONS_PLUGIN_URL.'vc_custom/admin/js/custom-dependency.js',
		'params' => array(
			array(
				'type'             => 'dfd_heading_param',
				'text'             => esc_html__( 'Portfolio items settings', 'dfd-native' ),
				'param_name'       => 'loop_elements_heading',
				'edit_field_class' => 'dfd-heading-param-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type' => 'dfd_radio_advanced',
				'heading' => esc_html__('Style','dfd-native'),
				'param_name' => 'portfolio_style',
				'value' => 'featured-left',
				'options' => array(
					esc_html__('Left featured','dfd-native')	=> 'featured-left',
					esc_html__('Right featured','dfd-native')	=> 'featured-right',
				),
				'edit_field_class' => 'vc_column vc_col-sm-12 crum_vc',
			),
			array(
				'type' => 'dfd_taxonomy_multicheck',
				'heading' => esc_html__('Categories','dfd-native'),
				'param_name' => 'portfolio_categories',
				'taxonomy' => 'portfolio_category',
				'dependency' => array('element' => 'items','value_not_equal_to' => array('single')),
				'edit_field_class' => 'vc_column vc_col-sm-12 dfd-taxonomy-multicheck no-border-bottom',
			),
			array(
				'type'             => 'dfd_heading_param',
				'text'             => esc_html__( 'Extra features', 'dfd-native' ),
				'param_name'       => 'extra_features_elements_heading',
				'edit_field_class' => 'dfd-heading-param-wrapper vc_column vc_col-sm-12',
			),
			array(
				'type'        => 'dropdown',
				'heading'	  => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('Choose the appear effect for the element','dfd-native').'</span></span>'.esc_html__('Animation', 'dfd-native'),
				'param_name'  => 'module_animation',
				'value'       => Dfd_Theme_Helpers::dfd_module_animation_styles(),
			),
			array(
				'type'        => 'textfield',
				'heading'	  => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('Add the unique class name for the element which can be used for custom CSS codes','dfd-native').'</span></span>'.esc_html__('Custom CSS Class', 'dfd-native'),
				'param_name'  => 'el_class',
			),
			array(
				'type' => 'dfd_video_link_param',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('Video tutorial and theme documentation article', 'dfd-native') . '</span></span>' . esc_html__('Tutorials', 'dfd-native'),
				'param_name' => 'tutorials',
				'doc_link' => '//nativewptheme.net/support/visual-composer/portfolio-presentation',
				'video_link' => 'https://www.youtube.com/watch?v=ycdEJCGeUSk&feature=youtu.be',
			),
			array(
				'type'             => 'dfd_heading_param',
				'text'             => esc_html__( 'Content elements', 'dfd-native' ),
				'param_name'       => 'enabled_elements_heading',
				'edit_field_class' => 'dfd-heading-param-wrapper no-top-margin vc_column vc_col-sm-12',
				'group'            => esc_html__( 'Content', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => esc_html__('Category','dfd-native'),
				'param_name' => 'portfolio_show_top_cat',
				'options' => array(
					'on' => array(
							'on' => 'Yes',
							'off' => 'No',
						),
					),
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
				'group'      => esc_html__( 'Content', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => esc_html__('Title','dfd-native'),
				'param_name' => 'portfolio_show_title',
				'options' => array(
					'on' => array(
							'on' => 'Yes',
							'off' => 'No',
						),
					),
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
				'group'      => esc_html__( 'Content', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => esc_html__('Subtitle','dfd-native'),
				'param_name' => 'portfolio_show_subtitle',
				'options' => array(
					'on' => array(
							'on' => 'Yes',
							'off' => 'No',
						),
					),
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
				'group'      => esc_html__( 'Content', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => esc_html__('Excerpt','dfd-native'),
				'param_name' => 'portfolio_show_content',
				'options' => array(
					'on' => array(
							'on' => 'Yes',
							'off' => 'No',
						),
					),
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
				'group'      => esc_html__( 'Content', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_radio_advanced',
				'heading' =>  '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('This option allows you to choose the horizontal alignment for the portfolio info','dfd-native').'</span></span>'.esc_html__('Content alignment','dfd-native'),
				'param_name' => 'portfolio_content_alignment',
				'value' => 'text-left',
				'options' => array(
					esc_html__('Left','dfd-native')	=> 'text-left',
					esc_html__('Center','dfd-native')	=> 'text-center',
					esc_html__('Right','dfd-native')	=> 'text-right'
				),
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
				'group'      => esc_html__( 'Content', 'dfd-native' ),
			),
			array(
				'type'             => 'dfd_heading_param',
				'text'             => esc_html__( 'Main hover settings', 'dfd-native' ),
				'param_name'       => 'hover_main_heading',
				'edit_field_class' => 'dfd-heading-param-wrapper no-top-margin vc_column vc_col-sm-12',
				'group'            => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type'        => 'dfd_single_checkbox',
				'heading'     => '<span class="dfd-vc-toolip tooltip-bottom"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('This option allows you to enable or disable the hover effect for the portfolio items','dfd-native').'</span></span>'.esc_html__( 'Hover', 'dfd-native' ),
				'param_name'  => 'portfolio_hover_enable',
				'value' => 'on',
				'options' => array(
					'on' => array(
						'on' => 'Yes',
						'off' => 'No',
					),
				),
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
				'group'       => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_radio_advanced',
				'heading' => '<span class="dfd-vc-toolip tooltip-bottom"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('This option allows you to choose the content hover style. Simple style allows you to have transparent background without hover effect. Tiled style allows you to have white background with shadow hover effect.','dfd-native').'</span></span>'.esc_html__('Content style','dfd-native'),
				'param_name' => 'portfolio_content_style',
				'value' => 'tiled',
				'options' => array(
					esc_html__('Simple','dfd-native') => 'standard',
					esc_html__('Tiled','dfd-native') => 'tiled',
				),
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('This option allows you to select the hover effect for the mask appearing','dfd-native').'</span></span>'.esc_html__('Mask appear effect','dfd-native'),
				'param_name' => 'portfolio_hover_appear_effect',
				'value' => array(
					esc_attr__('3d parallax','dfd-native') => 'dfd-3d-parallax',
					esc_attr__('Fade out','dfd-native') => 'dfd-fade-out',
					esc_attr__('Fade out offset','dfd-native') => 'dfd-fade-offset',
					esc_attr__('From left to right','dfd-native') => 'dfd-left-to-right',
					esc_attr__('From right to left','dfd-native') => 'dfd-right-to-left',
					esc_attr__('From top to bottom','dfd-native') => 'dfd-top-to-bottom',
					esc_attr__('From bottom to top','dfd-native') => 'dfd-bottom-to-top',
					esc_attr__('Following the mouse','dfd-native') => 'portfolio-hover-style-1',
				),
				'dependency' => array('element' => 'portfolio_hover_enable','value' => array('on')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('This option allows you to choose the image behavior on hover','dfd-native').'</span></span>'.esc_html__('Image hover effect','dfd-native'),
				'param_name' => 'portfolio_hover_image_effect',
				'value' => array(
					esc_html__('Image parallax','dfd-native') => 'panr',
					esc_html__('Grow','dfd-native') => 'dfd-image-scale',
					esc_html__('Grow with rotation','dfd-native') => 'dfd-image-scale-rotate',
					esc_html__('Shift left','dfd-native') => 'dfd-image-shift-left',
					esc_html__('Shift right','dfd-native') => 'dfd-image-shift-right',
					esc_html__('Shift top','dfd-native') => 'dfd-image-shift-top',
					esc_html__('Shift bottom','dfd-native') => 'dfd-image-shift-bottom',
					esc_html__('Blur','dfd-native') => 'dfd-image-blur',
				),
				'dependency' => array(
					'element' => 'portfolio_hover_appear_effect',
					'value' => array(
						'dfd-fade-out','dfd-fade-offset','dfd-left-to-right','dfd-right-to-left','dfd-top-to-bottom','dfd-bottom-to-top'
						)
					),
				'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type'             => 'dfd_heading_param',
				'text'             => esc_html__( 'Hover mask settings', 'dfd-native' ),
				'param_name'       => 'hover_deco_heading',
				'edit_field_class' => 'dfd-heading-param-wrapper vc_column vc_col-sm-12',
				'dependency' => array('element' => 'portfolio_hover_enable','value' => array('on')),
				'group'            => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'colorpicker',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('Choose the color for the content text. The default value is inherited from Theme Options > Portfolio Options > Portfolio hover style options > Text color','dfd-native').'</span></span>'.__('Mask content color', 'dfd-native'),
				'param_name' => 'portfolio_hover_mask_color',
				'edit_field_class' => 'vc_column vc_col-sm-6',
				'dependency' => array('element' => 'portfolio_hover_enable','value' => array('on')),
				'group' => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_radio_advanced',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('Choose the mask background style, you can choose simple color or gradient. The default value is inherited from Theme Options > Portfolio Options > Portfolio hover style options > Hover mask background style','dfd-native').'</span></span>'.esc_html__('Hover mask background style','dfd-native'),
				'param_name' => 'portfolio_hover_mask_background_style',
				'value' => 'simple-color',
				'options' => array(
					esc_html__('Simple color','dfd-native') => 'simple-color',
					esc_html__('Gradient','dfd-native') => 'gradient',
				),
				'edit_field_class' => 'vc_column vc_col-sm-6',
				'dependency' => array('element' => 'portfolio_hover_enable','value' => array('on')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array (
				'type' => 'colorpicker',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('Choose the mask background color. The default value is inherited from Theme Options > Portfolio Options > Portfolio hover style options > Hover mask background color','dfd-native').'</span></span>'. esc_html__('Mask background', 'dfd-native'),
				'param_name' => 'portfolio_hover_mask_background',
				'edit_field_class' => 'vc_column vc_col-sm-12 dfd-hide-alpha',
				'dependency' => array('element' => 'portfolio_hover_mask_background_style','value' => array('simple-color')),
				'group' => esc_attr__( 'Hover', 'dfd-native' ),
			),
			array (
				'type' => 'colorpicker',
				'param_name' => 'portfolio_hover_mask_bg_start_color',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('Choose the start color for the mask background gradient. The default value is inherited from Theme Options > Portfolio Options > Portfolio hover style options > Background gradient','dfd-native').'</span></span>'.esc_html__('Start color', 'dfd-native'),
				'edit_field_class' => 'vc_column vc_col-sm-6 dfd-hide-alpha',
				'dependency' => array('element' => 'portfolio_hover_mask_background_style','value' => array('gradient')),
				'group' => esc_html__( 'Hover', 'dfd-native' ),
			),
			array (
				'type' => 'colorpicker',
				'param_name' => 'portfolio_hover_mask_bg_end_color',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('Choose the end color for the mask background gradient. The default value is inherited from Theme Options > Portfolio Options > Portfolio hover style options > Background gradient','dfd-native').'</span></span>'.esc_html__('End color', 'dfd-native'),
				'edit_field_class' => 'vc_column vc_col-sm-6 dfd-hide-alpha',
				'dependency' => array('element' => 'portfolio_hover_mask_background_style','value' => array('gradient')),
				'group' => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'number',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('Choose the hover mask background opacity. The default value is inherited from Theme Options > Portfolio Options > Portfolio hover style options > Background opacity','dfd-native').'</span></span>'.esc_html__('Hover mask background opacity','dfd-native'),
				'min' => 1,
				'max' => 100,
				'param_name' => 'portfolio_hover_mask_background_opacity',
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc dfd-number-percent',
				'dependency' => array('element' => 'portfolio_hover_enable','value' => array('on')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('This option allows you to enable or disable the frame decoration on hover','dfd-native').'</span></span>'. esc_html__('Hover mask frame decoration','dfd-native'),
				'param_name' => 'portfolio_hover_mask_border',
				'options' => array(
					'on' => array(
						'on' => 'Yes',
						'off' => 'No',
					),
				),
				'edit_field_class' => 'vc_column vc_col-sm-6',
				'dependency' => array('element' => 'portfolio_hover_enable','value' => array('on')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_radio_advanced',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('This option allows you to choose the style for the frame decoration on hover','dfd-native').'</span></span>'. esc_html__('Hover mask frame style','dfd-native'),
				'param_name' => 'portfolio_hover_mask_bordered_style',
				'value' => 'simple-border',
				'options' => array(
					esc_html__('Simple','dfd-native') => 'simple-border',
					esc_html__('Offset','dfd-native') => 'offset',
				),
				'edit_field_class'	=> 'vc_column vc_col-sm-6 no-border-bottom',
				'dependency' => array('element' => 'portfolio_hover_mask_border','value' => array('on')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'number',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('This option allows you to set the size for the frame decoration on hover','dfd-native').'</span></span>'.esc_html__('Hover mask frame size','dfd-native'),
				'param_name' => 'portfolio_hover_mask_bordered_size',
				'dependency' => array('element' => 'portfolio_hover_mask_border','value' => array('on')),
				'edit_field_class'	=> 'vc_column vc_col-sm-6 no-border-bottom crum_vc dfd-number-wrap',
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type'             => 'dfd_heading_param',
				'text'             => esc_html__( 'Hover decoration settings', 'dfd-native' ),
				'param_name'       => 'hover_elements_heading',
				'edit_field_class' => 'dfd-heading-param-wrapper vc_column vc_col-sm-12',
				'dependency'	   => array('element' => 'portfolio_hover_enable','value' => array('on')),
				'group'            => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_radio_advanced',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('This option allows you to choose the behavior for the decoration link', 'dfd-native') . '</span></span>' .esc_html__('Decoration link','dfd-native'),
				'param_name' => 'portfolio_hover_main_decoration_link',
				'value' => 'inside',
				'options' => array(
					esc_html__('Inside','dfd-native') => 'inside',
					esc_html__('External link','dfd-native') => 'external',
					esc_html__('Lightbox','dfd-native') => 'lightbox',
				),
				'dependency' => array('element' => 'portfolio_hover_main_decoration','value_not_equal_to' => array('buttons')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_radio_advanced',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('This option allows you to choose the main decoration style', 'dfd-native') . '</span></span>' .esc_html__('Main decoration','dfd-native'),
				'param_name' => 'portfolio_hover_main_decoration',
				'value' => 'heading',
				'options' => array(
					esc_attr__('Heading','dfd-native') => 'heading',
					esc_attr__('Plus','dfd-native') => 'plus',
					esc_attr__('Dots','dfd-native') => 'dots',
					esc_attr__('Buttons','dfd-native') => 'buttons',
					esc_attr__('None','dfd-native') => 'none',
				),
				'dependency' => array('element' => 'portfolio_hover_enable','value' => array('on')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => esc_html__('Title','dfd-native'),
				'param_name' => 'portfolio_hover_show_title',
				'value' => 'on',
				'options' => array(
					'on' => array(
						'on' => 'Yes',
						'off' => 'No',
					),
				),
				'edit_field_class'=> 'vc_column vc_col-sm-6 no-border-bottom',
				'dependency' => array('element' => 'portfolio_hover_main_decoration','value' => array('heading')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => esc_html__('Subtitle','dfd-native'),
				'param_name' => 'portfolio_hover_show_subtitle',
				'value' => 'on',
				'options' => array(
					'on' => array(
						'on' => 'Yes',
						'off' => 'No',
					),
				),
				'edit_field_class'=> 'vc_column vc_col-sm-6 no-border-bottom',
				'dependency' => array('element' => 'portfolio_hover_main_decoration','value' => array('heading')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Plus style','dfd-native'),
				'param_name' => 'portfolio_hover_plus_position',
				'value' => array(
					esc_attr__('Big plus in the middle of the thumb','dfd-native') => 'dfd-middle',
					esc_attr__('Small plus in the middle of the thumb','dfd-native') => 'dfd-middle dfd-plus-bordered',
					esc_attr__('Following the mouse','dfd-native') => 'dfd-cursor-plus',
				),
				'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
				'dependency' => array('element' => 'portfolio_hover_main_decoration','value' => array('plus')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => esc_html__('Link inside portfolio item','dfd-native'),
				'param_name' => 'portfolio_hover_buttons_inside',
				'value' => 'on',
				'options' => array(
					'on' => array(
						'on' => 'Yes',
						'off' => 'No',
					),
				),
				'edit_field_class' => 'vc_column vc_col-sm-6',
				'dependency' => array('element' => 'portfolio_hover_main_decoration','value' => array('buttons')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => esc_html__('Portfolio item external link','dfd-native'),
				'param_name' => 'portfolio_hover_buttons_external',
				'value' => 'on',
				'options' => array(
					'on' => array(
						'on' => 'Yes',
						'off' => 'No',
					),
				),
				'edit_field_class' => 'vc_column vc_col-sm-6',
				'dependency' => array('element' => 'portfolio_hover_main_decoration','value' => array('buttons')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => esc_html__('Lightbox','dfd-native'),
				'param_name' => 'portfolio_hover_buttons_lightbox',
				'value' => 'on',
				'options' => array(
					'on' => array(
						'on' => 'Yes',
						'off' => 'No',
					),
				),
				'edit_field_class' => 'vc_column vc_col-sm-6 no-border-bottom',
				'dependency' => array('element' => 'portfolio_hover_main_decoration','value' => array('buttons')),
				'group'      => esc_html__( 'Hover', 'dfd-native' ),
			),
			array (
				'type' => 'colorpicker',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('Choose the buttons background color. The default value is inherited from Theme Options > Portfolio Options > Portfolio hover style options > Buttons background','dfd-native').'</span></span>'. esc_html__('Buttons background', 'dfd-native'),
				'param_name' => 'portfolio_hover_buttons_bg',
				'group' => esc_attr__( 'Hover', 'dfd-native' ),
				'edit_field_class' => 'vc_column vc_col-sm-6 no-border-bottom',
				'dependency' => array('element' => 'portfolio_hover_main_decoration','value' => array('buttons')),
			),
			array(
				'type'             => 'dfd_heading_param',
				'text'             => esc_html__( 'Title', 'dfd-native' ) . ' ' . esc_attr__( 'Typography', 'dfd-native' ),
				'param_name'       => 'title_t_heading',
				'edit_field_class' => 'dfd-heading-param-wrapper no-top-margin vc_column vc_col-sm-12',
				'group'            => esc_html__( 'Typography', 'dfd-native' ),
			),
			array(
				'type'       => 'dfd_font_container',
				'param_name' => 'title_font_options',
				'settings'   => array(
					'fields' => array(
						'font_size',
						'line_height',
						'letter_spacing',
						'color',
						'font_style',
					),
				),
				'value' => 'font_size:30|line_height:40|letter_spacing:-1.5',
				'group'      => esc_html__( 'Typography', 'dfd-native' ),
			),
			array(
				'type'        => 'dfd_single_checkbox',
				'heading'	  => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('Allows you to use custom Google font','dfd-native').'</span></span>'.esc_html__('Custom font family', 'dfd-native'),
				'param_name'  => 'title_google_fonts',
				'value' => 'off',
				'options' => array(
					'yes' => array(
						'on' => 'Yes',
						'off' => 'No',
					),
				),
				'group'       => esc_html__( 'Typography', 'dfd-native' ),
			),
			array(
				'type'       => 'google_fonts',
				'param_name' => 'title_custom_fonts',
				'settings'   => array(
					'fields' => array(
						'font_family_description' => esc_html__( 'Select font family.', 'dfd-native' ),
						'font_style_description'  => esc_html__( 'Select font style.', 'dfd-native' ),
					),
				),
				'dependency' => array(
					'element' => 'title_google_fonts',
					'value'   => 'yes',
				),
				'edit_field_class' => 'vc_column vc_col-sm-12 no-border-bottom',
				'group'      => esc_html__( 'Typography', 'dfd-native' ),
			),
			array(
				'type'             => 'dfd_heading_param',
				'text'             => esc_html__( 'Subtitle', 'dfd-native' ) . ' ' . esc_attr__( 'Typography', 'dfd-native' ),
				'param_name'       => 'subtitle_t_heading',
				'edit_field_class' => 'dfd-heading-param-wrapper vc_column vc_col-sm-12',
				'group'            => esc_html__( 'Typography', 'dfd-native' ),
			),
			array(
				'type'       => 'dfd_font_container',
				'heading'    => '',
				'param_name' => 'subtitle_font_options',
				'settings'   => array(
					'fields' => array(
						'font_size',
						'letter_spacing',
						'line_height',
						'color',
						'font_style'
					),
				),
				'group'      => esc_html__( 'Typography', 'dfd-native' ),
			),
			array(
				'type'        => 'dfd_single_checkbox',
				'heading'	  => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('Allows you to use custom Google font','dfd-native').'</span></span>'.esc_html__('Custom font family', 'dfd-native'),
				'param_name'  => 'subtitle_google_fonts',
				'value' => 'off',
				'options' => array(
					'yes' => array(
						'on' => 'Yes',
						'off' => 'No',
					),
				),
				'group'       => esc_html__( 'Typography', 'dfd-native' ),
			),
			array(
				'type'       => 'google_fonts',
				'param_name' => 'subtitle_custom_fonts',
				'settings'   => array(
					'fields' => array(
						'font_family_description' => esc_html__( 'Select font family.', 'dfd-native' ),
						'font_style_description'  => esc_html__( 'Select font style.', 'dfd-native' ),
					),
				),
				'dependency' => array(
					'element' => 'subtitle_google_fonts',
					'value'   => 'yes',
				),
				'group'      => esc_html__( 'Typography', 'dfd-native' ),
			),
		),
	)
);