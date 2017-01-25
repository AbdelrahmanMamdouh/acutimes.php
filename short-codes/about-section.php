<?php
function cjc_shortcode_aboutus_section( $atts, $content = null ) {
	 $a = shortcode_atts( array(
		'title' 	=> '',
		'img' 		=> '',
		'direction'	=>'Right'
	 ), $atts );

	$img = $a['img']? wp_get_attachment_url($a['img'] ):'';

	$img_css_class = $text_css_class = '';

	if($a['direction']=='Right'){
		$img_css_class = ' col-md-push-8 ';
		$text_css_class = ' col-md-pull-4 ';
	}

	ob_start();// start buffer
	?>
	<div class="c-section--tall">
		<div class="row">

			<div class="col-md-4 <?php echo $img_css_class ?>">
				<div class="circle circle--xl circle--center">
					<div class="circle__content">
						<img style="height: 255px;" src="<?php echo $img ?>" alt="">
					</div>
				</div>
			</div>

			<div class="col-md-8 <?php echo $text_css_class ?>">
				<h1><?php echo $a['title'].$a['direction'] ?></h1>
				<?php echo $content ?>
			</div>

		</div>
	</div>
	<?php
	return  ob_get_clean();// return buffer
}

add_shortcode( 'cjc_about_section' , 'cjc_shortcode_aboutus_section' );

//check if visual composer is installed
if(function_exists ('vc_map')){
vc_map( array(
	"name" 			=> __("CJC about section"),
	"base" 			=> "cjc_about_section",
	"category" 		=> __('Cairo Jazz Club'),
	"params" => array(
		array(
			"type" 			=> "textfield",
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
			"description" 	=> __("the direction of the img"),
		 	"value"			=> array('Right','Left')
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
	)
));
}