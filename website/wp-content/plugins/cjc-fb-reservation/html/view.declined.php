<?php
global $wpdb, $users;
$users = FBR_User::getDeclinedUsers();
?>
<h2>Declined Users</h2>
<?php include('body.php') ?>