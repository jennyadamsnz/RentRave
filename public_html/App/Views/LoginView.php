<?php 
namespace App\Views;

Class LoginView extends View {

	 public function render (){
	 	$page = "login";
	 	$title = " Login";
	 	include "templates/master.inc.php";

	 }

	 public function content(){
	 	include "templates/login.inc.php";

	 }
}

?>
