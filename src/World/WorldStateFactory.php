<?php

namespace Game\World;

use Game\Cell\Coordinates;
use Game\Cell\Cell;

class WorldStateFactory
{
    /**
     * @param int $worldWidth
     * @param int $worldHeight
     * @param Coordinates[] $livingCells
     * @return WorldState
     */
    public function createInitial(int $worldWidth, int $worldHeight, array $livingCells)
    {
        foreach ($livingCells as $livingCell) {
            $livingCellsArray[$livingCell->getX()][$livingCell->getY()] = true;
        }

        $cells = [];
        for ($x = 0; $x < $worldWidth; $x++) {
            for ($y = 0; $y < $worldHeight; $y++) {
                $isCellAlive = isset($livingCellsArray[$x][$y]);
                $cells[] = new Cell(new Coordinates($x, $y), $isCellAlive);
            }
        }

        return $this->create($cells);
    }

    /**
     * @param Cell[] $cells
     * @return WorldState
     */
    public function create(array $cells)
    {
        return new WorldState($cells);
    }
}
