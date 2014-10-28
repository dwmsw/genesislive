<?php
/**
* Search class for the genesislive API
*/
namespace dwmsw\genesislive;

class Image
{

    /**
     * Builds the URL for an image
     * @param  string  $MediaID    Media ID
     * @param  string  $Key    Media Key
     * @param  int $Width  width of the returned image
     * @param  int $Height height of the returned image
     * @return string          the URL
     */
    public static function getImageURL($MediaID, $Key, $Width = false, $Height = false)
    {
        // Set up an array to handle the parameters
        $params = array();

        // Check for key
        if (!$Key) {
            throw new \Exception("Missing media key", 1);
        } else {
            $params['Key'] = (string) $Key;
        }

        // Check for media ID
        if (!$MediaID) {
            throw new \Exception("Missing media ID", 1);
        }

        // Set width
        if ($Width) {
            $params['Width'] = (int) $Width;
        }

        // Set Height
        if ($Height) {
            $params['Height'] = (int) $Height;
        }

        return "http://api.genesislive.net/j2.0/Media/{$MediaID}?" . http_build_query($params);
    }
}
