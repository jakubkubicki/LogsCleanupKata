<?php
declare(strict_types=1);

namespace JakubKubicki\LogsCleanupKata\Service;

use JakubKubicki\LogsCleanupKata\Api\Service\Handler\HandlerInterface;
use JakubKubicki\LogsCleanupKata\Service\Handler\Resolver;

class CleanUpLogs
{
    public function __construct(
        private readonly Resolver $handlerResolver
    ) {
    }

    public function cleanUp(): void
    {
        /* @var HandlerInterface $handler */
        foreach ($this->handlerResolver->getHandlers() as $handler) {
            if ($handler->isEnabled()) {
                $handler->cleanup();
            }
        }
    }
}
