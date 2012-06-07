<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class Home_Page extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testHome()
	{
		parent::Title();
		 
		if ($this->isElementPresent(DRU_MENU_HOME_LINK))
		$this->clickAndWait(DRU_MENU_HOME_LINK);
		$this->clickAndWait(DRU_HOME_NEXT);
		$this->clickAndWait(DRU_HOME_LAST);
		$this->clickAndWait(DRU_HOME_PREVIOUS);
		$this->clickAndWait(DRU_HOME_FIRST);

	}
}
?>