<?php
class Kael_Qqlogin_IndexController extends Mage_Core_Controller_Front_Action{

    public function backAction(){
    	$this->checkLoginState();
    	
		//调用helper类请求获取openid
		$openid = Mage::helper('qqlogin')->qqLoginRequest();
		
		$customer = Mage::getModel('customer/customer');
		$collection = $customer->getCollection()
    	 			->addAttributeToFilter('qq_uid', $openid)
    				->setPageSize(1);
		if($customer->getSharingConfig()->isWebsiteScope()) {
            $collection->addAttributeToFilter('website_id', Mage::app()->getWebsite()->getId());
        }
		$uidExist = (bool)$collection->count();
		if($uidExist){
			$existingCustomer = $collection->getFirstItem();
			$this->_getCustomerSession()->setCustomerAsLoggedIn($existingCustomer);
			$this->_redirect('customer/account');
			return;
		}
		$this->loadLayout();
        $this->renderLayout();
    }

    public function createpostAction(){
    	$this->checkLoginState();

        if ($this->getRequest()->isPost()) {
        	$customer = Mage::getModel('customer/customer');

        	$customer->setWebsiteId(Mage::app()->getStore()->getWebsiteId());

        	/*if($customer->getConfirmation()){
				$customer->setConfirmation(null);
				Mage::getResourceModel('customer/customer')->saveAttribute($customer, 'confirmation');
			}*/
			$customer->setId(null)
					->setSkipConfirmationIfEmail($this->getRequest()->getParam('is_subscribed'))
					->setFirstname($this->getRequest()->getParam('firstname'))
					->setLastname($this->getRequest()->getParam('lastname'))
					->setEmail($this->getRequest()->getParam('email'))
					->setPassword($this->getRequest()->getParam('password'))
					->setConfirmation($this->getRequest()->getParam('confirmation'))
					->setQqUid(Mage::helper('qqlogin')->getOpenId());

			$errors = array();
			$validationCustomer = $customer->validate();
			if (is_array($validationCustomer)) {
					$errors = array_merge($validationCustomer, $errors);
			}
			$validationResult = count($errors) == 0;

			if (true === $validationResult) {
				$customer->save();
				
				$this->_getCustomerSession()->addSuccess(
					$this->__('Thank you for registering with %s', Mage::app()->getStore()->getFrontendName()) .
					'. ' . 
					$this->__('You will receive welcome email with registration info in a moment.')
				);
				
				$customer->sendNewAccountEmail();
				
				$this->_getCustomerSession()->setCustomerAsLoggedIn($customer);
				$this->_redirect('customer/account');
				return;
			
			} else {
	 			$this->_getCustomerSession()->setCustomerFormData($customer->getData());
	 			$this->_getCustomerSession()->addError($this->__('Wrong with QQ login,please contact us.'));
				if (is_array($errors)) {
					foreach ($errors as $errorMessage) {
						$this->_getCustomerSession()->addError($errorMessage);
					}
				}
				
				$this->_redirect('customer/account/create');
				
			}
    	}
    }

    public function bindAction(){
    	$cus_email = $this->getRequest()->getParam('search_email');
    	$cus_pswd = $this->getRequest()->getParam('search_pswd');
    	$customer = Mage::getModel('customer/customer')
    		->setWebsiteId(Mage::app()->getStore()->getWebsiteId())
    		;

    	if(!empty($cus_email) && !empty($cus_pswd)){
			try {
	            $customer->authenticate($cus_email,$cus_pswd);
	        } catch (Mage_Core_Exception $e) {
	            $this->_getCustomerSession()->addError($this->__('The password is wrong,please have a check.'));
	    		$this->_redirect('customer/account/login');
	    		return;
        	}
    	}

    	$customer->loadByEmail($cus_email);

    	if(!$customer->getId()){
    		$this->_getCustomerSession()->addError($this->__('This email does not exist,please have a check.'));
    		$this->_redirect('customer/account/login');
    		return;
    	}
    	$qqUid = $customer->getQqUid();
    	if(!empty($qqUid)){
    		$this->_getCustomerSession()->addError($this->__('This email have already bind a QQ account,please have a check.'));
    		$this->_redirect('customer/account/login');
    		return;
    	}

    	$customer->setQqUid(Mage::helper('qqlogin')->getOpenId())->save();
    	$this->_getCustomerSession()->setCustomerAsLoggedIn($customer);
		$this->_redirect('customer/account');
		return;
    }

    private function checkLoginState(){
    	$session = $this->_getCustomerSession();
        if ($session->isLoggedIn()) {
        	$this->_getCustomerSession()->addError(
					$this->__('You are already log in.')
				);
            $this->_redirect('customer/account');
            return;
        }
    }

	private function _getCustomerSession()
	{
		return Mage::getSingleton('customer/session');
	}
}