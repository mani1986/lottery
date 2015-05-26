<?php
namespace mani\lottery\view;
use mani\lottery\model\Ticket;

/**
 * Class TicketView
 * @package mani\lottery\view
 */
class TicketView
{
    /**
     * Field constants.
     */
    const OBJECT_TICKET = 'Ticket';
    const FIELD_NAME = 'name';
    const FIELD_EMAIL = 'email';
    const FIELD_CODE = 'code';
    const FIELD_DATE = 'date';
    const FIELD_DRAW_ID = 'draw_id';

    /**
     * @param Ticket $ticket
     * @return array
     */
    public static function toArray(Ticket $ticket)
    {
        return [
            self::OBJECT_TICKET => [
                self::FIELD_NAME => $ticket->getName(),
                self::FIELD_EMAIL => $ticket->getEmail(),
                self::FIELD_CODE => $ticket->getCode(),
                self::FIELD_DATE => $ticket->getDate(),
                self::FIELD_DRAW_ID => $ticket->getDraw()
            ]
        ];
    }
}
