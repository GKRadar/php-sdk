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
	
For example,

	require_once("GKRadar.php");
	
	$api = new GKRadar(array(
		"appID" => "<YOUR APPLICATION ID>",
		"secret => "<YOUR APPLICATION SECRET>"
	));

Please, go to [http://www.giftkoeder-radar.com/](http://www.giftkoeder-radar.com/) for more documentation and further information.
