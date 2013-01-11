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
	
Return a collection of the latest 20 locations

	try {
	
    	$response = $application->get("locations");
	
	} catch (GKRadarApiException $e) {
    	die($e->getMessage());
	}
	
	var_dump($response);
	
Return a collection of the latest 5 locations

	try {
    
    	$params = array("limit" => 5);
    	$response = $application->get("locations", $params);

	} catch (GKRadarApiException $e) {
    	die($e->getMessage());
	}
	
	var_dump($response);

Return a collection of the latest locations by given position & distance

	try {
    
    	$params = array("lat" => "52.554490", "lng" => "13.398299", "distance" => 10);
    	$response = $application->get("locations", $params);

	} catch (GKRadarApiException $e) {
    	die($e->getMessage());
	}
	
	var_dump($response);
	
Please, go to [http://www.giftkoeder-radar.com](http://www.giftkoeder-radar.com) for more documentation and further information.
	
Contributing
------------

When commiting, keep all lines to less than 80 characters, and try to follow the existing style.

Before creating a pull request, squash your commits into a single commit.

Add the comments where needed, and provide ample explanation in the commit message.
