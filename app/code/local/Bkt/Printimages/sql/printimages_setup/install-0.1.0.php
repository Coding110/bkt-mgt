<?php

$installer = $this;
//throw new Exception("This is an exception to stop the 'printimages' installer from completing");
$installer->startSetup();

//$installer->addEntityType('albumsworks_eavalbums', array(
//    //entity_mode is the URI you'd pass into a Mage::getModel() call
//    'entity_model'    => 'albumsworks/eavalbums',
//
//    //table refers to the resource URI complexworld/eavblogpost
//    //<complexworld_resource>...<eavblogpost><table>eavblog_posts</table>
//    'table'           =>'albumsworks/eavalbums',
//));

//echo $installer->getTable('albumsworks/eavalbums')."<br>";
//Mage::log("[bktlog] printimages albums install");

$installer->run("
	CREATE TABLE `{$this->getTable('printimages/albums')}` (
		`album_id` int(11) NOT NULL auto_increment,
		`product_id` int(10) unsigned,
		`order_id` int(10),
		`img_host` varchar(255),
		`img_ids` text,
		`down_url` text,
		PRIMARY KEY  (`album_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

//$installer->createEntityTables(
//    $this->getTable('albumsworks/eavalbums')
//);

$installer->endSetup();

