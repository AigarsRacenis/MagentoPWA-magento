<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\ConfigurableSampleDataVenia\Setup;

use Magento\ImportExport\Model\Import;
use Magento\ImportExport\Model\Import\ErrorProcessing\ProcessingErrorAggregatorInterface;
use Magento\Framework\Component\ComponentRegistrar;

/**
 * Setup configurable tier prices
 */
class TierPricing
{
    /**
     * @var \Magento\ImportExport\Model\Import
     */
    private $importModel;

    /**
     * @var \Magento\ImportExport\Model\Import\Source\CsvFactory
     */
    private $csvSourceFactory;

    /**
     * @var \Magento\Framework\Filesystem\Directory\ReadFactory
     */
    private $readFactory;

    /**
     * @var \Magento\Framework\Component\ComponentRegistrar
     */
    private $componentRegistrar;

    /**
     * @param \Magento\ImportExport\Model\Import $importModel
     * @param \Magento\ImportExport\Model\Import\Source\CsvFactory $csvSourceFactory
     * @param \Magento\Framework\Filesystem\Directory\ReadFactory $readFactory
     * @param \Magento\Framework\Component\ComponentRegistrar $componentRegistrar
     */
    public function __construct(
        \Magento\ImportExport\Model\Import $importModel,
        \Magento\ImportExport\Model\Import\Source\CsvFactory $csvSourceFactory,
        \Magento\Framework\Filesystem\Directory\ReadFactory $readFactory,
        \Magento\Framework\Component\ComponentRegistrar $componentRegistrar
    ) {
        $this->importModel = $importModel;
        $this->csvSourceFactory = $csvSourceFactory;
        $this->readFactory = $readFactory;
        $this->componentRegistrar = $componentRegistrar;
    }

    public function install(string $fileName)
    {
        $this->importModel->setData(
            [
                'entity' => 'advanced_pricing',
                'behavior' => 'replace',
                Import::FIELD_NAME_VALIDATION_STRATEGY =>
                ProcessingErrorAggregatorInterface::VALIDATION_STRATEGY_SKIP_ERRORS
            ]
        );

        $source = $this->csvSourceFactory->create([
            'file' => $fileName,
            'directory' => $this->readFactory->create(
                $this->componentRegistrar->getPath(ComponentRegistrar::MODULE, 'Magento_ConfigurableSampleDataVenia')
            )
        ]);

        $this->importModel->validateSource($source);
        $this->importModel->importSource();
    }
}
