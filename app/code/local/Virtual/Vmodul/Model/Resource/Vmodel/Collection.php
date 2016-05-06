<?php
class Virtual_Vmodul_Model_Resource_Vmodel_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('virtual_vmodul/vmodel');
    }
}