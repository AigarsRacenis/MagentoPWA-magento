<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\CmsSampleDataVenia\Setup\Patch\Data;

use Magento\CmsSampleDataVenia\Setup\Installer;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\SampleData\Executor;

class InstallCmsSampleData implements DataPatchInterface
{
    /**
     * @var Executor
     */
    protected $executor;

    /**
     * @var Installer
     */
    protected $installer;

    /**
     * @param Executor $executor
     * @param Installer $installer
     */
    public function __construct(
        Executor $executor,
        Installer $installer
    ) {
        $this->executor = $executor;
        $this->installer = $installer;
    }

    /**
     * @inheritdoc
     */
    public function apply()
    {
        $this->executor->exec($this->installer);
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }
}
