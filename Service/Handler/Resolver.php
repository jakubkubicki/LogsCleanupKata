<?php
declare(strict_types=1);

namespace JakubKubicki\LogsCleanupKata\Service\Handler;

class Resolver
{
    public function __construct(
        private readonly array $handlerPool = []
    ) {
    }

    public function getHandlers(): array
    {
        return $this->handlerPool;
    }
}
