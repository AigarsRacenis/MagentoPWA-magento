<?php
namespace Magento\CatalogGraphQl\DataProvider\Product\LayeredNavigation\Builder\Category;

/**
 * Interceptor class for @see \Magento\CatalogGraphQl\DataProvider\Product\LayeredNavigation\Builder\Category
 */
class Interceptor extends \Magento\CatalogGraphQl\DataProvider\Product\LayeredNavigation\Builder\Category implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\CatalogGraphQl\DataProvider\Category\Query\CategoryAttributeQuery $categoryAttributeQuery, \Magento\CatalogGraphQl\DataProvider\CategoryAttributesMapper $attributesMapper, \Magento\CatalogGraphQl\DataProvider\Product\LayeredNavigation\RootCategoryProvider $rootCategoryProvider, \Magento\Framework\App\ResourceConnection $resourceConnection, \Magento\CatalogGraphQl\DataProvider\Product\LayeredNavigation\Formatter\LayerFormatter $layerFormatter, \Magento\CatalogGraphQl\DataProvider\Product\LayeredNavigation\Builder\Aggregations\Category\IncludeDirectChildrenOnly $includeDirectChildrenOnly, \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory, \Magento\Framework\GraphQl\Query\Uid $uidEncoder)
    {
        $this->___init();
        parent::__construct($categoryAttributeQuery, $attributesMapper, $rootCategoryProvider, $resourceConnection, $layerFormatter, $includeDirectChildrenOnly, $categoryCollectionFactory, $uidEncoder);
    }

    /**
     * {@inheritdoc}
     */
    public function build(\Magento\Framework\Api\Search\AggregationInterface $aggregation, ?int $storeId) : array
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'build');
        return $pluginInfo ? $this->___callPlugins('build', func_get_args(), $pluginInfo) : parent::build($aggregation, $storeId);
    }
}
