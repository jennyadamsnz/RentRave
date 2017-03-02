<?php

namespace App\Controllers;

use App\Views\AccountView;
use App\Views\LoginView;
use App\Views\RegisterView;
use App\Models\AddressModel;
use App\Models\ListingModel;
use App\Models\RatingsModel;
use App\Models\ReviewModel;
use App\Models\UsersModel;


Class AccountController
{

	public function show(){

		if( !isset($_SESSION['user_id']) ) {
			header('Location: index.php?page=login');
		}

		$user = new UsersModel($_SESSION['user_id']);		

		$featuredUser = new ListingModel();	
		$allDetails = $featuredUser->getListingSummary($_SESSION['user_id']);

		$view = new AccountView(compact('user','allDetails'));
		$view->render();


	}
	public function showLoginForm(){

		$view = new LoginView();
		$view->render();

	}		
	public function processLoginForm(){

	// Make sure the email has been provided
	// Make sure the password has been provided
	// It should also be at least 8 chars
	// no point bugging the database with a password
	// that is obviously wrong

	// Use the Users model

	$id = isset($_GET['id']) ? $_GET['id'] : null;
	$user = new UsersModel();
	$result = $user->attemptLogin($id);

	// If bad then generate error messages
	$errors['login-error'] = 'Invalid email or password';

	// Show the view
	$view = new  LoginView($errors);
	$view->render();

	}	
	public function accountEdit(){

		if( isset($_SESSION['user_id']) ) {
			$user = new UsersModel($_SESSION['user_id']);

		} else {
			$user = new UsersModel();
		}

		$view = new RegisterView(compact('user'));
		$view->render();
	}	

	public function accountUpdate(){
		
		$user = new UsersModel($_POST);

		$user->update();
		header("Location:./?page=account");
	}

		public function getFormData($id = null){

		if(isset($_SESSION['user.id'])){
			$userProfile = $_SESSION['user.id'];
			unset($_SESSION['user.id']);
		} else {
			$userProfile = new UsersModel($id);
		}
		return $userProfile;
	}		

	////////////////////////////////////////


	public function delete(){

		$userID = isset($_GET['id']) ? $_GET['id'] : null;
		AddressModel::destroy($userID);
		ListingModel::destroy($userID);
		RatingsModel::destroy($userID);
		ReviewModel::destroy($userID);
		header("Location:./?page=account");

	}		
}

