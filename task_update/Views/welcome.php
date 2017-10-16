<div class="wrapp-user">
	<div class="welcome">
		<span>Welcome to you</span>
	</div>
	
	<div class="info">
		<span class="label">Your information</span>
		<?php if (isset($user_info) && !empty($user_info)) { ?>
		<table class="table-hover">
			<tbody>
				<tr>
					<td>Id</td>
					<td><?php echo $user_info['id'] ?></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><?php echo $user_info['username'] ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $user_info['email'] ?></td>
				</tr>

				<tr>
					<td>Auth</td>
					<td><?php if ($user_info['admin'] == 1) echo 'Admin'; else echo 'Normal user'; ?></td>
				</tr>
			</tbody>
		</table>
		<?php } ?>	
	
	</div>

</div>