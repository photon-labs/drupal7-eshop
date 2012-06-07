<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class Myaccount extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testMyAccount()
	{
		parent::Title();		
		$currentpassword;
		$password;
		$email;
		$confirmpassword;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/drupalsetting.xml');

		$users = $doc->getElementsByTagName("myaccount");
		foreach( $users as $myaccount )
		{
			$currentpasswords = $myaccount->getElementsByTagName("currentpassword");
			$currentpassword = $currentpasswords->item(0)->nodeValue;
			
			$emails = $myaccount->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
			
			$passwords = $myaccount->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
			
			$confirmpass = $myaccount->getElementsByTagName("confirmpass");
			$confirmpassword = $confirmpass->item(0)->nodeValue;
			
		}
		parent::DoLogin(__FUNCTION__);
		$property->waitForElementPresent('DRU_MENU_MYACCOUNT_LINK');
		if ($this->isElementPresent(DRU_MENU_MYACCOUNT_LINK))
		$this->clickAndWait(DRU_MENU_MYACCOUNT_LINK);
		$this->clickAndWait(DRU_MYAC_EDIT);
		$property->waitForElementPresent('DRU_MYAC_CURPASS');
		$this->type(DRU_MYAC_CURPASS,$currentpassword);
		$property->waitForElementPresent('DRU_MYAC_MAIL');
		$this->type(DRU_MYAC_MAIL,$email);
		$property->waitForElementPresent('DRU_MYAC_NEWPASS');
		$this->type(DRU_MYAC_NEWPASS,$password);
		$property->waitForElementPresent('DRU_MYAC_CONFIRMPASS');
		$this->type(DRU_MYAC_CONFIRMPASS,$confirmpassword);
		$property->waitForElementPresent('DRU_MYAC_SAVE');
		$this->clickAndWait(DRU_MYAC_SAVE);
		try {
			$this->assertTrue($this->isTextPresent(DRU_MYAC_COFIRM_MSG));
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
		   parent::DoLogout(__FUNCTION__);

	}
}
?>