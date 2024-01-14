<?php
declare(strict_types=1);

namespace JakubKubicki\LogsCleanupKata\Cron;

use JakubKubicki\LogsCleanupKata\Config\ConfigProvider;
use JakubKubicki\LogsCleanupKata\Service\CleanUpLogs as CleanUpLogsHandler;

class CleanUpLogs
{
    public function __construct(
        private readonly ConfigProvider $configProvider,
        private readonly CleanUpLogsHandler $cleanUpLogsHandler
    ) {
    }

    public function execute(): void
    {
        if ($this->configProvider->isEnabled()) {
            $this->cleanUpLogsHandler->cleanUp();
        }
    }
}
