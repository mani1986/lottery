<?php
namespace mani\lottery\object;

use mani\lottery\model\Ticket;

/**
 * Class Notifier
 * @package mani\lottery\object
 */
class Notifier
{
    /**
     * Misc constants.
     */
    const WINNER_MAIL_SUBJECT = 'Congratulations, you won the lottery!';
    const WINNER_MAIL_BODY = "Hi %s\n\Your lottery ticket number %s was the winner this round. You can claim your price on the internet.";

    /**
     * @param Ticket $winningTicket
     */
    public static function notifyWinner(Ticket $winningTicket)
    {
        mail(
            $winningTicket->getEmail(),
            self::WINNER_MAIL_SUBJECT ,
            vsprintf(self::WINNER_MAIL_BODY, [$winningTicket->getName(), $winningTicket->getCode()])
        );
    }
}
