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
class CartContent_UserInfo extends DrupalCommonFun
{
	protected function cartContent()
	{
		parent::setUp();
	}
	public function testCartContentUser()
	{
	   $Firstname; 
	   $Lastname; 
	   $Company;
	   $StreetAddres1;
	   $StreetAddres2;
	   $City; 
	   $Stateprovince; 
	   $PostalCode;
	   $Phonenumber;
	   $OrderComment;
	   
		parent::Title();
		 $testCaseName=__FUNCTION__;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('test-classes/phresco/tests/drupalsetting.xml');
		$users = $doc->getElementsByTagName("userinfo");
		foreach( $users as $userinfo )
		{
			$Firstnames = $userinfo->getElementsByTagName("firstname");
			$Firstname = $Firstnames->item(0)->nodeValue;
			$Lastnames = $userinfo->getElementsByTagName("lastname");
			$Lastname = $Lastnames->item(0)->nodeValue;
			$Companys = $userinfo->getElementsByTagName("company");
			$Company = $Companys->item(0)->nodeValue;
			$StreetAddress1 = $userinfo->getElementsByTagName("streetaddress1");
			$StreetAddres1 = $StreetAddress1->item(0)->nodeValue;
			$StreetAddress2 = $userinfo->getElementsByTagName("streetaddress2");
			$StreetAddres2 = $StreetAddress2->item(0)->nodeValue;
			
			$Citys = $userinfo->getElementsByTagName("city");
			$City = $Citys->item(0)->nodeValue;
			$Stateprovinces = $userinfo->getElementsByTagName("stateprovince");
			$Stateprovince = $Stateprovinces->item(0)->nodeValue;
			$PostalCodes = $userinfo->getElementsByTagName("postalcode");
			$PostalCode = $PostalCodes->item(0)->nodeValue;
			
			$Phonenumbers = $userinfo->getElementsByTagName("phonenumber");
			$Phonenumber = $Phonenumbers->item(0)->nodeValue;
			$OrderComments = $userinfo->getElementsByTagName("ordercomments");
			$OrderComment = $OrderComments->item(0)->nodeValue;
		}
		    parent::DoLogin(__FUNCTION__);
		
		  $this->getElement(DRU_MOBILE_PHONES,$testCaseName);
		   $this->clickandLoad(DRU_MOBILE_PHONES);
		   $this->clickandLoad(DRU_PRODUCT_MOBILE);
		   $this->getElement(DRU_VGAMES,$testCaseName);
		   $this->clickandLoad(DRU_VGAMES);
		   $this->clickandLoad(DRU_PRODUCT_VGAME);
			
		   $this->getElement(DRU_CHECK_OUT,$testCaseName);
		   $this->clickandLoad(DRU_CHECK_OUT);
		   
		   $this->getElement(DRU_DELI_CFNAME,$testCaseName);
		   
		   		   $this->type(DRU_DELI_CFNAME,$Firstname);
		   $this->getElement(DRU_DELI_CLNAME,$testCaseName);
		   		   $this->type(DRU_DELI_CLNAME,$Lastname);
		   $this->getElement(DRU_DELI_STREET1,$testCaseName);
		   		   $this->type(DRU_DELI_STREET1,$StreetAddres1);
		   $this->getElement(DRU_DELI_CITY2,$testCaseName);
		   		   $this->type(DRU_DELI_CITY2,$City);
		   $this->getElement(DRU_DELI_ZONE,$testCaseName);
		   		   $this->select(DRU_DELI_ZONE,$Stateprovince,$testCaseName);
		   $this->getElement(DRU_DELI_PCODE,$testCaseName);
		   		   $this->type(DRU_DELI_PCODE,$PostalCode);
		   $this->clickandLoad(CHOOSE_BILL_INFO);
		   $this->clickandLoad(DRU_BILL_CASH);
		   
		   $this->getElement(DRU_COMMENTS,$testCaseName);
		   		   $this->type(DRU_COMMENTS,DRU_TXT_COMMENTS);
				   $this->getElement(DRU_REVIEW_ORDER,$testCaseName);
				    $this->clickandLoad(DRU_REVIEW_ORDER);
					$this->getElement(DRU_SUBMIT_ORDER,$testCaseName);
					 $this->clickandLoad(DRU_SUBMIT_ORDER);
					 
		try {
			$this->assertTrue($this->isTextPresent(DRU_COMPLETE_CHECKOUT));
		    } 
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		 	$this->doCreateScreenShot(__FUNCTION__);
			
		}		 
		 
		   
		
		   parent::DoLogout();
	}
}
?>