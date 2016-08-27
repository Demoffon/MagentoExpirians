<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.08.2016
 * Time: 23:30
 */
class Example_News_Model_Resource_News_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('exnews/news');
    }

}