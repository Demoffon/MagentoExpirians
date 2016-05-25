<?php
class Virtual_Orders_Adminhtml_GoodController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        // Let's call our initAction method which will set some basic params for each action
        $this->_initAction();

        $this->_addContent($this->getLayout()->createBlock('virtual_orders/adminhtml_importfile'));
        $this->renderLayout();
    }

    public function newAction()
    {
        // We just forward the new action to a blank edit form
        $this->_forward('edit');
    }

    public function importFileAction()
    {
        if ($this->getRequest()->getPost()){
            $connection = Mage::getSingleton('core/resource')->getConnection('core_write');
            if ($this->_validationFile()){
                $csv = new Varien_File_Csv();
                $data = $csv->getData($_FILES['csv']['tmp_name']);
                $wrongSaveProduct = 0;
                $successCount = 0;
                $convertData = Mage::helper('virtual_orders')->convertFirstLineOfArrayToKey($data);

                foreach($convertData as $record){
                        $connection->beginTransaction();
                        try{
                            $resultQty = Mage::getModel('virtual_orders/good')->warehousesQtySave($record['warehouse'], $record['sku'], $record['qty']);
                            Mage::helper('virtual_orders')->changeProductQty($record['sku'], $resultQty);
                            $successCount++;
                            $connection->commit();
                        }catch (Exception $e){
                            $wrongSaveProduct++;
                            Mage::log("Product with sku ". $record['sku'] ." don't save", null, 'good.log', true);
                            /**
                             * rollback transaction
                             */
                            $connection->rollback();
                        }
                }

                if (!$wrongSaveProduct){
                    Mage::getSingleton('adminhtml/session')->addSuccess("Processed " .$successCount. " records. All product is saved");
                }else{
                    Mage::getSingleton('adminhtml/session')->addNotice("Processed " . ($successCount + $wrongSaveProduct) . " records: " . $successCount . " successfully and " . $wrongSaveProduct . " errors");
                }
                $this->_redirect('*/*/index', array('id' => $this->getRequest()->getParam('id')));
            }
            
        }
    }

    private function _validationFile(){
        $type = $_FILES["csv"]["type"];

        if (($type=="application/vnd.ms-excel") || ($type=="text/csv")) {
            return true;
        }

        Mage::getSingleton('adminhtml/session')->addError("Not support file!! Only CSV type!");
        return false;
    }

    public function editAction()
    {
        $this->_initAction();

        // Get id if available
        $id  = $this->getRequest()->getParam('id');
        $model = Mage::getModel('virtual_orders/good');

        if ($id) {
            // Load record
            $model->load($id);

            // Check if record is loaded
            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This baz no longer exists.'));
                $this->_redirect('*/*/');

                return;
            }
        }

        $this->_title($model->getId() ? $model->getName() : $this->__('New Good'));

        $data = Mage::getSingleton('adminhtml/session')->getBazData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('virtual_orders', $model);

        $this->_initAction()
            ->_addBreadcrumb($id ? $this->__('Edit') : $this->__('New'), $id ? $this->__('Edit') : $this->__('New'))
            ->_addContent($this->getLayout()->createBlock('virtual_orders/adminhtml_good_edit')->setData('action', $this->getUrl('*/*/save')))
            ->renderLayout();
    }

    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost()) {
            $model = Mage::getSingleton('virtual_orders/good');
            $model->setData($postData);

            try {
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The baz has been saved.'));
                $this->_redirect('*/*/');

                return;
            }
            catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this baz.'));
            }

            Mage::getSingleton('adminhtml/session')->setBazData($postData);
            $this->_redirectReferer();
        }
    }

    public function messageAction()
    {
        $data = Mage::getModel('virtual_orders/good')->load($this->getRequest()->getParam('id'));
        echo $data->getContent();
    }

    /**
     * Initialize action
     *
     * Here, we set the breadcrumbs and the active menu
     *
     * @return Mage_Adminhtml_Controller_Action
     */
    protected function _initAction()
    {
        $this->loadLayout()
            // Make the active menu match the menu config nodes (without 'children' inbetween)
            ->_setActiveMenu('catalog/virtual_orders_good')
            ->_title($this->__('Catalog'))->_title($this->__('Good'))
            ->_addBreadcrumb($this->__('Catalog'), $this->__('Catalog'))
            ->_addBreadcrumb($this->__('Good'), $this->__('Good'));

        return $this;
    }

    /**
     * Check currently called action by permissions for current user
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('sales/virtual_orders_good');
    }
}