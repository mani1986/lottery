<?php
namespace mani\lottery\core;

use mani\lottery\controller\DrawController;
use mani\lottery\controller\TicketController;
use mani\lottery\object\Error;
use mani\lottery\view\ErrorView;
use Slim\Slim;

/**
 * Class Router. Wrapper for Slim router.
 *
 * @package mani\lottery\core
 */
class Router
{
    /**
     * Construct.
     */
    public function __construct()
    {
        $app = new Slim();
        $body = InputJson::input($app->request->getBody());

        $app->post('/ticket', function () use ($body) {
            TicketController::create($body);
        });

        $app->post('/draw', function () {
            DrawController::create();
        });

        $app->run();
    }
}
