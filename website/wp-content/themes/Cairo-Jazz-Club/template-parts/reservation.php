<?php
$current_user = wp_get_current_user();
?>
<div>
	<?php if ($eventDate >= $todayDate):  ?>
		<?php if (is_user_logged_in() /*&& $init->isApproved()*/): ?> 
		<!-- ====================== < MISSING FEATURE> ====================== -->
			<div id="respond-<?php echo $event_id ?>">
				<?php echo $response; ?>
				<form action="<?php echo get_site_url() . "/reserve/event/{$event_id}/" ?>" method="post" id="reserve-ticket">
					<p><label for="attendees">Number of people</label></p>
					<p class="attendees">
						<input type="text" name="attendees" value="1" class="attendees-field num-organ">
					</p>
					<input type="hidden" name="submitted" value="1">
					<input type="hidden" name="eventId" value="<?php echo $event_id ?>"/>
					<input type="submit" class="btn btn-primary">
				</form>
				<div class="form-response"></div>
			</div>
		<!-- ====================== </MISSING FEATURE> ====================== -->
		<?php elseif (is_user_logged_in()): ?>
			<h2>Welcome! <?php echo $current_user->display_name; ?></h2>
			<p><?php echo __('unfortunately reservations are now unavailable!')?></p>
			<div class="button-twin">
				<a class="btn btn-supporting btn-wide" href="<?php echo wp_logout_url(); ?>">Logout</a>
			</div>
		<?php else: ?>

			<p><?php echo __('You need to be logged in before you can reserve!')?></p>
			<div class="button-twin">
				<a class="btn btn-supporting btn-wide" href="<?php echo get_permalink( get_page_by_title('Login') ) ?>">Login</a>
			</div>

		<?php endif; ?>

	<?php else: ?>

		<p><?php echo __('Event Ended')?></p>

	<?php endif; ?>

</div>