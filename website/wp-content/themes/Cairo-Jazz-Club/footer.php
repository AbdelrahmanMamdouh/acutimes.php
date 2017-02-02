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
							<?php dynamic_sidebar( 'footer-widget-left' ); ?>
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

<script>
	var footermenuheight = jQuery(".bottom-footer").outerHeight();
	jQuery(".bottom-footer").css({"bottom": -footermenuheight  });
	jQuery(".footer-container").css({"padding-bottom": footermenuheight  });
	jQuery(window).scroll(function() {
   	if(jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - 100) {
       		console.log("near bottom!");
		jQuery(".bottom-footer").css({"bottom": 0  });
   	} else{
		jQuery(".bottom-footer").css({"bottom": -footermenuheight  });
	}
});
</script>

</body>
</html>