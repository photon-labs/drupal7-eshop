<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
class Home_Page extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testHome()
	{
	     
       $testCaseName = __FUNCTION__;
    
		parent::Title();
		 
		$this->clickandLoad(DRU_MENU_HOME_LINK);
		$this->getElement(DRU_HOME_NEXT,$testCaseName);
		
		$this->clickandLoad(DRU_HOME_NEXT);
		$this->getElement(DRU_HOME_LAST,$testCaseName);
		
		$this->clickandLoad(DRU_HOME_LAST);
		$this->getElement(DRU_HOME_PREVIOUS,$testCaseName);
		
		$this->clickandLoad(DRU_HOME_PREVIOUS);
		$this->getElement(DRU_HOME_FIRST,$testCaseName);
		$this->clickandLoad(DRU_HOME_FIRST);
	}
}
?>