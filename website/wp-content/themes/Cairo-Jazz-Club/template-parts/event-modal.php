<div class="mfp-hide mfp-modal" id="event-modal-<?php the_id() ?>">
    <a href="<?php the_permalink() ?>">
        <img src="<?php echo $image_url ?>" alt="" class="modal-image">
    </a>
    <div class="mfp-modal-content">
        <div class="row">
            <div class="col-md-8">
                <h2>Performing Artists</h2>
                <?php
// get only first 3 results
                $artists = get_field('performing_artists', false, false);
                $query = new WP_Query(array(
                    'post_type' => 'artist',
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
                                        <h3 class="artist__name">
                                            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                        </h3>
                                        <div class="artist__desc">
                                            <?php echo the_content() ?>
                                        </div>
                                        <a href="<?php the_permalink() ?>" class="artist__link">READ MORE</a>
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
                        <?php include(locate_template('templates/reservation.php')); ?>
                    </div>
                </div>
                <div>
                    <?php get_template_part('templates/cancellation-policy' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>