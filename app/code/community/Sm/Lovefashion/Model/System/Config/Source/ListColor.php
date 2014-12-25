<?php
/*------------------------------------------------------------------------
 # SM Lovefashion - Version 1.1
 # Copyright (c) 2013 The YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Lovefashion_Model_System_Config_Source_ListColor
{
	public function toOptionArray()
	{	
		return array(
		array('value'=>'red', 'label'=>Mage::helper('lovefashion')->__('Red')),
		array('value'=>'orange', 'label'=>Mage::helper('lovefashion')->__('Orange')),
		array('value'=>'violet', 'label'=>Mage::helper('lovefashion')->__('Violet')),
		array('value'=>'green', 'label'=>Mage::helper('lovefashion')->__('Green')),
		array('value'=>'blue', 'label'=>Mage::helper('lovefashion')->__('Blue'))
		/* array('value'=>'yellow', 'label'=>Mage::helper('lovefashion')->__('Yellow')) */
		);
	}
}
