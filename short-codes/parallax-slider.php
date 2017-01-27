<?php
function cjc_shortcode_parallax_slider( $atts, $content = null ) {
	 $args = shortcode_atts( array(
		'title' 	=> '',
		'class' 	=> '',
		'id' 	=> '',
	 ), $atts );

	ob_start();// start buffer
	?>
	 <div class="container-fluid" id="trigger">
        <div class="parallax <?php echo $args['class']; ?>" id="<?php echo $args['id']; ?>">
            <div class="parallax__content">

                <img src="<?php echo get_template_directory_uri();?>/img/events-top.png" alt="">

                <div class="events-content">

                    <h2 class="centered"> <?php echo $args['title']; ?> </h2>

                    <?php echo apply_filters('the_content', $content); ?>

                </div>

                <img src="<?php echo get_template_directory_uri();?>/img/events-bottom.png" alt="">

            </div>
        </div>
    </div>
	<?php
	return  ob_get_clean();// return buffer
}

add_shortcode( 'cjc_parallax_slider' , 'cjc_shortcode_parallax_slider' );

//check if visual composer is installed
if(function_exists ('vc_map')){
vc_map( array(
	"name" 			=> __("CJC Parallax Slider"),
	"base" 			=> "cjc_parallax_slider",
	"category" 		=> __('Cairo Jazz Club'),
	"params" => array(
		array(
			"type" 			=> "textfield",
			"holder" 		=> "div",
			"class" 		=> "",
			"heading" 		=> __("Slider Name"),
			"param_name"	=> "title",
			"value" 		=> __(""),
			"description" 	=> __("Enter text used as slider title (Note: located above content element).")
		),
		array(
			"type" 			=> "textarea_html",
			"holder" 		=> "div",
			"class" 		=> "",
			"heading" 		=> __( "Content" ),
			"param_name" 	=> "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
			"value" 		=> __(""),
			"description" 	=> __( "Provide the content for this parallax slider." )
		),
		array(
			"type" 			=> "textfield",
			"holder" 		=> "div",
			"class" 		=> "",
			"heading" 		=> __("Extra class name"),
			"param_name"	=> "class",
			"value" 		=> __(""),
			"description" 	=> __("Style particular content element differently - add a class name and refer to it in custom CSS.")
		),
		array(
			"type" 			=> "textfield",
			"holder" 		=> "div",
			"class" 		=> "",
			"heading" 		=> __("ID"),
			"param_name"	=> "id",
			"value" 		=> __(""),
			"description" 	=> __("Style particular content element differently - add a id name and refer to it in custom CSS.")
		),
	)
));
}