<?php
declare(strict_types=1);

namespace JakubKubicki\LogsCleanupKata\Service\Handler;

use JakubKubicki\LogsCleanupKata\Api\Service\Handler\HandlerInterface;
use JakubKubicki\LogsCleanupKata\Config\ConfigProvider;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Filesystem\Io\File;
use Psr\Log\LoggerInterface;

class Files implements HandlerInterface
{
    public const FILE_MASK = '*.log';

    public function __construct(
        private readonly ConfigProvider $configProvider,
        private readonly DirectoryList $directoryList,
        private readonly File $file,
        private readonly LoggerInterface $logger
    ) {
    }

    public function isEnabled(): bool
    {
        return $this->configProvider->isEnabledFilesLogsCleanup();
    }

    public function cleanUp(): void
    {
        try {
            $logFiles = glob(
                $this->directoryList->getPath(DirectoryList::LOG) . DIRECTORY_SEPARATOR . self::FILE_MASK
            );
        } catch (FileSystemException $exception) {
            $this->logger->error($exception);
            return;
        }

        foreach ($logFiles as $logFile) {
            $this->file->rm($logFile);
        }
        $this->logger->info('Files logs cleaned up');
    }
}
