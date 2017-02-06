<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
global $wpdb;
$users = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}events_users WHERE user_status = 0", OBJECT);
?>
<h2>Declined Users</h2>
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
			<form method="post">
				<input type="hidden" name="id" value="<?php echo $user->id ?>"/>		
				<input type="hidden" name="user_id" value="<?php echo $user->user_id ?>"/>
				<select name="user_status">
					<option>Change Status</option>
					<option value="null">Under Inspection</option>
					<option value="0">Approved</option>
				</select>
				<input type="submit" name="user_status_change" value="Change Status" />
			</form>
		</td>
	</tr>
	<?php
endforeach;
