<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.08.2016
 * Time: 23:28
 */

class Example_News_Model_Resource_News extends Mage_Core_Model_Mysql4_Abstract
{

    public function _construct()
    {
        $this->_init('exnews/table_news', 'news_id');
    }

}