<?php

namespace Game\Life\Rule;

use Game\Cell\Cell;

class StayAliveRule implements LifeRuleInterface
{
    const MIN_NEIGHBOURS_TO_LIVE = 2;
    const MAX_NEIGHBOURS_TO_LIVE = 3;

    public function isAlive(Cell $cell, array $neighbourCells): bool
    {
        $neighbourCount = count($neighbourCells);

        return $cell->isAlive()
            && $neighbourCount >= self::MIN_NEIGHBOURS_TO_LIVE
            && $neighbourCount <= self::MAX_NEIGHBOURS_TO_LIVE;
    }
}
