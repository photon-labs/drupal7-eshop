<?php
/* 

Author by {phresco} QA Automation Team 

*/
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
		$property = new DrupalCommonFun;
		try {
			if ($this->isElementPresent(DRU_MP3))
			$this->clickAndWait(DRU_MP3);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_MP3);
		
		try {
			if ($this->isElementPresent(DRU_VGAMES))
			$this->clickAndWait(DRU_VGAMES);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_VGAME);
		$this->clickAndWait(DRU_REMOVE);
	 try {
	 	$this->assertTrue($this->isTextPresent(DRU_CONFORM_REMOVE));
	 	sleep(WAIT_FOR_NEXT_LINE);
	 }
	 catch (Exception $e)
	 {
	 	parent::doCreateScreenShot(__FUNCTION__);
	 	array_push($this->verificationErrors, $e->toString());
	 }
	}
}
?>