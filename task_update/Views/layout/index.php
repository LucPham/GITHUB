<!DOCTYPE html>
<html>
	<?php $this->load('Views/layout/header.php'); ?>

<body>
	<div class="container">
		<?php $this->load('Views/layout/menu.php'); ?>	
		
		<?php 

			if (isset($data['path'])) {

				$this->load($data['path'], $data);

			}

		 ?>

	</div>
</body>
</html>