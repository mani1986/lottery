<?php
namespace mani\lottery\query;

use mani\lottery\core\Persistence;
use mani\lottery\model\Draw;
use mani\lottery\model\Ticket;

/**
 * Class TicketQuery
 * @package mani\lottery\query
 */
class TicketQuery
{
    /**
     * @param Draw $draw
     * @return array
     */
    public static function getAllForDraw(Draw $draw)
    {
        return Persistence::manager()->getRepository(Ticket::class)->findBy(['draw' => $draw->getId()]);
    }

    /**
     * @param Draw $draw
     * @param string $email
     * @return array
     */
    public static function getAllForDrawAndEmail(Draw $draw, $email)
    {
        return Persistence::manager()->getRepository(Ticket::class)->findBy([
            'draw' => $draw->getId(),
            'email' => $email
        ]);
    }

    /**
     * @param Draw $draw
     * @return Ticket
     */
    public static function getAllFromDraw(Draw $draw)
    {
        return Persistence::manager()->getRepository(Ticket::class)->findAll();
    }
}
