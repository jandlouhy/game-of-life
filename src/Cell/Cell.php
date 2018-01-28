<?php
declare(strict_types=1);

namespace Game\Cell;

class Cell
{
    /** @var Coordinates */
    private $coordinates;

    /** @var bool */
    private $isAlive;

    /**
     * @param Coordinates $coordinates
     * @param bool $isAlive
     */
    public function __construct(Coordinates $coordinates, bool $isAlive)
    {
        $this->coordinates = $coordinates;
        $this->isAlive = $isAlive;
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    /**
     * @return bool
     */
    public function isAlive(): bool
    {
        return $this->isAlive;
    }

    /**
     * @param Cell $neighbourCell
     * @return bool
     */
    public function isLivingNeighbour(Cell $neighbourCell): bool
    {
        return $this->isAlive() && $this->getCoordinates()->isNeighbour($neighbourCell->getCoordinates());
    }
}
