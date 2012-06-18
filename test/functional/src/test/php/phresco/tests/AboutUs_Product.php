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
class AboutUs_Product extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testAbout()
	{
		parent::Title();
		$property = new DrupalCommonFun;
			
		if ($this->isElementPresent(DRU_MENU_ABOUTUS_LINK))
		$this->clickAndWait(DRU_MENU_ABOUTUS_LINK);
		$property->waitForElementPresent('DRU_TEXT_PRESENT');
	 try {
	 	$this->assertTextPresent(DRU_TEXT_PRESENT);
	 	sleep(WAIT_FOR_NEXT_LINE);
	 }
	 catch (Exception $e) {
	 	parent::doCreateScreenShot(__FUNCTION__);
	 	array_push($this->verificationErrors, $e->toString());
	 }
	}
}
?>