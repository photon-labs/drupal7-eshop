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

class UserCreate_NewAC extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testNewAC()
	{
		parent::Title();
		
		$name;
		$email;
		$password;
		$confirmpassword;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/drupalsetting.xml');

		$users = $doc->getElementsByTagName("register");
		foreach( $users as $register )
		{
			$names = $register->getElementsByTagName("username");
			$name = $names->item(0)->nodeValue;
			$emails = $register->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
			$passwords = $register->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
					
			
			$confirmpass = $register->getElementsByTagName("confirmpass");
			$confirmpassword = $confirmpass->item(0)->nodeValue;
			
					}
			
		try {
			if ($this->isElementPresent(DRU_MENU_SIGNUP_LINK))
			$this->clickAndWait(DRU_MENU_SIGNUP_LINK);
			$property->waitForElementPresent('DRU_SIGN_UNAME');
		}
		catch (Exception $e) {}
		$this->type(DRU_SIGN_UNAME,$name);
		$property->waitForElementPresent('DRU_SIGN_EMAIL');
		$this->type(DRU_SIGN_EMAIL,$email);
		$property->waitForElementPresent('DRU_SIGN_PASS1');
		$this->type(DRU_SIGN_PASS1,$password);
		$property->waitForElementPresent('DRU_SIGN_PASS2');
		$this->type(DRU_SIGN_PASS2,$confirmpassword);
		
		if ($this->isElementPresent(DRU_SIGN_SUBMIT))
		$this->clickAndWait(DRU_SIGN_SUBMIT);
		try {
			$this->assertTrue($this->isTextPresent(DRU_SIGN_TXT_SUC));
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e)
		{
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
		 parent::DoLogout(__FUNCTION__);
	}
}
?>