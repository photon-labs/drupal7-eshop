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
class Check_InvalidInfo extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testInvalid()
	{
		parent::Title();
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/drupalsetting.xml');
		$users = $doc->getElementsByTagName("invalid");
		foreach( $users as $invalid )
		{
			$emails = $invalid->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
		
		}
		try {
			if ($this->isElementPresent(DRU_LOGIN))
			$this->clickAndWait(DRU_LOGIN);
		}
		catch (Exception $e) {}
		$property->waitForElementPresent('DRU_UNAME');
		$this->type(DRU_UNAME, DRU_USER_INVALID_NAME);
		$property->waitForElementPresent('DRU_PWORD');
		$this->type(DRU_PWORD,DRU_PASS_WORD);
		$property->waitForElementPresent('DRU_LOGIN_BUTTON');
		try {
			if ($this->isElementPresent(DRU_LOGIN_BUTTON))
			$this->clickAndWait(DRU_LOGIN_BUTTON);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_USER_INVALID_FORGET_PASS);
		$property->waitForElementPresent('DRU_PASS_INVALID_MAIL');
		$this->type(DRU_PASS_INVALID_MAIL,$email);
		$this->clickAndWait(DRU_PASS_INVALID_MAIL_BCLICK);
		$property->waitForElementPresent('DRU_TXT_PRE_INVALID_MAILID');
		try{
			$this->assertTrue($this->isTextPresent(DRU_TXT_PRE_INVALID_MAILID));
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
		 
	}

}
?>