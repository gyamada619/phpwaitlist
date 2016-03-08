<?php
	
	// Include Medoo
	require_once '../resources/libraries/medoo.min.php';
	 
	// Initialize
	$database = new medoo([
	  	'database_type' => 'mysql',
	  	'database_name' => 'waitlist',
	  	'server' => 'localhost',
	  	'username' => 'username',
	  	'password' => 'password',
	  	'charset' => 'utf8'
	]);
	
	//Set up variable
	$id=$_POST["id"];
	
	//Delete record
	$database->delete("customers", [
			"id" => $id
	]);
	
	//Kick user back home
	header("Location: index.php");
	
?>
