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
	<?php for ( $advCount=0; $advCount<count($img); $advCount++){ ?>
		<?php if ( $img[$advCount] ){ ?>
			<div class="half">
				<a href="<?php echo $url[$advCount] ?>">
					<img src="<?php echo $img[$advCount] ?>" alt="">
				</a>
			</div>
		<?php } ?>
	<?php } ?>
</div>