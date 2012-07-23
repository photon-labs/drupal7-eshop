<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class AboutUs_Product extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testAbout()
	{
	    $testCaseName=__FUNCTION__;
		parent::Title();
	         $this->clickandLoad(DRU_MENU_ABOUTUS_LINK);
			
		try {
			$this->assertTrue($this->isTextPresent(DRU_TEXT_PRESENT));
			sleep(2);
		    } 
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		 	$this->doCreateScreenShot(__FUNCTION__);
			
		}
	}
}
?>