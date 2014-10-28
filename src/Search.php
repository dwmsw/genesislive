<?php
/**
* Search class for the genesislive API
*/
namespace dwmsw\genesislive;

class Search extends AbstractSettings
{
    
    function __construct($apiKey = false)
    {
        parent::__construct();

        if (!$apiKey) {
            throw new \Exception("Missing API Key", 1);
        }

        $this->apiKey = $apiKey;
    }

    public function doSearch()
    {
        $this->request = $this->createRequest('/Properties/List');
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getProperties()
    {
        return $this->response->Result->Properties->Property;
    }

    public function getPageCount()
    {
        return $this->response->Result->Match->PageCount;
    }

    public function getResultCount()
    {
        return $this->response->Result->Match->MatchCount;
    }
}
