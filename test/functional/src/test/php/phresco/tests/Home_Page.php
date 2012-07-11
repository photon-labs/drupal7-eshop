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
class Home_Page extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testHome()
	{
	     
       $testCaseName = __FUNCTION__;
    
		parent::Title();
		 
		$this->clickandLoad(DRU_MENU_HOME_LINK);
		$this->getElement(DRU_HOME_NEXT,$testCaseName);
		
		$this->clickandLoad(DRU_HOME_NEXT);
		$this->getElement(DRU_HOME_LAST,$testCaseName);
		
		$this->clickandLoad(DRU_HOME_LAST);
		$this->getElement(DRU_HOME_PREVIOUS,$testCaseName);
		
		$this->clickandLoad(DRU_HOME_PREVIOUS);
		$this->getElement(DRU_HOME_FIRST,$testCaseName);
		$this->clickandLoad(DRU_HOME_FIRST);
	}
}
?>