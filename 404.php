<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package cjc
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main class="inner">
			<section>
				<div class="container-fluid">
					<h1 class="centered page-heading">404</h1>

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php the_content(); ?>

					<?php endwhile; else: ?>
			
						<p class="centered">Sorry, this page does not exist</p>

					<?php endif; ?>
					
				</div>
			</section>
		</main>
	</div><!-- #primary -->

<?php
get_footer();
