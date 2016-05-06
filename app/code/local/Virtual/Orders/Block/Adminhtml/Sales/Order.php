<?php

class Virtual_Orders_Block_Adminhtml_Sales_Order extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'virtual_orders';
        $this->_controller = 'adminhtml_sales_order';
        $this->_headerText = Mage::helper('virtual_orders')->__('Orders - Virtual');

        parent::__construct();
        $this->_removeButton('add');
    }
}