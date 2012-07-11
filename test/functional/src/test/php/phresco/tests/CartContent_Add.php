<?php
/* Author by {phresco} QA Automation Team */

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
		    $this->getElement(DRU_PRODUCT_ACCESSOR,$testCaseName);
		   $this->clickandLoad(DRU_PRODUCT_ACCESSOR);
		   $this->getElement(DRU_COMPUTERS,$testCaseName);
		   $this->clickandLoad(DRU_COMPUTERS);
		   $this->getElement(DRU_PRODUCT_COMPUTER,$testCaseName);
		   $this->clickandLoad(DRU_PRODUCT_COMPUTER);
		   $this->getElement(DRU_TABLETS,$testCaseName);
		   $this->clickandLoad(DRU_TABLETS);
		    $this->getElement(DRU_PRODUCT_TABLET,$testCaseName);
		   $this->clickandLoad(DRU_PRODUCT_TABLET);
		   $this->getElement(DRU_MOBILE_PHONES,$testCaseName);
		   $this->clickandLoad(DRU_MOBILE_PHONES);
		   $this->getElement(DRU_PRODUCT_MOBILE,$testCaseName);
		   $this->clickandLoad(DRU_PRODUCT_MOBILE);
		   $this->getElement(DRU_VGAMES_LINK,$testCaseName);
		   $this->clickandLoad(DRU_VGAMES_LINK);
		    $this->getElement(DRU_PRODUCT_VGAME,$testCaseName);
		   $this->clickandLoad(DRU_PRODUCT_VGAME);
		   sleep(2);
	}
}
?>