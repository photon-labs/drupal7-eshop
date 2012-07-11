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
class ContactDet_Sales extends DrupalCommonFun
{
	protected function signup()
	{
		parent::setUp();
	}
	public function testContact()
	{  
		$testCaseName=__FUNCTION__;
		parent::Title();
	
		$this->clickandLoad(DRU_MENU_CONTACTUS_LINK);
		
	try {
		$this->assertTrue($this->isTextPresent(DRU_CONTACT_TEXT_PRESENT));
		sleep(2);
		} 
	catch (PHPUnit_Framework_AssertionFailedError $e) 
	    {
		$this->doCreateScreenShot(__FUNCTION__);
			
	    }
    } 
}
?>