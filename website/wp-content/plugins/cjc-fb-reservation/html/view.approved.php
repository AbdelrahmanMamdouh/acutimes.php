<?php
global $wpdb, $users;
$users = FBR_User::getApprovedUsers();
?>
<h2>Approved Users</h2>
<?php include('body.php') ?>