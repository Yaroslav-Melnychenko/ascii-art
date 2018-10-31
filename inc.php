<?php 

	function rgbtohex($red, $green, $blue){
		$hex = '#';
		$hex .= str_pad(dechex($red), 2, '0', STR_PAD_LEFT);
		$hex .= str_pad(dechex($green), 2, '0', STR_PAD_LEFT);
		$hex .= str_pad(dechex($blue), 2, '0', STR_PAD_LEFT);
		return($hex);
	}