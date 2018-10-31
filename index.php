<?php 

	include 'inc.php';

	$file = $_FILES;
	const BASE_URL = 'http://localhost/ascii-art/';

	if(isset($file) && !empty($file)){
		if(copy($file['image']['tmp_name'], $file['image']['name'])){

			echo "File is uploaded!";

			$img = imagecreatefromjpeg(BASE_URL.$file['image']['name']);

			$imgSizeX = imagesx($img);
			$imgSizeY = imagesy($img);

			// imagecolorat - цвет пикселя
			// $pixel_color = imagecolorat($img, 104, 12);
			// $rgb = imagecolorsforindex($img, $pixel_color);
			// var_dump(rgbtohex($rgb['red'], $rgb['green'], $rgb['blue']));

		}else{
			echo "Something went wrong(";
		}
	}

	

	echo "<pre>";
	var_dump($imgSizeX, $imgSizeY);
	echo "</pre>";

	
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
					echo '<table style="font-size: 8px;">';
					for($y = 0; $y < $imgSizeY; $y = $y + 8){
						echo '<tr>';
						for($x = 0; $x < $imgSizeX; $x = $x + 8){

							$pixel_color = imagecolorat($img, $x, $y);
							$rgb = imagecolorsforindex($img, $pixel_color);

							echo '<td>';
								echo '<span style="color:'.rgbtohex($rgb['red'], $rgb['green'], $rgb['blue']).'">#</span>';
							echo '<td>';

						}
						echo '</tr>';
					}
					echo '</table>';
				?>
			</div>
		</div>
	</div>

</body>
</html>