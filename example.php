<?php

header("Content-Type: text/plain; charset=utf-8");
require_once ("GKRadar.php");

// Create our Application instance (replace this with your App ID and secret)
$application = new GKRadar(array(
    "appID" => "<YOUR APPLICATION ID>", 
    "secret" => "<YOUR APPLICATION SECRET>"
));

// Return a collection of the latest locations
try {
    
    $response = $application->getLocations();

} catch (GKRadarApiException $e) {
    die($e->getMessage());
}

if (count($response)) {
    foreach($response as $location) {
        echo $location["title"] . PHP_EOL;
        echo " - " . $location["permalink"] . PHP_EOL . PHP_EOL;
    }
}

// Return a collection of the latest 5 locations
try {
    
    $params = array("limit" => 5);
    $response = $application->getLocations($params);

} catch (GKRadarApiException $e) {
    die($e->getMessage());
}

// Return a collection of the latest locations by given position & distance
try {
    
    $params = array("geocode" => "52.554490,13.398299,25");
    $response = $application->getLocations($params);

} catch (GKRadarApiException $e) {
    die($e->getMessage());
}

if (count($response)) {
    foreach($response as $location) {
        echo $location["title"] . PHP_EOL;
        echo " - ca. " . round($location["distance"], 2) . " km" . PHP_EOL;
        echo " - " . $location["permalink"] . PHP_EOL . PHP_EOL;
    }
}

// Create a new location
try {
    
    $params = array(
        "title" => "Giftköder unter dem Baum", 
        "country" => "DE", 
        "street" => "Ernst-Wagner-Weg 36", 
        "zipcode" => "12309", 
        "city" => "Berlin", 
        "firstname" => "Marc", 
        "lastname" => "Huber", 
        "email" => "huber@domain.de"
    );
    
    $response = $application->createLocation($params);

} catch (GKRadarApiException $e) {
    die($e->getMessage());
}

var_dump($response);