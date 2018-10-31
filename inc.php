<?php 

	class Ascii{
		
		public $quality;
		public $imageType;
		public $url;

		function __construct($url){
			$this->url = $url;
		}

		// static function rgbToHex($red, $green, $blue){
		// 	$hex = '#';
		// 	$hex .= str_pad(dechex($red), 2, '0', STR_PAD_LEFT);
		// 	$hex .= str_pad(dechex($green), 2, '0', STR_PAD_LEFT);
		// 	$hex .= str_pad(dechex($blue), 2, '0', STR_PAD_LEFT);
		// 	return($hex);
		// }
	}

	function rgbtohex($red, $green, $blue){
		$hex = '#';
		$hex .= str_pad(dechex($red), 2, '0', STR_PAD_LEFT);
		$hex .= str_pad(dechex($green), 2, '0', STR_PAD_LEFT);
		$hex .= str_pad(dechex($blue), 2, '0', STR_PAD_LEFT);
		return($hex);
	}