<?php
/**
 * Template part for displaying social icon in header.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cjc
 */

global $FBR_User_data;

$facebook	= get_theme_mod('cjc-social-media-facebook');
$twitter	= get_theme_mod('cjc-social-media-twitter');
$youtube	= get_theme_mod('cjc-social-media-youtube');
$soundcloud	= get_theme_mod('cjc-social-media-soundcloud');
$instagram	= get_theme_mod('cjc-social-media-instagram');
?>
<ul class="social-icons">

	<?php if( !$FBR_User_data['is_loged']) { ?>
		<li><a class="account modal-link-inline" href="#login-modal">Account</a></li>
	<?php } else { ?>
		<li><a class="account-loged-in modal-link-inline" href="#logout-modal" style = 'background-image: url(<?php echo $FBR_User_data['img'] ?>); '>
			<?php echo $FBR_User_data['name'] ?>
		</a></li>
		<input type="hidden" id="User_email" value='<?php echo $FBR_User_data['email'];?>'>
	<?php }?>

	<?php if($facebook) { ?>
		<li><a class="facebook" target="_blank" href="<?php echo $facebook ?>">Facebook</a></li>
	<?php } ?>

	<?php if($twitter) { ?>
		<li><a class="twitter" target="_blank" href="<?php echo $twitter ?>">Twitter</a></li>
	<?php } ?>

	<?php if($youtube) { ?>
		<li><a class="youtube" target="_blank" href="<?php echo $youtube ?>">Youtube</a></li>
	<?php } ?>

	<?php if($soundcloud) { ?>
		<li><a class="soundcloud" target="_blank" href="<?php echo $soundcloud ?>">Soundcloud</a></li>
	<?php } ?>

	<?php if($instagram) { ?>
		<li><a class="instagram" target="_blank" href="<?php echo $instagram ?>">Instagram</a></li>
	<?php } ?>

</ul>

<?php 
	require_once(locate_template('modal-templates/login-modal.php'));
	require_once(locate_template('modal-templates/logout-modal.php'));
?>