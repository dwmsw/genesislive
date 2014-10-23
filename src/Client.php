<?php
/**
* 
*/
namespace dwmsw\genesislive

class Client
{
    
    function __construct($apiKey = false)
    {
        if (!$apiKey) {
            throw new Exception("Missing API Key", 1);
            
        }
    }
}