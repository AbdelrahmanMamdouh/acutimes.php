<?php
global $wpdb, $users;
$users = FBR_User::getPendingUsers();
?>
<h2>Pending Users</h2>
<?php include('body.php') ?>