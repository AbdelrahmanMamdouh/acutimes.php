<div class="mobile-events visible-xs">

    <div class="events-slider">

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

    ?>

    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>



        <div>

            <div class="circle circle--md">
                
                <?php get_template_part('template-parts/event-circle' ); ?>

            </div>

        </div>



    <?php endwhile; else: ?>



        <p>Sorry, there are no events to display</p>



    <?php endif; ?>

    <?php wp_reset_postdata();?>



    </div>
</div> <!-- /.mobile-events -->