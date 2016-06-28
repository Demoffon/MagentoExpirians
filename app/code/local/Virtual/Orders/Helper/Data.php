<?php

class Virtual_Orders_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function convertFirstLineOfArrayToKey($array)
    {
        $convertArray = array();
        for ($i=1; $i < count($array); $i++){
            $convertArray[] = array_combine($array[0], $array[$i]);
        }
        return $convertArray;
    }

    public function changeProductQty($sku, $resultQty)
    {
        $product = Mage::getModel('catalog/product')->loadByAttribute('sku',$sku);
        if($product && !$product->getId()){
            throw new Exception("Product with sku" .$sku. " does not exist");
        }

        $stockItem = Mage::getModel('cataloginventory/stock_item')->loadByProduct($product);
        $stockItem->setData('qty', ($stockItem->getData('qty') + $resultQty));
        $stockItem->save();
    }
}
