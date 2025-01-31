<?php
namespace Magento\SalesGraphQlAux\Model\Resolver\SearchTerm;

/**
 * Interceptor class for @see \Magento\SalesGraphQlAux\Model\Resolver\SearchTerm
 */
class Interceptor extends \Magento\SalesGraphQlAux\Model\Resolver\SearchTerm implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Search\Model\Query $query)
    {
        $this->___init();
        parent::__construct($query);
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(\Magento\Framework\GraphQl\Config\Element\Field $field, $context, \Magento\Framework\GraphQl\Schema\Type\ResolveInfo $info, ?array $value = null, ?array $args = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'resolve');
        return $pluginInfo ? $this->___callPlugins('resolve', func_get_args(), $pluginInfo) : parent::resolve($field, $context, $info, $value, $args);
    }
}
