<?php
	require_once('../../../../wp-load.php');
	$artist = get_post($_GET["artistId"]);
?>

<div class='mfp-modal' id="artist-modal-<?php echo $artist->ID ?>" style='max-width: 550px;'>

	<div class='modal-head'>
		<img src='<?php echo get_template_directory_uri() ?>/img/modal-head.png' alt='' class='modal-image'>

		<div class='modal-head__content'>
			<div class='media-box'>
					<div class='media-box__img'>
						<div class='circle circle--sm'>

				            <div class='circle__content'>

				                <?php
                                    $artist_image_id = get_post_thumbnail_id( $artist->ID );
                                    $artist_image = wp_get_attachment_image_src($artist_image_id, 'circle', true);
                                    $artist_image_url = $artist_image[0];        
				                ?>

				                <img src='<?php echo $artist_image_url; ?>' alt=''>
				            </div>
				            
				        </div>
					</div>

					<div class='media-box__content'>
						<h1 class='modal-head__title'><?php echo $artist->post_title; ?></h1>
					</div>
			</div>	
		</div>
	</div>
    
    
    <div class='mfp-modal-content'>
    	<div class='c-section c-section--short'>
	        <?php echo $artist->post_content;?>
    	</div>
        
        <?php if(get_field("soundcloud", $artist->ID)): ?>
	        <div class='c-section c-section--short'>
		        <div class='responsive-embed'>
		        	<?php the_field("soundcloud", $artist->ID) ?>
		        </div>
	        </div>
	    <?php endif; ?>

        
    	<?php if( have_rows("links", $artist->ID) ): ?>
			<div class='c-section c-section--short'>
				<div class='row'>

	        		<?php while ( have_rows("links", $artist->ID) ) : the_row(); ?>
						<?php 
						    $icon = get_sub_field("icon");
						    $icon = $icon['sizes']['icon'];
						?>
						
						<div class='col-md-4'>
							<a href='<?php the_sub_field("url") ?>' style='display: inline-block; width: 100%;'>

								<span class='vertical-middle' style='max-width: 50%;' ><img src='<?php echo $icon ?>' alt=''></span>
								<h4 class='vertical-middle' style='max-width: 50%; margin-left: 1rem;'><?php the_sub_field("text") ?></h4>

							</a>
						</div>
	        		<?php endwhile; ?>
	        		
				</div>
			</div>
    	<?php endif; ?>
        

        <div>
        	<h2>Upcoming Event</h2>
			
        	<?php

				$events = get_posts(array(
					'post_type' => 'avent',
					"posts_per_page" => "1",
					'meta_query' => array(
						array(
							'key' => 'performing_artists', // name of custom field
							'value' => '"' . $artist->ID . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
							'compare' => 'LIKE'
						),
						array(
					        'key'		=> 'date',
					        'compare'	=> '>=',
					        'value'		=>  current_time("Ymd") // today's date
	    				)
					)
				));

			?>

			<?php if( $events ): ?>
	            <?php foreach( $events as $post): // variable must be called $post (IMPORTANT) ?>
	                <?php setup_postdata($post); ?>

	                <?php

	                    $thumb_id = get_post_thumbnail_id();
	                    $thumb_url_array = wp_get_attachment_image_src($thumb_id, "modal-bleed", true);
	                    $thumb_url = $thumb_url_array[0];
	                    $event_id = get_the_id();

	                ?>
					
					<div class='modal-bleed c-section c-section--short'>
						<a    href="<?php echo get_template_directory_uri()?>/modal-templates/event-modal.php?eventId= <?php echo $event_id?>" class="modal-link event-link container_link">
							<img  src='<?php echo $thumb_url ?>' style="width:100%" alt=''>
						</a>
					</div>
	                

	                <div class='row'>
						<!-- <div class='col-md-7'>
	                		<?php // get_template_part("templates/cancellation-policy" ); ?>
	                	</div> -->
	                	<div class='col-md-7'>
	                	<?php $description = get_field('description', false, false); ?>
						<?php if ($description) : ?>
							<div class="media-box__content">
								<h3>Description</h3>
								<p> <?php echo $description ?> </p>
							</div>
						<?php endif; ?>
	                	</div>
	                	<div class='col-md-5'>
	                	<?php $date = get_field('date', false); ?>
						<?php if ($date) : ?>
							<div class="media-box__content">
								<p> <?php echo $date ?> </p>
							</div>
						<?php endif; ?>
	                		<h3>Reserve</h3>
	                		<div class='stacked-twin'>
	                			<?php include(locate_template("template-parts/reservation.php")); ?>
	                		</div>
	                	</div>
	                </div>
	                

	            <?php endforeach; ?>
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
        </div>
    </div>
</div>