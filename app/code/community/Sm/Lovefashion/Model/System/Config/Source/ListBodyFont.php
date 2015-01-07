<?php
/*------------------------------------------------------------------------
 # SM Lovefashion - Version 1.1
 # Copyright (c) 2013 The YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Lovefashion_Model_System_Config_Source_ListBodyFont
{
	public function toOptionArray()
	{	
		return array(
			array('value'=>'Roboto Regular', 'label'=>Mage::helper('lovefashion')->__('Roboto Regular')),
			array('value'=>'Arial', 'label'=>Mage::helper('lovefashion')->__('Arial')),
			array('value'=>'Arial Black', 'label'=>Mage::helper('lovefashion')->__('Arial-black')),
			array('value'=>'Courier New', 'label'=>Mage::helper('lovefashion')->__('Courier New')),
			array('value'=>'Georgia', 'label'=>Mage::helper('lovefashion')->__('Georgia')),
			array('value'=>'Impact', 'label'=>Mage::helper('lovefashion')->__('Impact')),
			array('value'=>'Lucida Console', 'label'=>Mage::helper('lovefashion')->__('Lucida-console')),
			array('value'=>'Lucida Settingde', 'label'=>Mage::helper('lovefashion')->__('Lucida-settingde')),
			array('value'=>'Palatino', 'label'=>Mage::helper('lovefashion')->__('Palatino')),
			array('value'=>'Tahoma', 'label'=>Mage::helper('lovefashion')->__('Tahoma')),
			array('value'=>'Times New Roman', 'label'=>Mage::helper('lovefashion')->__('Times New Roman')),	
			array('value'=>'Trebuchet', 'label'=>Mage::helper('lovefashion')->__('Trebuchet')),	
			array('value'=>'Verdana', 'label'=>Mage::helper('lovefashion')->__('Verdana'))		
		);
	}
}
