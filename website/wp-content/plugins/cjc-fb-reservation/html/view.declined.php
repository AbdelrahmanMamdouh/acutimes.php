<?php
global $wpdb, $users;
$users = FBR_User::selectMulti('user_status', FBR_User::STATE_REJECTED);
?>
<h2>Declined Users</h2>
<?php include('body.php') ?>