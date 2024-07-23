<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\SalesSampleDataVenia\Setup;

use Magento\Framework\Setup;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * @var \Magento\SalesSampleDataVenia\Model\Order;
     */
    protected $order;

    /**
     * @param \Magento\SalesSampleDataVenia\Model\Order $order
     */
    public function __construct(\Magento\SalesSampleDataVenia\Model\Order $order)
    {
        $this->order = $order;
    }

    /**
     * @inheritdoc
     */
    public function install()
    {
        $this->order->install(['Magento_SalesSampleDataVenia::fixtures/orders.csv']);
    }
}
