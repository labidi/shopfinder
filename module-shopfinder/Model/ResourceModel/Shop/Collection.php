<?php
namespace Saddemlabidi\Shopfinder\Model\ResourceModel\Shop;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Saddemlabidi\Shopfinder\Model\Shop as ShopModel;
use Saddemlabidi\Shopfinder\Model\ResourceModel\Shop as ShopResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init(ShopModel::class, ShopResource::class);
    }
}
