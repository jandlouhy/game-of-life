<?php
declare(strict_types=1);

namespace Game\Life\Rule;

use Game\Cell\Cell;

interface LifeRuleInterface
{
    /**
     * @param Cell $cell
     * @param Cell[] $neighbourCells
     * @return bool
     */
    public function isAlive(Cell $cell, array $neighbourCells): bool;
}
