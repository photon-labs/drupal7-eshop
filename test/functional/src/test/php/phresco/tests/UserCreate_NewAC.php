<?php
/*Author by {phresco} QA Automation Team*/

require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class UserCreate_NewAC extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testNewAC()
	{   
	   $testCaseName = __FUNCTION__;
		parent::Title();
		$name;
		$email;
		$password;
		$confirmpassword;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('test-classes/phresco/tests/Drupal7Data.xml');
		$users = $doc->getElementsByTagName("register");
		foreach( $users as $register )
		{
			$names = $register->getElementsByTagName("username");
			$name = $names->item(0)->nodeValue;
			$emails = $register->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
			$passwords = $register->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
			$confirmpass = $register->getElementsByTagName("confirmpass");
			$confirmpassword = $confirmpass->item(0)->nodeValue;
		}
		
		    $this->clickandLoad(DRU_MENU_SIGNUP_LINK);
			$this->getElement(DRU_SIGN_UNAME,$testCaseName);
			$this->type(DRU_SIGN_UNAME,$name);
		    $this->getElement(DRU_SIGN_EMAIL,$testCaseName);
		    $this->type(DRU_SIGN_EMAIL,$email);
			$this->getElement(DRU_SIGN_PASS1,$testCaseName);
			$this->type(DRU_SIGN_PASS1,$password);
			$this->getElement(DRU_SIGN_PASS2,$testCaseName);
			$this->type(DRU_SIGN_PASS2,$confirmpassword);
		    $this->clickandLoad(DRU_SIGN_SUBMIT);
		try {
			$this->assertTrue($this->isTextPresent(DRU_SIGN_TXT_SUC));
		    } 
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		 	$this->doCreateScreenShot(__FUNCTION__);
		}	
		$this->getElement(DRU_LOGOUT_TEXT,$testCaseName);
		$this->DoLogout();
		sleep(2);
	}
}
?>