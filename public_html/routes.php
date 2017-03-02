<?php

namespace App\Controllers;


	$page = ! isset($_GET['page'])? "home" : $_GET['page'];

		//code above replaces if else statement below://

	  // if(! isset($_GET['page'])){
	  // 	include "templates/home.inc.php";

	  // }else {
	  // 	include "templates/about.inc.php";
	  // }

	switch ($page) {
		case 'home':

			$controller = new HomeController();
			$controller->show();

			break;

		case'about':

			$controller = new AboutController();
			$controller->show();

			break;

		case'register':

			$controller = new RegisterController();
			$controller->show();

			break;

		case'register.store':

			$controller = new RegisterController();
			$controller->store();

			break;	

		case'account':

			$controller = new AccountController();
			$controller->show();

			break;	

		case'searchresults':

			$controller = new SearchResultsController();
			$controller->show();

			break;	

		case'review':

			$controller = new ReviewController();
			$controller->show();

			break;	

		case'listing':

			$controller = new ListingController();
			$controller->show();

			break;	

		case'login':

			$controller = new LoginController();
			$controller->show();

			break;			

		case 'login.try':
			$controller = new AccountController();
			$controller->processLoginForm();
		break;					

		case 'logout':
			session_destroy();
			header('Location: index.php');
		break;		

		case'account.edit':

			$controller = new AccountController();
			$controller->accountEdit();

			break;				

		case 'register.update':

			$controller = new AccountController();
			$controller->accountUpdate();

			break;	

		case'create.listing':

			$controller = new ListingController();
			$controller->listingCreate();

			break;				

		case'review.edit':

			$controller = new ReviewController();
			$controller->reviewEdit();

			break;			

		case'review.update':

			$controller = new ListingController();
			$controller->listingUpdate();

			break;			

		case'review.delete':

			$controller = new ReviewController();
			$controller->reviewDelete();

			break;	

		case'search':

			$controller = new SearchController();
			$controller->search();

			break;								

		default:		
			echo "Error 404! Page not found!";
			break;
	}
