<?php
require_once(get_template_directory() .'/widgets/social-icons.php');
require_once(get_template_directory() .'/widgets/contact-us.php');

function register_cjc_widgets() {
    register_widget( 'CJC_Social_Widget' );
	register_widget( 'CJC_ContactUs_Widget' );
}
add_action( 'widgets_init', 'register_cjc_widgets' );