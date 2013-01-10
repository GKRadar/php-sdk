<?php

if (!function_exists("curl_init")) {
    throw new Exception("GKRadar SDK needs the CURL PHP extension.");
}

if (!function_exists("json_decode")) {
    throw new Exception("GKRadar needs the JSON PHP extension.");
}

/**
 * Thrown when an API call returns an exception
 * 
 * @author Sascha Schoppengerd <feedback@giftkoeder-radar.com>
 * @copyright by 2013 by GiftköderRadar <http://www.giftkoeder-radar.com>
 */
class GKRadarApiException extends Exception {}

/**
 * PHP5 Class to integrate GiftköderRadar into your Web-Application, Blog, or Website
 * 
 * @author Sascha Schoppengerd <feedback@giftkoeder-radar.com>
 * @copyright by 2013 by GiftköderRadar <http://www.giftkoeder-radar.com>
 */
class GKRadar {
    
    /**
     * Version
     * @var string 
     */
    const VERSION = "1.0.0";
    
    /**
     * The Application ID
     * @var string
     */
    protected $_appID;
    
    /**
     * The Application Secret
     * @var string
     */
    protected $_appSecret;

    /**
     * Initialize a GKRadar API Object
     * 
     * The configuration:
     * - appID: Your Application ID
     * - secret: Your Application Secret
     *
     * @param array $config The Application Settings
     */
    public function __construct($config) {
        $this->setAppID($config["appID"]);
        $this->setAppSecret($config["secret"]);
    }

    /**
     * Set the Application ID
     * @param string $appID
     */
    public function setAppID($appID) {
        $this->_appID = $appID;
    }

    /**
     * Set the Application Secret
     * @param string $secret
     */
    public function setAppSecret($secret) {
        $this->_appSecret = $secret;
    }
}