<?php

namespace Ve;

class InvalidSpeedException extends \Exception {

	public function __construct($message) {
		try {
			throw new \Exception($message, 1);
		} catch (\Exception $e) {
			$this->displayError($e);
		}
	}

	function displayError($e) {
		echo '<pre><b style="color:red;">'.$e->getMessage().'</b></pre>';
	}
}
