<?php
/*
<!-- hellokeykey.com magentokey.com chinamagento.org -->
*/
class Hellokeykey_Regioneditor_Block_Adminhtml_Regioneditor_Form extends Mage_Adminhtml_Block_Template
{
	public function getCountryCollection()
	{
	    $countryCollection = Mage::getModel('directory/country_api')->items();
	    return $countryCollection;
	}
	public function tests()
	{
	    $cc="dddd"
	    return $cc;
	}
}