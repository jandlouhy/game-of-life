<?php

namespace Game\Cell;


use function var_dump;

class Coordinates
{
    const MAX_NEIGHBOUR_DISTANCE = 1;

    /** @var int */
    private $x;

    /** @var int */
    private $y;

    /**
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param Coordinates $coordinates
     * @return bool
     */
    public function isNeighbour(Coordinates $coordinates): bool
    {
        if ($coordinates->getX() === $this->getX() && $coordinates->getY() === $this->getY()) {
            return false;
        }

        return $this->getDistance($coordinates->getX(), $this->getX()) <= self::MAX_NEIGHBOUR_DISTANCE
            && $this->getDistance($coordinates->getY(), $this->getY()) <= self::MAX_NEIGHBOUR_DISTANCE;
    }

    /**
     * @param int $firstPosition
     * @param int $secondPosition
     * @return int
     */
    private function getDistance(int $firstPosition, int $secondPosition): int
    {
        return abs($firstPosition - $secondPosition);
    }
}
