<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\CmsSampleDataVenia\Setup;

use Magento\Framework\Setup;

class Installer implements Setup\SampleData\InstallerInterface
{
    /**
     * @var \Magento\CmsSampleDataVenia\Model\Page
     */
    private $page;

    /**
     * @var \Magento\CmsSampleDataVenia\Model\Block
     */
    private $block;

    /**
     * @param \Magento\CmsSampleDataVenia\Model\Page $page
     * @param \Magento\CmsSampleDataVenia\Model\Block $block
     */
    public function __construct(
        \Magento\CmsSampleDataVenia\Model\Page $page,
        \Magento\CmsSampleDataVenia\Model\Block $block
    ) {
        $this->page = $page;
        $this->block = $block;
    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {
        $this->page->install(['Magento_CmsSampleDataVenia::fixtures/pages/pages.csv']);
        $this->block->install(['Magento_CmsSampleDataVenia::fixtures/blocks/blocks.csv']);
    }
}
