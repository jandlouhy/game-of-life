<?php

namespace Game\Life;

use Game\Cell\Cell;
use Game\Life\Rule\LifeRuleInterface;
use Game\World\WorldState;

class LifeResolver
{
    /** @var LifeRuleInterface[] */
    private $lifeRules = [];

    /**
     * @param LifeRuleInterface[] $lifeRules
     */
    public function __construct(array $lifeRules)
    {
        $this->lifeRules = $lifeRules;
    }


    /**
     * @return Cell[]
     */
    public function resolveLivingCells(WorldState $worldState): array
    {
        return array_map(
            function (Cell $cell) use ($worldState) {
                return new Cell($cell->getCoordinates(), $this->isAlive($cell, $worldState));
            },
            $worldState->getCells()
        );
    }

    private function isAlive(Cell $cell, WorldState $worldState): bool
    {
        $neighbourCells = $worldState->findLivingNeighbours($cell);
        $isAlive = false;

        foreach ($this->lifeRules as $lifeRule) {
            $isAlive |= $lifeRule->isAlive($cell, $neighbourCells);
        }

        return $isAlive;
    }
}
