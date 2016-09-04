<?php
echo 'Creating new column ...... wait ......'; die();
/* @var $this Mage_Eav_Model_Entity_Setup */

// Add an extra column to the eav/catalog_products table:
 
$installer = $this;
$connection = $installer->getConnection();
 
$installer->startSetup();
 
$installer->getConnection()
    ->addColumn($installer->getTable('eav/catalog_product_entity '),
    'lo',
    array(
        'type' => Varien_Db_Ddl_Table::TYPE_VARCHAR,
        'nullable' => false,
        'default' => '0',
        'comment' => 'Price reduction lo level (%)'
    )
);
$installer->getConnection()
    ->addColumn($installer->getTable('eav/catalog_product_entity '),
    'hi',
    array(
        'type' => Varien_Db_Ddl_Table::TYPE_VARCHAR,
        'nullable' => false,
        'default' => '100',
        'comment' => 'Price reduction hi level (%)'
    )
);
 
$installer->endSetup();