<?php

namespace App\Models;

use PDO;

Class UsersModel extends DatabaseModel
{

	protected static $tablename = 'users';
	protected static $columns = [
		'id',
		'email',
		'password',
		'first_name',
		'last_name',
		'privilege',
		'username',	
		];


	// Return true if email exists
	// Returnfalse if email is not found
	public function doesThisEmailExist($email) {

		$db = $this->getDatabaseConnection();

		$sql = "SELECT email FROM users WHERE email=:email";

		$statement = $db->prepare($sql);

		$statement->bindValue(':email', $email);

		$statement->execute();

		if( $statement->rowCount() == 1) {

			return true;
		} else {
			return false;
		}
	}

	public function doesThisUsernameExist($username) {

		$db = $this->getDatabaseConnection();

		$sql = "SELECT username FROM users WHERE username=:username";

		$statement = $db->prepare($sql);

		$statement->bindValue(':username', $username);

		$statement->execute();

		if( $statement->rowCount() == 1) {

			return true;
		} else {
			return false;
		}
	}	
		
	public function saveNewUser() {
		

		// Get the database connection
		$db = $this->getDatabaseConnection();

		// Prepare the SQL
		$sql ="INSERT INTO users (email, password, first_name, last_name, username)
				VALUES (:email, :password, :first_name, :last_name, :username)";

		$statement = $db->prepare($sql);

		// Bind the form data to the SQL query
		$statement->bindValue(':email', $_POST['email']);
		$statement->bindValue(':password', $_POST['password']);
		$statement->bindValue(':first_name', $_POST['first_name']);
		$statement->bindValue(':last_name', $_POST['last_name']);
		$statement->bindValue(':username', $_POST['username']);

		// Run the query
		$result = $statement->execute();

		//Confirm tht it worked
		if( $result == true) {
			// Yay!

			$_SESSION['user_id'] = $db->lastInsertID();
			$_SESSION['privilege'] = 'user';
			$_SESSION['first_name'] = $_POST['first_name'];
			$_SESSION['last_name'] = $_POST['last_name'];
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['email'] = $_POST['email'];

			header('Location: index.php?page=account');
		} else {
			// Uh oh...
		}

		//If it did, log the user in and redirect to their 
		// new account page
	}

	// Login functionality
	public function attemptLogin($id) {
		
		$db = $this->getDatabaseConnection();

		// Find the password of the user with a match
		$sql = "SELECT id, password, privilege, email, username, first_name, last_name FROM users
				WHERE email = :email ";

		$statement = $db->prepare($sql);

		$statement->bindValue(':email', $_POST['email']);

		$statement->execute();

		$record = $statement->fetch(PDO::FETCH_ASSOC);

		//Did we get an array (EMAIL FOUND!)
		if( is_array($record)) {
			// Email found
			$result = password_verify( $_POST['password'] ,$record['password']);

			// If the result is good
			if ( $result == true ) {
				// Log the user in and redirect to account page
				$_SESSION['user_id'] = $record['id'];
				$_SESSION['privilege'] = $record['privilege'];
				$_SESSION['email'] = $record['email'];
				$_SESSION['first_name'] = $record['first_name'];
				$_SESSION['last_name'] = $record['last_name'];
				$_SESSION['username'] = $record['username'];	

				if(isset($record['id'])){
					header('Location: index.php?page=account');
				} else {
					header('Location: index.php?page=home');
				}
			} else {
				// Bad password, return false so user ses error message
				return false;
			}

		} else {
			//Email not found
			// Tell use bad credentials
			return false;
		}
	}

	public function update(){

		$db = $this->getDatabaseConnection();

		if(empty($_POST['password'])){
			$sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, username = :username";
		} else {
			$sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, username = :username, password = :password" ; 
		}		
		
		$sql .= " WHERE id = :id";

		$statement = $db->prepare($sql);

		$statement->bindValue(':first_name', $_POST['first_name']);
		$statement->bindValue(':last_name', $_POST['last_name']);
		$statement->bindValue(':email', $_POST['email']);
		$statement->bindValue(':username', $_POST['username']);
		if( ! empty($_POST['password'])){
			$statement->bindValue(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
		}
		$statement->bindValue(':id', $_POST['id']);

		$statement->execute();
	}

}