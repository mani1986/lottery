<?php
namespace mani\lottery\core;

/**
 * Class InputJson
 * @package mani\lottery\core
 */
class InputJson
{
    /**
     * @param string $body
     * @return array
     */
    public static function input($body)
    {
        return json_decode($body, true);
    }
}
