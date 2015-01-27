<?php

class Bkt_Printimages_IndexController extends Mage_Core_Controller_Front_Action {

	public function indexAction() {
		echo "Album index";
		$albums = Mage::getModel('printimages/albums');
		$albums->load(1);
		//var_dump($albums);
	}

	public function installAction() {
		echo "Album module install";
		$albums = Mage::getModel('printimages/albums');
		$albums->load(1);
		//var_dump($albums);

		echo "<br>complete";
	}
}

