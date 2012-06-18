<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'DrupalCommonFun.php';
class Search_Products extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testSearch()
	{
        $testCaseName = __FUNCTION__;	
    	parent::Title();
		parent::DoLogin(__FUNCTION__);
		$audio;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('test-classes/phresco/tests/drupalsetting.xml');
		$users = $doc->getElementsByTagName("search");
		foreach( $users as $search )
		{
			$audios = $search->getElementsByTagName("audio");
			$audio = $audios->item(0)->nodeValue;
		}
		$this->type(DRU_SEARCH,$audio);
        $this->clickandLoad(DRU_SEARCH_BUT);
		sleep(2);
		//$this->getElement(DRU_SEARCH_PRODUCT_INFO);
		$this->clickandLoad(DRU_SEARCH_PRODUCT_INFO);
        $this->getElement(SEARCH_PRODUCT_RESULT,$testCaseName);		
	try {
		$this->assertTrue($this->isTextPresent(SEARCH_PRODUCT_RESULT));
	    } 
	catch (PHPUnit_Framework_AssertionFailedError $e) {
		$this->doCreateScreenShot(__FUNCTION__);
		parent::DoLogout();
	}
	} 
}
?>