<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\ConfigurableSampleDataVenia\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\ConfigurableSampleDataVenia\Setup\TierPricing;

/**
 * Patch is mechanism, that allows to do atomic upgrade data changes
 */
class InstallConfigurableTierPricingData implements DataPatchInterface
{
    /**
     * @var TierPricing
     */
    private $tierPricingInstaller;

    public function __construct(TierPricing $tierPricingInstaller)
    {
        $this->tierPricingInstaller = $tierPricingInstaller;
    }


    public function apply()
    {
        $this->tierPricingInstaller->install('fixtures/products_tier_pricing.csv');
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [
            \Magento\ConfigurableSampleDataVenia\Setup\Patch\Data\InstallConfigurableSampleData::class
        ];
    }
}
