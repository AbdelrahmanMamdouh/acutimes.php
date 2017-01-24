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
                            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-inverted.png" alt=""></a> 
                        </div>
                        <?php// the_field('message', 'option') ?>
                        <p>Download our App</p>
                        <div class="download-app">
                            <ul>
                                <?php
                                $ios = '';//get_field('ios_app', 'option');
                                $android = '';//get_field('android_app', 'option');
                                ?>

                                <?php if ($android) { ?>
                                    <li><a href="<?php echo $android ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/android-store.png" alt=""></a></li>
                                <?php } ?>

                                <?php if ($ios) { ?>
                                    <li><a href="<?php echo $ios ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/apple-store.png" alt=""></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <div class="subscribe col-md-6 col-lg-5">
                        <h2>Stay in touch</h2>
                        <p>Integer vitae libero ac risus egestas placerat.</p>

                        <form action="/">
                            <div class="form-group">
                                <div class="input input--reverse">
                                    <label for="email">Type Your Email</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                            </div>
                            <h3>Choose your genre</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>
                                        <input type="checkbox" id="test1" />
                                        <label for="test1">Avant-garde</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" id="test2"/>
                                        <label for="test2">Blues</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" id="test3"/>
                                        <label for="test3">Caribbean</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" id="test4"/>
                                        <label for="test4">Country</label>
                                    </p>
                                </div>

                                <div class="col-md-5">
                                    <p>
                                        <input type="checkbox" id="test5" />
                                        <label for="test5">R&amp;B and soul</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" id="test6"/>
                                        <label for="test6">Rock</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" id="test7"/>
                                        <label for="test7">Electronic</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" id="test8"/>
                                        <label for="test8">Folk</label>
                                    </p>
                                </div>
                            </div>

                            <submit class="btn btn-supporting btn-wide">Submit</submit>
                        </form>
                    </div>

                    <div class="contact-information col-md-6 col-lg-3">
                        <div class="block">
                            <h2>Social media</h2>
                            <?php get_template_part('template-parts/social-icons'); ?>
                        </div>

                        <div class="block">
                            <h2>Contact us</h2>
                            <ul class="contact-us">
                                <li class="address">
                                    <?php echo get_theme_mod('cjc-identity-address'); ?>
                                </li>
                                <li class="emails">
                                    <?php echo get_theme_mod('cjc-identity-email');  ?>
                                </li>
                                <li class="phone">
                                    <?php echo get_theme_mod('cjc-identity-phone');  ?>
                                </li>
                            </ul>
                        </div>
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