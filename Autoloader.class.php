<?php 

namespace Autoload;

class Autoloader {

	public function __construct() {
		$this->register();
	}

	public function register() {
		spl_autoload_register(__NAMESPACE__ . "\\Autoloader::autoload");
	}

	public function autoload($class) {
		if(isset($class) && file_exists('classes/'.$class . '.class.php')) {
			require_once('classes/'.$class . '.class.php');
		}
	}
}

$autoload = new Autoloader();
