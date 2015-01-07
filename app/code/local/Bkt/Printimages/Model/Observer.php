<?php

class Bkt_Printimages_Model_Observer{
	const PRINT_IMG_PATH = 'print_images_path';

	public function AddCoustomOptionToProduct($observer){

		// add 'images_path' custom option and 'product_owner' attribute
		// Notice: check if the two exist first

		$event = $observer->getEvent();
    	$product = $event->getProduct();
		
		if($this->checkOptions($product, $this::PRINT_IMG_PATH) == true) {
			Mage::log('[bktlog] product has '.$this::PRINT_IMG_PATH);
			return;
		}
		$optionData = array(
        	    'title' => $this::PRINT_IMG_PATH,
        	    'type' => 'area',
        	    'is_require' => 0,
        	    'sort_order' => 1,
		);

		$optionInstance = $product->getOptionInstance()->unsetOptions();
		$product->setHasOptions(1);
		$ret = $optionInstance->addOption($optionData);
		Mage::log('[bktlog] addOption: '.$ret);
		$ret = $optionInstance->setProduct($product);
		Mage::log('[bktlog] setProduct: '.$ret);
		$ret = $product->getResource()->save($product);
		Mage::log('[bktlog] Product save: '.$ret);
		Mage::log('[bktlog] added option: '.$optionData['title']);
		//Mage::log('[bktlog] added option: '.$option['title'].', html: '.$optionInstance.getValuesHtml());

	}

	public function checkOptions($product, $option_name){
		$customoptions = $product->getOptions();
		Mage::log('[bktlog] product custom options size: '.count($customoptions));
		foreach ( $customoptions as $option)
		{
			//Mage::log('[bktlog] product option name: '.$option['title'].', type: '.$option->getType());
			Mage::log('[bktlog] product option name: '.$option['title'].', type: '.$option->getType().', html: '.$option->getOptionHtml($option));
			//print_r($option);
			if($this::PRINT_IMG_PATH == $option['title']) return true;  
		}

		Mage::log('[bktlog] have not product option \''.$this::PRINT_IMG_PATH.'\'.'); 
		return false;
	}

	public function setAttributeValueAuto($observer){
		//Mage::log('[bktlog] catalog_product_new_action');
		
		$event = $observer->getEvent();
		$product = $event->getProduct();
		Mage::log('[bktlog] New product type: '.$product->getTypeID());
		if($product->getTypeID() == "simple"){
			$added_by = "added_by";
			$attr_model = Mage::getModel('catalog/resource_eav_attribute');
			$attr = $attr_model->loadByCode('catalog_product', $added_by);
			$attr_id = $attr->getAttributeId();
			Mage::log('[bktlog] Attribute \''.$added_by.'\': '.$attr_id.', type: '.$product->getTypeID());
			$data = array();
			//var_dump($attr);
			
			$attr_opts = Mage::getModel('eav/entity_attribute_source_table');
			$attr_table = $attr_opts->setAttribute($attr);
			$opts = $attr_opts->getAllOptions(true);
			//unset($opts[0]);
			//unset($opts[2]);
			//unset($opts[3]);
			//var_dump($opts);
		}
	}
}

?>
