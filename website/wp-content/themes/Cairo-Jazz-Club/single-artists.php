<?php
/**
 * The template for displaying artists custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cjc
 */

get_header();
?>

<main class="inner" id="primary">
	<section>
		<div class="container-fluid">

				<h1 class="centered page-heading"><?php the_title() ?></h1>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<div class="row">
							<div class="c-section">
								<div class="mobile-spacer col-lg-4">

									<?php
										$artist_image_id = get_post_thumbnail_id( $post->ID );
										$artist_image = wp_get_attachment_image_src($artist_image_id, 'circle', true);
										$artist_image_url = $artist_image[0];
									?>
									
									<div class="circle circle--xl circle--center" style="margin-top: -30px; margin-bottom: 3rem;">
										<div class="circle__content">
											<img src="<?php echo $artist_image_url ?>" alt="">
										</div>
									</div>
								</div>

								<div class="col-lg-5 col-md-8">

									<div class="c-section c-section--short">
										<?php the_content() ?>
									</div>

									<?php if (get_field('soundcloud')) : ?>
										<div class="c-section c-section--short">
											<div class="responsive-embed">
												<?php the_field('soundcloud') ?>
											</div>
										</div>
									<?php endif; ?>
								</div>

								<div class="col-lg-3 col-md-4">
									<?php if (have_rows('links')): ?>

										<?php while (have_rows('links')) : the_row(); ?>
											<?php
											$icon = get_sub_field('icon');
											$icon = $icon["sizes"]["icon"];
											?>

											<div class="c-section c-section--short">
												<a href="<?php the_sub_field('url') ?>" style="display: inline-block; width: 100%;">

													<span class="vertical-middle" style="max-width: 50%;" ><img src="<?php echo $icon ?>" alt=""></span>
													<h4 class="vertical-middle" style="max-width: 50%; margin-left: 1rem;"><?php the_sub_field('text') ?></h4>

												</a>
											</div>

										<?php endwhile; ?>

									<?php endif; ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="c-section c-section--short">
									<h2 class="centered">Upcoming Event</h2>

									<?php
									$today = current_time('Ymd');
									$events = get_posts(array(
										'post_type' => 'avent',
										'posts_per_page' => '1',
										'meta_query' => array(
											array(
												'key' => 'performing_artists', // name of custom field
												'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
												'compare' => 'LIKE'
											),
											array(
												'key' => 'date',
												'compare' => '>=',
												'value' => $today,
											),
										)
									));
									?>

									<?php if ($events): ?>
										<?php foreach ($events as $post): // variable must be called $post (IMPORTANT) ?>
											<?php setup_postdata($post); ?>

											<?php
											$thumb_id = get_post_thumbnail_id();
											$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'hero-mfp', true);
											$thumb_url = $thumb_url_array[0];
											$event_id = get_the_id();
											?>

											<div class="c-section c-section--short">
												<a href="<?php the_permalink() ?>" class="container_link">
													<img src="<?php echo $thumb_url ?>" alt="">
												</a>
											</div>


											<div class="row">
												<div class="col-md-7">
													<h3>Cancellation Policy</h3>
													<?php the_field('cancellation_policy', 'option') ?>
												</div>
												<div class="col-md-5">
													<h3>Reserve</h3>
													<div class="stacked-twin">
														<?php include(locate_template('templates/reservation.php')); ?>
													</div>
												</div>
											</div>

										<?php endforeach; ?>
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly  ?>
									<?php endif; ?>
								</div>
							</div>

							<div class="col-lg-7 col-lg-push-1 col-md-6">
								<div class="c-section c-section--short">
									<h2 class="centered">Past Events</h2>

									<?php
									$events = get_posts(array(
										'post_type' => 'avent',
										'posts_per_page' => '-1',
										'meta_query' => array(
											array(
												'key' => 'performing_artists', // name of custom field
												'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
												'compare' => 'LIKE'
											),
											array(
												'key' => 'date',
												'compare' => '<=',
												'value' => $today,
											),
										)
									));
									?>

									<?php if ($events): ?>

										<div class="row">

											<?php foreach ($events as $post): // variable must be called $post (IMPORTANT) ?>
												<?php setup_postdata($post); ?>

												<?php
												$thumb_id = get_post_thumbnail_id();
												$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'circle', true);
												$thumb_url = $thumb_url_array[0];
												$event_id = get_the_id();
												?>

												<div class="col-lg-6 col-md-12 col-sm-6">
													<div class="c-section c-section--short">
														<a href="<?php the_permalink() ?>" class="container_link">
															<div class="circle circle--xl circle--center">
																<div class="circle__content">
																	<img src="<?php echo $thumb_url ?>" alt="">
																</div>
															</div>
														</a>
													</div>
													<a href="<?php the_permalink() ?>" class="container_link">
														<h2 class="centered" style="margin-bottom: 5rem;"><?php the_title() ?></h2>
													</a>
												</div>

											<?php endforeach; ?>

										</div>
										<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly  ?>
									<?php endif; ?>
								</div>
							</div>
						</div>

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