<?php
class Virtual_Lucky_Model_Total_Quote extends Mage_Sales_Model_Quote_Address_Total_Abstract
{
    public function __construct()
    {
        $this->setCode('virtual_lucky');
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return Mage::helper('virtual_lucky')->__('Lucky');
    }

    /**
     * Collect totals information about insurance
     *
     * @param   Mage_Sales_Model_Quote_Address $address
     */
    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        parent::collect($address);
        if (($address->getAddressType() == 'billing')) {
            return $this;
        }

        $amount = Virtual_Lucky_Helper_Data::LUCKY_FEE;

        if ($amount) {
            $this->_addAmount($amount);
            $this->_addBaseAmount($amount);
        }

        return $this;
    }

    /**
     * Add giftcard totals information to address object
     *
     * @param   Mage_Sales_Model_Quote_Address $address
     */
    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        if (($address->getAddressType() == 'billing')) {
            $amount = Virtual_Lucky_Helper_Data::LUCKY_FEE;
            if ($amount != 0) {
                $address->addTotal(array(
                    'code'  => $this->getCode(),
                    'title' => $this->getLabel(),
                    'value' => $amount
                ));
            }
        }

        return $this;
    }
}