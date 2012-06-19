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
/*Author by {phresco} QA Automation Team*/

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
	   $testCaseName = __FUNCTION__;
		parent::Title();
		$name;
		$email;
		$password;
		$confirmpassword;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('test-classes/phresco/tests/drupalsetting.xml');
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
		
		    $this->clickandLoad(DRU_MENU_SIGNUP_LINK);
			$this->type(DRU_SIGN_UNAME,$name);
		    $this->getElement(DRU_SIGN_EMAIL,$testCaseName);
		    $this->type(DRU_SIGN_EMAIL,$email);
			$this->getElement(DRU_SIGN_PASS1,$testCaseName);
			$this->type(DRU_SIGN_PASS1,$password);
			$this->getElement(DRU_SIGN_PASS2,$testCaseName);
			$this->type(DRU_SIGN_PASS2,$confirmpassword);
		    $this->clickandLoad(DRU_SIGN_SUBMIT);
		try {
			$this->assertTrue($this->isTextPresent(DRU_SIGN_TXT_SUC));
		    } 
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		 	$this->doCreateScreenShot(__FUNCTION__);
			
		}	
	}
}
?>