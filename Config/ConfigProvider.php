<?php
declare(strict_types=1);

namespace JakubKubicki\LogsCleanupKata\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;

class ConfigProvider
{
    private const XML_PATH_LOGS_CLEANUP_KATA_GENERAL_IS_ENABLED
        = 'logs_cleanup_kata/general/is_enabled';

    private const XML_PATH_LOGS_CLEANUP_KATA_FILES_IS_ENABLED
        = 'logs_cleanup_kata/files/is_enabled';

    private const XML_PATH_LOGS_CLEANUP_KATA_FOLDERS_IS_ENABLED
        = 'logs_cleanup_kata/folders/is_enabled';

    private const XML_PATH_LOGS_CLEANUP_KATA_DATABASE_IS_ENABLED
        = 'logs_cleanup_kata/database/is_enabled';

    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig
    ) {
    }

    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_LOGS_CLEANUP_KATA_GENERAL_IS_ENABLED);
    }

    public function isEnabledFilesLogsCleanup(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_LOGS_CLEANUP_KATA_FILES_IS_ENABLED);
    }

    public function isEnabledFoldersLogsCleanup(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_LOGS_CLEANUP_KATA_FOLDERS_IS_ENABLED);
    }

    public function isEnabledDatabaseLogsCleanup(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_LOGS_CLEANUP_KATA_DATABASE_IS_ENABLED);
    }
}
