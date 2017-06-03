<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cjc
 */

?>

	</div><!-- #content -->

	<footer id="colophon" role="contentinfo">

		<section class="top-footer">
			<div class="container-fluid">
				<div class="footer-container">
					<div class="row">

						<div class="subscribe col-lg-4 col-md-4">
							<?php dynamic_sidebar( 'footer-widget-left' ); ?>
						</div>
                        
                        <div class="midfooterarea col-lg-4 col-md-3">
                        	<?php dynamic_sidebar('footer-widget-mid'); ?>
                        </div>
						
					</div>
                        <div class="contact-information col-lg-4 col-md-5">
							<?php dynamic_sidebar( 'footer-widget-right' ); ?>
						</div>

				</div>
			</div>
		</section>

		<section class="bottom-footer">

			<div class="container-fluid">
				<div class="block">
					<ul class="footer-menu">
						<?php
							wp_nav_menu(array(
								'theme_location' => 'footer-menu',
								'container' => '',
								'container_class' => false,
								'items_wrap' => '%3$s',
							));
						?>
					</ul>
				</div>

				<ul class="copyrights-menu">
					<?php
						wp_nav_menu(array(
							'theme_location' => 'copyrights-menu',
							'container' => '',
							'container_class' => false,
							'items_wrap' => '%3$s',
						));
					?>
					
				</ul>
				<p class="centered">&copy; <?php echo date("Y"); ?> Cairo Jazz Club LLC, All Rights Reserved</p>
			</div>

		</section>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>