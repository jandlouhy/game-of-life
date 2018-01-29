<?php
declare(strict_types=1);

namespace Game\Command\Helper;

use Game\Cell\Cell;
use Game\World\WorldState;

class WorldFormatter
{
    const LIVING_CELL = 'X';
    const EMPTY_CELL = ' ';

    /**
     * @param WorldState $worldState
     * @return array
     */
    public function getWorldStateAsArray(WorldState $worldState): array
    {
        $cellArray = [];
        foreach ($worldState->getCells() as $cell) {
            $coordinates = $cell->getCoordinates();
            $cellArray[$coordinates->getX()][$coordinates->getY()] = $this->getCellTablePresentation($cell);
        }

        return $cellArray;
    }

    /**
     * @param Cell $cell
     * @return string
     */
    private function getCellTablePresentation(Cell $cell): string
    {
        return $cell->isAlive() ? self::LIVING_CELL : self::EMPTY_CELL;
    }
}
