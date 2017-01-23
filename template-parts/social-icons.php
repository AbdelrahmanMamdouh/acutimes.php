<?php
/**
 * Template part for displaying social icon in header.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cjc
 */

//<<<<<<<<<<<<<<<<<<<<<<<<<
if (!function_exists('get_feild')) {
	return;
}
$facebook = get_field('facebook', 'option');
$twitter = get_field('twitter', 'option');
$youtube = get_field('youtube', 'option');
?>

<ul class="social-icons">
    <li><a class="account" href="<?php echo get_permalink( get_page_by_title( 'Login' ) ) ?>">Account</a></li>
    <?php if($facebook) { ?>
        <li><a class="facebook" href="<?php echo $facebook ?>">Facebook</a></li>
    <?php } ?>

    <?php if($twitter) { ?>
        <li><a class="twitter" href="<?php echo $twitter ?>">Twitter</a></li>
    <?php } ?>

    <?php if($youtube) { ?>
        <li><a class="youtube" href="<?php echo $youtube ?>">Youtube</a></li>
    <?php } ?>
</ul>