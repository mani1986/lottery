<?php
namespace mani\lottery\controller;

use mani\lottery\core\Controller;
use mani\lottery\core\OutputJson;
use mani\lottery\core\Persistence;
use mani\lottery\model\Draw;
use mani\lottery\object\Error;
use mani\lottery\object\Notifier;
use mani\lottery\object\TicketDrawer;
use mani\lottery\query\DrawQuery;
use mani\lottery\query\TicketQuery;
use mani\lottery\view\DrawView;
use mani\lottery\view\ErrorView;

/**
 * Class DrawController
 * @package mani\lottery\controller
 */
class DrawController extends Controller
{
    /**
     * Misc constants.
     */
    const MINIMUM_TICKETS_PER_DRAW = '1';

    /**
     * Error constants.
     */
    const ERROR_MINIMUM_NOT_REACHED = 'Minimum number of tickets has not been reached. Registered %s, needed %s.';

    /**
     * Get the lottery.
     */
    public static function index() {
        $data = [

        ];

        echo OutputJson::output($data);
    }

    /**
     * @param array $body
     */
    public static function create()
    {
        try {
            $oldDraw = DrawQuery::getOpenDraw();

            if (!is_null($oldDraw)) {
                // Draw winner and close current one.
                $ticketsRegistered = count(TicketQuery::getAllForDraw($oldDraw));
                if ($ticketsRegistered < self::MINIMUM_TICKETS_PER_DRAW) {
                    throw new \Exception(vsprintf(
                        self::ERROR_MINIMUM_NOT_REACHED,
                        [$ticketsRegistered, self::MINIMUM_TICKETS_PER_DRAW]
                    ));
                }

                $winner = TicketDrawer::draw($oldDraw);
                Notifier::notifyWinner($winner);
                $oldDraw->setWinningTicket($winner->getId());
                $oldDraw->setEnded(new \DateTime());
                Persistence::persist($oldDraw);
            }

            $draw = new Draw();
            Persistence::persist($draw);

            echo OutputJson::output(DrawView::toArray($oldDraw, $winner));
        } catch (\Exception $exception) {
            echo OutputJson::outputForbidden(ErrorView::toArray(new Error($exception->getMessage())));
        }
    }
}
