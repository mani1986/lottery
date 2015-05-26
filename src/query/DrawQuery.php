<?php
namespace mani\lottery\query;

use mani\lottery\core\Persistence;
use mani\lottery\model\Draw;

class DrawQuery {
    /**
     * @return Draw
     */
    public static function getOpenDraw()
    {
        return Persistence::manager()->getRepository(Draw::class)->findOneBy(['ended' => null]);
    }
}