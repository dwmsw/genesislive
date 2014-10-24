<?php
/**
* Abstract settings for the genesislive API
*/

namespace dwmsw\genesislive;

use GuzzleHttp\Client as Guzzle;

class AbstractSettings
{
    /**
     * The API key
     */
    protected $apiKey;

    /**
     * Guzzle Client
     */
    protected $http;

    /**
     * Base URL for the API
     */
    protected $baseURL;

    /**
     * The Guzzle request object
     */
    protected $request;

    /**
     * Http response
     */
    protected $response;

    /**
     * The query string
     */
    protected $queryString;

    /**
     * Construct
     */
    function __construct() 
    {
        // Create a new guzzle instance
        $this->http = new Guzzle();

        // Set the Base URL
        $this->baseURL = 'http://api.genesislive.net';
    }

    /**
     * Make a request to the API
     * @param  string $url The URL to search on
     * @return object      HTTP object
     */
    protected function createRequest($url)
    {
        return $this->http->createRequest('GET', $this->baseURL . $url . '?' . $this->getQueryString());
    }

    /**
     * Internal function to build the query string
     * @return string          The compiled query string
     */
    protected function getQueryString()
    {
        if ($useKey) {
           // Add the API key to the array
           $this->queryString['key'] = $this->apiKey;
        }
        
        // Build the query and return it
        return http_build_query($this->queryString);
    }

    /**
     * Setter for query string
     * @param array $queryString Attributes to set in the query string
     */
    public function setQueryString(array $queryString)
    {
        $this->queryString = $queryString;
    }

    /**
     * Fires off the request
     * @return void 
     */
    public function sendRequest()
    {
        $this->response = $this->http->send($this->request)->xml();

        // Grab OK attribute
        $OK = (string) $this->response->attributes()['OK'];

        // Make sure the request was OK
        if ($OK != 1) {
            throw new \Exception("Error Making Request", 1);
        }
    }
}