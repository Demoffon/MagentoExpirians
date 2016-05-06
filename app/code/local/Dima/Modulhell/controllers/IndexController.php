<?php
class Dima_Modulhell_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        return ("Hello World");
    }

    Public function TestAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        echo Mage::helper('dima_modulhell')->setModule();
    }
}