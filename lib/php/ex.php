<?php

	$executionStartTime = microtime(true) / 1000;
	
	$url='http://data.fixer.io/api/latest?access_key=06c8974601ab306e1d8209a8cef44062&format=1'. $_POST['name'] ;

	
	


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);

	$result2=curl_exec($ch);

	curl_close($ch);

	$decode = json_decode($result2,true);	

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "mission saved";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['data'] = $decode;
	
	header('Content-Type: application/json; charset=UTF-8');

	echo json_encode($output); 

?>