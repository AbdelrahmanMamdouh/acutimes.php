<?php
	require_once('../../../../wp-load.php');
	$event = get_post($_GET["eventId"]);

    $thumb_id = get_post_thumbnail_id($event->ID);
    $image_url_array = wp_get_attachment_image_src($thumb_id, 'hero-mfp', true);
    $image_url = $image_url_array[0];
    $private = get_field('private',$event->ID,false);
    $date = get_field('date',$event->ID,false);
    $today= date("Ymd");
    $time = '20:00:00';
    $thistime=current_time("G:i:s");
?>

<div class="mfp-modal" id="event-modal-<?php echo $event->ID ?>">

    <img src="<?php echo $image_url ?>" alt="" class="modal-image">
    
    <div class="mfp-modal-content">
        <div class="row">
            <div class="col-md-8">
		<?php $description = get_field('description', $event->ID, false); ?>
		<?php if ($description) : ?>
		<div class="media-box__content">
			<h3>Description</h3>
			<p> <?php echo $description ?> </p>
		</div>
		
		<?php endif; ?>
                <h2>Performing Artists</h2>

                <?php
                $artists = get_field('performing_artists', $event->ID, false);
                $query = new WP_Query(array(
                    'post_type' => 'artists',
                    'post__in' => $artists,
                    'post_status' => 'any',
                    'orderby' => 'post__in',
                ));
                ?>

                <?php if ($query->have_posts()) : ?>

                    <div class="mfp-artists">

                        <?php while ($query->have_posts()) : $query->the_post(); ?>

                            <div class="artist">
                                <div class="media-box">
                                    <div class="media-box__img">
                                        <div class="circle circle--md circle--center">
                                            <a href="<?php echo get_template_directory_uri() ?>/modal-templates/artist-modal.php?artistId=<?php echo get_the_ID() ?>" class="modal-link"><h3 class="event__link artist__name">
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
                                        <h3 class="artist__name">
                                            <a href="<?php echo get_template_directory_uri() ?>/modal-templates/artist-modal.php?artistId=<?php echo get_the_ID() ?>" class="modal-link"  class="event__link modal-link"><?php the_title() ?></a>
                                        </h3>
                                        <div class="artist__desc">
                                            <?php echo the_content() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                      <?php endwhile; ?>

                    </div>

                <?php else: ?>
                    <p>Sorry, there are no artists to display</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="col-md-4">
                <div class="c-section c-section--short">
                    <h2>Reserve</h2>
                    <div class="stacked-twin">
                        <?php include(locate_template('template-parts/reservation.php')); ?>
                    </div>
                </div>
                <div>
                    <?php // get_template_part('templates/cancellation-policy' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>