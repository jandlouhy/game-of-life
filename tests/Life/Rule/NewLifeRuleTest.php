<?php

namespace Game\Tests\Life\Rule;

use Game\Cell\Cell;
use Game\Cell\Coordinates;
use Game\Life\Rule\NewLifeRule;
use PHPUnit\Framework\TestCase;

final class NewLifeRuleTest extends TestCase
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
        $newLifeRule = new NewLifeRule();
        $currentCell = new Cell(new Coordinates(0, 0), $isCurrentAlive);
        $neighbourCells = array_fill(0, $neighboursCount, true);

        $isAlive = $newLifeRule->isAlive($currentCell, $neighbourCells);

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
            [false, self::LIVING_CELL, 2],
            [false, self::DEAD_CELL, 2],
            [false, self::LIVING_CELL, 3],
            [true, self::DEAD_CELL, 3],
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
