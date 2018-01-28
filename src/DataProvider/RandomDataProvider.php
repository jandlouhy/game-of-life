<?php

namespace Game\DataProvider;

use Game\Cell\Coordinates;

class RandomDataProvider implements DataProviderInterface
{
    const MIN_WORLD_SIZE = 10;
    const MAX_WORLD_SIZE = 30;

    /** @var int */
    private $worldWidth;

    /** @var int */
    private $worldHeight;

    /** @var int */
    private $cellCount;

    public function __construct()
    {
        $this->worldWidth = $this->worldHeight = mt_rand(self::MIN_WORLD_SIZE, self::MAX_WORLD_SIZE);
        $this->cellCount = $this->getWorldWidth() * $this->getWorldHeight() / 3;
    }

    public function getWorldWidth(): int
    {
        return $this->worldWidth;
    }

    public function getWorldHeight(): int
    {
        return $this->worldHeight;
    }

    public function getCellCoordinates(): array
    {
        $cells = [];

        for ($i = 0; $i < $this->cellCount; $i++) {
            $cells[$i] = $this->createRandomCoordinate();
        }

        return $cells;
    }

    /**
     * @return Coordinates
     */
    private function createRandomCoordinate(): Coordinates
    {
        return new Coordinates(
            mt_rand(0, $this->getWorldWidth() - 1),
            mt_rand(0, $this->getWorldHeight() - 1)
        );
    }
}
