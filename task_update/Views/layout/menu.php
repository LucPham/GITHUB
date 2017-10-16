<nav>
	<div class="brand"><a href="index.php">Part1</a></div>
	<div class="link">
		<ul>


			<?php 
				if (isset($this->info) && !empty($this->info)) {
					$info = $this->info;
					?>

						<li><a href="index.php?p=profile"><?php echo $info['username'] ?></a></li>
						<li><a href="index.php?p=add"><?php if ($info['admin'] == 1) echo 'Add new users'; ?></a></li>

						<li><a href="index.php?p=logout">Log out</a></li>
			
					<?php 
				}
			?>

			


			
				
				
		

			
		</ul>
	</div>
</nav>