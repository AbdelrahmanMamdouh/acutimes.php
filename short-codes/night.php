<?php
function cjc_shortcode_night( $atts, $content = null ) {
	 $a = shortcode_atts( array(
		'title' 	=> '',
		'img' 		=> '',
		'embed'		=>'',
		'color'		=>'#FFF'
	 ), $atts );

	$img = $a['img']? wp_get_attachment_url($a['img'] ):'';

	ob_start();// start buffer
	?>
	<ul class="nights">
		<li class="night" style="background-color: <?php echo $a['color'] ?>">
			<div class="row">

				<div class="col-sm-4 col-md-3">
					<img src="<?php echo $img ?>" alt="">
				</div>

				<div class="col-sm-8 col-md-6">
					<?php echo $content ?>
				</div>

				<div class="col-sm-12 col-md-3">
					<div class="soundcloud">
						<?php if($a['embed']){ ?>
							<iframe width="100%" src="<?php echo $a['embed'] ?>" frameborder="0" scrolling="no" allowfullscreen></iframe>
						<?php } ?>
					</div>
				</div>

			</div>
		</li>
	</ul>
	<?php
	return  ob_get_clean();// return buffer
}

add_shortcode( 'cjc_night' , 'cjc_shortcode_night' );

//check if visual composer is installed
if(function_exists ('vc_map')){
vc_map( array(
	"name" 			=> __("CJC Night"),
	"base" 			=> "cjc_night",
	"category" 		=> __('Cairo Jazz Club'),
	"params" => array(
		array(
			"type" 			=> "textfield",
			"holder" 		=> "div",
			"class" 		=> "",
			"heading" 		=> __("Night Name"),
			"param_name"	=> "title",
			"value" 		=> __(""),
			"description" 	=> __("")
		),
		array(
			"type"			=> "attach_image",
			"holder"		=> "div",
			"class"			=> "",
			"heading" 		=> __("Night Image"),
			"param_name" 	=> "img",
			"value" 		=> __(""),
			"description" 	=> __("")
		),
		array(
			"type" 			=> "textarea_html",
			"holder" 		=> "div",
			"class" 		=> "",
			"heading" 		=> __( "Content" ),
			"param_name" 	=> "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
			"value" 		=> __(""),
			"description" 	=> __( "Enter your content." )
		),
		array(
			"type" 			=> "textfield",
			"holder" 		=> "div",
			"class" 		=> "",
			"heading" 		=> __("Embed"),
			"param_name"	=> "embed",
			"value" 		=> __(""),
			"description" 	=> __(" youtube, soundcloud & others <br> only copy the URL !!")
		),
		array(
			"type" 			=> "colorpicker",
			"holder" 		=> "div",
			"class" 		=> "",
			"heading" 		=> __("Background Color"),
			"param_name"	=> "color",
			"value" 		=> __(""),
			"description" 	=> __("")
		),
	)
));
}