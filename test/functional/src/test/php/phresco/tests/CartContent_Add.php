<?php
/* 

Author by {phresco} QA Automation Team 

*/

require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class CartContent_Add extends DrupalCommonFun
{
	protected function cartContent()
	{
		parent::setUp();
	}
	public function testCartContent()
	{
		parent::Title();
		   $testCaseName=__FUNCTION__;
		   $this->getElement(DRU_ACCESSORIES,$testCaseName);
		   $this->clickandLoad(DRU_ACCESSORIES);
		   $this->clickandLoad(DRU_PRODUCT_ACCESSOR);
		   $this->getElement(DRU_COMPUTERS,$testCaseName);
		   $this->clickandLoad(DRU_COMPUTERS);
		   $this->clickandLoad(DRU_PRODUCT_COMPUTER);
		   $this->getElement(DRU_TABLETS,$testCaseName);
		   $this->clickandLoad(DRU_TABLETS);
		   $this->clickandLoad(DRU_PRODUCT_TABLET);
		   $this->getElement(DRU_MOBILE_PHONES,$testCaseName);
		   
		   $this->clickandLoad(DRU_MOBILE_PHONES);
		   $this->clickandLoad(DRU_PRODUCT_MOBILE);
		   $this->getElement(DRU_VGAMES,$testCaseName);
		   $this->clickandLoad(DRU_VGAMES);
		   $this->clickandLoad(DRU_PRODUCT_VGAME);
	}
}
?>