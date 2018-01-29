<?php
declare(strict_types=1);

namespace Game\Command;

use Game\Command\Helper\WorldFormatter;
use Game\DataProvider\RandomDataProvider;
use Game\World\WorldFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RunCommand extends Command
{
    const CYCLES_PER_SECOND = 3;

    /** @var WorldFactory */
    private $worldFactory;

    /** @var WorldFormatter */
    private $worldFormatter;

    /**
     * @param WorldFactory $worldFactory
     * @param WorldFormatter $worldFormatter
     */
    public function __construct(WorldFactory $worldFactory, WorldFormatter $worldFormatter)
    {
        $this->worldFactory = $worldFactory;
        $this->worldFormatter = $worldFormatter;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('game:run');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $data = new RandomDataProvider();

        $world = $this->worldFactory->create(
            $data->getWorldWidth(),
            $data->getWorldHeight(),
            $data->getCellCoordinates()
        );

        foreach ($world as $worldState) {
            $this->clearOutput($output);
            $io->table([], $this->worldFormatter->getWorldStateAsArray($worldState));
            $this->sleep();
        }
    }

    /**
     * @param OutputInterface $output
     */
    private function clearOutput(OutputInterface $output)
    {
        $output->write(sprintf("\033\143"));
    }

    private function sleep()
    {
        usleep((int)floor(1000000 / self::CYCLES_PER_SECOND));
    }
}
