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

		<section>
			<div class="container-fluid">
				<div class="footer-container">
					<div class="row">
						<div class="cjc-summary col-md-12 col-lg-4">
							<div class="footer-logo">
								<a href="#"><img src="<?php echo get_theme_mod('cjc-identity-footer-logo'); ?>" alt=""></a> 
							</div>
							<?php// the_field('message', 'option') ?>

							<?php
								$ios = get_theme_mod('cjc-identity-ios');
								$android = get_theme_mod('cjc-identity-android');
							?>
							<?php if($android || $ios){ ?>
								<p>Download our App</p>
								<div class="download-app">
									<ul>
										<?php if ($android) { ?>
											<li><a href="<?php echo $android ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/android-store.png" alt=""></a></li>
										<?php } ?>

										<?php if ($ios) { ?>
											<li><a href="<?php echo $ios ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/apple-store.png" alt=""></a></li>
										<?php } ?>
									</ul>
								</div>
							<?php } ?>
						</div>

						<div class="subscribe col-md-6 col-lg-5">
							<?php dynamic_sidebar( 'footer-widget-center' ); ?>
						</div>

						<div class="contact-information col-md-6 col-lg-3">
							<?php dynamic_sidebar( 'footer-widget-right' ); ?>
						</div>
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
					<li>&copy; <?php echo date("Y"); ?> <?php echo get_bloginfo('name'); ?></li>
				</ul>
				<p class="centered">All rights reserved</p>
			</div>

		</section>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>