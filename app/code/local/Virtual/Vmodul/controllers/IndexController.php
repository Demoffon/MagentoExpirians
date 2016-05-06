<?php
class Virtual_Vmodul_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo 'controller<br />';
        echo Mage::helper('virtual_vmodul')->setModule() .'<br />';
        echo Mage::getModel('virtual_vmodul/vmodel')->getModelData();
    }
}