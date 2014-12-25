<?php
/*------------------------------------------------------------------------
 # SM Lovefashion - Version 1.1
 # Copyright (c) 2013 The YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Lovefashion_Model_System_Config_Source_ListMenuStyles
{
	public function toOptionArray()
	{	
		return array(
			array('value'=>'1', 'label'=>Mage::helper('lovefashion')->__('Mega')),
			array('value'=>'2', 'label'=>Mage::helper('lovefashion')->__('Css'))
			/* array('value'=>'3', 'label'=>Mage::helper('lovefashion')->__('Split')) */
		);
	}
}
