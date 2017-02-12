<?php
//	wp-json/cjc/metaslider/images/{id}
add_action( 'rest_api_init', function() {
	register_rest_route( 'cjc/', 'metaslider/images/(?P<id>\d+)', array(
		'methods' => 'GET',
		'callback' => 'get_slider_images_urls'
	) );
} );	


function get_slider_images_urls($request) {

	$slider_id = $request['id'];

	set_orginal_image_size(); // setting the slider before the shortcode gets excuted to retreive the original size of the image without cropping it.
	$slider_content = do_shortcode("[metaslider id=$slider_id]");

	$regexp = '<img[^>]+src=(?:\"|\')\K(.[^">]+?)(?=\"|\')';

	if(preg_match_all("/$regexp/", $slider_content, $matches, PREG_SET_ORDER)) {

	    if( !empty($matches) ) {
	        foreach ($matches as $image_url) {  
	            $image_urls[]['url'] = $image_url[0];
	        }
	        return $image_urls;
	    }
	}
}

function set_orginal_image_size() {

	function metaslider_disable_crop($cropped_url, $orig_url) {
		return $orig_url;
	}
	add_filter('metaslider_resized_image_url', 'metaslider_disable_crop', 10, 2);

}