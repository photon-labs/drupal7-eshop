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