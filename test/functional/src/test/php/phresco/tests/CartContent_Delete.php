<?php
/* Author by {phresco} QA Automation Team*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class CartContent_Delete extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testRemove()
	{
		parent::Title();
		  $testCaseName=__FUNCTION__;
	       $this->getElement(DRU_MOBILE_PHONES,$testCaseName);
		   $this->clickandLoad(DRU_MOBILE_PHONES);
		   $this->getElement(DRU_PRODUCT_MOBILE,$testCaseName);
		   $this->clickandLoad(DRU_PRODUCT_MOBILE);
		   $this->getElement(DRU_VGAMES,$testCaseName);
		   $this->clickandLoad(DRU_VGAMES);
		   $this->getElement(DRU_PRODUCT_VGAME,$testCaseName);
		   $this->clickandLoad(DRU_PRODUCT_VGAME);
		 $this->getElement(DRU_REMOVE,$testCaseName);
		   $this->clickandLoad(DRU_REMOVE);
		   sleep(2);
	    try {
			$this->assertTrue($this->isTextPresent(DRU_CONFORM_REMOVE));
		    } 
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		 	$this->doCreateScreenShot(__FUNCTION__);
			
		}
	}
}
?>