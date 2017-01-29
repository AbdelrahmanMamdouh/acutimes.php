<?php
require_once get_template_directory() .'/widgets/social-icons.php';
require_once get_template_directory() .'/widgets/contact-us.php';
require_once get_template_directory() .'/widgets/footer-logo.php';
require_once get_template_directory() .'/widgets/android-ios-store.php';

add_action( 'widgets_init', function () {
	register_widget( 'CJC_Social_Widget' );
	register_widget( 'CJC_ContactUs_Widget' );
	register_widget( 'CJC_FooterLogo_Widget' );
	register_widget( 'CJC_Android_IOS_Widget' );
});


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', function () {
	/*
	register_sidebar( array(
		'name'		  => esc_html__( 'Sidebar', 'cairo-jazz-club' ),
		'id'			=> 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cairo-jazz-club' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	*/
	register_sidebar( array(
		'name'		 	=> esc_html__( 'Footer Widget area Right (small)', 'cairo-jazz-club' ),
		'id'			=> 'footer-widget-right',
		'description'   => esc_html__( 'a widget area in the footer on the right side , size small', 'cairo-jazz-club' ),
		'before_widget' => '<div class="block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'		 	=> esc_html__( 'Footer Widget area Center (large)', 'cairo-jazz-club' ),
		'id'			=> 'footer-widget-center',
		'description'   => esc_html__( 'a widget area in the footer in center , size large', 'cairo-jazz-club' ),
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