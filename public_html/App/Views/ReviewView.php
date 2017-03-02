<?php 
namespace App\Views;

Class ReviewView extends View {

	 public function render (){
	 	$page = "review";
	 	$title = " Review";
	 	include "templates/master.inc.php";

	 }

	 public function content(){
	 	extract($this->data);
	 	include "templates/review.inc.php";

	 }
}

?>
