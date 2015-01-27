<?php

class Bkt_Printimages_Model_Resource_Setup extends Mage_Core_Model_Resource_Setup {

	public function startSetup()
    {
		Mage::log("[bktlog] startSetup");
        $this->getConnection()->startSetup();
        return $this;
    }

    public function endSetup()
    {
		Mage::log("[bktlog] endSetup");
        $this->getConnection()->endSetup();
        return $this;
    }
}

