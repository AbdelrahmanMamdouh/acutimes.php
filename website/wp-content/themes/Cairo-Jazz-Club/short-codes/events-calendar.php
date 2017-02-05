<?php

$cjcAdvertisement =  new CJC_ShortCode();

$cjcAdvertisement->base = 'cjc_event_cal';
$cjcAdvertisement->displayName = 'CJC Event Calendar';

$cjcAdvertisement->callback = function ( $atts, $content = null ) {

	ob_start();// start buffer

	get_template_part('template-parts/events-calendar'); 

	return  ob_get_clean();// return buffer
};

$cjcAdvertisement->register();