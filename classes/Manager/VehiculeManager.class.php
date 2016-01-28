<?php

namespace Manager;

class VehiculeManager {
	private $host = 'localhost';
	private $user = 'root';
	private $password = '';
	private $dbname = 'vehicules';
	
	private $connexion;

	public function __construct() {

		// $array_check = array('host', 'password', 'user', 'dbname', 'connexion');
		$array_check = array('host', 'password', 'dbname', 'connexion');

		\Manager\TestManager::checkProperties($this, $array_check);

		try {
		    $this->connexion = new \PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password);
		} catch (Exception $e) {
		    die('Erreur : ' . $e->getMessage());
		}

	}

	public function getVehicules() {
		$response = $this->connexion->query("SELECT * FROM `cars`");
		return $response->fetchAll();
	}

	public function insertVehicule($vehicule) {

		try {

			$insert = $this->connexion->prepare
			(
				"INSERT INTO `cars` 
				(`engine`, `speed`, `brand`, `color`) 
				VALUES 
				(:engine, :speed, :brand, :color);"
			);

			$engine = $vehicule->getEngine();
			$speed = $vehicule->getSpeed();
			$brand = $vehicule->getBrand();
			$color = $vehicule->getColor();

			$insert->bindParam(':engine', $engine, \PDO::PARAM_STR);
			$insert->bindParam(':speed', $speed, \PDO::PARAM_STR);
			$insert->bindParam(':brand', $brand, \PDO::PARAM_STR);
			$insert->bindParam(':color', $color, \PDO::PARAM_STR);
			$insert->execute();

			echo 'Inserted good !';

		} catch (Exception $e) {
			die("Some error occured while the register process : ".$e);
		}
	}

}
