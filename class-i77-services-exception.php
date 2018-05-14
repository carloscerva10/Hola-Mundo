<?php
/**
 * I77_Services_Exception: Exception class to deal with errors.
 *
 * This class allows to deal with all the errors identified during the 
 * invocation process of the services.
 *
 * Return a specific error code.
 */

class I77ServicesException extends Exception
{
	public static $codeError;

	/**
	 * Bloque de documentación
	 */
	function __construct( $codeErrorIn ) {
	    self::$codeError = $codeErrorIn;
	}

	/**
	 * Bloque de documentación
	 */
	public static function getCodeError() {
		return self::$codeError;
	}
}
