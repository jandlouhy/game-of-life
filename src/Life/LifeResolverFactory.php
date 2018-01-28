<?php

namespace Game\Life;

use Game\Life\Rule\NewLifeRule;
use Game\Life\Rule\StayAliveRule;

class LifeResolverFactory
{
    /**
     * @return LifeResolver
     */
    public function create(): LifeResolver
    {
        return new LifeResolver([
            new NewLifeRule(),
            new StayAliveRule(),
        ]);
    }
}
