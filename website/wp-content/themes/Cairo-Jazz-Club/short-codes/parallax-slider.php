<?php

$cjcParallaxSlider =  new CJC_ShortCode();

$cjcParallaxSlider->base = 'cjc_parallax_slider';
$cjcParallaxSlider->displayName = 'CJC Parallax Slider';

$cjcParallaxSlider->callback = function ( $atts, $content = null ) {

	$a = $cjcParallaxSlider->shortcode_atts( $atts );

	ob_start();// start buffer
	?>
	 <div class="container-fluid">
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
};

$cjcParallaxSlider
	->addvcAttribute(array(
		"type" 			=> "textfield",
		"holder" 		=> "div",
		"class" 		=> "",
		"heading" 		=> __("Slider Name"),
		"param_name"	=> "title",
		"value" 		=> __(""),
		"description" 	=> __("Enter text used as slider title (Note: located above content element).")
	))
	->addvcAttribute(array(
		"type" 			=> "textfield",
		"holder" 		=> "div",
		"class" 		=> "",
		"heading" 		=> __("Extra class name"),
		"param_name"	=> "class",
		"value" 		=> __(""),
		"description" 	=> __("Style particular content element differently - add a class name and refer to it in custom CSS.")
	))
	->addvcAttribute(array(
		"type" 			=> "textfield",
		"holder" 		=> "div",
		"class" 		=> "",
		"heading" 		=> __("ID"),
		"param_name"	=> "id",
		"value" 		=> __(""),
		"description" 	=> __("Style particular content element differently - add a id name and refer to it in custom CSS.")
	))
	->addvcContent("Content","Provide the content for this parallax slider.");

$cjcParallaxSlider->register();