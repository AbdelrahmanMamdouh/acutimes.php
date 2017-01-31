<?php
/**
 * Template part for displaying contact us
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cjc
 */

?>

<ul class="contact-us">
	<li class="address">
		<?php echo get_theme_mod('cjc-identity-address'); ?>
	</li>
	<li class="emails">
		<?php echo get_theme_mod('cjc-identity-email');  ?>
	</li>
	<li class="phone">
		<?php echo get_theme_mod('cjc-identity-phone');  ?>
	</li>
</ul>