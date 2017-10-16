<div class="add-wrapp">
	<h2>Sign in</h2>

	<div class="form-wrapp">
		<div class="err">
			
				<?php 
					if (isset($data['success'])) {
							echo '<span class="success-text">'.$data['success'].'</span>';
					}
				?>
			
		</div>
		<div class="err">
			
				<?php 
					if (isset($data['formErr'])) {
						foreach ($data['formErr'] as $err) {
							echo '<span class="err-text">'.$err.'</span>';						
						}
					}
				?>
			
		</div>

		<div class="form">
			<form method="post" enctype="multipart/form-data">
				<input type="email" name="email" class="ip" placeholder="Enter your email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
				<input type="password" name="password" class="ip" placeholder="Password">
				<input type="submit" name="log-in-btn" class="add-btn" value="Sign in">
			</form>
		</div>
	</div>
</div>