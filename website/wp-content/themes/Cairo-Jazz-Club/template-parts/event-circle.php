<?php
	$dateStr = get_field('date');
	$eventDate = strtotime($dateStr);
	$todayDate = time() - (time() % 86400);
	$date = new DateTime($dateStr);
	$event_id = get_the_id();

	if ($eventDate >= $todayDate) {
		$status = 'future';
	} else {
		$status = 'past';
	}
?>
<?php $term_list = wp_get_post_terms($event_id, 'night-type'); ?>
<div class="hidden-xs">
	<a href="<?php echo get_template_directory_uri() ?>/modal-templates/event-modal.php?eventId=<?php echo $event_id ?>" class="event__link modal-link <?php echo $status ?> <?php echo $term_list[0]->slug ?>">

		<div class="circle__content">
			<div class="date">
				<?php echo $date->format('j M'); ?>

			</div>

			<?php
				$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'circle', true);
				$thumb_url = $thumb_url_array[0];
			//	$image_url_array = wp_get_attachment_image_src($thumb_id, 'hero-mfp', true);
			//	$image_url = $image_url_array[0];
			?>
			<img src="<?php echo $thumb_url ?>" alt="">
		</div>
	</a>
</div>
<div class="visible-xs">
	<a href="<?php echo get_template_directory_uri() ?>/modal-templates/event-modal.php?eventId=<?php echo $event_id ?>" class="event__link modal-link <?php echo $status ?> <?php echo $term_list[0]->slug ?>">

		<div class="circle__content">
			<div class="date">
				<?php echo $date->format('j M'); ?>

			</div>

			<?php
				$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'circle', true);
				$thumb_url = $thumb_url_array[0];
			//	$image_url_array = wp_get_attachment_image_src($thumb_id, 'hero-mfp', true);
			//	$image_url = $image_url_array[0];
			?>
			<img src="<?php echo $thumb_url ?>" alt="">
		</div>
	</a>
</div>

<?php // include(locate_template('templates/event-modal.php')); ?>