<?php
class Kael_Qqlogin_Block_Headimg extends Mage_Core_Block_Template{
     
    public function _construct()
    {
        $this->setTemplate('qqlogin/headimg.phtml');
    }

    public function getLoginActionUrl(){
    	return Mage::getUrl('qqlogin/index/back', array('_secure' => true));
    }
}