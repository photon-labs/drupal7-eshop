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
	         $testCaseName = __FUNCTION__;
		     parent::Title();
		     $property = new DrupalCommonFun;
		
		    $this->getElement(DRU_MANUFACT_ACER,$testCaseName);
		    $this->clickandLoad(DRU_MANUFACT_ACER);
			  $this->getElement(DRU_MANUFACT_AKG,$testCaseName);
		    $this->clickandLoad(DRU_MANUFACT_AKG);
			  $this->getElement(DRU_MANUFACT_ALURATEK,$testCaseName);
		    $this->clickandLoad(DRU_MANUFACT_ALURATEK);
			  $this->getElement(DRU_MANUFACT_VELLO,$testCaseName);
		    $this->clickandLoad(DRU_MANUFACT_VELLO);
			  $this->getElement(DRU_MANUFACT_XBOX,$testCaseName);
		    $this->clickandLoad(DRU_MANUFACT_XBOX);
			  $this->getElement(DRU_MANUFACT_CANON,$testCaseName);
		    $this->clickandLoad(DRU_MANUFACT_CANON);
			
	}

}
?>