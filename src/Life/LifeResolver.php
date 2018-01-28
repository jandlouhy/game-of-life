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

    /**
     * @param Cell $cell
     * @param WorldState $worldState
     * @return bool
     */
    private function isAlive(Cell $cell, WorldState $worldState): bool
    {
        $neighbourCells = $worldState->findLivingNeighbours($cell);

        return array_reduce(
            $this->lifeRules,
            function ($isAlive, LifeRuleInterface $lifeRule) use ($cell, $neighbourCells) {
                return $isAlive || $lifeRule->isAlive($cell, $neighbourCells);
            },
            false
        );
    }
}
