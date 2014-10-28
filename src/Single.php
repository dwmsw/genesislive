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
    public function doSearch($PropertyID)
    {
        if (!$PropertyID) {
            throw new \Exception("Missing Property ID", 1);
        }

        $this->request = $this->createRequest("/Properties/{$PropertyID}");
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
     * Getter for media
     * @return object
     */
    public function getMedia()
    {
        // New generic object
        $return = new \stdClass();
        // Get all the media
        $medias = $this->response->Media;
        // How many media items there are
        $mediaCount = count($medias->MediaClasses);
        // If we have media items
        if ($mediaCount > 0) {
            // Loop through the types
            foreach ($medias->MediaClasses as $type) {
                $return->types[] = (string) $type->Type;
                // Loop through items
                foreach ($type->MediaItems as $item) {
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
        $narrative = $this->response->Narrative;
        // How many media items there are
        $narrativeCount = count($narrative->Topics);
        // If we have media items
        if ($narrativeCount > 0) {
            // Loop through the types
            foreach ($narrative->Topics as $topic) {
                // Make sure paragraphs is set
                if (isset($topic->Paragraphs)) {
                    $return->types[] = (string) $topic->Name;
                    // Loop through items
                    $return->{$topic->Name} = (array) $topic->Paragraphs;
                }
            }
        }
        return $return; 
    }
}
