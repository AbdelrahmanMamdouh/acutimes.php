<?php
/**
 * Template part for displaying posts in group (! is_single())
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cjc
 */

$GLOBALS['cjc-content-small-direction'] = (isset($GLOBALS['cjc-content-small-direction']))? !$GLOBALS['cjc-content-small-direction']:true;

if($GLOBALS['cjc-content-small-direction']){
	$cjc_img_class = '';
	$cjc_post_class = '';
}else{
	$cjc_img_class = 'col-md-push-5';
	$cjc_post_class = 'col-md-pull-7';
}
?>

<div class="c-section">
	<div class="row">
		<div class="col-md-7 <?php echo $cjc_img_class ?>">
			<a href="<?php echo esc_url( get_permalink() ) ?>">
				<img style="width: 100%;max-width: 960px; max-height:500px" class="article__img" src="<?php echo get_the_post_thumbnail_url(null, 'blog') ?>" alt="">
			</a>
		</div>
		<div class="col-md-5 <?php echo $cjc_post_class ?>">
			<h3><a class="h3" href="<?php echo esc_url( get_permalink() ) ?>" ><?php the_title() ?></a></h3>
			<p><?php cairo_jazz_club_posted_on(); ?></p>
			<p><?php the_excerpt(); ?></p>
			<p><?php 
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cairo-jazz-club' ),
					'after'  => '</div>',
				) );
			?></p>
			<p><?php cairo_jazz_club_entry_footer(); ?></p>
			<p class="align-right article__link"><a href="<?php echo esc_url( get_permalink() ) ?>" class="h3">Read Full Article</a></p>
		</div>
	</div>
</div>