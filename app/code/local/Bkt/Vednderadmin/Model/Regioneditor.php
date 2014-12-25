<?php

class Bkt_Venderadmin_Model_Regioneditor extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('regioneditor/regioneditor');
    }
}
