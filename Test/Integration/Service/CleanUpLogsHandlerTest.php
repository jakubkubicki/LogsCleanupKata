<?php
declare(strict_types=1);

namespace JakubKubicki\LogsCleanupKata\Test\Integration\Service;

use JakubKubicki\LogsCleanupKata\Service\CleanUpLogs;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Filesystem\Io\File;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class CleanUpLogsHandlerTest extends TestCase
{
    private $cleanUpLogs;
    private $directoryList;
    private $file;

    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();

        $this->cleanUpLogs = $objectManager->create(CleanUpLogs::class);
        $this->directoryList = $objectManager->get(DirectoryList::class);
        $this->file = $objectManager->create(File::class);
    }

    public static function loadFixtureLogFilesOnly()
    {
        require __DIR__ . '/../_files/log_files_only.php';
    }

    public static function loadFixtureLogFilesWithTxtFile()
    {
        require __DIR__ . '/../_files/log_files_with_txt_file.php';
    }

    /**
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     * @magentoDataFixture loadFixtureLogFilesOnly
     * @throws LocalizedException
     */
    public function testCleanUpWhenAllFilesAreLogs(): void
    {
        $this->cleanUpLogs->cleanUp();

        $this->file->cd($this->directoryList->getPath(DirectoryList::LOG));
        $files = $this->file->ls();

        $this->assertEmpty(
            $files
        );
    }

    /**
     * @magentoDbIsolation enabled
     * @magentoAppIsolation enabled
     * @magentoDataFixture loadFixtureLogFilesWithTxtFile
     * @throws LocalizedException
     */
    public function testCleanUpWhenNotAllFilesAreLogs(): void
    {
        $this->cleanUpLogs->cleanUp();

        $this->file->cd($this->directoryList->getPath(DirectoryList::LOG));
        $files = $this->file->ls();

        $this->assertNotEmpty(
            $files
        );
    }
}
