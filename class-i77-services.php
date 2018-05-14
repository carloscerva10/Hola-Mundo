
<?php
/**
 * Descripción corta de la clase
 *
 * Descripción larga de la clase (si aplica)...
 *
 */

/**
 * Summary.
 */
require_once 'class-i77-services-validation.php';

/**
 * Summary.
 */
require_once 'class-i77-services-exception.php';

/**
 * Summary.
 */
require_once 'class-i77-services-call.php';

define(URL_RATES , get_template_directory_uri().'/datos_txt/GetRates.txt');
define(URL_RATES_AVERAGES , get_template_directory_uri().'/datos_txt/GetRatesAverages.txt');
define(URL_CURRENT_SPEEDS , get_template_directory_uri().'/datos_txt/GetCurrentSpeeds.txt');

class I77Services
{
    const IDENTIFIER_WEB      = 'I77';
    const DAY_DECREMENT       = 180;

    const ERR_CODE_1  = 1;
    const ERR_CODE_2  = 2;
    const ERR_CODE_3  = 3;
    const ERR_CODE_4  = 4;

    const INT_ZERO    = 0;

    /**
     * Summary.
     */
    public static function getRates($rateStartDate, $vehicleClassId)
    { 
        $serviceData = null;

        $dataIn = array(
                        "facilityId"     => self::IDENTIFIER_WEB,
                        "rateStartDate"  => $rateStartDate,
                        "vehicleClassId" => $vehicleClassId
                  );

        if (!I77ServicesValidation::validateDateRange($rateStartDate, self::DAY_DECREMENT)) {
            throw new I77ServicesException(self::ERR_CODE_1);
        }

        if (!empty($vehicleClassId)) {
            if (!is_numeric($vehicleClassId) or !(intval($vehicleClassId) == $vehicleClassId)) {
                throw new I77ServicesException(self::ERR_CODE_2);
            }
        }

        // Call function to send Post
        $resultPost = I77ServicesCall::sendPost(URL_RATES, $dataIn);

        if (!$resultPost) {
            throw new I77ServicesException(self::ERR_CODE_3);
        }

        // Format the recovered data to JSON format
        $serviceData = json_decode($resultPost, true);

        if ($serviceData['result'] != self::INT_ZERO ) {
            throw new I77ServicesException(self::ERR_CODE_4);
        }
        return $serviceData;
    }

    /**
     * Summary.
     */
    public static function getRatesAverages($rateStartDate, $vehicleClassId)
    {
        //echo "<p>rateStartDate: " .$rateStartDate;
        $serviceData = null;

        $dataIn = array(
                        "facilityId"     => self::IDENTIFIER_WEB,
                        "rateStartDate"  => $rateStartDate,
                        "vehicleClassId" => $vehicleClassId
                  );

        if (!I77ServicesValidation::validateDateRange2($rateStartDate, self::DAY_DECREMENT)) {
            throw new I77ServicesException(self::ERR_CODE_1);
        }

        if (!empty($vehicleClassId)) {
            if (!is_numeric($vehicleClassId) or !(intval($vehicleClassId) == $vehicleClassId)) {
                throw new I77ServicesException(self::ERR_CODE_2);
            }
        }

        // Call function to send Post
        $resultPost = I77ServicesCall::sendPost(URL_RATES_AVERAGES, $dataIn);

        if (!$resultPost) {
            throw new I77ServicesException(self::ERR_CODE_3);
        }

        // Format the recovered data to JSON format
        $serviceData = json_decode($resultPost, true);

        if ($serviceData['result'] != self::INT_ZERO ) {
            throw new I77ServicesException(self::ERR_CODE_4);
        }
        return $serviceData;
    }

    /**
     * Summary.
     */
    public static function getCurrentSpeeds($segmentId, $roadwayType)
    {
    { 
        $serviceData = null;

        $dataIn = array(
                        "facilityId"  => self::IDENTIFIER_WEB,
                        "segmentId"   => $segmentId,
                        "roadwayType" => $roadwayType
                  );

        if (!empty($segmentId)) {
            if (!is_numeric($segmentId) or !(intval($segmentId) == $segmentId)) {
                throw new I77ServicesException(self::ERR_CODE_1);
            }
        }

        if (!empty($roadwayType)) {
            if (!is_numeric($roadwayType) or !(intval($roadwayType) == $roadwayType) or
                 !(intval($roadwayType) == 0 or intval($roadwayType) == 1 or
                  intval($roadwayType) == 2)) {
                throw new I77ServicesException(self::ERR_CODE_2);
            }
        } else {
            throw new I77ServicesException(self::ERR_CODE_3);
        }

        // Call function to send Post
        $resultPost = I77ServicesCall::sendPost(URL_CURRENT_SPEEDS, $dataIn);

        if (!$resultPost) {
            throw new I77ServicesException(self::ERR_CODE_4);
        }

        // Format the recovered data to JSON format
        $serviceData = json_decode($resultPost, true);

        if ($serviceData['result'] != self::INT_ZERO ) {
            throw new I77ServicesException(self::ERR_CODE_5);
        }
        return $serviceData;
    }
    }
}

?>