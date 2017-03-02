<?php

namespace App\Controllers;

use App\Views\RegisterView;
use App\Models\UsersModel;

Class RegisterController
{

	public function show(){

		if( isset($_SESSION['user_id']) ) {
			header('Location: index.php?page=account');
		} else {
			$user= new UsersModel();
		}

		$view = new RegisterView(compact('user'));
		$view->render();

	}

	public function store() {

		// Prepare a container to hold all the error messages
		$errors = [];

		// Validate the form
		// Each field has been filled out
		
		// Email pattern
		$emailPattern = '/^[a-zA-Z0-9_.\-+]{1,100}@[a-zA-Z0-9_.\-+]{1,100}\.([a-zA-Z\.]{2,})$/';

		if( preg_match($emailPattern, $_POST['email']) ) {
			// Check database
			// die 

			$user = new UsersModel();


			$result = $user->doesThisEmailExist( $_POST['email']);

			// If the result is true
			if($result == true ) {

				// oops, this email is in use
				$errors['email'] = 'This email is already registered<br><a href="./?page=login"><u>Click here to log in</u></a>';
			}

		} else {
			//generate error message
			$errors['email'] = 'Please enter a valid email address';
		}	

		// Symbols Pattern
		$pattern = '/[#$%^&*()+=\[\]\';\/{}|":<>~\\\\]/';

		// First name validation

		if( strlen($_POST['first_name']) == 0) {
			// Password has not been provided
			$errors['first_name'] = 'Please enter your first name';
		}	

		if( preg_match($pattern, $_POST['first_name'])) {

			$errors['first_name'] = 'Sorry, no symbols are accepted';
		}

		// Last name validation

		if( strlen($_POST['last_name']) == 0) {
			// Password has not been provided
			$errors['last_name'] = 'Please enter your last name';
		}		

		if( preg_match($pattern, $_POST['last_name'])) {

			$errors['last_name'] = 'Sorry, no symbols are accepted';
		}

		// Username validation

		if( !preg_match($pattern, $_POST['username'])) {

			$user = new UsersModel();

			$result = $user->doesThisUsernameExist( $_POST['username']);

			// If result is true 
			if($result == true ) {

				$errors['username'] = 'Sorry, this username is taken!';
			}

		} else {
			//generate error message
			$errors['username'] = 'Please enter a valid username';
		}
		
		// Passwords match and are at least 8 characters long
		if( strlen($_POST['password']) == 0) {
			// Password has not been provided
			$errors['password'] = 'Please enter a password';
		} elseif( strlen($_POST['password']) < 8 ) {
			$errors['password'] = 'Must be at least 8 characters';
		} elseif( $_POST['password'] != $_POST['confirmpassword'] ) {
			$errors['password'] = 'Sorry, your passwords do not match';
		}

		// If validation fails:
		if(count($errors) > 0) {
			
			$view = new RegisterView($errors);
			$view->render();			
			return;
		}

		// If everything is ok:

			//hash the password (don't save it in plain text)
			$_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

			//insert newuser into database
			$newUser = new UsersModel();
			$newUser->saveNewUser();

			// Log them in automatically 

			//Redirect to account page

	}
}

