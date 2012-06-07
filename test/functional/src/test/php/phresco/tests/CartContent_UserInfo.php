<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';
class CartContent_UserInfo extends DrupalCommonFun
{
	protected function cartContent()
	{
		parent::setUp();
	}
	public function testCartContentUser()
	{
		parent::Title();
		parent::DoLogin(__FUNCTION__);
		try {
			if ($this->isElementPresent(DRU_VGAMES))
			$this->clickAndWait(DRU_VGAMES);
		}
		catch (Exception $e) {}
		$this->clickAndWait(DRU_PRODUCT_VGAME);
		$this->clickAndWait(DRU_CHECKOUT);
			
		$Firstname;$Lastname;$Company;$StreetAddres1;$StreetAddres2;$City;$Stateprovince;$PostalCode;      $Phonenumber;$OrderComment;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('src/test/php/phresco/tests/drupalsetting.xml');
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
			
		$this->type(DRU_DELI_CFNAME,$Firstname);
		$property->waitForElementPresent('DRU_DELI_CLNAME');
		$this->type(DRU_DELI_CLNAME,$Lastname);
		$property->waitForElementPresent('DRU_DELI_COMPANY');
		$this->type(DRU_DELI_COMPANY,$Company);
		$property->waitForElementPresent('DRU_DELI_STREET1');
		$this->type(DRU_DELI_STREET1,$StreetAddres1);
		$property->waitForElementPresent('DRU_DELI_STREET2');
		$this->type(DRU_DELI_STREET2,$StreetAddres2);
		$property->waitForElementPresent('DRU_DELI_CITY2');
		$this->type(DRU_DELI_CITY2,$City);
		$property->waitForElementPresent('DRU_DELI_ZONE');
		$this->select(DRU_DELI_ZONE,$Stateprovince);
		$property->waitForElementPresent('DRU_DELI_PCODE');
		$this->type(DRU_DELI_PCODE,$PostalCode);
		$property->waitForElementPresent('DRU_DELI_PH_NUM');
		$this->type(DRU_DELI_PH_NUM,$Phonenumber);
		 sleep(WAIT_FOR_NEXT_LINES);
		$this->click(DRU_BILL_INFO);
        sleep(WAIT_FOR_NEXT_LINES);
		$this->click(DRU_BILL_CASH);
		$this->type(DRU_COMMENTS,$OrderComment);
         sleep(WAIT_FOR_NEXT_LINES);
		$this->clickAndWait(DRU_REVIEW_ORDER);
		 sleep(WAIT_FOR_NEXT_LINES);
		try {
			if ($this->isElementPresent(DRU_SUBMIT_ORDER))
			$this->clickAndWait(DRU_SUBMIT_ORDER);
		}
		catch (Exception $e) {}
			
		try {
			if (!$this->isElementPresent(DRU_CURRENT_STATUS)) break;
			 sleep(WAIT_FOR_NEXT_LINES);
			$this->clickAndWait(DRU_CURRENT_STATUS);
			
			$this->assertFalse($this->isTextPresent(DRU_PRINT));
			sleep(WAIT_FOR_NEXT_LINE);
		}
		catch (Exception $e) {
			parent::doCreateScreenShot(__FUNCTION__);
			array_push($this->verificationErrors, $e->toString());
		}
		   parent::DoLogout(__FUNCTION__);
	}
}
?>