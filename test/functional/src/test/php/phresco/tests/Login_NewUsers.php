<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class Login_NewUsers extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testLogin()
	{
		parent::Title();
			
		try {
			if ($this->isElementPresent(DRU_MENU_SIGNUP_LINK))
			$this->clickAndWait(DRU_MENU_SIGNUP_LINK);
		}
		catch (Exception $e) {}
			
		parent::DoLogin(__FUNCTION__);
		parent::DoLogout(__FUNCTION__);


	}

}
?>