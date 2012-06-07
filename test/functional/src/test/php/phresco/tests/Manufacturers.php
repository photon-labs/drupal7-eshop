<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class Manufacturers extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testManufacturers()
	{
		parent::Title();
		$property = new DrupalCommonFun;
			
		try {
			if ($this->isElementPresent(DRU_MANUFACT_ACER))
			$this->clickAndWait(DRU_MANUFACT_ACER);
			if ($this->isElementPresent(DRU_MANUFACT_BLACKBERRY))
			$this->clickAndWait(DRU_MANUFACT_BLACKBERRY);
			if ($this->isElementPresent(DRU_MANUFACT_DM_ACCESSORIES))
			$this->clickAndWait(DRU_MANUFACT_DM_ACCESSORIES);
			if ($this->isElementPresent(DRU_MANUFACT_LG))
			$this->clickAndWait(DRU_MANUFACT_LG);
			if ($this->isElementPresent(DRU_MANUFACT_MP3))
			$this->clickAndWait(DRU_MANUFACT_MP3);
			if ($this->isElementPresent(DRU_MANUFACT_VIDEOACCESS))
			$this->clickAndWait(DRU_MANUFACT_VIDEOACCESS);
			if ($this->isElementPresent(DRU_MANUFACT_SONY))
			$this->clickAndWait(DRU_MANUFACT_SONY);
			if ($this->isElementPresent(DRU_MANUFACT_XBOX))
			$this->clickAndWait(DRU_MANUFACT_XBOX);
		}
		catch (Exception $e) {}
			
	}

}
?>