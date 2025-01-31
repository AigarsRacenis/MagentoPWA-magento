<?php
namespace Magento\ConfigurableProductGraphQl\Model\Resolver\AddConfigurableProductsToCart;

/**
 * Interceptor class for @see \Magento\ConfigurableProductGraphQl\Model\Resolver\AddConfigurableProductsToCart
 */
class Interceptor extends \Magento\ConfigurableProductGraphQl\Model\Resolver\AddConfigurableProductsToCart implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\QuoteGraphQl\Model\Cart\GetCartForUser $getCartForUser, \Magento\QuoteGraphQl\Model\Cart\AddProductsToCart $addProductsToCart, \Magento\Quote\Model\QuoteMutexInterface $quoteMutex)
    {
        $this->___init();
        parent::__construct($getCartForUser, $addProductsToCart, $quoteMutex);
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(\Magento\Framework\GraphQl\Config\Element\Field $field, $context, \Magento\Framework\GraphQl\Schema\Type\ResolveInfo $info, ?array $value = null, ?array $args = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'resolve');
        return $pluginInfo ? $this->___callPlugins('resolve', func_get_args(), $pluginInfo) : parent::resolve($field, $context, $info, $value, $args);
    }

    /**
     * {@inheritdoc}
     */
    public function run($context, array $args) : array
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'run');
        return $pluginInfo ? $this->___callPlugins('run', func_get_args(), $pluginInfo) : parent::run($context, $args);
    }
}
