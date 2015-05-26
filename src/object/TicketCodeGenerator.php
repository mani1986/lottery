<?php
namespace mani\lottery\object;

/**
 * Class TicketCodeGenerator
 * @package mani\lottery\object
 */
class TicketCodeGenerator {
    /**
     * Misc constants.
     */
    const CODE_PREFIX = 'LOTTERY';

    /**
     * Generate the lottery ticket code and make sure it's unique.
     */
    public static function generate()
    {
        return uniqid(self::CODE_PREFIX);
    }
}