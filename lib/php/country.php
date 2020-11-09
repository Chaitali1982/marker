<?php

$url =  'https://restcountries.eu/rest/v2/name/' . $_POST['country'] ;

ini_set('display_errors', 'On');

error_reporting(E_ALL);

 
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);

$result2=curl_exec($ch);

curl_close($ch);

$decode = json_decode($result2,true);	

$output2['status']['code'] = "200";
$output2['status']['name'] = "ok";
$output2['status']['description'] = "mission saved";

$output2['data'] = $decode;

header('Content-Type: application/json; charset=UTF-8');

echo json_encode($output2); 

?>