<?php
class Virtual_Orders_Model_Source_Warehousename
{
    public function toOptionArray()
    {
        $warehouses = Mage::getSingleton('virtual_orders/ware')->getCollection();
        var_dump($warehouses->load()->toOptionHash());
        $arr = array();

        foreach ($warehouses as $warehouse) {
            $arr[] = array(
                'value'=>$warehouse->getId(),
                'label'=>$warehouse->getNameware()
            );
        }

        return $arr;
    }
    
    public function getOptions()
    {
        $warehouses = Mage::getSingleton('virtual_orders/ware')->getCollection();
        $arr = array();

        foreach ($warehouses as $warehouse) {
            $arr[$warehouse->getId()] = $warehouse->getNameware();
        }

        return $arr;
    }
}