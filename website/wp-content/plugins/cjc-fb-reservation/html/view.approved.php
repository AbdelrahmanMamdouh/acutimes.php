<?php
global $wpdb, $users;
$users = FBR_User::selectMulti('user_status', FBR_User::STATE_APPROVED);
?>
<h2>Approved Users</h2>
<?php include('body.php') ?>