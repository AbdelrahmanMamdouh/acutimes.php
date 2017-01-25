<?php
function cjc_shortcode_aboutus_section( $atts, $content = null ) {
	 $a = shortcode_atts( array(
		  'title' 	=> '',
		  'img' 		=> '',
		'direction'	=>'right'
	 ), $atts );

	$img = $a['img']? wp_get_attachment_image($a['img'] ):'';
	if($a['direction']='left'){
		$img_css_class = ' col-md-push-8 ';
		$text_css_class = 'col-md-pull-4';
	}else{
		$text_css_class = ' col-md-push-8 ';
		$img_css_class = 'col-md-pull-4';
	}
	ob_start();// start buffer
	?>
		<div class="row">
			<div class="col-md-4 <?php $img_css_class ?>">
				<div class="circule circule--xl circule--center">
					<div class="circule__content">
						<?php echo $img ?>
					</div>
				</div>
			</div>
			<div class="col-md-8 <?php $text_css_class ?>">
				<h1><?php echo $a['title'] ?></h1>
				<?php echo $content ?>
				</div>
		</div>
	<?php
	return  ob_get_clean();// return buffer
}

add_shortcode( 'cjc_about_section' , 'cjc_shortcode_aboutus_section' );

vc_map( array(
	"name" 			=> __("CJC about section"),
	"base" 			=> "cjc_about_section",
	"category" 		=> __('Cairo Jazz Club'),
	"params" => array(
		array(
			"type" 		=> "textfield",
			"holder" 		=> "div",
			"class" 		=> "",
			"heading" 		=> __("Title"),
			"param_name"	=> "title",
			"value" 		=> __(""),
			"description" 	=> __("the title to be displayed.")
		),
		array(
			"type"			=> "attach_image",
			"holder"		=> "div",
			"class"			=> "",
			"heading" 		=> __("image"),
			"param_name" 	=> "img",
			"value" 		=> __(""),
			"description" 	=> __("the img to be displayed next to title.")
		),
	  array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class"			=> "",
			"heading" 		=> __("direction"),
			"param_name" 	=> "direction",
			"value" 		=> __(""),
			"description" 	=> __("the direction of the img"),
		 	"value"			=> array(
			 	'Right'	=> 'right',
				'Left'	=> 'left',
			)
		),
	  array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content" ),
				"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
				"value" => __(""),
				"description" => __( "Enter your content." )
			)
	)
));