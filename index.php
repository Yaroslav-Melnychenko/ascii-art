<?php 

	include 'inc.php';

	$file = $_FILES;
	const BASE_URL = 'http://localhost/ascii-art/';
	$depth = array('&', '#', '0', 'l', ';', ',', '.');

	if(isset($file) && !empty($file)){
		if(copy($file['image']['tmp_name'], $file['image']['name'])){

			$img = imagecreatefromjpeg(BASE_URL.$file['image']['name']);

			$imgSizeX = imagesx($img);
			$imgSizeY = imagesy($img);

		}else{
			echo "Something went wrong(";
		}
	}

	

	echo "<pre>";
	//var_dump($imgSizeX, $imgSizeY);
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
					echo '<table style="font-size: 8px; line-height: 8px;">';
					for($y = 0; $y < $imgSizeY; $y = $y + 4){
						echo '<tr style="border: none;">';
						for($x = 0; $x < $imgSizeX; $x = $x + 4){

							$pixel_color = imagecolorat($img, $x, $y);
							$rgb = imagecolorsforindex($img, $pixel_color);

							echo '<td style="border: none;">';
								// echo '<span style="color:'.rgbtohex($rgb['red'], $rgb['green'], $rgb['blue']).'">#</span>';
							if($rgb['red'] < 36 && $rgb['green'] < 36 && $rgb['blue'] < 36){
								$char = $depth[0];
							}elseif($rgb['red'] < 2*36 && $rgb['green'] < 2*36 && $rgb['blue'] < 2*36){
								$char = $depth[1];
							}elseif($rgb['red'] < 3*36 && $rgb['green'] < 3*36 && $rgb['blue'] < 3*36){
								$char = $depth[2];
							}elseif($rgb['red'] < 4*36 && $rgb['green'] < 4*36 && $rgb['blue'] < 4*36){
								$char = $depth[3];
							}elseif($rgb['red'] < 5*36 && $rgb['green'] < 5*36 && $rgb['blue'] < 5*36){
								$char = $depth[4];
							}elseif($rgb['red'] < 6*36 && $rgb['green'] < 6*36 && $rgb['blue'] < 6*36){
								$char = $depth[5];
							}elseif($rgb['red'] < 7*36 && $rgb['green'] < 7*36 && $rgb['blue'] < 7*36){
								$char = $depth[6];
							}else{
								$char = '-';
							}

							echo '<span>'.$char.'</span>';
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