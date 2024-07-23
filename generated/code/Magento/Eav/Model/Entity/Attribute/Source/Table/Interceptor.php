<?php
namespace Magento\Eav\Model\Entity\Attribute\Source\Table;

/**
 * Interceptor class for @see \Magento\Eav\Model\Entity\Attribute\Source\Table
 */
class Interceptor extends \Magento\Eav\Model\Entity\Attribute\Source\Table implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Eav\Model\ResourceModel\Entity\Attribute\Option\CollectionFactory $attrOptionCollectionFactory, \Magento\Eav\Model\ResourceModel\Entity\Attribute\OptionFactory $attrOptionFactory, ?\Magento\Store\Model\StoreManagerInterface $storeManager = null)
    {
        $this->___init();
        parent::__construct($attrOptionCollectionFactory, $attrOptionFactory, $storeManager);
    }

    /**
     * {@inheritdoc}
     */
    public function getAllOptions($withEmpty = true, $defaultValues = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAllOptions');
        return $pluginInfo ? $this->___callPlugins('getAllOptions', func_get_args(), $pluginInfo) : parent::getAllOptions($withEmpty, $defaultValues);
    }

    /**
     * {@inheritdoc}
     */
    public function getSpecificOptions($ids, $withEmpty = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSpecificOptions');
        return $pluginInfo ? $this->___callPlugins('getSpecificOptions', func_get_args(), $pluginInfo) : parent::getSpecificOptions($ids, $withEmpty);
    }

    /**
     * {@inheritdoc}
     */
    public function getOptionText($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getOptionText');
        return $pluginInfo ? $this->___callPlugins('getOptionText', func_get_args(), $pluginInfo) : parent::getOptionText($value);
    }

    /**
     * {@inheritdoc}
     */
    public function addValueSortToCollection($collection, $dir = 'ASC')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addValueSortToCollection');
        return $pluginInfo ? $this->___callPlugins('addValueSortToCollection', func_get_args(), $pluginInfo) : parent::addValueSortToCollection($collection, $dir);
    }

    /**
     * {@inheritdoc}
     */
    public function getFlatColumns()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getFlatColumns');
        return $pluginInfo ? $this->___callPlugins('getFlatColumns', func_get_args(), $pluginInfo) : parent::getFlatColumns();
    }

    /**
     * {@inheritdoc}
     */
    public function getFlatIndexes()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getFlatIndexes');
        return $pluginInfo ? $this->___callPlugins('getFlatIndexes', func_get_args(), $pluginInfo) : parent::getFlatIndexes();
    }

    /**
     * {@inheritdoc}
     */
    public function getFlatUpdateSelect($store)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getFlatUpdateSelect');
        return $pluginInfo ? $this->___callPlugins('getFlatUpdateSelect', func_get_args(), $pluginInfo) : parent::getFlatUpdateSelect($store);
    }

    /**
     * {@inheritdoc}
     */
    public function setAttribute($attribute)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setAttribute');
        return $pluginInfo ? $this->___callPlugins('setAttribute', func_get_args(), $pluginInfo) : parent::setAttribute($attribute);
    }

    /**
     * {@inheritdoc}
     */
    public function getAttribute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAttribute');
        return $pluginInfo ? $this->___callPlugins('getAttribute', func_get_args(), $pluginInfo) : parent::getAttribute();
    }

    /**
     * {@inheritdoc}
     */
    public function getOptionId($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getOptionId');
        return $pluginInfo ? $this->___callPlugins('getOptionId', func_get_args(), $pluginInfo) : parent::getOptionId($value);
    }

    /**
     * {@inheritdoc}
     */
    public function getIndexOptionText($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getIndexOptionText');
        return $pluginInfo ? $this->___callPlugins('getIndexOptionText', func_get_args(), $pluginInfo) : parent::getIndexOptionText($value);
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toOptionArray');
        return $pluginInfo ? $this->___callPlugins('toOptionArray', func_get_args(), $pluginInfo) : parent::toOptionArray();
    }
}
