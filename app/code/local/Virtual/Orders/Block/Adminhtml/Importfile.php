<?php
class Virtual_Orders_Block_Adminhtml_Importfile extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(
            array('id' => 'import_form', 'enctype' => 'multipart/form-data','action' => $this->getUrl('*/*/importCSV'), 'method' => 'post')
        );

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('warehouses')->__('Import')));

        $fieldset->addField('file', 'file', array(
            'label'     => Mage::helper('warehouses')->__('Upload'),
            'value'  => 'upload',
            'disabled' => false,
            'name' => 'csv',
            'tabindex' => 1
        ));

        $fieldset->addField('submit', 'submit', array(
            'required'  => true,
            'value'  => 'Upload',
        ));

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }



}