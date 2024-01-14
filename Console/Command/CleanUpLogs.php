<?php
declare(strict_types=1);

namespace JakubKubicki\LogsCleanupKata\Console\Command;

use JakubKubicki\LogsCleanupKata\Service\CleanUpLogs as CleanUpLogsHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CleanUpLogs extends Command
{
    public function __construct(
        private readonly CleanUpLogsHandler $cleanUpLogsHandler,
        string $name = null
    ) {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->setName('clean:up:logs');
        $this->setDescription('Clean up logs');

        parent::configure();
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Cleaning up logs...</info>');

        $this->cleanUpLogsHandler->cleanUp();

        $output->writeln('<info>Logs cleaned up.</info>');
        return 0;
    }
}
