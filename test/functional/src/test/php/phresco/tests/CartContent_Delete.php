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
		   $this->clickandLoad(DRU_PRODUCT_MOBILE);
		   $this->getElement(DRU_VGAMES,$testCaseName);
		   $this->clickandLoad(DRU_VGAMES);
		   $this->clickandLoad(DRU_PRODUCT_VGAME);
		 
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