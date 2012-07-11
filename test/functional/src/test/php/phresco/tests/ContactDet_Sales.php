<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
class ContactDet_Sales extends DrupalCommonFun
{
	protected function signup()
	{
		parent::setUp();
	}
	public function testContact()
	{  
		$testCaseName=__FUNCTION__;
		parent::Title();
	
		$this->clickandLoad(DRU_MENU_CONTACTUS_LINK);
		
	try {
		$this->assertTrue($this->isTextPresent(DRU_CONTACT_TEXT_PRESENT));
		sleep(2);
		} 
	catch (PHPUnit_Framework_AssertionFailedError $e) 
	    {
		$this->doCreateScreenShot(__FUNCTION__);
			
	    }
    } 
}
?>