<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\ConfigurableSampleDataVenia\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\CatalogSampleDataVenia\Setup\Attribute;
use Magento\CatalogSampleDataVenia\Setup\Category;
use Magento\ConfigurableSampleDataVenia\Setup\Product;
use Magento\ConfigurableSampleDataVenia\Setup\Swatches;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\ConfigurableSampleDataVenia\Setup\SetSession;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class InstallConfigurableSampleData implements
    DataPatchInterface, PatchVersionInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;

    /**
     * @var \Magento\CatalogSampleDataVenia\Setup\Attribute
     */
    private $attribute;

    /**
     * @var \Magento\CatalogSampleDataVenia\Setup\Category
     */
    private $category;

    /**
     * @var \Magento\CatalogSampleDataVenia\Setup\Product
     */
    private $configurableProduct;


    /** @var \Magento\ConfigurableSampleDataVenia\Setup\Swatches */
    protected $swatches;

    /**
     * InstallConfigurableSampleData constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param Attribute $attribute
     * @param Category $category
     * @param ProductImport $configurableProduct
     * @param Swatches $swatches
     */
    public function __construct(
        SetSession $setSession,
        ModuleDataSetupInterface $moduleDataSetup,
        Attribute $attribute,
        Category $category,
        Product $configurableProduct,
        Swatches $swatches)
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->attribute = $attribute;
        $this->category = $category;
        $this->configurableProduct = $configurableProduct;
        $this->swatches = $swatches;
    }


    public function apply()
    {
        $this->attribute->install(['Magento_ConfigurableSampleDataVenia::fixtures/attributes.csv']);
        $this->swatches->install();
        $this->category->install(['Magento_ConfigurableSampleDataVenia::fixtures/categories.csv']);
        $this->configurableProduct->install('Magento_ConfigurableSampleDataVenia','fixtures/products.csv');
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
        return [//SetSession::class

        ];
    }
    public static function getVersion(){
        return '0.0.0';
    }
}
