<?php
/* Author by {phresco} QA Automation Team*/
require_once 'DrupalCommonFun.php';
class CreateNewAC extends DrupalCommonFun
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
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('test-classes/phresco/tests/Drupal7Data.xml');
		$users = $doc->getElementsByTagName("user");
		foreach( $users as $user )
		{
			$names = $user->getElementsByTagName("username");
			$name = $names->item(0)->nodeValue;
			
			$emails = $user->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
		}
	       
		   $this->clickandLoad(DRU_CREATE_AC_LINK);	
		   sleep(5);
           $this->getElement(DRU_CREATE_AC_CLICK_UNAME,$testCaseName);		   
		   $this->type(DRU_CREATE_AC_CLICK_UNAME,$name);
		   $this->getElement(DRU_CREATE_AC_CLICK_EMAIL,$testCaseName);
		   $this->type(DRU_CREATE_AC_CLICK_EMAIL,$email);
		   $this->getElement(DRU_CREATE_AC_CLICK_SUBMIT,$testCaseName);
		   $this->clickandLoad(DRU_CREATE_AC_CLICK_SUBMIT);
		    $this->getElement(DRU_SIGN_TXT_SUC,$testCaseName);
		   
        try {
			$this->assertTrue($this->isTextPresent(DRU_SIGN_TXT_SUC));
		} 
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		 	$this->doCreateScreenShot(__FUNCTION__);
			
		}
	}
}
?>