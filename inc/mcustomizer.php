<?php

class Mcustomizer{

	/**
	 * @return return the cutom logo URL
	 */
	static function getCustomLogoURL(){
		if (has_custom_logo()){
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			return $image[0];
		}
	}
}