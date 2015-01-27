<?php

class Bkt_Printimages_Model_Albums extends Mage_Core_Model_Mysql4_Abstract {

    protected function _construct()
    {
		Mage::log("[bktlog] Bkt_Printimages_Model_Albums construct");
        $this->_init('printimages/albums');
    }
}

