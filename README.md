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
	
Create our Application instance (replace this with your App ID and secret):

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
	
Contributing
------------

When commiting, keep all lines to less than 80 characters, and try to follow the existing style.

Before creating a pull request, squash your commits into a single commit.

Add the comments where needed, and provide ample explanation in the commit message.

Please, go to [http://www.giftkoeder-radar.com](http://www.giftkoeder-radar.com) for more documentation and further information.
