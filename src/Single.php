<?php
/**
* Single property class for the genesislive API
*/
namespace dwmsw\genesislive;

class Single extends AbstractSettings
{
    
    function __construct($apiKey = false)
    {
        parent::__construct();

        if (!$apiKey) {
            throw new \Exception("Missing API Key", 1);
        }

        $this->apiKey = $apiKey;
    }

    /**
     * Make request to property URL
     * @return void 
     */
    public function doSearch()
    {
        $this->request = $this->createRequest('/get/property');
    }

    /**
     * getter for response
     * @return object 
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Getter for properties
     * @return object
     */
    public function getProperty()
    {
        return $this->response->Result->Property;
    }

    /**
     * Getter for media
     * @return object
     */
    public function getMedia()
    {
        // New generic object
        $return = new \stdClass();
        // Get all the media
        $medias = $this->response->Result->Property->Media;
        // How many media items there are
        $mediaCount = (int) $medias->attributes()['Count'];
        // If we have media items
        if ($mediaCount > 0) {
            // Loop through the types
            foreach ($medias->MediaClass as $type) {
                $return->types[] = (string) $type->Type;
                // Loop through items
                foreach ($type->MediaItems->MediaItem as $item) {
                    $return->{$type->Type}[] = $item;
                }
            }
        }
        return $return; 
    }

    /**
     * Getter for narative
     * @return object
     */
    public function getNarrative()
    {
        // New generic object
        $return = new \stdClass();
        // Get all the media
        $narrative = $this->response->Result->Property->Narrative;
        // How many media items there are
        $narrativeCount = (int) $narrative->attributes()['Count'];
        // If we have media items
        if ($narrativeCount > 0) {
            // Loop through the types
            foreach ($narrative->Topic as $topic) {
                $return->types[] = (string) $topic->Name;
                // Loop through items
                $return->{$topic->Name}[] = (array) $topic->Paragraphs;
            }
        }
        return $return; 
    }
}
