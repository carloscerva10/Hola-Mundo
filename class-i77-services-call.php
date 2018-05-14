<?php
/**
 * I77_Services_Exception: Exception class to deal with errors.
 *
 * This class allows to deal with all the errors identified during the 
 * invocation process of the services.
 *
 * Return a specific error code.
 */
class I77ServicesCall
{
    /**
     * Bloque de documentación
     */
    public static function sendPost($url, $dataIn=array())
    {
        //create a new cURL resource
        $curl = curl_init($url);

        // Optional Authentication:
        //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        //setup request to send json via POST
        $datosJson = json_encode($dataIn);

        //attach encoded JSON string to the POST fields
        curl_setopt($curl, CURLOPT_POSTFIELDS, $datosJson);
        
        //set the content type to application/json
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 
                                                     'Content-Length: ' . strlen($datosJson)));

        //return response instead of outputting
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');

        //execute the POST request
        $responseCurl = curl_exec($curl);

        //close curl resource
        curl_close($curl);

        if (!$responseCurl) {
            return null;
        }
        return $responseCurl;        
    }
}
