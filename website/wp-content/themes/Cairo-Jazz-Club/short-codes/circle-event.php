<?php

$cjcCricleEvents =  new CJC_ShortCode();

$cjcCricleEvents->base = 'cjc_circle_events';
$cjcCricleEvents->displayName = 'CJC Circle Events';

$cjcCricleEvents->callback = function ( $atts, $content = null ) {

	ob_start();// start buffer

    get_template_part('template-parts/desktop-events' );
    get_template_part('template-parts/mobile-events' );

	return  ob_get_clean();// return buffer
};

$cjcCricleEvents->register();