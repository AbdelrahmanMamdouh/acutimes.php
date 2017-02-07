<?php 

$args = array( 
	'post_type' => 'avent',
	'post_status' => 'publish',
	'posts_per_page' => 7,
	'meta_key'  => 'date',
	'meta_value'   => current_time( "Ymd" ),
	'meta_compare' => '>=',
	'orderby' => 'meta_value_num',
	'order' => 'ASC'
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
<div class="desktop-events hidden-xs">
    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>

            <div class="event circle <?php echo $positions[$i++] ?>">
                <?php get_template_part('template-parts/event-circle'); ?>
            </div>

    <?php endwhile; else: ?>

        <p>Sorry, there are no events to display</p>

    <?php endif; ?>
</div> <!-- /.desktop-events -->

<?php
wp_reset_query();
$the_query = new WP_Query(  array( 
	'post_type' => 'avent',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'meta_key'  => 'date',
	'meta_value'   => current_time( "Ymd" ),
	'meta_compare' => '>=',
	'orderby' => 'meta_value_num',
	'order' => 'ASC'
) );
$i = 0;
?>

<div class="rand-artists hidden-xs">
	<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>

		<div class="artist circle circle--md pos-<?php echo $i ?>">
			<?php get_template_part('template-parts/event-artist-circle'); ?>
		</div>

    <?php endwhile; endif; ?>
</div> <!-- /.rand-artists -->

<?php
wp_reset_query();
$the_query = new WP_Query( $args );
$i = 0;
?>

<div class="mobile-events visible-xs">
    <div class="events-slider">

    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();?>

        <div>
            <div class="circle circle--md">
                <?php get_template_part('template-parts/event-circle' ); ?>
            </div>
        </div>

    <?php endwhile; else: ?>

        <p>Sorry, there are no events to display</p>

    <?php endif; ?>

    </div>
</div> <!-- /.mobile-events -->

<?php wp_reset_postdata();?>