<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class UserReq_NewPassword extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testReqPassword()
	{
	    $testCaseName = __FUNCTION__;
		parent::Title();
		$email;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('test-classes/phresco/tests/drupalsetting.xml');
		$users = $doc->getElementsByTagName("register");
		foreach( $users as $register )
		{		
			$emails = $register->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
		}
		$this->clickandload(DRU_MENU_SIGNUP_LINK);
		$this->getElement(DRU_SIGN_REQ_PASS,$testCaseName);
		$this->clickandload(DRU_SIGN_REQ_PASS);
		$this->type(DRU_SIGN_MAIL,$email);
		$this->clickandload(DRU_SIGN_REQ_PASS_MAIL);
	}

}
?>