<?php
/**
 * The template for displaying event custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cjc
 */

global $FBR_User_data;
get_header(); ?>

<main class="inner" id="primary">
	<section>
		<div class="container-fluid">

			<?php
				$dateStr = get_field('date');
				$eventDate = strtotime($dateStr);
				$todayDate = time() - (time() % 86400);
				$date = new DateTime($dateStr);
				$event_id = get_the_ID();
			?>
			<h3 class="centered"><?php echo $date->format('j M Y'); ?></h3>
			<h1 class="centered page-heading"><?php the_title() ?></h1>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="row">
						<div class="mobile-spacer col-md-4">
							<?php
								$thumb_id = get_post_thumbnail_id();
								$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'circle', true);
								$thumb_url = $thumb_url_array[0];
							?>

							<div class="circle circle--xl circle--center" style="margin-top: -30px; margin-bottom: 3rem;">
								<div class="circle__content">
									<img src="<?php echo $thumb_url ?>" alt="">
								</div>
							</div>

						</div>

						<div class="col-md-8">
							<?php the_content(); ?>

							<h3>Reservation</h3>
							<?php if ($FBR_User_data['is_loged']): ?>
								<?php include get_template_directory() . '/template-parts/reservation.php'; ?>
							<?php else: ?>
								<p>You need to be logged in before you can reserve!</p>
								<div class="button-twin">
									<a class="btn btn-facebook" href="<?php if($FBR_User_data['plugin_load']) echo htmlspecialchars(FBR_User::ActiveUser()->getLoginURl(get_permalink())) ?>">Login</a>
								</div>

							<?php endif; ?>
						</div>
					</div>

					<?php $posts = get_field('performing_artists'); ?>

					<?php if ($posts): ?>

						<div class="artists">
							<h2>Performing Artists</h2>
							<ul class="performing-artists">

								<?php foreach ($posts as $post): // variable must be called $post (IMPORTANT)  ?>
									<?php setup_postdata($post); ?>

									<li class="artist col-md-6">
										<div class="media-box">
											<div class="media-box__img artist__image">
												<div class="circle circle--md circle--center">
													<a href="<?php the_permalink() ?>" class="event__link">
														<div class="circle__content">
															<?php
																$thumb_id = get_post_thumbnail_id();
																$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'circle', true);
																$thumb_url = $thumb_url_array[0];
															?>
															<img src="<?php echo $thumb_url ?>" alt="">
														</div>
													</a>
												</div>
											</div>

											<div class="media-box__content">
												<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
												<div>
													<?php the_content() ?>
												</div>

												<a href="<?php the_permalink() ?>">READ MORE</a>
											</div>
										</div>
									</li>

								<?php endforeach; ?>
							</ul>
						</div>
						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly  ?>
					<?php endif; ?>


					
				<?php endwhile; ?>
			<?php else: ?>

				<p>Sorry, this page does not exist</p>

			<?php endif; ?>

		</div>
	</section>
</main>

<?php
get_sidebar();
get_footer();