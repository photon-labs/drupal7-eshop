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