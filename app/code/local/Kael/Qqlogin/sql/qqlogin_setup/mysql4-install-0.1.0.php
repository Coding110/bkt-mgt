<?php
$installer = $this;
/* @var $installer Mage_Customer_Model_Entity_Setup */

$installer->startSetup();

$installer->addAttribute('customer', 'qq_uid', array(
        'type'	 => 'varchar',
        'label'		=> 'QQ Uid',
        'visible'   => false,
		'required'	=> false
));

$installer->endSetup();
