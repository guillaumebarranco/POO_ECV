<!DOCTYPE HTML>

<html>
	<head>
		<title>Vive les voitures</title>

		<style>

			input {
				display: block;
				padding-left: 5px;
			}

			body {
				font-family: 'Lato';
			}
		</style>

	</head>

	<body>

		<?php

			require_once('Autoloader.class.php');
			
			use Manager\VehiculeManager;
			use Ve\Moto;
			use Ve\Camion;
			use Ve\Sport;
			

			$bdd = new VehiculeManager();

			$datas = $bdd->getVehicules();

			/*foreach($datas as $vehicule) { ?>
				<h2><?=$vehicule['brand']?></h2>

				<form action="">

					Speed <input value="<?=$vehicule['speed']?>" />
					Color <input value="<?=$vehicule['color']?>" />
					Engine <input value="<?=$vehicule['engine']?>" />

					<button>Update</button>
					
				</form>
			<?php }*/

			$honda = new Moto('Honda', 'bleue');
			// $honda->stop();
			
			var_dump($honda);
			$honda->klaxonne();


			$chevrolet = new Camion('Chevrolet', 'blanc');

			var_dump($chevrolet);
			$chevrolet->klaxonne();


			$ferrari = new Sport('ferrari', 'rouge');
			$ferrari->setSpeed(120);
			$ferrari->accelerate();
			$ferrari->accelerate();

			var_dump($ferrari);
			$ferrari->klaxonne();


			$porsche = new Sport('porsche', 'jaune canari');
			$porsche->fastAndFurious();

			var_dump($porsche);
			$porsche->klaxonne();

		?>

		<div></div>
	</body>
</html>
