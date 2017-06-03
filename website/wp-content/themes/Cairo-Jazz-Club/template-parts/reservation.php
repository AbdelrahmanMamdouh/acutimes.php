<?php 
date_default_timezone_set('Africa/Cairo');
global	$FBR_User_data, 
		$private,
		$date,
		$today,
		$todayDate,
		$time,
		$this_time,
		$event_id;
		$todayNow = new DateTime();
		$todayNowWithTimeZone = $todayNow->setTimezone(new DateTimeZone('Africa/Cairo'));
		$eventDate = new DateTime($date);
		$userId = (string)$FBR_User_data['id'];
		$userIdPlus =  $userId . 1;
		$userIdInt = (int)$userIdPlus;
		$query = "SELECT COUNT(*) from cjc_fbr_reservations WHERE user_id='$userIdInt' AND event_id='$event_id'";
		$Number = $wpdb->get_var($query);
		$EventDateStr = date('D', strtotime($date)); // The event day in string.
		// echo $todayNowWithTimeZone->format('D'); The User current day in string.

?>

<div>
	<?php if($Number == '0'): ?>
        <?php if( ($EventDateStr == 'Fri' || $EventDateStr == 'Sat') && $EventDateStr == $todayNowWithTimeZone->format('D') && date('d', strtotime($date)) == $todayNowWithTimeZone->format('d') ): ?>
			<div class="media-box__img">
				<div class="circle circle--sm circle--center">
					<div class="circle__content">
						<img width=280px src="<?php echo $FBR_User_data['img'] ?>" alt="<?php echo $FBR_User_data['name'] ?>">
					</div>
				</div>
			</div>

			<h2>Hey, <?php echo $FBR_User_data['name'] ?></h2>
			<br>
			<img class="center-block" src="<?php echo get_template_directory_uri()?>/img/eye.png"></img>
			<p><?php echo __('Sorry, no reservations are allowed for this event.')?></p>
		<?php else: ?>
			<?php if ( (($eventDate->getTimestamp()+ 20*60*60) - $todayNow->getTimestamp() ) > 0 ):  ?>
				<!--(int)$todayNowWithTimeZone->format('H') >= 18-->
				<?php if( (Int)$todayNowWithTimeZone->format('H') >= 18 && (Int)$todayNowWithTimeZone->format('d') == (Int)$eventDate->format('d') && (Int)$todayNowWithTimeZone->format('m') == (Int)$eventDate->format('m') && (Int)$todayNowWithTimeZone->format('Y') == (Int)$eventDate->format('Y') ): ?>
					<div class="media-box__img">
						<div class="circle circle--sm circle--center">
							<div class="circle__content">
								<img width=280px src="<?php echo $FBR_User_data['img'] ?>" alt="<?php echo $FBR_User_data['name'] ?>">
							</div>
						</div>
					</div>

					<h2>Hey, <?php echo $FBR_User_data['name'] ?></h2>
					<br>
					<img class="center-block" src="<?php echo get_template_directory_uri()?>/img/eye.png"></img>
					<p><?php echo __('Sorry, this event has ended.')?></p>

				<?php else: ?>

					<?php if ($FBR_User_data['is_loged'] && $FBR_User_data['is_approved'] && ($private==='0'||$private===null)): ?> 

						<?php 
							
							
						?>

						<div id="respond-<?php echo $event_id ?>">
							<?php //echo $response; ?>
							
							<div class="media-box__img">
								<div class="circle circle--sm circle--center">
									<div class="circle__content">
										<img width=280px src="<?php echo $FBR_User_data['img'] ?>" alt="<?php echo $FBR_User_data['name'] ?>">
									</div>
								</div>
							</div>
			
							<h2>Hey, <?php echo $FBR_User_data['name'] ?></h2>
							
							<form id="form_reserve_ticket">
								<br>				
								<p><label for="attendees">Number of people</label></p>
								
								<div class="row">
									<div class="col-xs-5">
										<p class="attendees">
											<div class="quantity">
											
												<input type="text" min="1" max="10" step="1" name="attendees"  id="attendees" value="1" class="attendees-field num-organ">
												<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>
											</div>
										</p>
									</div>
									<div class="col-xs-7 footer-select-in" style=" max-height: 2.5rem; margin: 4px 0">
										<p class="requsttablep">
											<input id="requestttable" name="request_ttable" type="checkbox">
											<label for="requestttable">Request table</label>
										</p>
									</div>
								</div>
								<p><label for="PhoneNumber">Phone Number</label></p>
								<p class="PhoneNumber">
									<input type="text" class="form-control" name="Phone_Number">
								</p>
								<p><label for="speacialRequest">Speacial request</label></p>
								<p class="speacialRequest">
									<textarea class="form-control" name="Speacial_request" rows="3"></textarea>
								</p>
								<input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id ?>"/>
								<input type="hidden" name="user_id"  id="user_id"  value="<?php echo $FBR_User_data['id'].'1' ?>"/>
								<div class="text-center">
								<input type="button" class="btn btn-primary" value='Reserve' 
										onclick="Forms.ReserveEvent('<?php echo get_site_url() . '/wp-json/fbr/reservation/' ?>')">
								</div>
							</form>
							<div id="wait-in" class="center-block esg-loader spinner2" style="background-color: #666;position: relative; display:none"></div>
							<script>
							

							jQuery('.quantity input[type="text"]').keydown(function() {
							//code to not allow any changes to be made to input field
							return false;
							});
							jQuery('.quantity input[type="text"]').bind("cut copy paste",function(e) {
								e.preventDefault();
							});
							

							jQuery('.quantity').each(function() {
							var spinner = jQuery(this),
								input = spinner.find('input[type="text"]'),
								btnUp = spinner.find('.quantity-up'),
								btnDown = spinner.find('.quantity-down'),
								min = input.attr('min'),
								max = input.attr('max');
							
							btnUp.click(function() {
								var oldValue = parseFloat(input.val());
								if (oldValue >= max) {
								var newVal = oldValue;
								} else {
								var newVal = oldValue + 1;
								}
								spinner.find("input").val(newVal);
								spinner.find("input").trigger("change");
							});
							
							btnDown.click(function() {
								var oldValue = parseFloat(input.val());
								if (oldValue <= min) {
								var newVal = oldValue;
								} else {
								var newVal = oldValue - 1;
								}
								spinner.find("input").val(newVal);
								spinner.find("input").trigger("change");
							});
							});
							</script>

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

						<h2>Hey, <?php echo $FBR_User_data['name'] ?></h2>
						<br>
						<img class="center-block" src="<?php echo get_template_directory_uri()?>/img/eye.png"></img>
						<p><?php echo __('Sorry, no reservations are allowed for this event.')?></p>
						

					<?php else: ?>

						<p><?php echo __('Please sign in to be able to reserve. Your information is confidential and will not be passed on to a third party.')?></p>
						<div class="button-twin">
							<a class="btn btn-facebook" href="<?php echo htmlspecialchars(@FBR_FBhandler::Init()->getLoginURl(get_the_permalink(get_page_by_title( 'Home' )))) ?>">Sign in</a>
						</div>

					<?php endif; ?>
				<?php endif; ?>

			<?php else: ?>
				<div class="media-box__img">
					<div class="circle circle--sm circle--center">
						<div class="circle__content">
							<img width=280px src="<?php echo $FBR_User_data['img'] ?>" alt="<?php echo $FBR_User_data['name'] ?>">
						</div>
					</div>
				</div>

				<h2>Hey, <?php echo $FBR_User_data['name'] ?></h2>
				<br>
				<img class="center-block" src="<?php echo get_template_directory_uri()?>/img/eye.png"></img>
				<p><?php echo __('Sorry, this event has ended.')?></p>

			<?php endif; ?>
		<?php endif ?>
	<?php else: ?>
    		<div class="media-box__img">
                <div class="circle circle--sm circle--center">
                    <div class="circle__content">
                        <img width=280px src="<?php echo $FBR_User_data['img'] ?>" alt="<?php echo $FBR_User_data['name'] ?>">
                    </div>
                </div>
            </div>

            <h2>Hey, <?php echo $FBR_User_data['name'] ?></h2>
            <br>
		<img class="center-block" src="<?php echo get_template_directory_uri()?>/img/eye.png"></img>
			<p><?php echo __('You have already reserved for this event.')?></p>
	<?php endif; ?>

</div>