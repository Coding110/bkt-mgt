<?php
/*------------------------------------------------------------------------
 # SM Lovefashion - Version 1.1
 # Copyright (c) 2013 YouTech Company. All Rights Reserved.
 # @license - Copyrighted Commercial Software
 # Author: YouTech Company
 # Websites: http://www.magentech.com
-------------------------------------------------------------------------*/

class Sm_Lovefashion_Model_System_Config_Source_ListGoogleFont
{
	public function toOptionArray()
	{	
		return array(
			
			array('value'=>'', 'label'=>Mage::helper('lovefashion')->__('No select')),
			array('value'=>'Roboto Condensed Regular', 'label'=>Mage::helper('lovefashion')->__('Roboto Condensed Regular')),
			array('value'=>'Anton', 'label'=>Mage::helper('lovefashion')->__('Anton')),
			array('value'=>'Questrial', 'label'=>Mage::helper('lovefashion')->__('Questrial')),
			array('value'=>'Kameron', 'label'=>Mage::helper('lovefashion')->__('Kameron')),
			array('value'=>'Oswald', 'label'=>Mage::helper('lovefashion')->__('Oswald')),
			array('value'=>'Open Sans', 'label'=>Mage::helper('lovefashion')->__('Open Sans')),
			array('value'=>'BenchNine', 'label'=>Mage::helper('lovefashion')->__('BenchNine')),
			array('value'=>'Droid Sans', 'label'=>Mage::helper('lovefashion')->__('Droid Sans')),
			array('value'=>'Droid Serif', 'label'=>Mage::helper('lovefashion')->__('Droid Serif')),
			array('value'=>'PT Sans', 'label'=>Mage::helper('lovefashion')->__('PT Sans')),
			array('value'=>'Vollkorn', 'label'=>Mage::helper('lovefashion')->__('Vollkorn')),
			array('value'=>'Ubuntu', 'label'=>Mage::helper('lovefashion')->__('Ubuntu')),
			array('value'=>'Neucha', 'label'=>Mage::helper('lovefashion')->__('Neucha')),
			array('value'=>'Cuprum', 'label'=>Mage::helper('lovefashion')->__('Cuprum'))
		);
	}
}
