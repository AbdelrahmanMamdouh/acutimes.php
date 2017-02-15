<?php
global $wpdb;
$users = RFB_User::getPendingUsers();
?>
<h2>Pending Users</h2>
<?php
foreach ($users as $user):
	?>
	<tr>
		<td>
			<img src="<?php echo $user->user_picture ?>" alt="<?php echo $user->user_name; ?>"/>
		</td>
		<td>
			<?php echo $user->user_name; ?>
		</td>
		<td>
			<?php echo $user->user_email; ?>
		</td>
		<td>
			<a href="<?php echo $user->user_profile; ?>" target="_blank">Vist Profile</a>
		</td>
		<td>
			<form method="post" action>
				<input type="hidden" name="id" value="<?php echo $user->id ?>"/>		
				<input type="hidden" name="user_id" value="<?php echo $user->user_id ?>"/>
				<select name="user_status">
					<option>Change Status</option>
					<option value="1">Approved</option>
					<option value="0">Declined</option>
				</select>
				<input type="submit" name="user_status_change" value="Change Status" />
			</form>
		</td>
	</tr>
	<?php
endforeach;
