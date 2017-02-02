<?php
/**
 * Template part for displaying advertisment section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cjc
 */

$urls = array(
	get_theme_mod('cjc-adds-url-1'),
	get_theme_mod('cjc-adds-url-2')
);

$img = array(
	get_theme_mod('cjc-adds-img-1'),
	get_theme_mod('cjc-adds-img-2')
);
?>

<div class="custom-row">
	<div class="half">
		<a href="<?php echo $url[0] ?>">
			<img src="<?php echo $img[0] ?>" alt="">
		</a>
	</div>

	<div class="half">
		<a href="<?php echo $url[1] ?>">
			<img src="<?php echo $img[1] ?>" alt="">
		</a>
	</div>
</div>