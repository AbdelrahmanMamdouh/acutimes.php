<?php
/**
 * Template part for displaying social icon in header.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cjc
 */

$login		= wp_login_url( get_permalink() ) . '&loginFacebook=1';
$facebook	= get_theme_mod('cjc-social-media-facebook');
$twitter	= get_theme_mod('cjc-social-media-twitter');
$youtube	= get_theme_mod('cjc-social-media-youtube');
?>

<ul class="social-icons">
	<?php if($login) { ?>
		<li><a class="account modal-link" href="<?php echo get_template_directory_uri()?>/modal-templates/login-modal.php">Account</a></li>
	<?php } ?>
	<?php if($facebook) { ?>
		<li><a class="facebook" target="_blank" href="<?php echo $facebook ?>">Facebook</a></li>
	<?php } ?>

	<?php if($twitter) { ?>
		<li><a class="twitter" target="_blank" href="<?php echo $twitter ?>">Twitter</a></li>
	<?php } ?>

	<?php if($youtube) { ?>
		<li><a class="youtube" target="_blank" href="<?php echo $youtube ?>">Youtube</a></li>
	<?php } ?>
</ul>