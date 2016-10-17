<?php

function broden_customizer_register( $wp_customize ) {

///////////////////////////////////////////////////////////////////////////////

// CUSTOMIZER - LOGO & HEADER SETTINGS

///////////////////////////////////////////////////////////////////////////////

	$wp_customize->add_section( 'broden_new_section_header' , array(
   		'title'      => 'Header',
   		'description'=> '',
   		'priority'   => 90,
	) );
	
	// Add Setting

	$wp_customize->add_setting(
		'broden_logo',
		array(
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_logo_height',
		array(
			'default'     => '85',
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_logo_padding_top',
		array(
			'default'     => '40',
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_logo_padding_bottom',
		array(
			'default'     => '40',
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_header_icons_margin',
		array(
			'default'     => '60',
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_logo_retina',
		array(
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_logo_fixed',
		array(
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_header_layout',
	    array(
	        'default'     => 'style-1',
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_header_background',
		array(
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_header_ads',
		array(
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_header_ads_url',
		array(
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_loader',
		array(
			'default'     => true,
			'sanitize_callback' => 'broden_santanize'
		)
	);


	// Add Control

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'broden_header_layout',
			array(
				'label'          => esc_html__( 'Header Layout', 'broden' ),
				'section'        => 'broden_new_section_header',
				'settings'       => 'broden_header_layout',
				'type'           => 'radio',
				'priority'	 	 => 1,
				'choices'        => array(
					'style-1'    => 'Logo Center',
					'style-2'    => 'Logo & Ads Banner',
					'style-3'    => 'Image Background',
				)
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'broden_loader',
			array(
				'label'      => esc_html__( 'Activate Loader', 'broden' ),
				'section'    => 'broden_new_section_header',
				'settings'   => 'broden_loader',
				'type'		 => 'checkbox',
				'priority'	 => 2
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'broden_logo',
			array(
				'label'      => esc_html__( 'Upload Desktop Logo', 'broden' ),
				'section'    => 'broden_new_section_header',
				'settings'   => 'broden_logo',
				'priority'	 => 3
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'broden_logo_height',
			array(
				'label'      => esc_html__( 'Logo Height', 'broden' ),
				'section'    => 'broden_new_section_header',
				'settings'   => 'broden_logo_height',
				'type'		 => 'text',
				'priority'	 => 4
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'broden_logo_padding_top',
			array(
				'label'      => esc_html__( 'Logo Padding Top', 'broden' ),
				'section'    => 'broden_new_section_header',
				'settings'   => 'broden_logo_padding_top',
				'type'		 => 'text',
				'priority'	 => 5
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'broden_logo_padding_bottom',
			array(
				'label'      => esc_html__( 'Logo Padding Bottom', 'broden' ),
				'section'    => 'broden_new_section_header',
				'settings'   => 'broden_logo_padding_bottom',
				'type'		 => 'text',
				'priority'	 => 6
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'broden_header_icons_margin',
			array(
				'label'      => esc_html__( 'Search % Social Media margin top', 'broden' ),
				'section'    => 'broden_new_section_header',
				'settings'   => 'broden_header_icons_margin',
				'type'		 => 'text',
				'priority'	 => 7
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'broden_logo_fixed',
			array(
				'label'      => esc_html__( 'Upload Logo for Sticky Header', 'broden' ),
				'section'    => 'broden_new_section_header',
				'settings'   => 'broden_logo_fixed',
				'priority'	 => 8
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'broden_logo_retina',
			array(
				'label'      => esc_html__( 'Upload Mobile (Retina) Logo', 'broden' ),
				'section'    => 'broden_new_section_header',
				'settings'   => 'broden_logo_retina',
				'priority'	 => 9
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'broden_header_background',
			array(
				'label'      => esc_html__( 'Header Background Image', 'broden' ),
				'section'    => 'broden_new_section_header',
				'settings'   => 'broden_header_background',
				'priority'	 => 10
			)
		)
	);

	/*$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'broden_header_ads',
			array(
				'label'      => esc_html__( 'Header Ads Image', 'broden' ),
				'section'    => 'broden_new_section_header',
				'settings'   => 'broden_header_ads',
				'priority'	 => 11
			)
		)
	);*/

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'header_ads_url',
			array(
				'label'      => esc_html__( 'Ads Banner URL', 'broden' ),
				'section'    => 'broden_new_section_header',
				'settings'   => 'broden_header_ads_url',
				'type'		 => 'textarea',
				'priority'	 => 12
			)
		)
	);


///////////////////////////////////////////////////////////////////////////////

// CUSTOMIZER - SOCIAL MEDIA

///////////////////////////////////////////////////////////////////////////////

	$wp_customize->add_section( 'broden_new_section_social_media' , array(
   		'title'      => 'Social Media Links',
   		'description'=> '',
   		'priority'   => 91,
	) );
	
	// Add Setting

	$wp_customize->add_setting(
		'broden_facebook_link',
		array(
			'default'     => '#',
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_twitter_link',
		array(
			'default'     => '#',
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_pinterest_link',
		array(
			'default'     => '#',
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_youtube_link',
		array(
			'default'     => '#',
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_tumblr_link',
		array(
			'default'     => '#',
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_google_link',
		array(
			'default'     => '#',
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_linkedin_link',
		array(
			'default'     => '#',
			'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_instagram_link',
		array(
			'default'     => '#',
			'sanitize_callback' => 'broden_santanize'
		)
	);


	// Add Control

	$wp_customize->add_control(
		'facebook',
		array(
			'label'       => esc_html__( 'Facebook URL:', 'broden' ),
			'section'     => 'broden_new_section_social_media',
			'settings'    => 'broden_facebook_link',
			'type'        => 'text',
			'priority'	  => 1
		)
	);

	$wp_customize->add_control(
		'twitter',
		array(
			'label'       => esc_html__( 'Twitter URL:', 'broden' ),
			'section'     => 'broden_new_section_social_media',
			'settings'    => 'broden_twitter_link',
			'type'        => 'text',
			'priority'	  => 2
		)
	);

	$wp_customize->add_control(
		'pinterest',
		array(
			'label'       => esc_html__( 'Pinterest URL:', 'broden' ),
			'section'     => 'broden_new_section_social_media',
			'settings'    => 'broden_pinterest_link',
			'type'        => 'text',
			'priority'	  => 3
		)
	);

	$wp_customize->add_control(
		'google',
		array(
			'label'       => esc_html__( 'Google URL:', 'broden' ),
			'section'     => 'broden_new_section_social_media',
			'settings'    => 'broden_google_link',
			'type'        => 'text',
			'priority'	  => 4
		)
	);

	$wp_customize->add_control(
		'linkedin',
		array(
			'label'       => esc_html__( 'Linkedin URL:', 'broden' ),
			'section'     => 'broden_new_section_social_media',
			'settings'    => 'broden_linkedin_link',
			'type'        => 'text',
			'priority'	  => 5
		)
	);

	$wp_customize->add_control(
		'instagram',
		array(
			'label'       => esc_html__( 'Instagram URL:', 'broden' ),
			'section'     => 'broden_new_section_social_media',
			'settings'    => 'broden_instagram_link',
			'type'        => 'text',
			'priority'	  => 6
		)
	);

	$wp_customize->add_control(
		'youtube',
		array(
			'label'       => esc_html__( 'YouTube URL:', 'broden' ),
			'section'     => 'broden_new_section_social_media',
			'settings'    => 'broden_youtube_link',
			'type'        => 'text',
			'priority'	  => 7
		)
	);
	
	$wp_customize->add_control(
		'tumblr',
		array(
			'label'       => esc_html__( 'Tumblr URL:', 'broden' ),
			'section'     => 'broden_new_section_social_media',
			'settings'    => 'broden_tumblr_link',
			'type'        => 'text',
			'priority'	  => 8
		)
	);

///////////////////////////////////////////////////////////////////////////////

// CUSTOMIZER - FEATURED LAYOUT

///////////////////////////////////////////////////////////////////////////////

	$wp_customize->add_section( 'broden_new_section_featured' , array(
		'title'      => 'Featured Posts',
		'description'=> '',
		'priority'   => 92,
	) );

	// Add Setting

	$wp_customize->add_setting(
		'broden_featured_slider',
	        array(
				'default'     => false,
				'sanitize_callback' => 'broden_santanize'
		)
	);
	
	$wp_customize->add_setting(
		'broden_featured_layout',
	        array(
				'default'     => 'style-1',
				'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_featured_post_id',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	$wp_customize->add_setting(
		'broden_featured_exclude_post',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_featured_padding_top',
	        array(
				'default'     => '50',
				'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_featured_padding_bottom',
	        array(
				'default'     => '50',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	

	// Add Control

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'featured_slider',
			array(
				'label'      => esc_html__( 'Enable Featured Posts Layout', 'broden' ),
				'section'    => 'broden_new_section_featured',
				'settings'   => 'broden_featured_slider',
				'type'		 => 'checkbox',
				'priority'	 => 1
			)
		)
	);
		
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'featured_layout',
			array(
				'label'      => esc_html__( 'Please select a layout', 'broden' ),
				'section'    => 'broden_new_section_featured',
				'settings'   => 'broden_featured_layout',
				'type'		 => 'radio',
				'priority'	 => 2,
				'choices'        => array(
					'style-1'   => 'Featured Style 1',
					'style-2'   => 'Featured Style 2',
					'style-3'   => 'Featured Style 3',
					'style-4'   => 'Featured Style 4',
				)
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'featured_layout_postid',
			array(
				'label'      => esc_html__( 'Post id for featured', 'broden' ),
				'section'    => 'broden_new_section_featured',
				'settings'   => 'broden_featured_post_id',
				'type'		 => 'text',
				'priority'	 => 3,
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'featured_layout_exclude',
			array(
				'label'      => esc_html__( 'Exclude post for featured', 'broden' ),
				'section'    => 'broden_new_section_featured',
				'settings'   => 'broden_featured_exclude_post',
				'type'		 => 'text',
				'priority'	 => 4,
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'featured_padding_top',
			array(
				'label'      => esc_html__( 'Featured posts padding top', 'broden' ),
				'section'    => 'broden_new_section_featured',
				'settings'   => 'broden_featured_padding_top',
				'type'		 => 'radio',
				'priority'	 => 5,
				'type'		 => 'text',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'featured_padding_bottom',
			array(
				'label'      => esc_html__( 'Featured posts padding top', 'broden' ),
				'section'    => 'broden_new_section_featured',
				'settings'   => 'broden_featured_padding_bottom',
				'type'		 => 'radio',
				'priority'	 => 6,
				'type'		 => 'text',
			)
		)
	);

///////////////////////////////////////////////////////////////////////////////

// CUSTOMIZER - CATEGORY POSTS LAYOUT

///////////////////////////////////////////////////////////////////////////////

	$wp_customize->add_section( 'broden_new_section_cat_posts' , array(
		'title'      => '1. Category Posts',
		'description'=> '',
		'priority'   => 93,
	) );

	// Add Setting

	$wp_customize->add_setting(
		'broden_category_posts',
	        array(
				'default'     => false,
				'sanitize_callback' => 'broden_santanize'
		)
	);
	
	$wp_customize->add_setting(
		'broden_category_posts_layout',
	        array(
				'default'     => 'style-1',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	//Category Style 1
	$wp_customize->add_setting(
		'broden_category_select_1',
	        array(
				'default'     => 'uncategorized',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	$wp_customize->add_setting(
		'broden_category_post_id_1',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	$wp_customize->add_setting(
		'broden_category_exclude_post_1',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	//Category Style 2
	$wp_customize->add_setting(
		'broden_category_select_2',
	        array(
				'default'     => 'uncategorized',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	$wp_customize->add_setting(
		'broden_category_post_id_2',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	$wp_customize->add_setting(
		'broden_category_exclude_post_2',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	//Category Style 3
	$wp_customize->add_setting(
		'broden_category_select_3',
	        array(
				'default'     => 'uncategorized',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	$wp_customize->add_setting(
		'broden_category_post_id_3',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	$wp_customize->add_setting(
		'broden_category_exclude_post_3',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	//Category Style 4
	$wp_customize->add_setting(
		'broden_category_select_4',
	        array(
				'default'     => 'uncategorized',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	$wp_customize->add_setting(
		'broden_category_post_id_4',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	$wp_customize->add_setting(
		'broden_category_exclude_post_4',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);

	

	// Add Control

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_posts',
			array(
				'label'      => esc_html__( 'Enable Cateogry Posts Layout', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_posts',
				'type'		 => 'checkbox',
				'priority'	 => 1
			)
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_posts_layout',
			array(
				'label'      => esc_html__( 'Please select a layout', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_posts_layout',
				'type'		 => 'radio',
				'priority'	 => 2,
				'choices'        => array(
					'style-1'   => 'Category Posts Style 1',
					'style-2'   => 'Category Posts Style 2',
				)
			)
		)
	);
	//Category Style 1
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_1',
			array(
				'label'      => esc_html__( 'Please select 1. Category', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_select_1',
				'type'		 => 'select',
				'priority'	 => 3,
				'choices' 	 => broden_get_categories_select()
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_1_postid',
			array(
				'label'      => esc_html__( 'Post id for category 1', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_post_id_1',
				'type'		 => 'text',
				'priority'	 => 4,
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_1_exclude',
			array(
				'label'      => esc_html__( 'Exclude post for category 1', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_exclude_post_1',
				'type'		 => 'text',
				'priority'	 => 5,
			)
		)
	);
	//Category Style 2
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_2',
			array(
				'label'      => esc_html__( 'Please select 2. Category', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_select_2',
				'type'		 => 'select',
				'priority'	 => 6,
				'choices' 	 => broden_get_categories_select()
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_2_postid',
			array(
				'label'      => esc_html__( 'Post id for category 2', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_post_id_2',
				'type'		 => 'text',
				'priority'	 => 7,
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_2_exclude',
			array(
				'label'      => esc_html__( 'Exclude post for category 2', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_exclude_post_2',
				'type'		 => 'text',
				'priority'	 => 8,
			)
		)
	);

	//Category Style 3
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_3',
			array(
				'label'      => esc_html__( 'Please select 3. Category', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_select_3',
				'type'		 => 'select',
				'priority'	 => 9,
				'choices' 	 => broden_get_categories_select()
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_3_postid',
			array(
				'label'      => esc_html__( 'Post id for category 3', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_post_id_3',
				'type'		 => 'text',
				'priority'	 => 10,
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_3_exclude',
			array(
				'label'      => esc_html__( 'Exclude post for category 3', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_exclude_post_3',
				'type'		 => 'text',
				'priority'	 => 11,
			)
		)
	);
	//Category Style 4
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_4',
			array(
				'label'      => esc_html__( 'Please select 4. Category', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_select_4',
				'type'		 => 'select',
				'priority'	 => 12,
				'choices' 	 => broden_get_categories_select()
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_4_postid',
			array(
				'label'      => esc_html__( 'Post id for category 4', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_post_id_4',
				'type'		 => 'text',
				'priority'	 => 13,
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_4_exclude',
			array(
				'label'      => esc_html__( 'Exclude post for category 4', 'broden' ),
				'section'    => 'broden_new_section_cat_posts',
				'settings'   => 'broden_category_exclude_post_4',
				'type'		 => 'text',
				'priority'	 => 14,
			)
		)
	);

///////////////////////////////////////////////////////////////////////////////

// CUSTOMIZER - BLOG STYLE

///////////////////////////////////////////////////////////////////////////////

	$wp_customize->add_section( 'broden_new_section_blog_style' , array(
   		'title'      => 'Main Blog Posts',
   		'description'=> '',
   		'priority'   => 94,
	) );

	// Add Setting

	$wp_customize->add_setting(
	    'broden_blog_style',
	    array(
	        'default'     => 'style-1',
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_blog_query_orderby',
	    array(
	        'default'     => 'date',
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_blog_query_postid',
	    array(
	        'default'     => '',
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_blog_query_exclude_postid',
	    array(
	        'default'     => '',
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_blog_query_ppp',
	    array(
	        'default'     => '',
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_blog_ads_activate',
	    array(
	        'default'     => '',
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_blog_ads',
	    array(
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_blog_ads_url',
	    array(
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_blog_pagination_style',
	    array(
    		'default'     => 'style-1',
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	// Add Control

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_style',
			array(
				'label'          => esc_html__( 'Blog Posts Layout', 'broden' ),
				'section'        => 'broden_new_section_blog_style',
				'settings'       => 'broden_blog_style',
				'type'           => 'radio',
				'priority'	 => 1,
				'choices'        => array(
					'style-1'   => 'Blog Style 1',
					'style-2'   => 'Blog Style 2',
					'style-3'   => 'Blog Style 3',
					'style-4'   => 'Blog Style 4',
				)
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_query',
			array(
				'label'          => esc_html__( 'Blog Posts Query', 'broden' ),
				'section'        => 'broden_new_section_blog_style',
				'settings'       => 'broden_blog_query_orderby',
				'type'           => 'radio',
				'priority'	 => 2,
				'choices'        => array(
					'date'   => 'Date',
					'comment_count'   => 'Comment Count',
					'rand'   => 'Rand',
					'meta_value_num'   => 'Most Popular Post',
				)
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_query_postid',
			array(
				'label'          => esc_html__( 'Post id', 'broden' ),
				'section'        => 'broden_new_section_blog_style',
				'settings'       => 'broden_blog_query_postid',
				'type'		 	 => 'text',
				'priority'	 	 => 4
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_query_exclude_postid',
			array(
				'label'          => esc_html__( 'Exclude Post id', 'broden' ),
				'section'        => 'broden_new_section_blog_style',
				'settings'       => 'broden_blog_query_exclude_postid',
				'type'		 	 => 'text',
				'priority'	 	 => 5
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_query_ppp',
			array(
				'label'          => esc_html__( 'Post per page', 'broden' ),
				'section'        => 'broden_new_section_blog_style',
				'settings'       => 'broden_blog_query_ppp',
				'type'		 	 => 'text',
				'priority'	 	 => 6
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'broden_blog_ads_activate',
			array(
				'label'          => esc_html__( 'Activate Blog Ads', 'broden' ),
				'section'        => 'broden_new_section_blog_style',
				'settings'       => 'broden_blog_ads_activate',
				'type'           => 'checkbox',
				'priority'	 	 => 7
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_ads_url',
			array(
				'label'          => esc_html__( 'Ads Banner URL', 'broden' ),
				'section'        => 'broden_new_section_blog_style',
				'settings'       => 'broden_blog_ads_url',
				'type'		 	 => 'textarea',
				'priority'	 	 => 8
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_pagination',
			array(
				'label'          => esc_html__( 'Blog Posts Pagination Style', 'broden' ),
				'section'        => 'broden_new_section_blog_style',
				'settings'       => 'broden_blog_pagination_style',
				'type'           => 'radio',
				'priority'	 => 9,
				'choices'        => array(
					'style-1'   => 'Without Ajax Pagination',
					'style-2'   => 'Ajax Pagination',
				)
			)
		)
	);


///////////////////////////////////////////////////////////////////////////////

// CUSTOMIZER - SECONDARY CATEGORY POSTS LAYOUT

///////////////////////////////////////////////////////////////////////////////

	$wp_customize->add_section( 'broden_new_section_cat_articles' , array(
		'title'      => '2. Category Posts',
		'description'=> '',
		'priority'   => 95,
	) );

	// Add Setting

	$wp_customize->add_setting(
		'broden_category_articles',
	        array(
				'default'     => false,
				'sanitize_callback' => 'broden_santanize'
		)
	);
	
	$wp_customize->add_setting(
		'broden_category_articles_layout',
	        array(
				'default'     => 'style-1',
				'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_cat_article',
	        array(
				'default'     => 'uncategorized',
				'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_cat_article_post_id_1',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	$wp_customize->add_setting(
		'broden_cat_article_exclude_post_1',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	

	// Add Control

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_articles',
			array(
				'label'      => esc_html__( 'Enable Secondary Cateogry Posts Layout', 'broden' ),
				'section'    => 'broden_new_section_cat_articles',
				'settings'   => 'broden_category_articles',
				'type'		 => 'checkbox',
				'priority'	 => 1
			)
		)
	);
		
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_articles_layout',
			array(
				'label'      => esc_html__( 'Please select a layout', 'broden' ),
				'section'    => 'broden_new_section_cat_articles',
				'settings'   => 'broden_category_articles_layout',
				'type'		 => 'radio',
				'priority'	 => 2,
				'choices'        => array(
					'style-1'   => 'Category Posts Style 1',
					'style-2'   => 'Category Posts Style 2',
				)
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'cat_article',
			array(
				'label'      => esc_html__( 'Please select 1. Category', 'broden' ),
				'section'    => 'broden_new_section_cat_articles',
				'settings'   => 'broden_cat_article',
				'type'		 => 'select',
				'priority'	 => 3,
				'choices' 	 => broden_get_categories_select()
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_cat_postid',
			array(
				'label'      => esc_html__( 'Post id for category', 'broden' ),
				'section'    => 'broden_new_section_cat_articles',
				'settings'   => 'broden_cat_article_post_id_1',
				'type'		 => 'text',
				'priority'	 => 4,
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_select_cat_exclude',
			array(
				'label'      => esc_html__( 'Exclude post for category', 'broden' ),
				'section'    => 'broden_new_section_cat_articles',
				'settings'   => 'broden_cat_article_exclude_post_1',
				'type'		 => 'text',
				'priority'	 => 5,
			)
		)
	);

///////////////////////////////////////////////////////////////////////////////

// CUSTOMIZER - POPULAR POSTS LAYOUT

///////////////////////////////////////////////////////////////////////////////

	$wp_customize->add_section( 'broden_new_section_popular_posts' , array(
		'title'      => 'Popular Posts',
		'description'=> '',
		'priority'   => 96,
	) );

	// Add Setting

	$wp_customize->add_setting(
		'broden_popular_posts',
	        array(
				'default'     => false,
				'sanitize_callback' => 'broden_santanize'
		)
	);
	
	$wp_customize->add_setting(
		'broden_popular_posts_layout',
	        array(
				'default'     => 'style-1',
				'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_popular_posts_layout_post_id',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	$wp_customize->add_setting(
		'broden_popular_posts_layout_exclude_post',
	        array(
				'default'     => '',
				'sanitize_callback' => 'broden_santanize'
		)
	);
	

	// Add Control

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'popular_posts',
			array(
				'label'      => esc_html__( 'Enable Popular Posts Layout', 'broden' ),
				'section'    => 'broden_new_section_popular_posts',
				'settings'   => 'broden_popular_posts',
				'type'		 => 'checkbox',
				'priority'	 => 1
			)
		)
	);
		
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'popular_posts_layout',
			array(
				'label'      => esc_html__( 'Please select a layout', 'broden' ),
				'section'    => 'broden_new_section_popular_posts',
				'settings'   => 'broden_popular_posts_layout',
				'type'		 => 'radio',
				'priority'	 => 2,
				'choices'        => array(
					'style-1'   => 'Popular Posts Style 1',
					'style-2'   => 'Popular Posts Style 2',
					'style-3'   => 'Popular Posts Style 3',
				)
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'popular_posts_postid',
			array(
				'label'      => esc_html__( 'Post id for popular post', 'broden' ),
				'section'    => 'broden_new_section_popular_posts',
				'settings'   => 'broden_popular_posts_layout_post_id',
				'type'		 => 'text',
				'priority'	 => 3,
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'popular_posts_exclude',
			array(
				'label'      => esc_html__( 'Exclude post for popular post', 'broden' ),
				'section'    => 'broden_new_section_popular_posts',
				'settings'   => 'broden_popular_posts_layout_exclude_post',
				'type'		 => 'text',
				'priority'	 => 4,
			)
		)
	);

///////////////////////////////////////////////////////////////////////////////

// CUSTOMIZER - POST SETTINGS

///////////////////////////////////////////////////////////////////////////////

	$wp_customize->add_section( 'broden_new_section_post_settings' , array(
		'title'      => 'Single Post',
		'description'=> '',
		'priority'   => 97,
	) );

	// Add Setting

	$wp_customize->add_setting(
		'broden_hide_share_view_count',
	        array(
				'default'     => false,
				'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_hide_post_author_bio',
	        array(
				'default'     => false,
				'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
		'broden_hide_related_posts',
	        array(
				'default'     => false,
				'sanitize_callback' => 'broden_santanize'
		)
	);

	// Add Control

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_share',
			array(
				'label'      => esc_html__( 'Hide Social Share & View Count', 'broden' ),
				'section'    => 'broden_new_section_post_settings',
				'settings'   => 'broden_hide_share_view_count',
				'type'		 => 'checkbox',
				'priority'	 => 1
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_author_bio',
			array(
				'label'      => esc_html__( 'Disable Post Author Bio', 'broden' ),
				'section'    => 'broden_new_section_post_settings',
				'settings'   => 'broden_hide_post_author_bio',
				'type'		 => 'checkbox',
				'priority'	 => 2
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'related_posts',
			array(
				'label'      => esc_html__( 'Disable Related Posts', 'broden' ),
				'section'    => 'broden_new_section_post_settings',
				'settings'   => 'broden_hide_related_posts',
				'type'		 => 'checkbox',
				'priority'	 => 3
			)
		)
	);

///////////////////////////////////////////////////////////////////////////////

// CUSTOMIZER - ARCHIVE STYLE

///////////////////////////////////////////////////////////////////////////////

	$wp_customize->add_section( 'broden_new_section_archive_style' , array(
   		'title'      => 'Archive Layout',
   		'description'=> '',
   		'priority'   => 98,
	) );

	// Add Setting

	$wp_customize->add_setting(
	    'broden_archive_style',
	    array(
	        'default'     => 'list',
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	// Add Control

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'archive_style',
			array(
				'label'          => esc_html__( 'Archive Posts Layout', 'broden' ),
				'section'        => 'broden_new_section_archive_style',
				'settings'       => 'broden_archive_style',
				'type'           => 'radio',
				'priority'	 => 1,
				'choices'        => array(
					'list'   => 'Archive Style 1',
					'grid'   => 'Archive Style 2',
					'thumb'   => 'Archive Style 3',
				)
			)
		)
	);

///////////////////////////////////////////////////////////////////////////////

// CUSTOMIZER - FOOTER

///////////////////////////////////////////////////////////////////////////////

	$wp_customize->add_section( 'broden_new_section_footer_settings' , array(
		'title'      => 'Footer',
		'description'=> '',
		'priority'   => 99,
	) );

	$wp_customize->add_setting(
	    'broden_footer_sidebar_activate',
	    array(
	        'default'     => '',
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_footer_ads_activate',
	    array(
	        'default'     => '',
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_footer_ads',
	    array(
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_footer_ads_url',
	    array(
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_setting(
	    'broden_copyright',
	    array(
	        'sanitize_callback' => 'broden_santanize'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_sidebar_activate',
			array(
				'label'          => esc_html__( 'Activate Footer Sidebar', 'broden' ),
				'section'        => 'broden_new_section_footer_settings',
				'settings'       => 'broden_footer_sidebar_activate',
				'type'           => 'checkbox',
				'priority'	 	 => 1
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_ads_activate',
			array(
				'label'          => esc_html__( 'Activate Footer Ads', 'broden' ),
				'section'        => 'broden_new_section_footer_settings',
				'settings'       => 'broden_footer_ads_activate',
				'type'           => 'checkbox',
				'priority'	 	 => 2
			)
		)
	);

	/*$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'footer_ads',
			array(
				'label'          => esc_html__( 'Upload Ads Image', 'broden' ),
				'section'        => 'broden_new_section_footer_settings',
				'settings'       => 'broden_footer_ads',
				'priority'	 	 => 3
			)
		)
	);
*/
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_ads_ads_url',
			array(
				'label'          => esc_html__( 'Ads Banner URL', 'broden' ),
				'section'        => 'broden_new_section_footer_settings',
				'settings'       => 'broden_footer_ads_url',
				'type'		 	 => 'textarea',
				'priority'	 	 => 4
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'broden_copyright',
			array(
				'label'          => esc_html__( 'Copyright Text', 'broden' ),
				'section'        => 'broden_new_section_footer_settings',
				'settings'       => 'broden_copyright',
				'type'		 	 => 'text',
				'priority'	 	 => 5
			)
		)
	);

///////////////////////////////////////////////////////////////////////////////

// CUSTOMIZER - FONT & COLOR SETTINGS

///////////////////////////////////////////////////////////////////////////////

	$google_fonts = array(
		'Abel' => 'Abel',
		'Arimo' => 'Arimo',
		'Arvo' => 'Arvo',
		'Asap' => 'Asap',
		'Bitter' => 'Bitter',
		'Bree Serif' => 'Bree Serif',
		'Cabin Condensed' => 'Cabin Condensed',
		'Cabin' => 'Cabin',
		'Chivo' => 'Chivo',
		'Cuprum' => 'Cuprum',
		'Dosis' => 'Dosis',
		'Droid Sans' => 'Droid Sans',
		'Droid Serif' => 'Droid Serif',
		'Exo' => 'Exo',
		'Francois One' => 'Francois One',
		'Inconsolata' => 'Inconsolata',
		'Josefin Sans' => 'Josefin Sans',
		'Karla' => 'Karla',
		'Lato' => 'Lato',
		'Lora' => 'Lora',
		'Maven Pro' => 'Maven Pro',
		'Merriweather' => 'Merriweather',
		'Montserrat' => 'Montserrat',
		'Muli' => 'Muli',
		'Nunito' => 'Nunito',
		'Open Sans Condensed' => 'Open Sans Condensed',
		'Open Sans' => 'Open Sans',
		'Oswald' => 'Oswald',
		'Playfair Display' => 'Playfair Display',
		'PT Sans Narrow' => 'PT Sans Narrow',
		'PT Sans' => 'PT Sans',
		'PT Serif Caption' => 'PT Serif Caption',
		'PT Serif' => 'PT Serif',
		'Questrial' => 'Questrial',
		'Quicksand' => 'Quicksand',
		'Raleway' => 'Raleway',
		'Rajdhani' => 'Rajdhani',
		'Roboto' => 'Roboto',
		'Roboto Condensed' => 'Roboto Condensed',
		'Roboto Slab' => 'Roboto Slab',
		'Rokkitt' => 'Rokkitt',
		'Signika' => 'Signika',
		'Slabo' => 'Slabo',
		'Source Sans Pro' => 'Source Sans Pro',
		'Ubuntu Condensed' => 'Ubuntu Condensed',
		'Ubuntu' => 'Ubuntu',
		'Varela Round' => 'Varela Round',
		'Vollkorn' => 'Vollkorn'
	);

	$wp_customize->add_panel( 'broden_font_color_settings' , array(
   		'title'      => 'Font & Color Settings',
   		'description'=> '',
   		'priority'   => 100,
	) );

	$wp_customize->add_section( 'broden_font_settings' , array(
   		'title'      => 'Font settings',
   		'description'=> '',
   		'priority'   => 100,
   		'panel' => 'broden_font_color_settings'
	) );

	$wp_customize->add_setting(
	    'broden_body_font',
	    array(
	        'default'     => 'Montserrat',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_title_font',
	    array(
	        'default'     => 'Montserrat',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_category_font',
	    array(
	        'default'     => 'Rajdhani',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_text_font',
	    array(
	        'default'     => 'Montserrat',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'font_latin_ext',
	    array(
	        'default'     => '',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'font_greek_ext',
	    array(
	        'default'     => '',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'font_greek',
	    array(
	        'default'     => '',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'font_cyrillic',
	    array(
	        'default'     => '',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'font_cyrillic_ext',
	    array(
	        'default'     => '',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'font_vietnamese',
	    array(
	        'default'     => '',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'body_font',
			array(
				'label'          => esc_html__( 'Body Font', 'broden' ),
				'section'        => 'broden_font_settings',
				'settings'       => 'broden_body_font',
				'priority'		 => 1,
				'type' 			 => 'select',
				'choices'     	 => $google_fonts
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'title_font',
			array(
				'label'          => esc_html__( 'Title Font', 'broden' ),
				'section'        => 'broden_font_settings',
				'settings'       => 'broden_title_font',
				'priority'		 => 2,
				'type' 			 => 'select',
				'choices'     	 => $google_fonts
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'category_font',
			array(
				'label'          => esc_html__( 'Post Category/Date Font', 'broden' ),
				'section'        => 'broden_font_settings',
				'settings'       => 'broden_category_font',
				'priority'		 => 3,
				'type' 			 => 'select',
				'choices'     	 => $google_fonts
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'text_font',
			array(
				'label'          => esc_html__( 'Text Font', 'broden' ),
				'section'        => 'broden_font_settings',
				'settings'       => 'broden_text_font',
				'priority'		 => 4,
				'type' 			 => 'select',
				'choices'     	 => $google_fonts
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'font_latin_ext',
			array(
				'label'          => esc_html__( 'Include Latin Extended (latin-ext)', 'broden' ),
				'section'        => 'broden_font_settings',
				'settings'       => 'font_latin_ext',
				'priority'		 => 5,
				'type' 			 => 'checkbox',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'font_greek_ext',
			array(
				'label'          => esc_html__( 'Include Greek Extended (greek-ext)', 'broden' ),
				'section'        => 'broden_font_settings',
				'settings'       => 'font_greek_ext',
				'priority'		 => 6,
				'type' 			 => 'checkbox',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'font_greek',
			array(
				'label'          => esc_html__( 'Include Greek (greek)', 'broden' ),
				'section'        => 'broden_font_settings',
				'settings'       => 'font_greek',
				'priority'		 => 6,
				'type' 			 => 'checkbox',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'font_cyrillic',
			array(
				'label'          => esc_html__( 'Include Cyrillic (cyrillic)', 'broden' ),
				'section'        => 'broden_font_settings',
				'settings'       => 'font_cyrillic',
				'priority'		 => 7,
				'type' 			 => 'checkbox',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'font_cyrillic_ext',
			array(
				'label'          => esc_html__( 'Include Cyrillic Extended (cyrillic-ext)', 'broden' ),
				'section'        => 'broden_font_settings',
				'settings'       => 'font_cyrillic_ext',
				'priority'		 => 8,
				'type' 			 => 'checkbox',
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'font_vietnamese',
			array(
				'label'          => esc_html__( 'Include vietnamese (vietnamese)', 'broden' ),
				'section'        => 'broden_font_settings',
				'settings'       => 'font_vietnamese',
				'priority'		 => 9,
				'type' 			 => 'checkbox',
			)
		)
	);

	/*-- HEADER COLOR SETTINGS --*/

	$wp_customize->add_section( 'broden_header_color_settings' , array(
   		'title'      => 'Header color settings',
   		'description'=> '',
   		'priority'   => 101,
   		'panel' => 'broden_font_color_settings'
	) );

	$wp_customize->add_setting(
	    'broden_header_link_color',
	    array(
	        'default'     => '#111',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_header_link_active_color',
	    array(
	        'default'     => '#111',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_header_link_active_bg_color',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_header_submenu_border_color',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_header_social_search_link',
	    array(
	        'default'     => '#111',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_header_social_search_active_color',
	    array(
	        'default'     => '#111',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_header_social_search_active',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_header_link_color',
			array(
				'label'          => esc_html__( 'Main menu link color', 'broden' ),
				'section'        => 'broden_header_color_settings',
				'settings'       => 'broden_header_link_color',
				'priority'		 => 1
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_header_link_active_color',
			array(
				'label'          => esc_html__( 'Main menu link active color', 'broden' ),
				'section'        => 'broden_header_color_settings',
				'settings'       => 'broden_header_link_active_color',
				'priority'		 => 2
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_header_link_active_bg_color',
			array(
				'label'          => esc_html__( 'Main menu link active background color', 'broden' ),
				'section'        => 'broden_header_color_settings',
				'settings'       => 'broden_header_link_active_bg_color',
				'priority'		 => 3
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_header_submenu_border_color',
			array(
				'label'          => esc_html__( 'Sub-menu border top color', 'broden' ),
				'section'        => 'broden_header_color_settings',
				'settings'       => 'broden_header_submenu_border_color',
				'priority'		 => 4
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_header_social_search_link',
			array(
				'label'          => esc_html__( 'Header social&search link color', 'broden' ),
				'section'        => 'broden_header_color_settings',
				'settings'       => 'broden_header_social_search_link',
				'priority'		 => 5
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_header_social_search_active_color',
			array(
				'label'          => esc_html__( 'Header social&search active Color', 'broden' ),
				'section'        => 'broden_header_color_settings',
				'settings'       => 'broden_header_social_search_active_color',
				'priority'		 => 6
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_header_social_search_active',
			array(
				'label'          => esc_html__( 'Header social&search active background Color', 'broden' ),
				'section'        => 'broden_header_color_settings',
				'settings'       => 'broden_header_social_search_active',
				'priority'		 => 7
			)
		)
	);

	/*-- POST COLOR SETTINGS --*/

	$wp_customize->add_section( 'broden_post_color_settings' , array(
   		'title'      => 'Post color settings',
   		'description'=> '',
   		'priority'   => 102,
   		'panel' => 'broden_font_color_settings'
	) );

	$wp_customize->add_setting(
	    'broden_post_category_color',
	    array(
	        'default'     => '#111',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_post_category_background',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_post_title_default',
	    array(
	        'default'     => '#111',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_post_title_color',
	    array(
	        'default'     => '#111',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_post_title_background',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_featured_post_title_hover',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_post_text_color',
	    array(
	        'default'     => '#666',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_post_text_link_background',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_post_category_color',
			array(
				'label'          => esc_html__( 'Post cateogry color', 'broden' ),
				'section'        => 'broden_post_color_settings',
				'settings'       => 'broden_post_category_color',
				'priority'		 => 1
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_post_category_background',
			array(
				'label'          => esc_html__( 'Post category background color', 'broden' ),
				'section'        => 'broden_post_color_settings',
				'settings'       => 'broden_post_category_background',
				'priority'		 => 2
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_post_title_default',
			array(
				'label'          => esc_html__( 'Post title default color', 'broden' ),
				'section'        => 'broden_post_color_settings',
				'settings'       => 'broden_post_title_default',
				'priority'		 => 3
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_post_title_color',
			array(
				'label'          => esc_html__( 'Post title hover color', 'broden' ),
				'section'        => 'broden_post_color_settings',
				'settings'       => 'broden_post_title_color',
				'priority'		 => 4
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_post_title_background',
			array(
				'label'          => esc_html__( 'Post title hover background color', 'broden' ),
				'section'        => 'broden_post_color_settings',
				'settings'       => 'broden_post_title_background',
				'priority'		 => 5
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_featured_post_title_hover',
			array(
				'label'          => esc_html__( 'Featured Post title hover color', 'broden' ),
				'section'        => 'broden_post_color_settings',
				'settings'       => 'broden_featured_post_title_hover',
				'priority'		 => 6
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_post_text_color',
			array(
				'label'          => esc_html__( 'Post text color', 'broden' ),
				'section'        => 'broden_post_color_settings',
				'settings'       => 'broden_post_text_color',
				'priority'		 => 7
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_post_text_link_background',
			array(
				'label'          => esc_html__( 'Post text link background color', 'broden' ),
				'section'        => 'broden_post_color_settings',
				'settings'       => 'broden_post_text_link_background',
				'priority'		 => 8
			)
		)
	);

	/*-- THEME DEFAULT COLORS --*/

	$wp_customize->add_section( 'broden_default_color_settings' , array(
   		'title'      => 'Theme default color settings',
   		'description'=> '',
   		'priority'   => 103,
   		'panel' => 'broden_font_color_settings'
	) );

	$wp_customize->add_setting(
	    'broden_comment_author_hover_background',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_comment_reply_button_background',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_comment_submit_button_background',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_category_articles_button_background',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_featured_posts_button_background',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_featured_posts_background_color',
	    array(
	        'default'     => '#f8f8f8',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_back_top_button_default_background',
	    array(
	        'default'     => '#111',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_back_top_button_color',
	    array(
	        'default'     => '#eee',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_back_top_button_background',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_preloader_background',
	    array(
	        'default'     => '#f7fa00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_widget_background',
	    array(
	        'default'     => '#f8f8f8',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_widget_title_background',
	    array(
	        'default'     => '#eeeeee',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_widget_title_color',
	    array(
	        'default'     => '#111111',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_featured_article_background',
	    array(
	        'default'     => '#111111',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_comment_author_hover_background',
			array(
				'label'          => esc_html__( 'Comment author hover background color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_comment_author_hover_background',
				'priority'		 => 1
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_comment_reply_button_background',
			array(
				'label'          => esc_html__( 'Comment reply button hover background color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_comment_reply_button_background',
				'priority'		 => 2
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_comment_submit_button_background',
			array(
				'label'          => esc_html__( 'Comment submit button hover background color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_comment_submit_button_background',
				'priority'		 => 3
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_category_articles_button_background',
			array(
				'label'          => esc_html__( 'Category articles button hover background color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_category_articles_button_background',
				'priority'		 => 4
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_featured_posts_button_background',
			array(
				'label'          => esc_html__( 'Featured posts button hover color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_featured_posts_button_background',
				'priority'		 => 5
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_featured_posts_background_color',
			array(
				'label'          => esc_html__( 'Featured posts Background color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_featured_posts_background_color',
				'priority'		 => 6
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_back_top_button_color',
			array(
				'label'          => esc_html__( 'Back to top button color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_back_top_button_color',
				'priority'		 => 7
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_back_top_button_default_background',
			array(
				'label'          => esc_html__( 'Back to top button background color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_back_top_button_default_background',
				'priority'		 => 8
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_back_top_button_background',
			array(
				'label'          => esc_html__( 'Back to top button hover color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_back_top_button_background',
				'priority'		 => 8
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_preloader_background',
			array(
				'label'          => esc_html__( 'Preloader color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_preloader_background',
				'priority'		 => 9
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_widget_background',
			array(
				'label'          => esc_html__( 'Sidebar widgets background color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_widget_background',
				'priority'		 => 10
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_widget_title_background',
			array(
				'label'          => esc_html__( 'Sidebar widgets title background color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_widget_title_background',
				'priority'		 => 11
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_widget_title_color',
			array(
				'label'          => esc_html__( 'Sidebar widgets title color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_widget_title_color',
				'priority'		 => 12
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_featured_article_background',
			array(
				'label'          => esc_html__( 'Category posts style 2 background color', 'broden' ),
				'section'        => 'broden_default_color_settings',
				'settings'       => 'broden_featured_article_background',
				'priority'		 => 13
			)
		)
	);

	/*-- THEME WOOCOMMERCE COLORS --*/

	$wp_customize->add_section( 'broden_woocommerce_color_settings' , array(
   		'title'      => 'Theme woocommerce color settings',
   		'description'=> '',
   		'priority'   => 104,
   		'panel' => 'broden_font_color_settings'
	) );

	$wp_customize->add_setting(
	    'broden_woo_button_background',
	    array(
	        'default'     => '#FFBC00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_woo_button_color',
	    array(
	        'default'     => '#ffffff',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_woo_hover_button_background',
	    array(
	        'default'     => '#ECAE00',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_woo_hover_button_color',
	    array(
	        'default'     => '#ffffff',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_woo_onsale_background_color',
	    array(
	        'default'     => '#77a464',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_woo_product_price_color',
	    array(
	        'default'     => '#77a464',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_woo_add_to_cart_bg_color',
	    array(
	        'default'     => '#ffffff',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_woo_add_to_cart_border_color',
	    array(
	        'default'     => '#eeeeee',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_woo_add_to_cart_color',
	    array(
	        'default'     => '#111111',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_woo_add_to_cart_bg_hover_color',
	    array(
	        'default'     => '#eeeeee',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
	    'broden_woo_add_to_cart_hover_color',
	    array(
	        'default'     => '#111111',
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_woo_button_background',
			array(
				'label'          => esc_html__( 'Woocommerce button background color', 'broden' ),
				'section'        => 'broden_woocommerce_color_settings',
				'settings'       => 'broden_woo_button_background',
				'priority'		 => 1
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_woo_button_color',
			array(
				'label'          => esc_html__( 'Woocommerce button color', 'broden' ),
				'section'        => 'broden_woocommerce_color_settings',
				'settings'       => 'broden_woo_button_color',
				'priority'		 => 2
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_woo_hover_button_background',
			array(
				'label'          => esc_html__( 'Woocommerce button hover background color', 'broden' ),
				'section'        => 'broden_woocommerce_color_settings',
				'settings'       => 'broden_woo_hover_button_background',
				'priority'		 => 3
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_woo_hover_button_color',
			array(
				'label'          => esc_html__( 'Woocommerce button hover color', 'broden' ),
				'section'        => 'broden_woocommerce_color_settings',
				'settings'       => 'broden_woo_hover_button_color',
				'priority'		 => 4
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_woo_onsale_background_color',
			array(
				'label'          => esc_html__( 'Woocommerce onsale badge background color', 'broden' ),
				'section'        => 'broden_woocommerce_color_settings',
				'settings'       => 'broden_woo_onsale_background_color',
				'priority'		 => 5
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_woo_product_price_color',
			array(
				'label'          => esc_html__( 'Woocommerce product price color', 'broden' ),
				'section'        => 'broden_woocommerce_color_settings',
				'settings'       => 'broden_woo_product_price_color',
				'priority'		 => 6
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_woo_add_to_cart_bg_color',
			array(
				'label'          => esc_html__( 'Woocommerce add to cart background color', 'broden' ),
				'section'        => 'broden_woocommerce_color_settings',
				'settings'       => 'broden_woo_add_to_cart_bg_color',
				'priority'		 => 7
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_woo_add_to_cart_border_color',
			array(
				'label'          => esc_html__( 'Woocommerce add to cart background color', 'broden' ),
				'section'        => 'broden_woocommerce_color_settings',
				'settings'       => 'broden_woo_add_to_cart_border_color',
				'priority'		 => 8
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_woo_add_to_cart_color',
			array(
				'label'          => esc_html__( 'Woocommerce add to cart background color', 'broden' ),
				'section'        => 'broden_woocommerce_color_settings',
				'settings'       => 'broden_woo_add_to_cart_color',
				'priority'		 => 9
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_woo_add_to_cart_bg_hover_color',
			array(
				'label'          => esc_html__( 'Woocommerce add to cart background hover color', 'broden' ),
				'section'        => 'broden_woocommerce_color_settings',
				'settings'       => 'broden_woo_add_to_cart_bg_hover_color',
				'priority'		 => 10
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'broden_woo_add_to_cart_hover_color',
			array(
				'label'          => esc_html__( 'Woocommerce add to cart background hover color', 'broden' ),
				'section'        => 'broden_woocommerce_color_settings',
				'settings'       => 'broden_woo_add_to_cart_hover_color',
				'priority'		 => 11
			)
		)
	);

///////////////////////////////////////////////////////////////////////////////

// CUSTOMIZER - CUSTOM CSS

///////////////////////////////////////////////////////////////////////////////

	$wp_customize->add_section( 'broden_new_section_custom_css' , array(
		'title'      => 'Custom Css & Js',
		'description'=> '',
		'priority'   => 105,
	) );

	$wp_customize->add_setting(
		'broden_custom_css',
	    array(
	        'sanitize_callback' => 'broden_santanize',
		)
	);

	$wp_customize->add_setting(
		'broden_custom_js',
	    array(
	        'sanitize_callback' => 'broden_santanize',
		)
	);


	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'broden_custom_css',
			array(
				'label'      => esc_html__( 'Custom CSS', 'broden' ),
				'section'    => 'broden_new_section_custom_css',
				'settings'   => 'broden_custom_css',
				'type'		 => 'textarea',
				'priority'	 => 1
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'broden_custom_js',
			array(
				'label'      => esc_html__( 'Custom Js', 'broden' ),
				'section'    => 'broden_new_section_custom_css',
				'settings'   => 'broden_custom_js',
				'type'		 => 'textarea',
				'priority'	 => 2
			)
		)
	);

			
}
add_action( 'customize_register', 'broden_customizer_register' );

function broden_santanize( $input ) {
		return $input;
}

function broden_google_web_fonts() {

	$font = get_theme_mod('broden_body_font', 'Montserrat');
	$fonttitle = get_theme_mod('broden_title_font', 'Montserrat');
	$fontcat = get_theme_mod('broden_category_font', 'Rajdhani');
	$fonttext = get_theme_mod('broden_text_font', 'Montserrat');
	$broden_custom_font = str_replace( ' ', '+', $font ) . ':100,300,400,600,700,800,900|' . esc_html($font);
	$broden_custom_title_font = str_replace( ' ', '+', $fonttitle ) . ':100,300,400,600,700,800,900|' . esc_html($fonttitle);
	$broden_custom_category_font = str_replace( ' ', '+', $fontcat ) . ':100,300,400,600,700,800,900|' . esc_html($fontcat);
	$broden_custom_text_font = str_replace( ' ', '+', $fonttext ) . ':100,300,400,600,700,800,900|' . esc_html($fonttext);

	$font_latin_ext = get_theme_mod( 'font_latin_ext' );
	if( $font_latin_ext == '1' ):
		$font_latin_ext = ',latin-ext';
	else:
		$font_latin_ext = '';
	endif;

	$font_cyrillic = get_theme_mod( 'font_cyrillic' );
	if( $font_cyrillic == '1' ):
		$font_cyrillic = ',cyrillic';
	else:
		$font_cyrillic = '';
	endif;

	$font_cyrillic_ext = get_theme_mod( 'font_cyrillic_ext' );
	if( $font_cyrillic_ext == '1' ):
		$font_cyrillic_ext = ',cyrillic-ext';
	else:
		$font_cyrillic_ext = '';
	endif;
			
	$font_greek_ext = get_theme_mod( 'font_greek_ext' );
	if( $font_greek_ext == '1' ):
		$font_greek_ext = ',greek-ext';
	else:
		$font_greek_ext = '';
	endif;
			
	$font_greek = get_theme_mod( 'font_greek' );
	if( $font_greek == '1' ):
		$font_greek = ',greek';
	else:
		$font_greek = '';
	endif;
			
	$font_vietnamese = get_theme_mod( 'font_vietnamese' );
	if( $font_vietnamese == '1' ):
		$font_vietnamese = ',vietnamese';
	else:
		$font_vietnamese = '';
	endif;

	$broden_font_character_set_select = $font_latin_ext . $font_cyrillic . $font_cyrillic_ext . $font_greek . $font_greek_ext . $font_vietnamese;

	$protocol = is_ssl() ? 'https' : 'http';

	wp_enqueue_style( 'broden-google-fonts', "$protocol://fonts.googleapis.com/css?subset=latin$broden_font_character_set_select&family=" . esc_html($broden_custom_font) . " rel='stylesheet' type='text/css" );
	wp_enqueue_style( 'broden-google-title-fonts', "$protocol://fonts.googleapis.com/css?subset=latin$broden_font_character_set_select&family=" . esc_html($broden_custom_title_font) . " rel='stylesheet' type='text/css" );
	wp_enqueue_style( 'broden-google-category-fonts', "$protocol://fonts.googleapis.com/css?subset=latin$broden_font_character_set_select&family=" . esc_html($broden_custom_category_font) . " rel='stylesheet' type='text/css" );
	wp_enqueue_style( 'broden-google-text-fonts', "$protocol://fonts.googleapis.com/css?subset=latin$broden_font_character_set_select&family=" . esc_html($broden_custom_text_font) . " rel='stylesheet' type='text/css" );

}

add_action( 'wp_enqueue_scripts', 'broden_google_web_fonts' );