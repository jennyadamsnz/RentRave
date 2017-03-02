<?php

namespace App\Models;

use PDO;
use finfo;
use Intervention\Image\ImageManagerStatic as Image;

Class ListingModel extends DatabaseModel
{

	protected static $tablename = 'listing';
	protected static $columns = [
		'id',
		'address_id',
		'user_id',
		'rating',
		'listing_bathrooms',
		'listing_bedrooms',
		'listing_garage_carport',
		'listing_rental_period_start',
		'listing_rental_period_end',
		'listing_last_recorded_rate',
		'listing_agency_name',
		'listing_agent_or_landlord_name',
		'listing_image_upload_one'
		];
	protected static $validationRules = [
						'rating' 						=> 'numeric',
						'listing_bathrooms' 			=> 'numeric',
						'listing_bedrooms' 				=> 'numeric',
						'listing_garage_carport'		=> 'numeric',
						'listing_last_recorded_rate'	=> 'required',
						'listing_agency_name'			=> 'minlength:3',
						'listing_agent_or_landlord_name'=> 'minlength:3'
	];

	public function showAllListings(){

		// get database connetion
		$db = $this->getDatabaseConnection();

		$sql = "SELECT listing.id, listing.rating, listing.listing_bedrooms, listing.listing_bathrooms, listing.listing_last_recorded_rate, listing.listing_image_upload_one, address.address_street_number, address.address_street_name, address.address_suburb, address.address_city, review.review_title
			FROM listing 
			JOIN address ON listing.address_id = address.id
			JOIN review ON listing.id = review.listing_id";

		$statement = $db->prepare($sql);
		
		$statement->execute();

		$listingsArray = [];


		while ($record = $statement->fetch(PDO::FETCH_ASSOC)){
			$model = new static();
			$model->data = $record;
			array_push ($listingsArray, $record);
		}
		return $listingsArray;
	}
	

	public function getListingSummary($id){

		// get database connetion
		$db = $this->getDatabaseConnection();

		$sql = "SELECT review_title, address.address_street_number, address.address_street_name, address.address_suburb, listing.id, listing.listing_rental_period_start, listing.listing_rental_period_end,  listing.listing_agent_or_landlord_name, listing.listing_image_upload_one
			FROM review
			JOIN listing
			ON review.listing_id = listing.id
			JOIN address
			ON listing.address_id = address.id

			WHERE review.user_id = :id";


		$statement = $db->prepare($sql);

		$statement->bindValue(':id',$id);
		
		$statement->execute();

		$listingSummary = [];

		while ($record = $statement->fetch(PDO::FETCH_ASSOC)){
			array_push ($listingSummary, $record);
		}
		return $listingSummary;
	}

	public function fullListingDetails($id){

		// get database connetion
		$db = $this->getDatabaseConnection();

		$sql = "SELECT review.review_title, review.review_text, review.review_date_time, address.address_street_number, address.address_street_name, address.address_suburb, address.address_city, listing.id, listing.listing_rental_period_start, listing.listing_rental_period_end, listing.rating, listing.listing_bathrooms, listing.listing_bedrooms, listing.listing_garage_carport, listing.listing_last_recorded_rate, listing.listing_agency_name, listing.listing_agent_or_landlord_name, listing.listing_image_upload_one, ratings.rating_value_for_money, ratings.rating_insulation, ratings.rating_noise_proofing, ratings.rating_sunlight, ratings.rating_damp_or_dry, ratings.rating_landlord_property_manager, ratings.rating_heating, ratings.rating_public_transportation, ratings.rating_security, ratings.rating_ease_of_maintenance, ratings.rating_nearby_services, ratings.rating_neighbors_neighborhood, users.username  

			FROM listing
			JOIN review
			ON listing.id = review.listing_id  
			JOIN address
			ON listing.address_id = address.id
			JOIN ratings
			ON listing.id = ratings.listing_id
			JOIN users
			ON listing.user_id = users.id

			WHERE listing.id = :id";


		$statement = $db->prepare($sql);

		$statement->bindValue(':id',$id);
		
		$statement->execute();

		$record = $statement->fetch(PDO::FETCH_ASSOC);

		return $record;
	}	
public function savePoster($filename){
		// find the file mime type
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$mimetype = $finfo->file($filename);
		
		// create all possible extensions
		$extension = [
			'image/jpg' => '.jpg',
			'image/jpeg' => '.jpg',
			'image/png' => '.png',
			'image/gif' => '.gif'
		];

		// if mime type is present, then select appropriate extension for the file
		if(isset($extensions[$mimetype])){
			$extension = $extension[$mimetype];
		} else {
			$extension = '.jpg';
		}

		// create filename
		$newFilename = uniqid() . $extension;

		// to store the image file in the database, give it to the object
		$this->listing_image_upload_one = $newFilename;

		// creating new folder to store newFIlename in order to display the images
		$folder = "images/poster/";

		if(!is_dir($folder)){

			mkdir($folder,0777,true);
		}

		$destination = $folder. $newFilename;
		move_uploaded_file($filename, $destination);

		$img = Image::make($destination);

		$img->resize(350,480);
		$img->save($folder . $newFilename);

		// create thumbnails
		$subfolder = "images/thumbnails";

		if(!is_dir("images/poster/thumbnails")){
			mkdir("images/poster/thumbnails",0777,true);
		}

		$img = Image::make($destination);
		$img->fit(180,150);
		$img->save("images/poster/thumbnails/" . $newFilename);
	}	

	public function search ($searchTerm , $searchCategory) {
		$db = $this->getDatabaseConnection();

		$query = "SET @searchterm = :searchTerm";
		$statement = $db->prepare($query);
		$statement->bindValue(":searchTerm" , $searchTerm);
		$statement->execute();

		if($searchCategory === "address_suburb"){

			$query = "SELECT address.id, address.address_street_number, address.address_street_name, address.address_suburb, address.address_city
						FROM address
						WHERE
							MATCH(address.address_suburb) AGAINST(@searchterm) 
							ORDER BY (address.id) ASC";

		} elseif( $searchCategory === "address_city"){
			$query = "SELECT address.id, address.address_street_number, address.address_street_name, address.address_suburb, address.address_city 
						FROM address
						WHERE
							MATCH(address.address_city) AGAINST(@searchterm) 
							ORDER BY (address.id) ASC";
		} else {
			$query = "SELECT address.id, address.address_street_number, address.address_street_name, address.address_suburb, address.address_city 
						FROM address
						WHERE
							MATCH(address.address_street_name) AGAINST(@searchterm) 
							ORDER BY (address.id) ASC";
		}

		$statement = $db->prepare($query);
		$statement->execute();

		$addressresults = [];

		while ($record = $statement->fetch(PDO::FETCH_ASSOC)){		
			array_push($addressresults , $record);			
		}

		$searchresults = [];

		foreach ($addressresults as $address) {
		
			$query = "SELECT listing.id, listing.listing_rental_period_start, listing.listing_rental_period_end, listing.listing_agent_or_landlord_name, review.review_title, review.listing_id, address.id, address.address_street_number, address.address_street_name, address.address_suburb, address.address_city 
						FROM listing
						
						JOIN review ON listing.id = review.listing_id 

						JOIN address ON listing.address_id = address.id 

						WHERE listing.address_id = :address_id";

			$statement = $db->prepare($query);
			$statement->bindValue(":address_id" , $address['id']);
			$statement->execute();		

			while ($record = $statement->fetch(PDO::FETCH_ASSOC)){
				
				array_push($searchresults , $record);			
			}

		}
		
		return $searchresults;
	}	
}