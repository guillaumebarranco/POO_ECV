<?php 

namespace Ve;

use Ve\Vehicule;

class Moto extends Vehicule {

	public function __construct($brand, $color) {
		$this->setBrand($brand);
		$this->setColor($color);
		$this->setNbWheels(2);
		$this->setWeight(400);
		$this->setType('Moto');
	}

	public function klaxonne() {
		echo 'Je suis une moto de marque '.$this->getBrand();
	}
}
