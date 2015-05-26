<?php
namespace mani\lottery\core;

/**
 * Class OutputJson
 * @package mani\lottery\core
 */
class OutputJson {
    /**
     * Response code constants.
     */
    const RESPONSE_CODE_FORBIDDEN = 403;

    /**
     * Misc constants.
     */
    const HEADER_CONTENT_TYPE_JSON = 'Content-Type: application/json';

    /**
     * @param array $output
     */
    public static function output(array $output)
    {
        header(self::HEADER_CONTENT_TYPE_JSON);

        return json_encode($output);
    }

    /**
     * @param $output
     */
    public static function outputForbidden(array $output)
    {
        http_response_code(intval(self::HEADER_CONTENT_TYPE_JSON));
        header(self::HEADER_CONTENT_TYPE_JSON);

        return json_encode($output);
    }
}