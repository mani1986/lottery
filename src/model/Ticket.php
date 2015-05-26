<?php
namespace mani\lottery\model;

use mani\lottery\object\TicketCodeGenerator;
use mani\lottery\core\Model;

/**
 * @Entity @Table(name="ticket")
 **/
class Ticket extends Model
{
    /**
     * @Column(type="datetime")
     * @var DateTime
     */
    protected $date;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $email;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $code;

    /**
     * @Column(type="integer")
     * @var Draw
     */
    protected $draw;

    /**
     * @param string $name
     * @param string $email
     */
    public function __construct($name, $email, Draw $draw)
    {
        $this->date = new \DateTime();
        $this->name = $name;
        $this->email = $email;
        $this->draw = $draw->getId();
        $this->code = TicketCodeGenerator::generate();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return Draw
     */
    public function getDraw()
    {
        return $this->draw;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
