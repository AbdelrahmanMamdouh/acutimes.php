<?php

if (isset($_POST['update_settings'])) {

	$appKey = filter_input(INPUT_POST, 'app_key');
	$appSecret = filter_input(INPUT_POST, 'app_secret');
	$notify_email = filter_input(INPUT_POST, 'notify_email');

	update_option('FB-APP-KEY', $appKey);
	update_option('FB-APP-SECRET', $appSecret);
	update_option('NOTIFY_EMAIL', $notify_email);

	echo "Options Saved";
}

$appKey = get_option('FB-APP-KEY');
$appSecret = get_option('FB-APP-SECRET');
$notify_email =  get_option('NOTIFY_EMAIL');
?>


<form action="" method="post">


<h2 class="title">Facebook Settings</h2>
<hr>
	<table class="form-table">
		<tbody>

			<tr>
				<th scope="row"><label for="appKey">Application Key</label></th>
				<td>
					<input class="regular-text ltr" type="text" name="app_key" id="appKey" value="<?php echo $appKey?>">
					<p>facebook api key</p>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="appSec">Application Secret</label></th>
				<td>
					<input class="regular-text ltr" type="text" name="app_secret" id="appSec" value="<?php echo $appSecret?>">
					<p>facebook api secret</p>
				</td>
			</tr>

		</tbody>
	</table>

<h2 class="title">Reservation</h2>
<hr>
	<table class="form-table">
		<tbody>

			<tr>
				<th scope="row"><label for="notify_email">Email</label></th>
				<td>
					<input class="regular-text ltr" type="email" name="notify_email" id="notify_email" value="<?php echo $notify_email?>">
					<p>email to be notified once a user reserve</p>
				</td>
			</tr>

		</tbody>
	</table>

	<p class="submit"><input type="submit" name="update_settings" id="submit" class="button button-primary" value="Save Changes"></p>
</form>