<?php

$cjcAdvertisement =  new CJC_ShortCode();

$cjcAdvertisement->base = 'cjc_advertisement';
$cjcAdvertisement->displayName = 'CJC advertisement section';

$cjcAdvertisement->callback = function ( $atts, $content = null ) {

	ob_start();// start buffer

	get_template_part('template-parts/advertisement'); 

	return  ob_get_clean();// return buffer
};

$cjcAdvertisement->register();