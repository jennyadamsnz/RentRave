<?php

namespace App\Controllers;

use App\Views\ReviewView;
use App\Models\AddressModel;
use App\Models\ReviewModel;
use App\Models\ListingModel;
use App\Controllers\ListingController;

Class ReviewController
{

	public function show(){

		if( !isset($_SESSION['user_id']) ) {
			header('Location: index.php?page=login');
		}
		$listing = new ListingController();
		
		$listings = $listing->getListingData();
		$addresses = $listing->getAddressData();
		$reviews = $listing->getReviewData();

		$view = new ReviewView(compact('listings','addresses','reviews'));
		$view->render();
	}

public function store() {

		// Prepare a container to hold all the error messages
		$errors = [];

		// Validate the form
		// Each field has been filled out
		

			$newAddress = new AddressModel();


			$result = $newAddress->doesThisAddressExist( $_POST['address']);

			// If the result is true
			if($result == true ) {

				// oops, this email is in use
				$errors['address'] = 'Good news! This address has been previously reviewed so you can add to this info!';
			}

		// Symbols Pattern
		$pattern = '/[#$%^&*()+=\-\[\]\';\/{}|":<>~\\\\]/';

		// Address search validation

		if( strlen($_POST['address_search']) == 0) {
			// Password has not been provided
			$errors['address_search'] = 'Please enter the property address';
		}	

		if( preg_match($pattern, $_POST['address_search'])) {

			$errors['address_search'] = 'Sorry, no symbols are accepted';
		}

		// Review title validation

		if( strlen($_POST['review_title']) == 0) {
			// Password has not been provided
			$errors['review_title'] = 'Please enter a title for your review';
		}		

		if( preg_match($pattern, $_POST['review_title'])) {

			$errors['review_title'] = 'Sorry, no symbols are accepted';
		}

		// Review text validation

		if( strlen($_POST['review_text']) == 0) {
			// Password has not been provided
			$errors['review_text'] = 'Please write your review here';
		}		

		if( preg_match($pattern, $_POST['review_text'])) {

			$errors['review_text'] = 'Sorry, no symbols are accepted';
		}

		// If validation fails:
		if(count($errors) > 0) {
			
			$view = new ReviewView($errors);
			$view->render();			
			return;
		}

		// If everything is ok:

			//insert newuser into database
			$newAddress = new AddressModel();
			$newAddress->saveNewAddress();

			// Log them in automatically 

			//Redirect to account page

	}	

	public function reviewEdit(){
		
		$id = isset($_GET['id']) ? $_GET['id'] : null;

		$listing = new ListingModel();
		$featuredlisting = $listing->fullListingDetails($id);

		$listingController = new ListingController();

		$listings = $listingController->getListingData($id);
		$addresses = $listingController->getAddressData($id);
		$reviews = $listingController->getReviewData($id);
		

		$view = new ReviewView(compact('featuredlisting','addresses', 'listings','reviews'));
		$view->render();
	}

	public function reviewDelete(){
		$listingID = isset($_GET['id']) ? $_GET['id'] : null;
		listingModel::destroy($listingID );
		header("Location:./?page=account");
	}		
}

