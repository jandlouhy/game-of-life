<?php
declare(strict_types=1);

namespace Game\Tests\Life\Rule;

use Game\Cell\Cell;
use Game\Cell\Coordinates;
use Game\Life\Rule\StayAliveRule;
use PHPUnit\Framework\TestCase;

final class StayAliveRuleTest extends TestCase
{
    const LIVING_CELL = true;
    const DEAD_CELL = false;

    /**
     * @dataProvider cellNeighboursProvider
     *
     * @param bool $expectedIsAlive
     * @param bool $isCurrentAlive
     * @param int $neighboursCount
     */
    public function testShouldGetCorrectLifeStatus(bool $expectedIsAlive, bool $isCurrentAlive, int $neighboursCount)
    {
        $stayAliveRule = new StayAliveRule();
        $currentCell = new Cell(new Coordinates(0, 0), $isCurrentAlive);
        $neighbourCells = array_fill(0, $neighboursCount, true);

        $isAlive = $stayAliveRule->isAlive($currentCell, $neighbourCells);

        $this->assertSame($expectedIsAlive, $isAlive);
    }

    /**
     * @return array
     */
    public function cellNeighboursProvider(): array
    {
        return [
            [false, self::LIVING_CELL, 0],
            [false, self::DEAD_CELL, 0],
            [false, self::LIVING_CELL, 1],
            [false, self::DEAD_CELL, 1],
            [true, self::LIVING_CELL, 2],
            [false, self::DEAD_CELL, 2],
            [true, self::LIVING_CELL, 3],
            [false, self::DEAD_CELL, 3],
            [false, self::LIVING_CELL, 4],
            [false, self::DEAD_CELL, 4],
            [false, self::LIVING_CELL, 5],
            [false, self::DEAD_CELL, 5],
            [false, self::LIVING_CELL, 6],
            [false, self::DEAD_CELL, 6],
            [false, self::LIVING_CELL, 7],
            [false, self::DEAD_CELL, 7],
            [false, self::LIVING_CELL, 8],
            [false, self::DEAD_CELL, 8],
            [false, self::LIVING_CELL, 9],
            [false, self::DEAD_CELL, 9],
        ];
    }
}
