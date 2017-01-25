<?php
require_once get_template_directory() .'/widgets/social-icons.php';
require_once get_template_directory() .'/widgets/contact-us.php';
require_once get_template_directory() .'/widgets/footer-logo.php';
require_once get_template_directory() .'/widgets/android-ios-store.php';

function register_cjc_widgets() {
	register_widget( 'CJC_Social_Widget' );
	register_widget( 'CJC_ContactUs_Widget' );
	register_widget( 'CJC_FooterLogo_Widget' );
	register_widget( 'CJC_Android_IOS_Widget' );
}
add_action( 'widgets_init', 'register_cjc_widgets' );