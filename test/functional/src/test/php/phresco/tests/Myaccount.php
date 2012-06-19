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
class Myaccount extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testMyAccount()
	{
	    $testCaseName = __FUNCTION__;
    	parent::Title();		
		$currentpassword;
		$password;
		$email;
		$confirmpassword;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('test-classes/phresco/tests/drupalsetting.xml');

		$users = $doc->getElementsByTagName("myaccount");
		foreach( $users as $myaccount )
		{
			$currentpasswords = $myaccount->getElementsByTagName("currentpassword");
			$currentpassword = $currentpasswords->item(0)->nodeValue;
			$emails = $myaccount->getElementsByTagName("email");
			$email = $emails->item(0)->nodeValue;
			$passwords = $myaccount->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
			$confirmpass = $myaccount->getElementsByTagName("confirmpass");
			$confirmpassword = $confirmpass->item(0)->nodeValue;
		}
		parent::DoLogin(__FUNCTION__);
		    $this->clickandLoad(DRU_MYAC_EDIT);
			$this->type(DRU_MYAC_CURPASS,$currentpassword);
		    $this->getElement(DRU_MYAC_MAIL,$testCaseName);
			$this->clear(DRU_MYAC_MAIL,$testCaseName);
		    $this->type(DRU_MYAC_MAIL,$email);
			$this->getElement(DRU_MYAC_NEWPASS,$testCaseName);
			$this->type(DRU_MYAC_NEWPASS,$password);
			$this->getElement(DRU_MYAC_CONFIRMPASS,$testCaseName);
			$this->type(DRU_MYAC_CONFIRMPASS,$confirmpassword);
		    $this->clickandLoad(DRU_MYAC_SAVE);		
			
		try {
			$this->assertTrue($this->isTextPresent(DRU_MYAC_COFIRM_MSG));
		    } 
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		 	$this->doCreateScreenShot(__FUNCTION__);
			
		}
		   
		parent::DoLogout();
	}
		

	}

?>