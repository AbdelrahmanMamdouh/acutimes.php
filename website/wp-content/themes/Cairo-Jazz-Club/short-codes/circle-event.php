<?php

$cjcCricleEvents =  new CJC_ShortCode();

$cjcCricleEvents->base = 'cjc-parallax-event-circles';
$cjcCricleEvents->displayName = 'CJC Parallax Events Circle ';

$cjcCricleEvents->callback = function ( $atts, $content = null ) {

	ob_start();// start buffer

    get_template_part('template-parts/parallax-event-circles' );

	return  ob_get_clean();// return buffer
};

$cjcCricleEvents->register();