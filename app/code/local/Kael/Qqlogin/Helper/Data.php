<?php
class Kael_Qqlogin_Helper_Data extends Mage_Core_Helper_Abstract {

	/*
	*return object User.
	*/
	public function getQqInfo(){
		return $this->_getCoreSession()->getQqUser();
	}

    public function getOpenId(){
    	return Mage::getSingleton('core/session')->getOpenId();
    }

    public function getAppId(){
    	return Mage::getStoreConfig('qqlogin_options/qlogin_messages/qqlogin_appid');
    }

    public function getAppKey(){
    	return Mage::getStoreConfig('qqlogin_options/qlogin_messages/qqlogin_appkey');
    }

    public function getCallBackUrl(){
    	return Mage::getUrl('qqlogin/index/back', array('_secure' => true));
    }

    public function qqLoginRequest(){
    	//应用的APPID
		$app_id = $this->getAppId();
		//应用的APPKEY
		$app_secret = $this->getAppKey();
		//成功授权后的回调地址
		$my_url = $this->getCallBackUrl();

		$code = $_REQUEST["code"];
		
		if(empty($code)) 
		{
			//state参数用于防止CSRF攻击，成功授权后回调时会原样带回
			$this->_getCoreSession()->setQqSate(md5(uniqid(rand(), TRUE)));
			//$_SESSION['state'] = md5(uniqid(rand(), TRUE)); 
			//拼接URL
			$dialog_url = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=" 
				. $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
				. $this->_getCoreSession()->getQqSate();
			echo("<script> top.location.href='" . $dialog_url . "'</script>");
			return;
		}
		//Step2：通过Authorization Code获取Access Token
		if($_REQUEST['state'] == $this->_getCoreSession()->getQqSate()) 
		{
			//拼接URL	 
			$token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&"
			. "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
			. "&client_secret=" . $app_secret . "&code=" . $code;
			$response = file_get_contents($token_url);

			if (strpos($response, "callback") !== false)
			{
				$lpos = strpos($response, "(");
				$rpos = strrpos($response, ")");
				$response	= substr($response, $lpos + 1, $rpos - $lpos -1);
				$msg = json_decode($response);
				if (isset($msg->error))
				{
					Mage::getModel('customer/session')->addError('Failed to login with QQ!ERROR:'.$msg->error.', msg:'. $msg->error_description);
		    		return $this->_redirect('customer/account/login');
				}
		 	}
		 	//Step3：使用Access Token来获取用户的OpenID
			$params = array();
			parse_str($response, $params);
			$graph_url = "https://graph.qq.com/oauth2.0/me?access_token=".$params['access_token'];
			$str = file_get_contents($graph_url);
			if (strpos($str, "callback") !== false)
			{
				$lpos = strpos($str, "(");
				$rpos = strrpos($str, ")");
				$str = substr($str, $lpos + 1, $rpos - $lpos -1);
			}
			$user = json_decode($str);
			
			if (isset($user->error))
			{
				Mage::getModel('customer/session')->addError('Failed to login with QQ!ERROR:'.$user->error.', msg:'. $user->error_description);
	    		return $this->_redirect('customer/account/login');
			}
			//Step4:获取用户基础信息
			$getUserInfo = "https://graph.qq.com/user/get_user_info?access_token="
				.$params['access_token'] . "&oauth_consumer_key=" . $app_id . "&openid=" . $user->openid ;
			$str = file_get_contents($getUserInfo);
			$userInfo = json_decode($str);
			if (isset($userInfo->error))
			{
				Mage::getModel('customer/session')->addError('Failed to login with QQ!ERROR:'.$userInfo->error.', msg:'. $userInfo->error_description);
	    		return $this->_redirect('customer/account/login');
			}
			$openid = $user->openid;
			//存储user对象
			$this->_getCoreSession()->setQqUser($userInfo);
			Mage::getSingleton('core/session')->setOpenId($openid);
			return $openid;
    	}
	}

    public function _getCoreSession()
	{
		return Mage::getSingleton('core/session');
	}
	
}