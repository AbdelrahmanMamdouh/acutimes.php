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
                    	<!--
						<div class="cjc-summary col-md-12 col-lg-4">
							<?php dynamic_sidebar( 'footer-widget-left' ); ?>
						</div>
                        -->

						<div class="subscribe col-md-12 col-lg-9">
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

	
	(function ($) {
	  $(document).ready(function() {
		  
		$(window).on('scroll', function () {
			var scrollTop = $(window).scrollTop();
			if (scrollTop > 100) {
				//$('header').css({"height": "70px"});
				$('header .logo img').css({"height": "60px","transition":"all 0.3s ease-in-out"});
				$('div:not([id^="mm-"]) .main-menu ul').css({"margin-top": "2rem","transition":"all 0.3s ease-in-out"});
				$('.top-icons .social-icons').css({"margin-top": "0rem","transition":"all 0.3s ease-in-out"});
			}
			else {
				 //$('header').css({"height": "auto"}); 
				 $('header .logo img').css({"height": "100","transition":"all 0s ease-in-out"}); 
				 $('div:not([id^="mm-"]) .main-menu ul').css({"margin-top": "4rem","transition":"all 0s ease-in-out"}); 
				 $('.top-icons .social-icons').css({"margin-top": "2rem","transition":"all 0s ease-in-out"});
			}
		});
		
		/*
		var secfixedheight = $('.entry-content .vc_row-fluid:last-child').height();
		$('.entry-content .vc_row-fluid:last-child').css({"height":secfixedheight});
		var topspacebeforfixed = $('.vc_row wpb_row vc_row-fluid:first-child').height() + $('header').height();
		$(window).on('scroll', function () {
			var scrollTop = $(window).scrollTop();
			if (scrollTop > topspacebeforfixed) {
				
				$('.entry-content .vc_row-fluid:last-child .vc_column_container').css({"position":"fixed","top":"0"});
				
			} else{
				$('.entry-content .vc_row-fluid:last-child .vc_column_container').css({"position":"fixed","top":"0"});	
			}
			
		});
		
		*/
		
	  });
	})(jQuery);
	
</script>
</body>
</html>