<?php
class Virtual_Orders_Block_Adminhtml_Good_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        // Set some defaults for our grid
        $this->setDefaultSort('id');
        $this->setId('virtual_orders_good_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _getCollectionClass()
    {
        // This is the model we are using for the grid
        return 'virtual_orders/good_collection';
    }

    protected function _prepareCollection()
    {
        // Get and set our collection for the grid
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        // Add the columns that should appear in the grid
        $this->addColumn('id',
            array(
                'header'=> $this->__('ID'),
                'align' =>'right',
                'width' => '50px',
                'index' => 'id'
            )
        );
        
        $this->addColumn('ware_name',
            array(
                'header'=> $this->__('WareName'),
                'index' => 'ware_id',
                'sortable' => true,
                'type'  => 'options',
                'options' => Mage::getSingleton('virtual_orders/source_warehousename')->getOptions(),
            )
        );

        $this->addColumn('sku',
            array(
                'header'=> $this->__('Sku'),
                'index' => 'sku'
            )
        );

        $this->addColumn('qty',
            array(
                'header'=> $this->__('Qty'),
                'index' => 'qty'
            )
        );

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        // This is where our row data will link to
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }


}