<?php
	
	 // Include Medoo
  	 require_once 'libraries/medoo.min.php';
 
 	 // Initialize
	 $database = new medoo([
	   	'database_type' => 'mysql',
	   	'database_name' => 'waitlist',
	   	'server' => 'localhost',
	   	'username' => 'username',
	   	'password' => 'password',
	   	'charset' => 'utf8'
	 ]);
	 
	//Set up variables
	$currentdate=time();
	$id=$_POST["id"];
	$fullname=$_POST["fullname"];
	$email=$_POST["email"];
	$item=$_POST["item"];
	$messagebody = "Hello $fullname,\r\n \r\nYour $item is ready for pickup. Please come to [your business] within 24 hours, or you will lose your reservation. \r\n \r\n Thank you, \r\n Your Business";
	
	$to      = $email;
	$subject = 'Equipment Ready For Pickup';
	$message = $messagebody;
	$headers = 'From: Your Business <yourbusiness@business.com>' . "\r\n" .
	    'Reply-To: yourbusiness@business.com' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();
	
	mail($to, $subject, $message, $headers);
	
	$database->update("customers", [
		"contacted" => TRUE,
		"time-contacted"=>$currentdate,
	],
		[
			"id"=>$id,
		]
	);
	
	//Kick user back home
	header("Location: ../public_html/index.php");

?>
