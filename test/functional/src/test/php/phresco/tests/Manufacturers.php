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