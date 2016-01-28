<?php

namespace Ve;

use Ve\Vehicule;

class Camion extends Vehicule {

	public function __construct($brand, $color) {
		$this->setBrand($brand);
		$this->setColor($color);
		$this->setWeight(4000);
		$this->setNbWheels(8);
		$this->setType('Camion');
	}

	public function klaxonne() {
		echo 'Je suis un camion de marque '.$this->getBrand();
	}

}
