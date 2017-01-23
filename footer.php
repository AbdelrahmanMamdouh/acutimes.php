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

		<section class="bottom-footer">
			<div class="container-fluid">
				<div class="block">
					<ul class="footer-menu">
						<?php
						$defaults = array(
							'menu' => 'footer-menu',
							'container' => '',
							'container_class' => false,
							'items_wrap' => '%3$s',
						);
						wp_nav_menu($defaults);
						?>
					</ul>
				</div>

				<ul class="copyrights-menu">
					<?php
					$defaults = array(
						'menu' => 'copyrights-menu',
						'container' => '',
						'container_class' => false,
						'items_wrap' => '%3$s',
					);
					wp_nav_menu($defaults);
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