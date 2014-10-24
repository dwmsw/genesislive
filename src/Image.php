<?php
/**
* Search class for the genesislive API
*/
namespace dwmsw\genesislive;

class Image
{

    public static function getImageURL($Key, $Width = false, $Height = false)
    {
        // Set up an array to handle the parameters
        $params = array();

        // Check for key
        if (!$Key) {
            throw new \Exception("Missing media key", 1);
        } else {
            $params['Key'] = (string) $Key;
        }

        // Set width
        if ($Width) {
            $params['Width'] = (int) $Width;
        }

        // Set Height
        if ($Height) {
            $params['Height'] = (int) $Height;
        }

        return "http://api.genesislive.net/get/media?" . http_build_query($params);
    }
}
