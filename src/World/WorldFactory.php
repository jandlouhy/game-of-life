<?php

namespace Game\World;

use Game\DataProvider\DataProviderInterface;
use Game\Life\LifeResolver;
use Game\Life\Rule\NewLifeRule;
use Game\Life\Rule\StayAliveRule;

class WorldFactory
{
    /**
     * @param DataProviderInterface $dataProvider
     * @return World
     */
    public function create(DataProviderInterface $dataProvider)
    {
        $worldStateFactory = new WorldStateFactory();

        $lifeResolver = new LifeResolver([
            new StayAliveRule(),
            new NewLifeRule(),
        ]);

        return new World(
            $worldStateFactory,
            $lifeResolver,
            $dataProvider->getWorldWidth(),
            $dataProvider->getWorldHeight(),
            $dataProvider->getCellCoordinates()
        );
    }
}
