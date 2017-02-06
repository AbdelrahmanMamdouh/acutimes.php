<div class="desktop-events hidden-xs">

    <?php 

        $args = array( 
            'post_type' => 'avent',
            'post_status' => 'publish',
            'posts_per_page' => 7,
            'meta_key'  => 'date',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        );

        $the_query = new WP_Query( $args );

        $positions = array(
            'circle--lg pos-1',
            'circle--md pos-2',
            'circle--md pos-3',
            'circle--lg pos-4',
            'circle--md pos-5',
            'circle--md pos-6',
            'circle--md pos-7'
        );

        $i = 0;

    ?>

    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>

            <div class="event circle <?php echo $positions[$i] ?>">

                <?php get_template_part('template-parts/event-circle'); ?>

            </div>

        <?php $i++; ?>

    <?php endwhile; else: ?>

        <p>Sorry, there are no events to display</p>

    <?php endif; ?>

    <?php wp_reset_query(); ?>
</div> <!-- /.desktop-events -->