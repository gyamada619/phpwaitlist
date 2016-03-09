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
  $name=$_POST["name"];
  $email=$_POST["email"];
  $item=$_POST["item"];
  $datereq=$_POST["datereq"];

  //Insert record into database
  $database->insert("customers", [
  	"name" => $name,
  	"email" => $email,
  	"item" => $item,
    "datereq" => $datereq,
    "contacted" => FALSE,
    "time-contacted"=>0,
  ]);
  
  //Slack Webhook URL for bot-yes, we have some Slack integration
  $url = 'Your Slack URL Here';
 
	//Initiate cURL.
	$ch = curl_init($url);
	
	//The JSON data.
	$jsonData = array(
		"username"=>"My Bot",
		"icon_url"=>"Icon Location",
		"text"=> "$name has been added to the waitlist, and needs a $item."
	);
	
	//Encode the array into JSON.
	$jsonDataEncoded = json_encode($jsonData);
	
	//Tell cURL that we want to send a POST request.
	curl_setopt($ch, CURLOPT_POST, 1);
	
	//Attach our encoded JSON string to the POST fields.
	curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
	
	//Set the content type to application/json
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
	
	//Execute the request
	$result = curl_exec($ch);
	
	//Close curl
	curl_close($ch);
  
  //Kick user back home
  header("Location: ../public_html/index.php");

?>
