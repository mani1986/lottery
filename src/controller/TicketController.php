<?php
namespace mani\lottery\controller;

use mani\lottery\core\Controller;
use mani\lottery\core\OutputJson;
use mani\lottery\core\Persistence;
use mani\lottery\model\Ticket;
use mani\lottery\object\Error;
use mani\lottery\query\DrawQuery;
use mani\lottery\query\TicketQuery;
use mani\lottery\view\ErrorView;
use mani\lottery\view\TicketView;

/**
 * Class TicketController
 *
 * @package mani\lottery\controlle
 */
class TicketController extends Controller
{
    /**
     * Misc constants.
     */
    const MAXIMUM_NUMBER_OF_TICKETS_PER_EMAIL = '1';

    /**
     * Error constants.
     */
    const ERROR_MAXIMUM_NUMBER_OF_TICKETS_REACHED = 'Maximum number of tickets on the email %s has been reached.';
    const ERROR_INVALID_EMAIL = 'The email %s is invalid.';
    const ERROR_INVALID_NAME = 'The name %s is invalid.';

    /**
     * @param array $body
     */
    public static function create(array $body)
    {
        $email = $body[TicketView::FIELD_EMAIL];
        $name = $body[TicketView::FIELD_NAME];

        $draw = DrawQuery::getOpenDraw();

        if (is_null($draw)) {
            $draw = DrawController::create();
        }

        try {
            self::validate($name, $email);

            // Check if the same user has already bought a ticket.
            $ticketsRegistered = count(TicketQuery::getAllForDrawAndEmail($draw, $email));
            if ($ticketsRegistered >= self::MAXIMUM_NUMBER_OF_TICKETS_PER_EMAIL) {
                throw new \Exception(vsprintf(
                    self::ERROR_MAXIMUM_NUMBER_OF_TICKETS_REACHED,
                    [$email]
                ));
            }


            $ticket = new Ticket($name, $email, $draw);
            Persistence::persist($ticket);

            echo OutputJson::output(TicketView::toArray($ticket));
        } catch (\Exception $exception) {
            echo OutputJson::outputForbidden(ErrorView::toArray(new Error($exception->getMessage())));
        }
    }

    /**
     * Validate input.
     *
     * @param string $name
     * @param string $email
     */
    private static function validate($name, $email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception(vsprintf(
                self::ERROR_INVALID_EMAIL,
                [$email]
            ));
        }

        if (preg_match('/[~!@#\$%\^&\*\(\)=\+\|\[\]\{\};\\:\",\.\<\>\?\/]+/', $name)) {
            throw new \Exception(vsprintf(
                self::ERROR_INVALID_NAME,
                [$name]
            ));
        }
    }
} 