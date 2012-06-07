<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class ContactDet_Sales extends DrupalCommonFun
{
	protected function signup()
	{
		parent::setUp();
	}
	public function testContact()
	{
		parent::Title();
		$property = new DrupalCommonFun;
		if ($this->isElementPresent(DRU_MENU_CONTACTUS_LINK))
		$this->clickAndWait(DRU_MENU_CONTACTUS_LINK);
		$property->waitForElementPresent('DRU_TXT_PRESENT');
		try {
			$this->assertElementPresent(DRU_TXT_PRESENT);
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
			
	}

}
?>