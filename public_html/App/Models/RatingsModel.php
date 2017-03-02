<?php

namespace App\Models;

use PDO;

//Experimental Page!!

Class RatingsModel extends DatabaseModel

{

	protected static $tablename = 'ratings';
	protected static $columns = [
		'id',
		'user_id',
		'listing_id',
		'rating_value_for_money',
		'rating_insulation',
		'rating_noise_proofing',
		'rating_sunlight',
		'rating_damp_or_dry',
		'rating_landlord_property_manager',
		'rating_heating',
		'rating_public_transportation',	
		'rating_security',
		'rating_ease_of_maintenance',
		'rating_nearby_services',
		'rating_neighbors_neighborhood',			
		];


	// address duplication solution needed here!!

	public function saveNewRatings() {
		

		// Get the database connection
		$db = $this->getDatabaseConnection();

		// Prepare the SQL
		$sql ="INSERT INTO ratings (rating_value_for_money, rating_insulation, rating_noise_proofing, rating_sunlight, rating_damp_or_dry, rating_landlord_property_manager, rating_heating, rating_public_transportation, rating_security, rating_ease_of_maintenance, rating_nearby_services, rating_neighbors_neighborhood)
				VALUES (:rating_value_for_money, :rating_insulation, :rating_noise_proofing, :rating_sunlight, :rating_damp_or_dry, :rating_landlord_property_manager, :rating_heating, :rating_public_transportation, :rating_security, :rating_ease_of_maintenance, :rating_nearby_services, :rating_neighbors_neighborhood)";

		$statement = $db->prepare($sql);

		// Bind the form data to the SQL query
		$statement->bindValue(':rating_value_for_money', $_POST['rating_value_for_money']);
		$statement->bindValue(':rating_insulation', $_POST['rating_insulation']);
		$statement->bindValue(':rating_noise_proofing', $_POST['rating_noise_proofing']);
		$statement->bindValue(':rating_sunlight', $_POST['rating_sunlight']);
		$statement->bindValue(':rating_damp_or_dry', $_POST['rating_damp_or_dry']);
		$statement->bindValue(':rating_landlord_property_manager', $_POST['rating_landlord_property_manager']);
		$statement->bindValue(':rating_heating', $_POST['rating_heating']);
		$statement->bindValue(':rating_public_transportation', $_POST['rating_public_transportation']);
		$statement->bindValue(':rating_security', $_POST['rating_security']);
		$statement->bindValue(':rating_ease_of_maintenance', $_POST['rating_ease_of_maintenance']);
		$statement->bindValue(':rating_nearby_services', $_POST['rating_nearby_services']);
		$statement->bindValue(':rating_neighbors_neighborhood', $_POST['rating_neighbors_neighborhood']);
		
		// Run the query
		$result = $statement->execute();

		//Confirm tht it worked
		if( $result == true) {
			// Yay!

			$_SESSION['user_id'] = $db->lastInsertID();
			$_SESSION['privilege'] = 'user';
			// $_SESSION['first_name'] = $result->first_name;

			header('Location: index.php?page=listing');
		} else {
			echo "problems";
		}

		//If it did, log the user in and redirect to their 
		// new account page
	}
}			
