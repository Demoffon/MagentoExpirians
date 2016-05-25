<?php
class Virtual_Orders_Model_Good extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('virtual_orders/good');
    }

    public function warehousesQtySave( $id, $sku, $qty)
    {
        $warehouse = Mage::getModel('virtual_orders/ware')->load($id,'id');
        if($warehouse && !$warehouse->getId()){
            throw new Exception("Warehouse with id" .$id. " does not exist");
        }
        $warehausesqty = $this->getCollection()
            ->addFieldToFilter('sku', $sku)
            ->addFieldToFilter('ware_id', $id)
            ->getFirstItem();

        if(!$warehausesqty->getId()){
            $warehausesqty->setSku($sku);
            $warehausesqty->setWareId($id);
            $warehausesqty->setQty(0);
        };

        $oldqty = $warehausesqty->getData('qty');
        $qty = max(($oldqty + $qty), 0);
        $warehausesqty->setQty($qty);
        $warehausesqty->save();

        return $qty - $oldqty;
    }

}