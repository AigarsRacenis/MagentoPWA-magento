<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\CmsSampleDataVenia\Setup\Patch\Data;

use Magento\Cms\Helper\Page;
use Magento\CmsSampleDataVenia\Model\Page as VeniaPage;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class UpdateDefaultData implements DataPatchInterface
{
    /**
     * @var ResourceConnection
     */
    protected $resource;

    /**
     * @param ResourceConnection $resource
     */
    public function __construct(
        ResourceConnection $resource
    ) {
        $this->resource = $resource;
    }

    /**
     * @inheritdoc
     */
    public function apply()
    {
        // Update core config
        $this->updateCmsHomePageConfig(VeniaPage::HOMEPAGE_IDENTIFIER);
    }

    /**
     * Update a CMS home page config
     *
     * @param string $value
     */
    public function updateCmsHomePageConfig($value)
    {
        $count = $this->resource->getConnection()->update(
            'core_config_data',
            ['value' => $value],
            ['path = ?' => Page::XML_PATH_HOME_PAGE]
        );
        if ($count < 1) {
            $data = [
                'scope' => 'default',
                'scope_id' => 0,
                'path' => Page::XML_PATH_HOME_PAGE,
                'value' => $value,
            ];
            $this->resource->getConnection()->insert('core_config_data', $data);
        }
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
