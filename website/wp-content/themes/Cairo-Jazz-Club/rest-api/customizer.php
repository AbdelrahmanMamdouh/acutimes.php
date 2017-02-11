<?php
//	wp-json/cjc/customizer/
add_action( 'rest_api_init', function() {
	register_rest_route( 'cjc/', 'customizer/', array(
			'methods' => 'GET',
			'callback' => function(){
				return get_theme_mods();
			},
		) );
} );	