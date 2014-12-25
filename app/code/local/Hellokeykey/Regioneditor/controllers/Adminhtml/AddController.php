<?php
/**
<!-- hellokeykey.com magentokey.com chinamagento.org -->
**/
class Hellokeykey_Regioneditor_Adminhtml_AddController extends Mage_Adminhtml_Controller_Action
{

 public function indexAction()
    {
        		//Get current layout state
		$this->loadLayout();
		
		//Create core block based on inchoo/example_core_block.phtml template (view) file
		//Note the location "adminhtml"... needs to be there since this is admin controller
		$block = $this->getLayout()->createBlock(
			'Mage_Core_Block_Template',
			'my_block_name_here',
			array('template' => 'regioneditor/addform.phtml')
		);
		
		
		
		
		$this->getLayout()->getBlock('content')->append($block);
		//Below example does the same thing, and looks cooler :)
		//$this->_addContent($block);
		
		//Release layout stream... lol... sounds fancy
		$this->renderLayout();
    }
    
	 public function addAction()
    {
        $post = $this->getRequest()->getPost();
        try {
            if (empty($post)) {
                Mage::throwException($this->__('Invalid form data.'));
            }
            
            /* here's your form processing */
			$region_code = $this->getRequest()->getParam('RegionCode');
			$region_name = $this->getRequest()->getParam('RegionName');
			/* begin */
			
			$directory_country_region_table_name = Mage::getSingleton('core/resource')->getTableName('directory/country_region');
			$directory_country_region_name_table_name = Mage::getSingleton('core/resource')->getTableName('directory/country_region_name');
			
			/*$country_code = 'CN';*/
			$country_code = 'CN'; /*$this->getRequest()->getParam('country_id');*/
 
			// specify locale
			/*$locale = 'zh_CN';*/
			$locale = 'en_US';
			
			// create our core_write conection object
			$connection = Mage::getSingleton('core/resource')->getConnection('core_write');
			
			// iterate our new regions
			
			
			// insert region 
			$sql = "INSERT INTO `$directory_country_region_table_name` (`region_id`,`country_id`,`code`,`default_name`) VALUES (NULL,?,?,?)";
			$connection->query($sql,array($country_code,$region_code,$region_name));
			
			// get new region id for next query
			$region_id = $connection->lastInsertId();
			
			// insert region name
			$sql = "INSERT INTO `$directory_country_region_name_table_name` (`locale`,`region_id`,`name`) VALUES (?,?,?)";
			$connection->query($sql,array($locale,$region_id,$region_name));
			
			
			
			/* end */
            
            $message = $this->__("Your form has been submitted successfully.");
            Mage::getSingleton('adminhtml/session')->addSuccess($message);
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
        $this->_redirect('*/*');
    }


}
