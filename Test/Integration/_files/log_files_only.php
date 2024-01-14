<?php
declare(strict_types=1);

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem\Io\File;
use Magento\TestFramework\Helper\Bootstrap;

$objectManager = Bootstrap::getObjectManager();

$file = $objectManager->create(File::class);
$directoryList = $objectManager->get(DirectoryList::class);

$path = $directoryList->getPath(DirectoryList::LOG);

$file->checkAndCreateFolder($path);
$file->cd($path);

$file->write('log_1.log', '');
$file->write('log_2.log', '');
