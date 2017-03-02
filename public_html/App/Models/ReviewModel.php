<?php

namespace App\Models;

use PDO;

Class ReviewModel extends DatabaseModel
{

	protected static $tablename = 'review';
	protected static $columns = [
		'id',
		'listing_id',
		'user_id',
		'review_title',
		'review_text',
		'review_date_time'
		];
	protected static $validationRules = [
						'review_title' 		=> 'minlength:3',
						'review_text' 	=> 'minlength:10'
	];
}