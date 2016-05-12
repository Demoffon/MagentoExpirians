<?php
class Virtual_Orders_Block_Adminhtml_Good extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        // The blockGroup must match the first half of how we call the block, and controller matches the second half
        // ie. foo_bar/adminhtml_baz
        $this->_blockGroup = 'virtual_orders';
        $this->_controller = 'adminhtml_good';
        $this->_headerText = $this->__('Good');

        parent::__construct();
    }
}