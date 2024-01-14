<?php
declare(strict_types=1);

namespace JakubKubicki\LogsCleanupKata\Service\Handler;

use JakubKubicki\LogsCleanupKata\Api\Service\Handler\HandlerInterface;
use JakubKubicki\LogsCleanupKata\Config\ConfigProvider;

class Database implements HandlerInterface
{
    public function __construct(
        private readonly ConfigProvider $configProvider
    ) {
    }

    public function isEnabled(): bool
    {
        return $this->configProvider->isEnabledDatabaseLogsCleanup();
    }

    public function cleanUp(): void
    {
        //Can be implemented
        return;
    }
}
