<?php
namespace App\Controllers;

use App\Views\HomeView;
use App\Models\ListingModel;
use App\Models\AddressModel;

Class HomeController
{
	public function show(){

		$listing = new ListingModel ();
		$featuredListing = $listing->showAllListings();		

		rsort($featuredListing);

		$addressArray = [];

		// foreach ($featuredListing as $key => $list) {
		// 	$address_id = $list->data['address_id'];

		// 	$address = new AddressModel($address_id);

		// 	array_push($addressArray , $address);			

		// }

		$view = new HomeView(compact('featuredListing', 'addressArray'));
		$view->render();
	}	

}

?>