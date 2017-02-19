<?php

$cjcNight =  new CJC_ShortCode();

$cjcNight->base = 'cjc_night';
$cjcNight->displayName = 'CJC Night';

$cjcNight->callback = function ( $atts, $content = null ) {

	$a = $atts;

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
							<?php if(preg_match('(soundcloud)',$a['embed'])){ 
									//Get the SoundCloud URL
										
										//Get the JSON data of song details with embed code from SoundCloud oEmbed
										$getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$a['embed'].'&iframe=true');
										//Clean the Json to decode
										$decodeiFrame=substr($getValues, 1, -2);
										//json decode to convert it as an array
										$jsonObj = json_decode($decodeiFrame);

										//Change the height of the embed player if you want else uncomment below line
										// echo $jsonObj->html;
										//Print the embed player to the page
										echo str_replace('height="400"', 'height="140"', $jsonObj->html);}
								else{

										echo preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"100%\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>", $a['embed']);
								}
								?>

							
							
							
						<?php } ?>
					</div>
				</div>

			</div>
		</li>
	</ul>
	<?php
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