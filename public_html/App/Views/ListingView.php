<?php 
namespace App\Views;

Class ListingView extends View {

	 public function render (){
	 	$page = "Listing";
	 	$title = " Listing";
	 	include "templates/master.inc.php";

	 }

	 public function content(){
	 	extract($this->data);
	 	include "templates/listing.inc.php";

	 }
}

?>
