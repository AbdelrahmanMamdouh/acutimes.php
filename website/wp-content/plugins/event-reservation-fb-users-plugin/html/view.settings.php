<?php

if (isset($_POST['update_settings'])) {
	$appKey = filter_input(INPUT_POST, 'app_key');
	$appSecret = filter_input(INPUT_POST, 'app_secret');

	update_option('FB-APP-KEY', $appKey);
	update_option('FB-APTP-SECRE', $appSecret);
	echo "Options Saved";
}

$appKey = get_option('FB-APP-KEY');
$appSecret = get_option('FB-APTP-SECRE');

?>

<div class="wrap">
	
	<form action="" method="post">
		<label for="appKey">FB Application Key</label>	
		<input type="text" name="app_key" id="appKey" value="<?php echo $appKey?>" />
		<label for="appSec">FB Application Secret</label>
		<input type="text" name="app_secret" id="appSec" value="<?php echo $appSecret?>" />
		<input name="update_settings" type="submit" />
	</form>
</div>

