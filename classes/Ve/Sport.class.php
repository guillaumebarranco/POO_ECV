<?php 

namespace Ve;

use Ve\Vehicule;

class Sport extends Vehicule {

	public function __construct($brand, $color) {
		$this->setBrand($brand);
		$this->setColor($color);
		$this->setWeight(800);
		$this->setType('sport car');
	}

	public function klaxonne() {
		echo 'Je suis une voiture de marque '.$this->getBrand();
	}
}
