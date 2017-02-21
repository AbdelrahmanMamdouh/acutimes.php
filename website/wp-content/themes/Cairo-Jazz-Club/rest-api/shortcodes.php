<?php
add_action( 'rest_api_init', function() {
	register_rest_field( 'page', 'shortcodes', array(
		'get_callback' => function( $page ) {

			cjc_scew_shortcodes();
			do_shortcode( $page['content']['raw'] );
			global $cjc_all_codes;
			return  $cjc_all_codes;
		}
	) );
} );

$cjc_all_codes = [];

function cjc_scew_shortcodes(){
	global $shortcode_tags;

	foreach ($shortcode_tags as $tag => $value){
		if( $tag == 'cjc_about_section' ){
			$shortcode_tags[ $tag ] = function ($att,$content){
					global $cjc_all_codes;
					$att['img'] = $att['img']? wp_get_attachment_url($att['img'] ):null;
					array_push($cjc_all_codes,array(
						'tag'		=> 'cjc_about_section',
						'atts'		=> $att,
						'content'	=> $content
					));
				};
		}else{
				$shortcode_tags[ $tag ] = function ($att,$content){
					global $cjc_all_codes;
					array_push($cjc_all_codes,array(
						'tag'		=> 'any',
						'atts'		=> $att,
						'content'	=> $content
					));
				};

			}
	}
}