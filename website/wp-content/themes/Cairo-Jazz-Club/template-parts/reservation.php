<?php 
global	$FBR_User_data, 
		$private,
		$date,
		$today,
		$todayDate,
		$time,
		$this_time,
		$event_id;
$todayNow = new DateTime();
$eventDate = new DateTime($date);
?>

<div>
	<?php if ( (($eventDate->getTimestamp()+ 20*60*60) - $todayNow->getTimestamp() ) > 0 ):  ?>

		<?php if ($FBR_User_data['is_loged'] && $FBR_User_data['is_approved'] && ($private==='0'||$private===null)): ?> 

			<div id="respond-<?php echo $event_id ?>">
				<?php //echo $response; ?>
				
				<form id="form_reserve_ticket">                
					<p><label for="attendees">Number of people</label></p>
					<p class="attendees">
						<input type="text" name="attendees"  id="attendees" value="1" class="attendees-field num-organ">
					</p>
					<input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id ?>"/>
					<input type="hidden" name="user_id"  id="user_id"  value="<?php echo $FBR_User_data['id'].'1' ?>"/>
					<input type="button" class="btn btn-primary" value='submit' 
							onclick="Forms.ReserveEvent('<?php echo get_site_url() . '/wp-json/fbr/reservation/' ?>')">
				</form>

				<div class="form-response" id="form_reserve_ticket_responce"></div>
			</div>

		<?php elseif ($FBR_User_data['is_loged']): ?>

			<div class="media-box__img">
				<div class="circle circle--sm circle--center">
					<div class="circle__content">
						<img width=280px src="<?php echo $FBR_User_data['img'] ?>" alt="<?php echo $FBR_User_data['name'] ?>">
					</div>
				</div>
			</div>

			<h2>Welcome! <?php echo $FBR_User_data['name'] ?></h2>
            <img src="<?php echo get_template_directory_uri()?>/img/eye.png"></img>
			<p><?php echo __('unfortunately reservations are now unavailable!')?></p>
			<a class="btn btn-facebook" style="width:100%" href="<?php echo site_url('/logout/') ?>">logout</a>

		<?php else: ?>

			<p><?php echo __('You need to be logged in before you can reserve!')?></p>
			<div class="button-twin">
				<a class="btn btn-facebook" href="<?php echo htmlspecialchars(@FBR_User::ActiveUser()->getLoginURl(get_the_permalink(get_page_by_title( 'Events' )))) ?>">Login</a>
			</div>

		<?php endif; ?>

	<?php else: ?>
		<img src="<?php echo get_template_directory_uri()?>/img/eye.png"></img>
		<p><?php echo __('Sorry, this event has ended.')?></p>

	<?php endif; ?>

</div>