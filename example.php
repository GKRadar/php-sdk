<?php

require_once("GKRadar.php");

// Create our Application instance (replace this with your App ID and secret)
$application = new GKRadar(array(
	"appID" => "YOUR APPLICATION ID",
	"secret" => "YOUR APPLICATION SECRET"
));

// Return a collection of the latest locations
try {
	
    $response = $application->get("locations");
	
} catch (GKRadarApiException $e) {
    die($e->getMessage());
}

var_dump($response);

