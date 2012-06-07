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