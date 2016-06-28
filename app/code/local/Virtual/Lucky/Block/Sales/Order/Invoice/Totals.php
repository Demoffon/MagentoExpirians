<?php
class Virtual_Lucky_Block_Sales_Order_Invoice_Totals extends Mage_Adminhtml_Block_Sales_Order_Invoice_Totals
{
    /**
     * Initialize order totals array
     *
     * @return Mage_Sales_Block_Order_Totals
     */
    protected function _initTotals()
    {
        parent::_initTotals();
        $amount = Virtual_Lucky_Helper_Data::LUCKY_FEE;

        if ($amount) {
            $this->addTotalBefore(new Varien_Object(array(
                'code'      => 'virtual_lucky',
                'value'     => $amount,
                'base_value'=> $amount,
                'label'     => $this->helper('virtual_lucky')->__('Lucky'),
            ), array('shipping', 'tax')));
        }

        return $this;
    }

}