<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25.08.2016
 * Time: 22:51
 */
class Example_News_Block_News extends Mage_Core_Block_Template
{

    public function getNewsCollection()
    {
        $newsCollection = Mage::getModel('exnews/news')->getCollection();
        $newsCollection->setOrder('created', 'DESC');
        return $newsCollection;
    }

}