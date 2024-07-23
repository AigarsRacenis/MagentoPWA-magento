<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\TaxSampleDataVenia\Setup;

use Magento\Framework\Setup;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * @var \Magento\TaxSampleDataVenia\Model\Tax
     */
    protected $tax;

    /**
     * @param \Magento\TaxSampleDataVenia\Model\Tax $tax
     */
    public function __construct(
        \Magento\TaxSampleDataVenia\Model\Tax $tax
    ) {
        $this->tax = $tax;
    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {
        $this->tax->install(['Magento_TaxSampleDataVenia::fixtures/tax_rate.csv']);
    }
}
