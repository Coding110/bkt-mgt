<?php
/**
<!-- hellokeykey.com magentokey.com chinamagento.org -->
**/
class Hellokeykey_Regioneditor_Adminhtml_DelectController extends Mage_Adminhtml_Controller_Action
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
			array('template' => 'regioneditor/delectform.phtml')
		);
		
		
		
		
		$this->getLayout()->getBlock('content')->append($block);
		//Below example does the same thing, and looks cooler :)
		//$this->_addContent($block);
		
		//Release layout stream... lol... sounds fancy
		$this->renderLayout();
    }
	
	
	public function delectAction()
    {
        $post = $this->getRequest()->getPost();
        try {
            if (empty($post)) {
                Mage::throwException($this->__('Invalid form data.'));
            }
            
           /* here's your form processing */
		    $directory_country_region_table_name = Mage::getSingleton('core/resource')->getTableName('directory/country_region');
			$region_id = $this->getRequest()->getParam('RegionID');
			$connection = Mage::getSingleton('core/resource')->getConnection('core_write');
			$sql = "DELETE FROM $directory_country_region_table_name WHERE $directory_country_region_table_name.region_id = ".$region_id."";
			

			$connection->query($sql);
			
			/*$sql = "DELETE FROM aaa_directory_country_region_name WHERE aaa_directory_country_region_name.region_id = ".$region_id."";*/
			
            
            $message = $this->__("Your form has been submitted successfully.");
            Mage::getSingleton('adminhtml/session')->addSuccess($message);
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
	    $this->_redirect('*/*');
    }
	
	
	
}
