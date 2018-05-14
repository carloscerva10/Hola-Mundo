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
require_once 'class-i77-services.php';

/**
 * Summary.
 */
require_once 'class-i77-services-exception.php';

class I77ServicesClient
{
    public static $serviceData;

    /**
     * Summary.
     */
    public static function getRates($rateStartDate, $vehicleClassId)
    {
        try {
            self::$serviceData = I77Services::getRates($rateStartDate, $vehicleClassId); 
        } catch (I77ServicesException $expService) {
            return I77ServicesException::getCodeError();
        }
        return self::$serviceData;
    }

    /**
     * Summary.
     */
    public static function getRatesAverages($rateStartDate, $vehicleClassId)
    {
        try {
            self::$serviceData = I77Services::getRatesAverages($rateStartDate, $vehicleClassId); 
        } catch (I77ServicesException $expService) {
            return I77ServicesException::getCodeError();
        }
        return self::$serviceData;
    }

    /**
     * Summary.
     */
    public static function getCurrentSpeeds($segmentId, $roadwayType)
    {
    {
        try {
            self::$serviceData = I77Services::getCurrentSpeeds($segmentId, $roadwayType); 
        } catch (I77ServicesException $expService) {
            return I77ServicesException::getCodeError();
        }
        return self::$serviceData;
    }
    }
}
