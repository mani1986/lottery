<?php
namespace mani\lottery\object;
use mani\lottery\model\Draw;
use mani\lottery\model\Ticket;
use mani\lottery\query\TicketQuery;

/**
 * Class TicketDrawer
 * @package mani\lottery\object
 */
class TicketDrawer
{
    /**
     * @return Ticket
     */
    public static function draw(Draw $draw)
    {
        $tickets = TicketQuery::getAllForDraw($draw);
        $winnerNumber = array_rand($tickets);

        return $tickets[$winnerNumber];
    }
}
