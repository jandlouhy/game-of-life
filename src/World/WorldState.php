<?php
declare(strict_types=1);

namespace Game\World;

use Game\Cell\Cell;

class WorldState
{
    /** @var Cell[] */
    private $cells;

    /**
     * @param Cell[] $cells
     */
    public function __construct(array $cells)
    {
        $this->cells = $cells;
    }

    /**
     * @return Cell[]
     */
    public function getCells(): array
    {
        return $this->cells;
    }

    /**
     * @param Cell $cell
     * @return Cell[]
     */
    public function findLivingNeighbours(Cell $cell): array
    {
        $neighbours = [];

        foreach ($this->getCells() as $possibleNeighbour) {
            if ($possibleNeighbour->isLivingNeighbour($cell)) {
                $neighbours[] = $possibleNeighbour;
            }
        }

        return $neighbours;
    }
}
