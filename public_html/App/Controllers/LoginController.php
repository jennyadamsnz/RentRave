<?php

namespace App\Controllers;

use App\Views\LoginView;

Class LoginController
{

	public function show(){

		$view = new LoginView();
		$view->render();
	}

}
