<?php
declare(strict_types=1);

namespace JakubKubicki\LogsCleanupKata\Api\Service\Handler;

interface HandlerInterface
{
    public function isEnabled(): bool;

    public function cleanUp(): void;
}
