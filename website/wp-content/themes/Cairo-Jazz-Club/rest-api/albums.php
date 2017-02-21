<?php
add_action( 'rest_api_init', function() {
	register_rest_field( 'albums', 'images_urls', array(
		'get_callback' => function( $albums_arr ) {
			$album_obj = get_post( $albums_arr['id'] ); 
			$album_content = $album_obj->post_content;
			$images_id = get_images_ids($album_content);
			$images_urls = get_images_urls($images_id);
			return $images_urls;
		}
	) );
} );

function get_images_ids($post_content) {
			preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
			return explode(",", $ids[1]);
}

function get_images_urls($images_id) {
		foreach ($images_id as $image_id) {   
			$images_urls[] = wp_get_attachment_image_src($image_id, "original")[0];
		}
		return $images_urls;
}