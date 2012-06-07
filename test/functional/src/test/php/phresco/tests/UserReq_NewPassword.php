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
		parent::Title();
		$email;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/drupalsetting.xml');

		$users = $doc->getElementsByTagName("register");
		foreach( $users as $register )
		{
							
			$emails = $register->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
		}
		
		try {
			if ($this->isElementPresent(DRU_MENU_SIGNUP_LINK))
			$this->clickAndWait(DRU_MENU_SIGNUP_LINK);
		}
		catch (Exception $e) {}
		$property->waitForElementPresent('DRU_SIGN_REQ_PASS');
		$this->clickAndWait(DRU_SIGN_REQ_PASS);
		
		$property->waitForElementPresent('DRU_SIGN_MAIL');
		$this->type(DRU_SIGN_MAIL,$email);
		$this->clickAndWait(DRU_SIGN_SUBMIT);
		try {
			$this->assertTrue($this->isTextPresent(DRU_TXT_PRE_INVALID_MAILID));
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
			


	}

}
?>