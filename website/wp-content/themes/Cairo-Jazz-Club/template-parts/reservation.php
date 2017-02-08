<?php
global $init;
if (isset($_POST['logout'])) {
	$init->fbLogout();
	wp_redirect(get_permalink());
	exit();
}
$fbUser = $init->getUserDetails();
?>
<div>
	
	<?php if ($eventDate >= $todayDate):  ?>

		<?php if ($init->IsLogged() && $init->isApproved() && $private=='0' && !($date==$todayDate && $time <= $this_time)): ?> 

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

		<?php elseif ($init->IsLogged()): ?>

			<div class="media-box__img">
				<div class="circle circle--sm circle--center">
					<div class="circle__content">
						<img width=280px src="<?php echo $fbUser->user_picture ?>" alt="<?php echo $fbUser->user_name ?>">
					</div>
				</div>
			</div>

			<h2>Welcome! <?php echo $fbUser->user_name ?></h2>
			<p><?php echo __('unfortunately reservations are now unavailable!')?></p>
			<form method="post" action=".">
				<button name="logout" class="btn btn-facebook" type="submit">Logout</button>
			</form>

		<?php else: ?>

			<p><?php echo __('You need to be logged in before you can reserve!')?></p>
			<div class="button-twin">
				<a class="btn btn-facebook" href="<?php echo htmlspecialchars($init->getLoginURl(get_the_permalink())) ?>">Login</a>
			</div>

		<?php endif; ?>

	<?php else: ?>

		<p><?php echo __('Event Ended')?></p>

	<?php endif; ?>

</div>