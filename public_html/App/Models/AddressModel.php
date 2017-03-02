<?php

namespace App\Models;

use PDO;

Class AddressModel extends DatabaseModel
{

	protected static $tablename = 'address';
	protected static $columns = [
		'id',
		'address_street_number',
		'address_street_name',
		'address_suburb',
		'address_city'
		];
	protected static $validationRules = [
						
						'address_street_number'	=> 'numeric',
						'address_street_name'	=> 'minlength:3',
						'address_suburb'		=> 'minlength:3',
						'address_city'			=> 'minlength:3'
	];
	public function saveNewAddress() {
		

		// Get the database connection
		$db = $this->getDatabaseConnection();

		// Prepare the SQL
		$sql ="INSERT INTO address (address_street_number, address_street_name, address_suburb, address_city)
				VALUES (:address_street_number, :address_street_name, :address_suburb, :address_city)";

		$statement = $db->prepare($sql);

		// Bind the form data to the SQL query
		$statement->bindValue(':address_street_number', $_POST['address_street_number']);
		$statement->bindValue(':address_street_name', $_POST['address_street_name']);
		$statement->bindValue(':address_suburb', $_POST['address_suburb']);
		$statement->bindValue(':address_city', $_POST['address_city']);

		// Run the query
		$result = $statement->execute();

		//Confirm tht it worked
		if( $result == true) {
			// Yay!

			$_SESSION['user_id'] = $db->lastInsertID();
			$_SESSION['privilege'] = 'user';
			// $_SESSION['first_name'] = $result->first_name;

			header('Location: index.php?page=account');
		} else {
			// Uh oh...
		}

		//If it did, log the user in and redirect to their 
		// new account page
	}

}

