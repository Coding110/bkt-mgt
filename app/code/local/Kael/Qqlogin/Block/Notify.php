<?php
class Kael_Qqlogin_Block_Notify extends Mage_Core_Block_Template{

	public function getQqUserName(){
		$userInfo = Mage::helper('qqlogin')->getQqInfo();
		return $userInfo->nickname;
	}
    
    public function getPostActionUrl(){
    	return Mage::getUrl('qqlogin/index/createpost', array('_secure' => true));
    }

    public function getBindActionUrl(){
    	return Mage::getUrl('qqlogin/index/bind', array('_secure' => true));
    }
}