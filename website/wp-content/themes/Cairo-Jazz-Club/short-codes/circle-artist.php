<?php

function getArtistsNames () {

	$artists = get_posts( array(
		'post_type'	  => 'artists',
		'posts_per_page' => '3',
		'meta_key'		 => 'Featured',
		'meta_value'	 => 1 // get Featured Artists only
	));

	foreach ($artists as $artist) {
		$artists_name[] = $artist->post_name;
	}

	return $artists_name;
}

function getArtist($artists_name) {
	return get_page_by_title($artists_name, OBJECT, 'artists');
}


$cjcCircleArtist =  new CJC_ShortCode();

$cjcCircleArtist->base = 'cjc_circle_artist';
$cjcCircleArtist->displayName = 'CJC Circle Artist';

$cjcCircleArtist->callback = function ( $atts, $content = null ) {

	$a = $atts;

	$artist = getArtist($a['name']);

	ob_start();// start buffer
	?>
		<div class="artist circle <?php echo $a['size_pos'] ?>">
				<a href="<?php echo get_template_directory_uri() ?>/modal-templates/artist-modal.php?artistId=<?php echo $artist->ID ?>" class="modal-link"><h3 class="artist__name">
					<div class="circle__content">
							<?php
								$artist_image_id = get_post_thumbnail_id( $artist->ID );
								$artist_image = wp_get_attachment_image_src($artist_image_id, 'circle', true);
								$artist_image_url = $artist_image[0];
							?>
						<img src="<?php echo $artist_image_url ?>" alt="">
					</div>
				</a>
			</div>
	<?php
	return  ob_get_clean();// return buffer
};

$cjcCircleArtist
	->addvcAttribute(array(
		"type" 			=> "dropdown",
		"holder" 		=> "div",
		"class" 		=> "",
		"heading" 		=> __("Artist Name"),
		"param_name"	=> "name",
		"value" 		=> getArtistsNames(),
		"description" 	=> __("Choose the featured artist to display")
	))
	->addvcAttribute(array(
		"type" 			=> "dropdown",
		"holder" 		=> "div",
		"class" 		=> "",
		"heading" 		=> __("Circle Size and Circle Position"),
		"param_name"	=> "size_pos",
		"value" 		=> array(
			'circle--xs pos-1',
			'circle--xs pos-2',
			'circle--xs pos-3',
		   	'circle--sm pos-5',
			'circle--sm pos-7',
			'circle--sm pos-8',
			'circle--sm pos-9',
			'circle--md pos-1',	
			'circle--md pos-2',
			'circle--md pos-3',
			'circle--md pos-4',
			'circle--md pos-6'
		),
		"description" 	=> __("Select the circle size and the circle position on the slider")
	));

$cjcCircleArtist->register();