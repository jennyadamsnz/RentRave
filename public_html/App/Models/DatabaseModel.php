<?php

namespace App\Models;

use PDO;
use App\Controllers\Exceptions\PageNotFoundException;

abstract Class DatabaseModel 
{

	public $data = [];

	public $errors = [];

	private $dbc;

	public function __construct($input = null){

		if(static::$columns){
			foreach (static::$columns as $column) {
				$this->$column = null;
				$this->errors[$column]= null;
			}
		}

		if(is_numeric($input)){
			$this->data = $this->find($input);
		}
		
		if(is_array($input)){
			$this->processArray($input);
		}
	}

	public function processArray($input){

		foreach (static::$columns as $column) {
			if(isset($input[$column])){
				$this->$column = $input[$column];
				
			}
		}		
		
	}

	protected static function getDatabaseConnection(){

		$dsn = 'mysql:host=localhost;dbname=RentRave;charset=utf8';
		$dbc = new PDO($dsn, 'root', '');

		$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		return $dbc;

	}

	public function showAll(){

		$db = self::getDatabaseConnection();

		$sql = "SELECT " . implode(',', static::$columns). " FROM ".static::$tablename;

		$statement = $db->prepare($sql);

		$result = $statement->execute();

		$listingArray = [];

		while ($record = $statement->fetch(PDO::FETCH_ASSOC)){
			$model = new static();
			$model->data = $record;
			array_push($listingArray , $model);			
		}

		return $listingArray;

	}

	public function find($id){

		// $id = isset($_GET['id']) ? $_GET['id'] : null;

		$db = $this->getDatabaseConnection();

		$sql = "SELECT ". implode(',', static::$columns). " FROM ".static::$tablename ." WHERE id=:id";

		$statement = $db->prepare($sql);

		$statement->bindValue(':id',$id);

		$result = $statement->execute();

		$record = $statement->fetch(PDO::FETCH_ASSOC);

		return $record;

	}

	public function save(){

		
		$db = $this ->getDatabaseConnection();

		$columns = static::$columns;

		unset($columns[array_search('id', $columns)]);
		

		$sql = "INSERT INTO " .static::$tablename ." ("
		. implode(',', $columns) . ") VALUES (";

		$insercols = []; 

		foreach ($columns as $column) {
			array_push($insercols, ":" .$column);
		}

		$sql .= implode(',', $insercols) . ")";

		$statement = $db->prepare($sql);


		foreach ($columns as $column) {
			$statement->bindValue(":". $column, $this->$column);
		}

		$statement->execute();

		$this->id = $db ->lastInsertId();
	}

	public function update(){
		// get database connetion
		$db = $this->getDatabaseConnection();
		
		// unset id field
		$columns = static::$columns;
		unset($columns[array_search('id', $columns)]);


		// wrote query update
		$sql= "UPDATE " . static::$tablename . " SET ";

		$updatecols = [];

		foreach ($columns as $column) {
			array_push($updatecols, $column ."=:" .$column);
		}

		$sql .= implode(',', $updatecols) . " WHERE id=:id";
		var_dump($sql);

		// prepare statement
		$statement = $db->prepare($sql);

		//bind value for place holders
		foreach (static::$columns as $column) {
			$statement->bindValue(":".$column, $this->$column);
		}

		// execute
		$statement->execute();
	}

	public static function destroy($id){
		$db = self::getDatabaseConnection();
		$sql = "DELETE FROM " .static::$tablename . " WHERE id= :id";
		$statement = $db->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
	}

	public function isValid(){

		$valid = true;
		foreach (static:: $validationRules as $column => $rules) {
			$rules = explode(',', $rules);

			foreach ($rules as $rule) {
				if(strstr($rule, ':')){
					$rule = explode(':', $rule);
					$value = $rule[1];
					$rule = $rule[0];

				}
				switch ($rule) {
					case 'required':
						if(empty($this->$column)) {
							$valid = false;
							$this->errors[$column]="Required Field.";
						}
						break;
					case 'minlength':
						if(strlen($this->$column) < $value) {
							$valid = false;
							$this->errors[$column]="Must be at least $value characters long.";
						}
						break;
					
					case 'maxlength':
						if(strlen($this->$column) > $value) {
							$valid = false;
							$this->errors[$column]="Must not be more than $value characters long.";
						}
						break;
					case 'inputValidate':
						$characters = htmlentities($this->$column);
						$pattern = '/[#$%^&*()+=\-\[\]\';\/{}|":<>~\\\\]/';
						if(preg_match($pattern,$characters)){
							$valid = false;
							$this->errors[$column]="Must be a valid comment.";
						}  	
					// $this->$column = filter_var($this->$column, FILTER_SANITIZE_ENCODED);
						break;

					case 'numeric':
						if(! is_numeric($this->$column)){
							$valid = false;
							$this->errors[$column] = "Must be a number";
						}
						break;	
					
				}
			}
		}
		return $valid;
	}

	public function __get($name){
		if(in_array($name, static::$columns)){
			return $this->data[$name];
		} else {
			echo "Property $name is not found in the data variable.";
		}

	}

	public function __set($name, $value){
		if(in_array($name, static::$columns)){
			return $this->data[$name]=$value;
		} else {
			echo "Property $name is not found in the data variable.";
		}

	}
}

