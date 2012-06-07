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
		$property = new DrupalCommonFun;
		try {
			if ($this->isElementPresent(DRU_ACCESSORIES))
			$this->clickAndWait(DRU_ACCESSORIES);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_ACCESSOR);
		try {
			if ($this->isElementPresent(DRU_AUDIO_DEVICES))
			$this->clickAndWait(DRU_AUDIO_DEVICES);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_AUDIODEV);
		try {
			if ($this->isElementPresent(DRU_MP3))
			$this->clickAndWait(DRU_MP3);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_MP3);
		try {
			if ($this->isElementPresent(DRU_TV))
			$this->clickAndWait(DRU_TV);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_TV);
		try {
			if ($this->isElementPresent(DRU_VGAMES))
			$this->clickAndWait(DRU_VGAMES);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_VGAME);
		
		$property->waitForElementPresent('DRU_CHECKOUT');
		try {
			if ($this->isElementPresent(DRU_CHECKOUT))
			$property->waitForElementPresent('DRU_CHECKOUT');
			$this->assertTrue($this->isElementPresent(DRU_CHECKOUT));
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
	}
}
?>