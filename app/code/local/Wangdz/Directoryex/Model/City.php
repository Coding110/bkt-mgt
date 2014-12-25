<?php
class Wangdz_Directoryex_Model_City extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('wangdz_directoryex/city');
    }

    public function getName()
    {
        $name = $this->getData('name');
        if (is_null($name)) {
            $name = $this->getData('default_name');
        }
        return $name;
    }

    public function loadById($cityId, $regionId)
    {
    	$this->_getResource()->loadById($this, $cityId, $regionId);
        return $this;
    }

    public function loadByName($cityName, $regionId)
    {
        $this->_getResource()->loadByName($this, $cityName, $regionId);
        return $this;
    }
    public function getDistrictCollection()
    {
    	$collection = Mage::getResourceModel('wangdz_directoryex/district_collection');
    	$collection->addCityFilter($this->getId());
    	return $collection;
    }

}
