<?php 

namespace Ve;

use Ve\InvalidSpeedException;
use Manager\TestManager;

/*
*	Remember exemple of RATP bus horaires
*/
interface MethodsVehicule {
	public function accelerate();	
}

require_once(getcwd().'/classes/Trait/functions.php');

abstract class Vehicule implements MethodsVehicule {
	private $engine = 'V8';
	private $speed = 0;
	private $brand;
	private $color;
	private $nbWheels = 4;
	private $weight = 1000;
	private $type;

	use phpFunctions;

	/*
	*	CONSTRUCT FUNCTIONS
	*/

	public function __construct($brand, $color) {

		$this->setBrand($brand);
		$this->setColor($color);
	}

	public function __set($name, $value) {
		printf('<p style="color:#cc0000;">Problem occured with variable <b>'.$name.'</b> for value <b>'.$value.'</b></p>');
	}

	abstract public function klaxonne();

	/*
	*	CLASS FUNCTIONS
	*/

	public function accelerate() {

		$this->trySomething();

		if($this->speed < 130) {
			$this->speed = $this->speed + 10;
		} else {
			$this->throwError("is going way too fast !");			
		}
	}

	// function displayError($e) {
	// 	echo '<pre><b style="color:red;">'.$e->getMessage().'</b></pre>';
	// }

	public function throwError($text) {
		try {
			throw new InvalidSpeedException("Your vehicle : ".$this->brand." ".$this->type. " ".$text);
		} catch (InvalidSpeedException $e) {
			// $this->displayError($e);
		}
	}

	public function fastAndFurious() {
		$this->accelerate();
		$this->accelerate();
		$this->accelerate();
		$this->accelerate();
	}

	public function stop() {

		if($this->speed - 10 > 0) {
			$this->speed = $this->speed - 10;
		} else {
			$this->throwError("cannot deccelerate because your speed is too low.", 2);	
		}
	}

	public function abs() {
		$this->stop();
		$this->stop();
		$this->stop();
	}

	/*
	*	GETTERS
	*/

	public function getEngine() {
		return $this->engine;
	}

	public function getSpeed() {
		return $this->speed;
	}

	public static function getMphSpeed($speed) {
		return $speed / 1.609;
	}

	public function getBrand() {
		return $this->brand;
	}

	public function getColor() {
		return $this->color;
	}

	public function getNbWheels() {
		return $this->nbWheels;
	}

	public function getWeight() {
		return $this->nbWeight;
	}

	public function getType() {
		return $this->type;
	}

	/*
	*	SETTERS
	*/

	public function setEngine($engine) {
		$this->engine = $engine;
	}

	public function setSpeed($speed) {

		if(is_int(intval($speed))) {
			$this->speed = $speed;
		} else {
			$this->throwError("Error while setting speed manually");
		}
	}

	public function setBrand($brand) {
		$this->brand = $brand;
	}

	public function setColor($color) {
		$this->color = $color;
	}

	public function setNbWheels($nbWheels) {
		$this->nbWheels = $nbWheels;
	}

	public function setWeight($weight) {
		$this->weight = $weight;
	}

	public function setType($type) {
		$this->type = $type;
	}
}
