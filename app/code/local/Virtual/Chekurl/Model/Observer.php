<?php
class Virtual_Chekurl_Model_Observer
{
    public function CheckUnicUrl($observer)
    {
        if (Mage::getStoreConfig('virtual/virtual_group/virtual_input',Mage::app()->getStore())){
            $product = $observer->getEvent()->getProduct();
            $productResource = $product->getResource();
            $urlKeyAttribute = $productResource->getAttribute('url_key');
            $oldUrl = $product->getUrlKey();
            $i = 1;
            while (!$productResource->checkAttributeUniqueValue($urlKeyAttribute, $product)){
                $product->setUrlKey($this->getMethod($oldUrl, $i));
                $i++;
            }
        }

    }
    public function changeUrlHash($prefix){

        $urlKey = uniqid($prefix . '-');
        return $urlKey;
    }

    public function changeUrlInc($prefix, $inc){

        $urlKey = $prefix . '-' . $inc;
        return $urlKey;
    }

    public function changeUrlRand($prefix){

        $urlKey = $prefix . '-' . rand(1, 999999);
        return $urlKey;
    }


    public function getMethod($prefix, $inc)
    {
        switch (Mage::getStoreConfig('virtual/virtual_group/virtual_select',Mage::app()->getStore())){
            case Virtual_Chekurl_Model_Changemetodsource::UNIQUE_URL_KEY_SUFFIX_HASH: $urlKey = $this->changeUrlHash($prefix);
                break;
            case Virtual_Chekurl_Model_Changemetodsource::UNIQUE_URL_KEY_SUFFIX_INC: $urlKey = $this->changeUrlInc($prefix, $inc);
                break;
            case Virtual_Chekurl_Model_Changemetodsource::UNIQUE_URL_KEY_SUFFIX_RANDOM: $urlKey = $this->changeUrlRand($prefix);
                break;
            default: break;
        }
        return $urlKey;
    }
}