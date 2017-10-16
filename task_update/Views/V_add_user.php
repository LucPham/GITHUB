<div class="add-wrapp">
	<h2>Add users</h2>
	
	<div class="form-wrapp">
		<div class="err">
			
				<?php 
					if (isset($data['success'])) {
							echo '<span class="success-text">'.$data['success'].'</span>';
					}
				?>
			
		</div>
		
			
				<?php 
					if (isset($data['formErr'])) {
					foreach ($data['formErr'] as $err) 
					{
					?>
						<div class="err">
							<?php  echo '<span class="err-text">'.$err.'</span></br></br>';?>			
						</div>
					<?php 				
					}
					}
				?>
			
		
		
		<div class="form">
			<form method="post" enctype="multipart/form-data">
				<input type="text" name="username" class="ip" placeholder="Enter a username!" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
				<input type="email" name="email" class="ip" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
				<input type="password" name="password" class="ip" placeholder="Password">
				

				<input type="radio" name="auth" class="radio"  value="0"><span>User</span>
				<input type="radio" name="auth" class="ss" value="1"> <span>Admin</span>

				<input type="submit" name="add-btn" class="add-btn" value="Add now">
			</form>
		</div>
	</div>
</div>