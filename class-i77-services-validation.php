<?php
/**
 * Descripción corta de la clase
 *
 * Descripción larga de la clase (si aplica)...
 *
 */
class I77ServicesValidation {
    /**
     * Bloque de documentación
     */
    public static function validateDateRange($rateStartDate, $dayDecrement)
    {
        $dateHoy = date('Y-m-d\TH:i:s.000');
        $dateFrom = date('Y-m-d\TH:i:s.000', strtotime(-$dayDecrement.' day', strtotime($dateHoy)));

        if (!($dateFrom <= $rateStartDate & $rateStartDate <= $dateHoy)) {
            return false;
        }
        return true;
    }
    public static function validateDateRange2($rateStartDate, $dayDecrement)
    {
        $dayresta=1;
        $dateHoy = date('Y-m-d\TH:i:s.000');
        $dateAyer = date('Y-m-d\TH:i:s.000', strtotime(-$dayresta.' day', strtotime($dateHoy)));
        $dateFrom = date('Y-m-d\TH:i:s.000', strtotime(-$dayDecrement.' day', strtotime($dateHoy)));

        if (!($dateFrom <= $rateStartDate & $rateStartDate <= $dateAyer)) {
            return false;
        }
        return true;
    }
}
