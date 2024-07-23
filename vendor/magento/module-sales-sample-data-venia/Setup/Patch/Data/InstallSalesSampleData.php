<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\SalesSampleDataVenia\Setup\Patch\Data;

use Magento\Framework\Indexer\AbstractProcessor;
use Magento\Framework\Setup;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\NonTransactionableInterface;
use Magento\SalesSampleDataVenia\Setup\SetSession;

/**
 * Class InstallSalesSampleData
 * @package Magento\SalesSampleDataVenia\Setup\Patch\Data
 */
class InstallSalesSampleData implements
    DataPatchInterface,
    NonTransactionableInterface
{
    /**
     * @var Setup\SampleData\Executor
     */
    protected $executor;

    /**
     * @var \Magento\SalesSampleDataVenia\Setup\Installer
     */
    protected $installer;

    /**
     * @var AbstractProcessor
     */
    private $indexerProcessor;

    /**
     * InstallSalesSampleData constructor.
     * @param Setup\SampleData\Executor $executor
     * @param \Magento\SalesSampleDataVenia\Setup\Installer $installer
     * @param AbstractProcessor $indexerProcessor
     */
    public function __construct(
        SetSession $setSession,
        Setup\SampleData\Executor $executor,
        \Magento\SalesSampleDataVenia\Setup\Installer $installer,
        \Magento\CatalogInventory\Model\Indexer\Stock\Processor $indexerProcessor

    ) {
        $this->executor = $executor;
        $this->installer = $installer;
        $this->indexerProcessor = $indexerProcessor;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->indexerProcessor->reindexAll();
        $this->executor->exec($this->installer);
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
