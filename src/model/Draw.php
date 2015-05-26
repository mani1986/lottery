<?php
namespace mani\lottery\model;

use mani\lottery\core\Model;

/**
 * @Entity @Table(name="draw")
 **/
class Draw extends Model
{
    /**
     * @Column(type="datetime")
     * @var DateTime
     */
    protected $started;

    /**
     * @Column(type="datetime", nullable=true)
     * @var DateTime
     */
    protected $ended = null;

    /**
     * @Column(type="integer", nullable=true)
     * @var Ticket
     */
    protected $winningTicket = null;

    public function __construct()
    {
        $this->started = new \DateTime();
    }

    /**
     * @return DateTime
     */
    public function getStarted()
    {
        return $this->started;
    }

    /**
     * @return DateTime
     */
    public function getEnded()
    {
        return $this->ended;
    }

    /**
     * @return Ticket
     */
    public function getWinningTicket()
    {
        return $this->winningTicket;
    }

    /**
     * @param DateTime $ended
     */
    public function setEnded($ended)
    {
        $this->ended = $ended;
    }

    /**
     * @param Ticket $winningTicket
     */
    public function setWinningTicket($winningTicket)
    {
        $this->winningTicket = $winningTicket;
    }
}