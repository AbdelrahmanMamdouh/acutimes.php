<?php
require_once get_template_directory() .'/widgets/social-icons.php';
require_once get_template_directory() .'/widgets/contact-us.php';
require_once get_template_directory() .'/widgets/footer-logo.php';
require_once get_template_directory() .'/widgets/android-ios-store.php';
require_once get_template_directory() .'/widgets/stay-in-touch.php';

add_action( 'widgets_init', function () {
	register_widget( 'CJC_Social_Widget' );
	register_widget( 'CJC_ContactUs_Widget' );
	register_widget( 'CJC_FooterLogo_Widget' );
	register_widget( 'CJC_Android_IOS_Widget' );
	register_widget( 'CJC_StayInTouch_Widget' );
});


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', function () {

	register_sidebar( array(
		'name'		 	=> esc_html__( 'Footer Widget area Right (Large)', 'cairo-jazz-club' ),
		'id'			=> 'footer-widget-right',
		'description'   => esc_html__( 'a widget area in the footer on the right side , size large', 'cairo-jazz-club' ),
		'before_widget' => '<div class="block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'		 	=> esc_html__( 'Footer Widget area left (small)', 'cairo-jazz-club' ),
		'id'			=> 'footer-widget-left',
		'description'   => esc_html__( 'a widget area in the footer on the left side , size small', 'cairo-jazz-club' ),
		'before_widget' => '<div class="block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	
});