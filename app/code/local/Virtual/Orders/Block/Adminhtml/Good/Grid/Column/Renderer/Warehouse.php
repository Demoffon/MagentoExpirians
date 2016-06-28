<?php

class Virtual_Orders_Block_Adminhtml_Good_Grid_Column_Renderer_Warehouse extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $value =  $row->getData($this->getColumn()->getIndex());
        
        return '<span style="color:red;">'.$value.'</span>';

    }
}