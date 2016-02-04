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

		$this->connectToDatabase();
	}

	public function connectToDatabase() {
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

			echo 'The vehicule was inserted !';

		} catch (Exception $e) {
			die("Some error occured while the insertion process : ".$e);
		}
	}

	public function updateVehicule($id, $engine, $speed, $brand, $color) {

		try {

			$insert = $this->connexion->prepare
			(
				"UPDATE `cars` 
				SET `engine` = :engine, `speed` = :speed, `brand` = :brand, `color` = :color
				WHERE `id` = :id;"
			);

			$insert->bindParam(':engine', $engine, \PDO::PARAM_STR);
			$insert->bindParam(':speed', $speed, \PDO::PARAM_STR);
			$insert->bindParam(':brand', $brand, \PDO::PARAM_STR);
			$insert->bindParam(':color', $color, \PDO::PARAM_STR);
			$insert->bindParam(':id', $id, \PDO::PARAM_STR);
			$insert->execute();

			echo 'The vehicule was updated with success !';

		} catch (Exception $e) {
			die("Some error occured while the update process : ".$e);
		}
	}

	public function deleteVehicule($id) {

		try {
			$delete = $this->connexion->prepare("DELETE FROM `cars` WHERE id = :id ");
			$delete->bindParam(':id', $id, \PDO::PARAM_INT);
			$delete->execute();

			echo 'Your vehicule have been deleted !';
			
		} catch (Exception $e) {
			die("Some error occured while the delete process : ".$e);
		}
	}

}
