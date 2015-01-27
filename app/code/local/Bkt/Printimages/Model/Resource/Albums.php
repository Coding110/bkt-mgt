<?php

class Bkt_Printimages_Model_Resource_Albums extends Mage_Core_Model_Abstract {

    protected function _construct()
    {
		Mage::log("[bktlog] Bkt_Printimages_Model_Resource_Albums construct");
        $this->_init('printimages/albums', 'album_id');
    }
}

