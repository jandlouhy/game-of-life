<?php
declare(strict_types=1);

namespace Game\DataProvider;

use Game\Cell\Coordinates;

interface DataProviderInterface
{
    /**
     * @return int
     */
    public function getWorldWidth(): int;

    /**
     * @return int
     */
    public function getWorldHeight(): int;

    /**
     * @return Coordinates[]
     */
    public function getCellCoordinates(): array;
}
