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
class Search_Products extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testSearch()
	{
		parent::Title();
		parent::DoLogin(__FUNCTION__);
		$audio;
		$blackberry;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/drupalsetting.xml');
		$users = $doc->getElementsByTagName("search");
		foreach( $users as $search )
		{
			$audios = $search->getElementsByTagName("audio");
			$audio = $audios->item(0)->nodeValue;
			
			$blackberrys = $search->getElementsByTagName("blackberry");
			$blackberry = $blackberrys->item(0)->nodeValue;
		}
		$property->waitForElementPresent('DRU_SEARCH');
		$this->click(DRU_SEARCH);
		$property->waitForElementPresent('DRU_SEARCH');
		$this->type(DRU_SEARCH,$audio);
		$this->clickAndWait(DRU_SEARCH_BUT);
		try {
			$this->assertTrue($this->isTextPresent(DRU_SEARCH_RESULT));
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_SEARCH_DESK_VAL);
		$this->clickAndWait(DRU_MENU_HOME_LINK);
		$property->waitForElementPresent('DRU_SEARCH');
		$this->click(DRU_SEARCH);
		$property->waitForElementPresent('DRU_SEARCH');
		$this->type(DRU_SEARCH,$blackberry);
		$this->clickAndWait(DRU_SEARCH_BUT);
		$property->waitForElementPresent('DRU_SEARCH_RESULT');
		try {
			$this->assertTrue($this->isTextPresent(DRU_SEARCH_RESULT));
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}

		$this->clickAndWait(DRU_SEARCH_LAP_VAL);
		sleep(WAIT_FOR_NEXT_LINE);
		parent::DoLogout(__FUNCTION__);
	}
	 
}
?>