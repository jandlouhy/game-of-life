<?php

namespace Game\Life\Rule;

use Game\Cell\Cell;

class StayAliveRule implements LifeRuleInterface
{
    public function isAlive(Cell $cell, array $neighbourCells): bool
    {
        $neighbourCount = count($neighbourCells);

        return $cell->isAlive() && $neighbourCount >= 2 && $neighbourCount <= 3;
    }
}
