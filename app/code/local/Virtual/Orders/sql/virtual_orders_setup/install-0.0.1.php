<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();


$table = $installer->getConnection()
    // The following call to getTable('foo_bar/baz') will lookup the resource for foo_bar (foo_bar_mysql4), and look
    // for a corresponding entity called baz. The table name in the XML is foo_bar_baz, so ths is what is created.
    ->newTable($installer->getTable('virtual_orders/good'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'ID')
    ->addColumn('ware_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 0, array(
        'nullable'  => false,
    ), 'WareID')
    ->addColumn('sku', Varien_Db_Ddl_Table::TYPE_TEXT, 0, array(
        'nullable'  => true,
    ), 'Sku')
    ->addColumn('qty', Varien_Db_Ddl_Table::TYPE_INTEGER, 0, array(
        'nullable'  => true,
    ), 'Qty');

$installer->getConnection()->createTable($table);

$table = $installer->getConnection()

    ->newTable($installer->getTable('virtual_orders/ware'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'ID')
    ->addColumn('nameware', Varien_Db_Ddl_Table::TYPE_TEXT, 0, array(
        'nullable'  => false,
    ), 'Name');

$installer->getConnection()->createTable($table);

$installer->endSetup();