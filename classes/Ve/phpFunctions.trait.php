<?php
namespace Ve;

trait phpFunctions {

	function trySomething() {
		echo '<h1>It\'s a traaaaaaaaaaaaaaaaaaap</h1>';
		die;
	}

	function formatePrice($price) {
		$price = intval($price);

		if(!is_float($price)) $price .= '.00';
		$price .= ' euros';

		return $price;
	}
}
