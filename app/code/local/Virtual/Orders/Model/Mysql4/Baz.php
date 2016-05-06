<?php

class Virtual_Orders_Model_Mysql4_Baz extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('virtual_orders/baz', 'id');
    }
}