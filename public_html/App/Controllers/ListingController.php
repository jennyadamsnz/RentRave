<?php

namespace App\Controllers;

use App\Views\ListingView;
use App\Models\AddressModel;
use App\Models\ListingModel;
use App\Models\ReviewModel;
use App\Models\RatingsModel;


Class ListingController
{

	public function listingCreate(){

		// redirect the $_POST values to appropriate models;

		$address = new AddressModel();
		
		$address->address_street_number = array_key_exists('address_street_number', $_POST) ? $_POST['address_street_number'] : '';
		$address->address_street_name = array_key_exists('address_street_name', $_POST) ? $_POST['address_street_name'] : '';
		$address->address_suburb = array_key_exists('address_suburb', $_POST) ? $_POST['address_suburb'] : '';
		$address->address_city = array_key_exists('address_city', $_POST) ? $_POST['address_city'] : '';

		
		$listing = new ListingModel();

		$listing->rating = ($_POST['rating_value_for_money'] + $_POST['rating_insulation'] + $_POST['rating_noise_proofing'] + $_POST['rating_sunlight'] + $_POST['rating_damp_or_dry'] + $_POST['rating_landlord_property_manager'] + $_POST['rating_heating'] + $_POST['rating_public_transportation'] + $_POST['rating_security'] + $_POST['rating_ease_of_maintenance'] + $_POST['rating_nearby_services'] + $_POST['rating_neighbors_neighborhood'] ) / 12;

		$listing->user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
		$listing->listing_rental_period_start = array_key_exists('listing_rental_period_start', $_POST) ? $_POST['listing_rental_period_start'] : '';
		$listing->listing_rental_period_end = array_key_exists('listing_rental_period_end', $_POST) ? $_POST['listing_rental_period_end'] : '';   		
		$listing->listing_bathrooms = array_key_exists('listing_bathrooms', $_POST) ? $_POST['listing_bathrooms'] : '';
		$listing->listing_bedrooms = array_key_exists('listing_bedrooms', $_POST) ? $_POST['listing_bedrooms'] : '';
		$listing->listing_garage_carport = array_key_exists('listing_garage_carport', $_POST) ? $_POST['listing_garage_carport'] : '';
		$listing->listing_last_recorded_rate = array_key_exists('listing_last_recorded_rate', $_POST) ? $_POST['listing_last_recorded_rate'] : '';
		$listing->listing_agency_name = array_key_exists('listing_agency_name', $_POST) ? $_POST['listing_agency_name'] : '';
		$listing->listing_agent_or_landlord_name = array_key_exists('listing_agent_or_landlord_name', $_POST) ? $_POST['listing_agent_or_landlord_name'] : '';
		
      if($_FILES['listing_image_upload_one']['error'] === UPLOAD_ERR_OK){
         $listing->savePoster($_FILES['listing_image_upload_one']['tmp_name']);
      }


      $ratings = new RatingsModel();

		$ratings->user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
		$ratings->rating_value_for_money = array_key_exists('rating_value_for_money', $_POST) ? $_POST['rating_value_for_money'] : '';
		$ratings->rating_insulation = array_key_exists('rating_insulation', $_POST) ? $_POST['rating_insulation'] : '';
		$ratings->rating_noise_proofing = array_key_exists('rating_noise_proofing', $_POST) ? $_POST['rating_noise_proofing'] : '';
		$ratings->rating_sunlight = array_key_exists('rating_sunlight', $_POST) ? $_POST['rating_sunlight'] : '';
		$ratings->rating_damp_or_dry = array_key_exists('rating_damp_or_dry', $_POST) ? $_POST['rating_damp_or_dry'] : '';
		$ratings->rating_landlord_property_manager = array_key_exists('rating_landlord_property_manager', $_POST) ? $_POST['rating_landlord_property_manager'] : '';
		$ratings->rating_heating = array_key_exists('rating_heating', $_POST) ? $_POST['rating_heating'] : '';
		$ratings->rating_public_transportation = array_key_exists('rating_public_transportation', $_POST) ? $_POST['rating_public_transportation'] : '';
		$ratings->rating_security = array_key_exists('rating_security', $_POST) ? $_POST['rating_security'] : '';
		$ratings->rating_ease_of_maintenance = array_key_exists('rating_ease_of_maintenance', $_POST) ? $_POST['rating_ease_of_maintenance'] : '';
		$ratings->rating_nearby_services = array_key_exists('rating_nearby_services', $_POST) ? $_POST['rating_nearby_services'] : '';
		$ratings->rating_neighbors_neighborhood = array_key_exists('rating_neighbors_neighborhood', $_POST) ? $_POST['rating_neighbors_neighborhood'] : '';

		$review = new ReviewModel();

	   $review->user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
		$review->review_title = array_key_exists('review_title', $_POST) ? $_POST['review_title'] : '';
		$review->review_text = array_key_exists('review_text', $_POST) ? $_POST['review_text'] : '';
      $review->review_date_time = date("F j, Y, g:i a");

      //validate and save into database 
	
      if(! $address->isValid()){
         $_SESSION['error.address'] = $address;
      }
      
      if(! $listing->isValid()){
         $_SESSION['error.listing'] = $listing;
      }

      if(! $review->isValid()){
         $_SESSION['error.review'] = $review;
         header('Location: ./?page=review');
         exit(); 
      }

      $address->save();
      $addressID = $address->id; 

      $listing->address_id = $addressID;
      $listing->save();
      $listingID = $listing->id;

      $ratings->listing_id = $listingID;
      $ratings->save();

      $review->listing_id = $listingID;
      $review->save();

      //redirect to listing page
   		
		header('Location: ./?page=listing&id='.$listingID);
	}

   public function show(){

      $listing = new ListingModel();
      $featuredlisting = $listing->fullListingDetails($_GET['id']);

      $featuredOtherListing = $listing->showAllListings(); 
      

      $addressArray = [];


      $view = new ListingView(compact('featuredlisting','featuredOtherListing', 'addressArray'));
      $view->render();


   }  
   public function listingUpdate(){

      // redirect the $_POST values to appropriate models;

      $address = new AddressModel();
      
      $address->address_street_number = array_key_exists('address_street_number', $_POST) ? $_POST['address_street_number'] : '';
      $address->address_street_name = array_key_exists('address_street_name', $_POST) ? $_POST['address_street_name'] : '';
      $address->address_suburb = array_key_exists('address_suburb', $_POST) ? $_POST['address_suburb'] : '';
      $address->address_city = array_key_exists('address_city', $_POST) ? $_POST['address_city'] : '';

      
      $listing = new ListingModel($id);

      $listing->rating = ($_POST['rating_value_for_money'] + $_POST['rating_insulation'] + $_POST['rating_noise_proofing'] + $_POST['rating_sunlight'] + $_POST['rating_damp_or_dry'] + $_POST['rating_landlord_property_manager'] + $_POST['rating_heating'] + $_POST['rating_public_transportation'] + $_POST['rating_security'] + $_POST['rating_ease_of_maintenance'] + $_POST['rating_nearby_services'] + $_POST['rating_neighbors_neighborhood'] ) / 12;

      $listing->user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
      $listing->listing_rental_period_start = array_key_exists('listing_rental_period_start', $_POST) ? $_POST['listing_rental_period_start'] : '';
      $listing->listing_rental_period_end = array_key_exists('listing_rental_period_end', $_POST) ? $_POST['listing_rental_period_end'] : '';         
      $listing->listing_bathrooms = array_key_exists('listing_bathrooms', $_POST) ? $_POST['listing_bathrooms'] : '';
      $listing->listing_bedrooms = array_key_exists('listing_bedrooms', $_POST) ? $_POST['listing_bedrooms'] : '';
      $listing->listing_garage_carport = array_key_exists('listing_garage_carport', $_POST) ? $_POST['listing_garage_carport'] : '';
      $listing->listing_last_recorded_rate = array_key_exists('listing_last_recorded_rate', $_POST) ? $_POST['listing_last_recorded_rate'] : '';
      $listing->listing_agency_name = array_key_exists('listing_agency_name', $_POST) ? $_POST['listing_agency_name'] : '';
      $listing->listing_agent_or_landlord_name = array_key_exists('listing_agent_or_landlord_name', $_POST) ? $_POST['listing_agent_or_landlord_name'] : '';
      
      if($_FILES['listing_image_upload_one']['error'] === UPLOAD_ERR_OK){
         $listing->savePoster($_FILES['listing_image_upload_one']['tmp_name']);
      }


      $ratings = new RatingsModel();

      $ratings->user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
      $ratings->rating_value_for_money = array_key_exists('rating_value_for_money', $_POST) ? $_POST['rating_value_for_money'] : '';
      $ratings->rating_insulation = array_key_exists('rating_insulation', $_POST) ? $_POST['rating_insulation'] : '';
      $ratings->rating_noise_proofing = array_key_exists('rating_noise_proofing', $_POST) ? $_POST['rating_noise_proofing'] : '';
      $ratings->rating_sunlight = array_key_exists('rating_sunlight', $_POST) ? $_POST['rating_sunlight'] : '';
      $ratings->rating_damp_or_dry = array_key_exists('rating_damp_or_dry', $_POST) ? $_POST['rating_damp_or_dry'] : '';
      $ratings->rating_landlord_property_manager = array_key_exists('rating_landlord_property_manager', $_POST) ? $_POST['rating_landlord_property_manager'] : '';
      $ratings->rating_heating = array_key_exists('rating_heating', $_POST) ? $_POST['rating_heating'] : '';
      $ratings->rating_public_transportation = array_key_exists('rating_public_transportation', $_POST) ? $_POST['rating_public_transportation'] : '';
      $ratings->rating_security = array_key_exists('rating_security', $_POST) ? $_POST['rating_security'] : '';
      $ratings->rating_ease_of_maintenance = array_key_exists('rating_ease_of_maintenance', $_POST) ? $_POST['rating_ease_of_maintenance'] : '';
      $ratings->rating_nearby_services = array_key_exists('rating_nearby_services', $_POST) ? $_POST['rating_nearby_services'] : '';
      $ratings->rating_neighbors_neighborhood = array_key_exists('rating_neighbors_neighborhood', $_POST) ? $_POST['rating_neighbors_neighborhood'] : '';

      $review = new ReviewModel();

      $review->user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
      $review->review_title = array_key_exists('review_title', $_POST) ? $_POST['review_title'] : '';
      $review->review_text = array_key_exists('review_text', $_POST) ? $_POST['review_text'] : '';
      $review->review_date_time = date("F j, Y, g:i a");

      //validate and save into database 
   
      if(! $address->isValid()){
         $_SESSION['error.address'] = $address;
      }
      
      if(! $listing->isValid()){
         $_SESSION['error.listing'] = $listing;
      }

      if(! $review->isValid()){
         $_SESSION['error.review'] = $review;
         header('Location: ./?page=review');
         exit(); 
      }

      $address->update();
       

      $listing->address_id = $addressID;
      $listing->update();
      $listingID = $listing->id;

      $ratings->listing_id = $listingID;
      $ratings->update();

      $review->listing_id = $listingID;
      $review->update();

      //redirect to listing page
         
      header('Location: ./?page=listing&id='.$listingID);
   }

   // Functions to get all validation error messages

   public function getAddressData($id = null){

      if(isset($_SESSION['error.address'])){
         $address = $_SESSION['error.address'];
         unset($_SESSION['error.address']);
      } else {
         $address = new AddressModel($id);
      }
      return $address;
   }

   public function getListingData($id = null){

      if(isset($_SESSION['error.listing'])){
         $listing = $_SESSION['error.listing'];
         unset($_SESSION['error.listing']);
      } else {
         $listing = new ListingModel($id);
      }
      return $listing;
   }

   public function getReviewData($id = null){

      if(isset($_SESSION['error.review'])){
         $review = $_SESSION['error.review'];
         unset($_SESSION['error.review']);
      } else {
         $review = new ReviewModel($id);
      }
      return $review;
   }
	
}

