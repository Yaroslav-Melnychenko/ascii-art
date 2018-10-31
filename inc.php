<?php 

	class Ascii{
		
		public $quality;
		public $imageType;
		public $url;
		public $sizeX;
		public $sizeY;
		public $img;

		function __construct($url){
			$this->url = $url;
			$this->img = imagecreatefromjpeg($this->url);
			$this->sizeX = imagesx($this->img);
			$this->sizeY = imagesy($this->img);
		}

		public function DrawSymbols($depth, $quality, $fontSize){

			echo '<table style="font-size: '.$fontSize.'; line-height: 8px;">';

			for($y = 0; $y < $this->sizeY; $y = $y + $quality){

				echo '<tr style="border: none;">';

				for($x = 0; $x <$this->sizeX; $x = $x + $quality){

					$pixel_color = imagecolorat($this->img, $x, $y);
					$rgb = imagecolorsforindex($this->img, $pixel_color);

					echo '<td style="border: none;">';

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
					echo '</td>';

				}

				echo '</tr>';
			}

			echo '</table>';

		}

		public function DrawColors($quality, $fontSize){

			echo '<table style="font-size: '.$fontSize.'px;">';

			for($y = 0; $y < $this->sizeY; $y = $y + $quality){

				echo '<tr>';

				for($x = 0; $x < $this->sizeX; $x = $x + $quality){

 					$pixel_color = imagecolorat($this->img, $x, $y);
					$rgb = imagecolorsforindex($this->img, $pixel_color);
 					echo '<td>';
					echo '<span style="color:'.rgbtohex($rgb['red'], $rgb['green'], $rgb['blue']).'">#</span>';
					echo '</td>';

 				}

				echo '</tr>';
			}

			echo '</table>';
		}
	}

	function rgbtohex($red, $green, $blue){
		$hex = '#';
		$hex .= str_pad(dechex($red), 2, '0', STR_PAD_LEFT);
		$hex .= str_pad(dechex($green), 2, '0', STR_PAD_LEFT);
		$hex .= str_pad(dechex($blue), 2, '0', STR_PAD_LEFT);
		return($hex);
	}