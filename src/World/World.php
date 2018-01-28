<?php

namespace Game\World;

use Game\Cell\Coordinates;
use Game\Life\LifeResolver;
use Generator;
use IteratorAggregate;
use function var_dump;

class World implements IteratorAggregate
{
    /** @var WorldStateFactory */
    private $worldStateFactory;

    /** @var LifeResolver */
    private $lifeResolver;

    /** @var WorldState */
    private $worldState;

    /**
     * @param WorldStateFactory $worldStateFactory
     * @param LifeResolver $lifeResolver
     * @param int $worldWidth
     * @param int $worldHeight
     * @param Coordinates[] $initialCoordinates
     */
    public function __construct(
        WorldStateFactory $worldStateFactory,
        LifeResolver $lifeResolver,
        int $worldWidth,
        int $worldHeight,
        array $initialCoordinates
    ) {
        $this->worldStateFactory = $worldStateFactory;
        $this->lifeResolver = $lifeResolver;

        $this->worldState = $this->worldStateFactory->createInitial(
            $worldWidth,
            $worldHeight,
            $initialCoordinates
        );
    }

    /**
     * @return WorldState|Generator
     */
    public function getIterator(): Generator
    {
        $worldState = $this->worldState;

        do {
            yield $worldState;

            $nextStateCells = $this->lifeResolver->resolveLivingCells($worldState);
            $worldState = $this->worldStateFactory->create($nextStateCells);
        } while (count($nextStateCells));
    }
}
