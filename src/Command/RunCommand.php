<?php

namespace Game\Command;

use Game\Cell\Cell;
use Game\DataProvider\RandomDataProvider;
use Game\World\WorldFactory;
use Game\World\WorldState;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RunCommand extends Command
{
    const LIVING_CELL = 'X';
    const EMPTY_CELL = ' ';

    protected function configure()
    {
        $this->setName('game:run');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $worldBuilder = new WorldFactory();
        $dataProvider = new RandomDataProvider();
        $world = $worldBuilder->create($dataProvider);

        foreach ($world as $worldState) {
            $output->write(sprintf("\033\143"));

            $io->table([], $this->getWorldStateAsArray($worldState));

            usleep(400000);
        }
    }

    /**
     * @param WorldState $worldState
     * @return array
     */
    private function getWorldStateAsArray(WorldState $worldState): array
    {
        $cellArray = [];
        foreach ($worldState->getCells() as $cell) {
            $cellCoordinates = $cell->getCoordinates();
            $cellArray[$cellCoordinates->getX()][$cellCoordinates->getY()] = $this->getCellTablePresentation($cell);
        }

        return $cellArray;
    }

    /**
     * @param Cell $cell
     * @return string
     */
    private function getCellTablePresentation(Cell $cell): string
    {
        return $cell->isAlive() ? self::LIVING_CELL : self::EMPTY_CELL;
    }
}
