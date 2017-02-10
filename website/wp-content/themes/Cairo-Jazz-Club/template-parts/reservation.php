<?php global $init , $fbUser; ?>

<div>
	
	<?php if (($today-$date)<'1' || ($today-$date)==='1' ):  ?>

		<?php if ($init->IsLogged() && $init->isApproved() && ($private==='0'||$private===null) && !($date===$todayDate && ($time < $this_time ||$time === $this_time))): ?> 

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
            <img src="<?php echo get_template_directory_uri()?>/img/eye.png"></img>
			<p><?php echo __('unfortunately reservations are now unavailable!')?></p>
			<a class="btn btn-facebook" style="width:100%" href="<?php echo site_url('/cjc-logout/') ?>">logout</a>

		<?php else: ?>

			<p><?php echo __('You need to be logged in before you can reserve!')?></p>
			<div class="button-twin">
				<a class="btn btn-facebook" href="<?php echo htmlspecialchars($init->getLoginURl(get_the_permalink(get_page_by_title( 'Events' )))) ?>">Login</a>
			</div>

		<?php endif; ?>

	<?php else: ?>

		<p><?php echo __('Event Ended')?></p>

	<?php endif; ?>

</div>