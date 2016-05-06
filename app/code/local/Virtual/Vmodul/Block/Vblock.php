<?php
class Virtual_Vmodul_Block_Vblock extends Mage_Core_Block_Template
{
//    public function getBlockData()
//    {
//        $mydata = false;
//        $result = Mage::getModel('virtual_vmodul/vmodel')->load('Tits', 'title');
//
//        if ($result->getId()){
//            $mydata =  $result->getData();
//        } else {
//            $result->setDescription('test');
//            $result->setTitle('Tits');
//            $result->save();
//        }
//
//        return $mydata;
//    }
//    public function getBlockData()
//    {
//        $mydata = array();
//        $result = Mage::getModel('virtual_vmodul/vmodel')->getCollection();
//
//        $result->addFieldToSelect('title');
//        $result->addFieldToSelect('description');
//
//        $result->addFieldToFilter('title', array('in' => array('Tits', 'ruslan')));
//
//       foreach ($result as $object){
//          $mydata[] = $object->getData();
//       }
//
//        return $mydata;
//    }

    public function getBlockData()
    {
        $thing_1 = new Varien_Object();
        $thing_1->setName('Richard');
        $thing_1->setAge(24);

        $thing_2 = new Varien_Object();
        $thing_2->setName('Jane');
        $thing_2->setAge(12);

        $thing_3 = new Varien_Object();
        $thing_3->setName('Spot');
        $thing_3->setLastName('The Dog');
        $thing_3->setAge(7);

        $collection_of_things = new Varien_Data_Collection();
        $collection_of_things
            ->addItem($thing_1)
            ->addItem($thing_2)
            ->addItem($thing_3);


    }
}
