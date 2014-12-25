<?php
class Wangdz_Directoryex_Model_Resource_District_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    
    protected $_districtNameTable;

    protected $_cityTable;

    protected function _construct()
    {
        $this->_init('wangdz_directoryex/district');

        $this->_cityTable    = $this->getTable('wangdz_directoryex/country_city');
        $this->_districtNameTable = $this->getTable('wangdz_directoryex/country_district_name');

        $this->addOrder('district_id', Varien_Data_Collection::SORT_ORDER_ASC);
        $this->addOrder('default_name', Varien_Data_Collection::SORT_ORDER_ASC);
    }
    
    public function addCityFilter($cityId)
    {
        if (!empty($cityId)) {
            if (is_array($cityId)) {
                $this->addFieldToFilter('main_table.city_id', array('in' => $cityId));
            } else {
                $this->addFieldToFilter('main_table.city_id', $cityId);
            }
        }
        return $this;
    }

    
}
