<?php
/**
 * Template part for displaying social icon in header.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cjc
 */

global $init, $fbUser;

$facebook	= get_theme_mod('cjc-social-media-facebook');
$twitter	= get_theme_mod('cjc-social-media-twitter');
$youtube	= get_theme_mod('cjc-social-media-youtube');
?>
<ul class="social-icons">

	<?php if( !$init->IsLogged() ) { ?>
		<li><a class="account modal-link-inline" href="#login-modal">Account</a></li>
	<?php } else { ?>
		<li><a class="account-loged-in modal-link-inline" href="#logout-modal" style = 'background-image: url(<?php echo $fbUser->user_picture ?>); '><?php echo $fbUser->user_name ?></a></li>
    <input type="hidden" id="User_email" value='<?php echo($fbUser->user_email);?>'>
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

</ul>

<?php 
	require_once(locate_template('modal-templates/login-modal.php'));
	require_once(locate_template('modal-templates/logout-modal.php'));
?>