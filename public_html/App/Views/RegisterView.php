<?php 
namespace App\Views;

Class RegisterView extends View {

	 public function render (){
	 	$page = "register";
	 	$title = " Register";
	 	include "templates/master.inc.php";

	 }

	 public function content(){
	 	extract($this->data);
	 	include "templates/register.inc.php";

	 }
}

?>
