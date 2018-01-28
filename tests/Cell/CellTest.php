<?php
declare(strict_types=1);

namespace Game\Tests\Cell;

use Game\Cell\Cell;
use Game\Cell\Coordinates;
use PHPUnit\Framework\TestCase;

final class CellTest extends TestCase
{
    /**
     * @dataProvider coordinatesProvider
     *
     * @param bool $expectedIsNeighbour
     * @param Coordinates $coordinates
     */
    public function testShouldResolveLivingCells(bool $expectedIsNeighbour, Coordinates $coordinates)
    {
        $cell = new Cell(new Coordinates(0, 0), true);
        $neighbourCell = new Cell($coordinates, true);

        $isNeighbour = $cell->isLivingNeighbour($neighbourCell);

        $this->assertSame($expectedIsNeighbour, $isNeighbour);
    }

    /**
     * @return array
     */
    public function coordinatesProvider(): array
    {
        return [
            [true, new Coordinates(-1, -1)],
            [true, new Coordinates(-1, 0)],
            [true, new Coordinates(-1, 1)],
            [true, new Coordinates(0, -1)],
            [false, new Coordinates(0, 0)],
            [true, new Coordinates(0, 1)],
            [true, new Coordinates(1, -1)],
            [true, new Coordinates(1, 0)],
            [true, new Coordinates(1, 1)],
            [false, new Coordinates(-10, 1)],
            [false, new Coordinates(-1, 10)],
            [false, new Coordinates(0, 5)],
        ];
    }
}
