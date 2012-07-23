<?php
/*Author by {phresco} QA Automation Team*/
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
		$audio;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('test-classes/phresco/tests/Drupal7Data.xml');
		$users = $doc->getElementsByTagName("search");
		foreach( $users as $search )
		{
			$audios = $search->getElementsByTagName("audio");
			$audio = $audios->item(0)->nodeValue;
		}
		
		$this->DoLogin(__FUNCTION__);
		 $this->getElement(DRU_SEARCH,$testCaseName);
		$this->type(DRU_SEARCH,$audio);
		 $this->getElement(DRU_SEARCH_BUT,$testCaseName);		
        $this->clickandLoad(DRU_SEARCH_BUT);
		 $this->getElement(DRU_SEARCH_PRODUCT_INFO,$testCaseName);	
		$this->clickandLoad(DRU_SEARCH_PRODUCT_INFO);
				
	try {
		$this->assertFalse($this->isTextPresent(SEARCH_PRODUCT_RESULT));
	    } 
	catch (PHPUnit_Framework_AssertionFailedError $e) {
		$this->doCreateScreenShot(__FUNCTION__);
		$this->DoLogout();
		sleep(2);
	}
	} 
}
?>