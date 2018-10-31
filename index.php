<?php 

	include 'inc.php';

	$file = $_FILES;
	const BASE_URL = 'http://localhost/ascii-art/';

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>ascii art</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

	<style type="text/css">
		table, td, tr{
			padding: 0;
			margin: 0;
		}
	</style>

	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
				<form action="index.php" method="post" enctype="multipart/form-data">
				  	<div class="form-group">
				    	<input type="file" class="form-control-file" name="image">
				  	</div>
				  	<input type="submit" name="submit" class="btn btn-primary">
				</form>
			</div>
			<div class="col-md-12">
				<?php

					if(isset($_POST) && !empty($_POST)){
						if(copy($file['image']['tmp_name'], $file['image']['name'])){
							$depth = array('&', '#', '0', 'l', ';', ',', '.');

							$picture = new Ascii(BASE_URL.$file['image']['name']);
							//1.array of symbols 2.quality 3.font-size
							$picture->DrawSymbols($depth, 4, 10);

							//1.quality 2.font-size
							$picture->DrawColors(4, 10);

							unlink($file['image']['name']);
						}

					}
					

				?>
			</div>
		</div>
	</div>

</body>
</html>