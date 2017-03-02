<?php

namespace App\Controllers;

use App\Views\SearchResultsView;
use App\Models\ListingModel;

Class SearchController {

	public function search(){

		$searchCategory = isset($_GET['search_category']) ? $_GET['search_category'] : "";
		$searchTerm = isset($_GET['search_term']) ? $_GET['search_term'] : "";

		$featuredListing = new ListingModel();
		$results = $featuredListing->search($searchTerm, $searchCategory);

		$view = new SearchResultsView(compact('results', 'searchTerm','searchCategory'));
		$view->render();
	}
}

