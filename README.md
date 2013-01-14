GiftköderRadar SDK for PHP5
===========================

Overview
--------
This open-source library allows you to integrate GiftköderRadar into your Web-Application, Blog, or Website.


Prerequisites
-------------

GiftköderRadar SDK for PHP5 requires 

   * PHP 5.2 and above with curl/openssl extensions enabled
   
Using the SDK
-------------

To use the SDK,

   * Copy SDK files into your project.
   * Make sure that the SDK folder in your project is available in PHP's include path.
   * Include the GKRadar.php file in your code.
   * [Create your application](http://www.giftkoeder-radar.com/entwickler/registrieren.html)
	
Create our Application instance (replace this with your Application ID and secret):

	require_once("GKRadar.php");
	
	$application = new GKRadar(array(
		"appID" => "<YOUR APPLICATION ID>",
		"secret" => "<YOUR APPLICATION SECRET>"
	));
	
API Resource: [/locations](http://www.giftkoeder-radar.com/doc/api/v2.0/get/locations) - Return a collection of the latest 10 locations

	try {
	
    	$response = $application->get("locations");
	
	} catch (GKRadarApiException $e) {
    	die($e->getMessage());
	}
	
	// Loop through response array to get single location
	if (count($response)) {
    	foreach($response as $location) {
        	echo $location["title"] . PHP_EOL;
        	echo " - " . $location["permalink"] . PHP_EOL . PHP_EOL;
    	}
	}
	
API Resource: [/locations](http://www.giftkoeder-radar.com/doc/api/v2.0/get/locations) - Return a collection of the latest 5 locations

	try {
    
    	$params = array("limit" => 5);
    	$response = $application->get("locations", $params);

	} catch (GKRadarApiException $e) {
    	die($e->getMessage());
	}
	
	var_dump($response);

API Resource: [/locations](http://www.giftkoeder-radar.com/doc/api/v2.0/get/locations) - Return a collection of the latest locations by given position & distance

	try {
    
    	$params = array("geocode" => "52.554490,13.398299,25", "since" => 30);
    	$response = $application->get("locations", $params);

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
	
API Resource: [/locations/new](http://www.giftkoeder-radar.com/doc/api/v2.0/post/locations/new) - Create a new location

	try {
    
    	$params = array(
        	"title" 	=> "Giftköder unter dem Baum", 
        	"country" 	=> "DE", 
        	"street" 	=> "Ernst-Wagner-Weg 36", 
        	"zipcode" 	=> "12309", 
        	"city" 		=> "Berlin", 
        	"firstname" => "Marc", 
        	"lastname" 	=> "Huber", 
        	"email" 	=> "huber@domain.de"
    	);
    
    	$response = $application->createLocation($params);

	} catch (GKRadarApiException $e) {
    	die($e->getMessage());
	}

	var_dump($response);
	
Please, go to [http://www.giftkoeder-radar.com/doc/api/v2.0](http://www.giftkoeder-radar.com/doc/api/v2.0) for more documentation and further information.
	
Contributing
------------

When commiting, keep all lines to less than 80 characters, and try to follow the existing style.

Before creating a pull request, squash your commits into a single commit.

Add the comments where needed, and provide ample explanation in the commit message.
