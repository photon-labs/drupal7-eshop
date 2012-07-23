<?php
/*Author by {phresco} QA Automation Team*/
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
	    $testCaseName = __FUNCTION__;
    	parent::Title();		
		$currentpassword;
		$password;
		$email;
		$confirmpassword;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('test-classes/phresco/tests/Drupal7Data.xml');

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
		    $this->DoLogin(__FUNCTION__);
			$this->getElement(DRU_MYAC_EDIT,$testCaseName);
		    $this->clickandLoad(DRU_MYAC_EDIT);
			$this->getElement(DRU_MYAC_CURPASS,$testCaseName);
			$this->type(DRU_MYAC_CURPASS,$currentpassword);
		    $this->getElement(DRU_MYAC_MAIL,$testCaseName);
			$this->clear(DRU_MYAC_MAIL,$testCaseName);
		    $this->type(DRU_MYAC_MAIL,$email);
			$this->getElement(DRU_MYAC_NEWPASS,$testCaseName);
			$this->type(DRU_MYAC_NEWPASS,$password);
			$this->getElement(DRU_MYAC_CONFIRMPASS,$testCaseName);
			$this->type(DRU_MYAC_CONFIRMPASS,$confirmpassword);
			$this->getElement(DRU_MYAC_SAVE,$testCaseName);
			sleep(5);
		    $this->clickandLoad(DRU_MYAC_SAVE);		
			$this->getElement(DRU_MYAC_COFIRM_MSG,$testCaseName);
			
		try {
			$this->assertTrue($this->isTextPresent(DRU_MYAC_COFIRM_MSG));
		    } 
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		 	$this->doCreateScreenShot(__FUNCTION__);
			
		}
		$this->getElement(DRU_MYAC_COFIRM_MSG,$testCaseName);
		$this->DoLogout();
		sleep(2);
	}
		

	}

?>