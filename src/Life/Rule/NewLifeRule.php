<?php

namespace Game\Life\Rule;

use Game\Cell\Cell;

class NewLifeRule implements LifeRuleInterface
{
    const NEIGHBOURS_TO_CREATE_NEW_LIFE = 3;

    public function isAlive(Cell $cell, array $neighbourCells): bool
    {
        return !$cell->isAlive() && count($neighbourCells) === self::NEIGHBOURS_TO_CREATE_NEW_LIFE;
    }
}
