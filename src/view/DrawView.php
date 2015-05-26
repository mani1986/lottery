<?php
namespace mani\lottery\view;
use mani\lottery\model\Draw;

/**
 * Class DrawView
 * @package mani\lottery\view
 */
class DrawView
{
    /**
     * Misc constants.
     */
    const OBJECT_DRAW = 'Draw';
    const FIELD_ID = 'id';
    const FIELD_STARTED = 'started';
    const FIELD_ENDED = 'ended';
    const FIELD_WINNER = 'winner';

    /**
     * @param Draw $draw
     * @param Ticket $winningTicket
     * @return array
     */
    public static function toArray(Draw $draw, $winningTicket = null)
    {
        $result = [
            self::FIELD_ID => $draw->getId(),
            self::FIELD_STARTED => $draw->getStarted(),
            self::FIELD_ENDED => $draw->getEnded()
        ];

        if (!is_null($winningTicket)) {
            $result[self::FIELD_WINNER] = $winningTicket->getName();
        }

        return [self::OBJECT_DRAW => $result];
    }
}
