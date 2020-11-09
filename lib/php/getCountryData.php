<?php 
  ini_set('memory_limit', '-1');


   ini_set('display_errors','On');
   error_reporting(E_ALL);

    $countries = json_decode(file_get_contents('../countries_large.geo.json'),true);



 

    $countriesParsed = [];

 

    foreach ($countries['features'] AS $country) {

        

        $temp = [];

        $temp['code']=$country['properties']['ISO_A3'];

        $temp['name']=$country['properties']['ADMIN'];

        

        array_push($countriesParsed, $temp);

 

    }

 

    usort($countriesParsed, function ($item1, $item2) {

 

        return $item1['name'] <=> $item2['name'];
        return $item1['code'] <=> $item2['code'];


    });

 

    $output['status']['code'] = "200";

    $output['status']['name'] = "ok";

    $output['status']['description'] = "success";

 

    $output['data'] = $countriesParsed;

 

    header('Content-Type: application/json; charset=UTF-8');

 

    echo json_encode($output);

 

?>




