<?php
namespace Saddemlabidi\Shopfinder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Shop extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('shopfinder_shops', 'entity_id');
    }
}
