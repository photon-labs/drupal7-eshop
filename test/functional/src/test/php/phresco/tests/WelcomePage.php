	
<?php
/* 

Author by {phresco} QA Automation Team 

*/

require_once 'DrupalCommonFun.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class WelcomePage extends DrupalCommonFun
{
	protected function Browser()
	{
		parent::setUp();
	}
	public function testWelcomePage()
	{
		parent::Title();
		sleep(WAIT_FOR_NEXT_LINE);
	}	
}
?>