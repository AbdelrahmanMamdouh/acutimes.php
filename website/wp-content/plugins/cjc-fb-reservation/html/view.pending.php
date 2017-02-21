<?php
global $wpdb, $users;
$users = FBR_User::selectMulti('user_status', FBR_User::STATE_PENDING);
?>
<h2>Pending Users</h2>
<?php include('body.php') ?>