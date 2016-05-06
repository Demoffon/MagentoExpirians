<?php
class Virtual_Vmodul_Model_Resource_Vmodel extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('virtual_vmodul/vmodel', 'id');
    }
}