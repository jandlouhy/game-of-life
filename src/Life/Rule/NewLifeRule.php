<?php

namespace Game\Life\Rule;

use Game\Cell\Cell;

class NewLifeRule implements LifeRuleInterface
{
    public function isAlive(Cell $cell, array $neighbourCells): bool
    {
        return !$cell->isAlive() && count($neighbourCells) === 3;
    }
}
