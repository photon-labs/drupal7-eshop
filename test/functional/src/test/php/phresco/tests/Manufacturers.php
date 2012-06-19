<?php /*
 * ###
 * PHR_DrupalEshop
 * %%
 * Copyright (C) 1999 - 2012 Photon Infotech Inc.
 * %%
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ###
 */ ?>
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