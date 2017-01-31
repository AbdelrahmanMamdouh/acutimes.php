<?php
/**
 * cjc Theme Customizer
 *
 * @package cjc
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cairo_jazz_club_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport		 = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('header_image');

	$wp_customize->add_section('cjc-social-media', array(
		'title'=>'Social Media',
		'priority'=>'50',
		'description'=>'social media links'
	 ));

	 QuickCustomizer::add_SocialMedia($wp_customize,'facebook','add your facebook page url here');
	 QuickCustomizer::add_SocialMedia($wp_customize,'twitter','add your twitter page url here');
	 QuickCustomizer::add_SocialMedia($wp_customize,'youtube','add your youtube chanel page url here');

	 QuickCustomizer::add_SiteIdentety($wp_customize,'phone','Phone Number','','text');
	 QuickCustomizer::add_SiteIdentety($wp_customize,'email','E-Mail','','email');
	 QuickCustomizer::add_SiteIdentety($wp_customize,'address','Address','','text');

	 QuickCustomizer::add_SiteIdentety($wp_customize,'android','Android Store','google play store link','url');
	 QuickCustomizer::add_SiteIdentety($wp_customize,'ios','IOS Store','ios store link','url');

	$wp_customize->add_setting('cjc-identity-footer-logo', array(
		'default'		=> '',
		'transport'   => 'refresh',
	));

	 $wp_customize->add_control(
	   new WP_Customize_Image_Control(
		   $wp_customize,
		   'cjc-identity-footer-logo',
		   array(
			   'label'	  => __( 'Footer logo (inverse)', 'cairo-jazz-club' ),
			   'section'	=> 'title_tagline',
			   'settings'   => 'cjc-identity-footer-logo',
			 //  'context'	=> 'your_setting_context' 
		   )
	   )
   );
}
add_action( 'customize_register', 'cairo_jazz_club_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cairo_jazz_club_customize_preview_js() {
	wp_enqueue_script( 'cairo_jazz_club_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'cairo_jazz_club_customize_preview_js' );

class QuickCustomizer{

	static function add_SocialMedia($wp_customize,$name,$descrption){
		$wp_customize->add_setting('cjc-social-media-'.$name, array(
				'default'		=> '',
				//'capability'	 => 'edit_theme_options',
				'transport'   => 'refresh',
				//'type'		   => 'option',
			));

		$wp_customize->add_control('cjc-social-media-'.$name, array(
			'label'=>$name,
			'description'=>$descrption,
			'section'=>'cjc-social-media',
			//'priority'=>'200',
			'type'=>'url',
			'setting'=>'cjc-social-media-'.$name
		));
	}

	static function add_SiteIdentety($wp_customize,$name,$label,$descrption,$type){
		$wp_customize->add_setting('cjc-identity-'.$name, array(
			'default'		=> '',
			'transport'   => 'refresh',
		));

		$wp_customize->add_control('cjc-identity-'.$name, array(
			'label'=>$label,
			'description'=>$descrption,
			'section'=>'title_tagline',
			'priority'=>'150',
			'type'=>$type,
			'setting'=>'cjc-identity-'.$name
		));
	}
}


