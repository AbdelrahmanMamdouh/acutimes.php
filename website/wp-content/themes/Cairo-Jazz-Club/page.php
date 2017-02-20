<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cjc
 */

get_header(); 
 global $FBR_User_data;
//if( !is_home() &&  is_front_page() && $FBR_User_data['is_loged']){

$firstLogin = count($FBR_User_data['genre_bol'])>0 ? 0:1;
//}
?>


<input type=hidden id="filled" value="<?php echo $firstLogin ?>">

	

<?php if( !(!is_home() &&  is_front_page())){ ?>
	<main class="inner" id="primary">
		<section>
			<div class="container-fluid">

	
<?php } ?>	
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
<?php if( !(!is_home() &&  is_front_page())){ ?>	
			</div>
		</section>
	</main>
<?php } ?>


<section>
	<div class="container-fluid">
		<?php get_template_part('template-parts/advertisement'); ?>
	</div>
</section>

<?php
get_sidebar();
get_footer();