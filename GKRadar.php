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
     * API Endpoint
     * @var string
     */
    protected $_apiBaseUrl = "https://www.giftkoeder-radar.com/v2/";
    
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
        
        if (!isset($config["appID"]) || !is_string($config["appID"])) {
            throw new GKRadarApiException("GKRadar API needs a Application ID");
        }
        
        if (!isset($config["secret"]) || !is_string($config["secret"])) {
            throw new GKRadarApiException("GKRadar API needs a Application Secret");
        }
        
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

    /**
     * Make an API call via. HTTP GET
     * 
     * @param string $path
     * @param array $data
     */
    public function get($path, array $params = array()) {
        return $this->fetch($path, $params, "get");
    }

    /**
     * Make an API call via. HTTP POSZ
     * 
     * @param string $path
     * @param array $data
     */
    public function post($path, array $params = array()) {
        return $this->fetch($path, $params, "post");
    }

    /**
     * Make an API call
     * 
     * @param string $path
     * @param array $params
     * @param string $method
     */
    public function fetch($path, array $params = array(), $method = "get") {
        
        $url = $this->_apiBaseUrl . trim($path, "/");
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Expect:"));
        curl_setopt($ch, CURLOPT_USERAGENT, "GKRadar PHP SDK");
        
        if ($method == "post" || $method == "delete") {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        
        } elseif ($method == "get") {
            
            if (count($params) > 0) {
                $url .= "?" . http_build_query($params);
            }
            
            curl_setopt($ch, CURLOPT_URL, $url);
        }
        
        $data = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new GKRadarApiException("Server error: " . curl_error($ch));
        }
        
        curl_close($ch);
        $data = json_decode($data, true);
        
        if (isset($data["error"])) {
            throw new GKRadarApiException($data["error"]["message"], $data["error"]["code"]);
        }
        
        return $data;
    }
}