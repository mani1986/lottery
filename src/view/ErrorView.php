<?php
namespace mani\lottery\view;

use mani\lottery\object\Error;

/**
 * Class ErrorView
 * @package mani\lottery\view
 */
class ErrorView
{

    /**
     * Misc constants.
     */
    const OBJECT_ERROR = 'Error';
    const FIELD_MESSAGE = 'message';

    /**
     * @param Error $error
     * @return array
     */
    public static function toArray(Error $error)
    {
        return  [
            self::OBJECT_ERROR => [
                self::FIELD_MESSAGE => $error->getMessage()
            ]
        ];
    }
}