<?php
class Virtual_Orders_Model_Resource_Ware_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('virtual_orders/ware');
    }
}