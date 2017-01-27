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

get_header(); ?>

<main class="inner" id="primary" <?php if( !is_home() &&  is_front_page()){ ?> style="padding-top: 0"<?php } ?>>
	<section>
		<div class="container-fluid">
			
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			
		</div>
	</section>

	 <div class="container-fluid" id="trigger">

        <div class="parallax">

            <div class="parallax__content">

                <img src="<?php echo get_template_directory_uri();?>/img/events-top.png" alt="">

                <div class="events-content">

                    <h2 class="centered">UPCOMING EVENTS</h2>

                    <?php

                    	// Build shortcode with the alias of the grid to be printed.
						$the_content = do_shortcode('[ess_grid alias="home parallax"]');
 
						// Echo Out the result.
						echo $the_content;

                    ?>
                    

                </div>

                <img src="<?php echo get_template_directory_uri();?>/img/events-bottom.png" alt="">

            </div>

        </div>

    </div>

</main>

<?php
get_sidebar();
get_footer();