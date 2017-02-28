<?php

$cjcNight =  new CJC_ShortCode();

$cjcNight->base = 'cjc_night';
$cjcNight->displayName = 'CJC Night';
$cjcNight->callback = function () {
	
	$query = new WP_Query(array(
					'post_type' => 'night',
					'post_status' => 'any',
					'orderby' => 'post__in',
				));

	if ( has_post_thumbnail() ) {
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id , true);
	$img = $thumb_url_array[0];
     }
	
if ($query->have_posts()) : 
while ($query->have_posts()) : $query->the_post(); 

if ( has_post_thumbnail() ) {
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id , true);
	$img = $thumb_url_array[0];
     }
	ob_start();
	// start buffer
	?>
	<ul class="nights">
		<li class="night" style="background-color: <?php the_field('color'); ?>">
			<div class="row">

				<div class="col-sm-4 col-md-3">
					<img src="<?php echo $img ?>" alt="">
				</div>

				<div class="col-sm-8 col-md-6">
					<?php echo the_content() ?>
				</div>

				<div class="col-sm-12 col-md-3">
					<div class="soundcloud">
					
<?php the_field('embed'); ?>

		
					</div>
				</div>

			</div>
		</li>
	</ul>
	<?php
	endwhile;
	endif; 
	 wp_reset_postdata(); 
	return  ob_get_clean();// return buffer
};
$cjcNight
	->addvcAttribute(array(
		"type" 			=> "textfield",
		"holder" 		=> "div",
		"class" 		=> "",
		"heading" 		=> __("Night Name"),
		"param_name"	=> "title",
		"value" 		=> __(""),
		"description" 	=> __("")
	))
	->addvcAttribute(array(
		"type"			=> "attach_image",
		"holder"		=> "div",
		"class"			=> "",
		"heading" 		=> __("Night Image"),
		"param_name" 	=> "img",
		"value" 		=> __(""),
		"description" 	=> __("")
	))
	->addvcAttribute(array(
		"type" 			=> "textfield",
		"holder" 		=> "div",
		"class" 		=> "",
		"heading" 		=> __("Embed"),
		"param_name"	=> "embed",
		"value" 		=> __(""),
		"description" 	=> __(" youtube, soundcloud & others <br> only copy the URL !!")
	))
	->addvcAttribute(array(
		"type" 			=> "colorpicker",
		"holder" 		=> "div",
		"class" 		=> "",
		"heading" 		=> __("Background Color"),
		"param_name"	=> "color",
		"value" 		=> __(""),
		"description" 	=> __("")
	))
	->addvcContent();

$cjcNight->register();
?>