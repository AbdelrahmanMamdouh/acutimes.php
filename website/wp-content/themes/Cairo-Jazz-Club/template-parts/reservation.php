<?php global $FBR_User_init , $FBR_User_data; ?>

<div>
	
	<?php if (($today-$date)<'1' || ($today-$date)==='1' ):  ?>

		<?php if (@$FBR_User_init && @$FBR_User_init->IsLogged() && @$FBR_User_init->isApproved() && ($private==='0'||$private===null) && !($date===$todayDate && ($time < $this_time ||$time === $this_time))): ?> 

			<div id="respond-<?php echo $event_id ?>">
				<?php echo $response; ?>
				<?php echo do_shortcode( '[contact-form-7 id="1679" title="Event Reservation"]' ); ?>
				<div class="form-response"></div>
			</div>

		<?php elseif (@$FBR_User_init && @$FBR_User_init->IsLogged()): ?>

			<div class="media-box__img">
				<div class="circle circle--sm circle--center">
					<div class="circle__content">
						<img width=280px src="<?php echo @$FBR_User_data->user_picture ?>" alt="<?php echo @$FBR_User_data->user_name ?>">
					</div>
				</div>
			</div>

			<h2>Welcome! <?php echo @$FBR_User_data->user_name ?></h2>
            <img src="<?php echo get_template_directory_uri()?>/img/eye.png"></img>
			<p><?php echo __('unfortunately reservations are now unavailable!')?></p>
			<a class="btn btn-facebook" style="width:100%" href="<?php echo site_url('/cjc-logout/') ?>">logout</a>

		<?php else: ?>

			<p><?php echo __('You need to be logged in before you can reserve!')?></p>
			<div class="button-twin">
				<a class="btn btn-facebook" href="<?php echo htmlspecialchars(@$FBR_User_init->getLoginURl(get_the_permalink(get_page_by_title( 'Events' )))) ?>">Login</a>
			</div>

		<?php endif; ?>

	<?php else: ?>

		<p><?php echo __('Event Ended')?></p>

	<?php endif; ?>

</div>