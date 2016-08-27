<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.08.2016
 * Time: 23:27
 */
class Example_News_Model_News extends Mage_Core_Model_Abstract
{

    public function _construct()
    {
        parent::_construct();
        $this->_init('exnews/news');
    }

}