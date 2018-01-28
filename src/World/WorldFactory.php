<?php

namespace Game\World;

use Game\Cell\Coordinates;
use Game\Life\LifeResolver;

class WorldFactory
{
    /** @var WorldStateFactory */
    private $worldStateFactory;

    /** @var LifeResolver */
    private $lifeResolver;

    /**
     * @param WorldStateFactory $worldStateFactory
     * @param LifeResolver $lifeResolver
     */
    public function __construct(WorldStateFactory $worldStateFactory, LifeResolver $lifeResolver)
    {
        $this->worldStateFactory = $worldStateFactory;
        $this->lifeResolver = $lifeResolver;
    }

    /**
     * @param int $worldWidth
     * @param int $worldHeight
     * @param Coordinates[] $livingCellCoordinates
     * @return World
     */
    public function create(int $worldWidth, int $worldHeight, array $livingCellCoordinates): World
    {
        return new World(
            $this->worldStateFactory,
            $this->lifeResolver,
            $worldWidth,
            $worldHeight,
            $livingCellCoordinates
        );
    }
}
