<?php
/*Author by {phresco} QA Automation Team */

require_once 'PHPUnit/Autoload.php';
require_once 'phresco/tests/phpwebdriver/RequiredFunction.php';
include 'phresco/tests/basescreen.php';

class DrupalCommonFun extends RequiredFunction
{
	private $properties;
	private $host;
	private $port;
	private $context;
	private $protocol;
	private $serverUrl;
	private $browser;
	private $screenShotsPath;

	protected function setUp()
	{
	    $doc = new DOMDocument();
		$doc->load('test-classes/phresco/tests/phresco-env-config.xml');
		$environment = $doc->getElementsByTagName("server");
		foreach( $environment as $server )
		{
			$browsers = $server->getElementsByTagName("Browser");
			$browser = $browsers->item(0)->nodeValue;
		}
		$this->webdriver = new WebDriver("localhost", 4444); 
		$this->webdriver->connect($browser);
		$screenShotsPath = getcwd()."//"."surefire-reports/screenshots";
		if (!file_exists($screenShotsPath)) {
			mkdir($screenShotsPath);
		}
	}
	
	public function Title()
	{   
		$doc = new DOMDocument();
		$doc->load('test-classes/phresco/tests/phresco-env-config.xml');
		$environment = $doc->getElementsByTagName("server");
		foreach( $environment as $server )
		{
			$protocols= $server->getElementsByTagName("protocol");
			$protocol = $protocols->item(0)->nodeValue;
			$hosts = $server->getElementsByTagName("host");
			$host = $hosts->item(0)->nodeValue;
			$ports = $server->getElementsByTagName("port");
			$port = $ports->item(0)->nodeValue;
			$contexts = $server->getElementsByTagName("context");
			$context = $contexts->item(0)->nodeValue;
			$browsers = $server->getElementsByTagName("Browser");
			$browser = $browsers->item(0)->nodeValue;
		}
		$serverUrl = $protocol .':'. '//' . $host . ':' . $port . '/'. $context . '/';
		$this->webdriver->get($serverUrl);
		sleep(2);
	}
	function DoLogin($testCaseName){
	   if($testCaseName == null)
	   {
       $testCaseName = __FUNCTION__;
       }
	    $name;
		$password;
		$property = new DrupalCommonFun;
		$doc = new DOMDocument();
		$doc->load('test-classes/phresco/tests/drupalsetting.xml');
		$users = $doc->getElementsByTagName("user");
		foreach( $users as $user )
		{
			$names = $user->getElementsByTagName("username");
			$name = $names->item(0)->nodeValue;
			$passwords = $user->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
		}
		    
		    $this->clickandLoad(DRU_LOGIN_TEXT);
			$this->type(DRU_LOGIN_UNAME,$name);
		    $this->getElement(DRU_LOGIN_PASS,$testCaseName);
		    $this->type(DRU_LOGIN_PASS,$password); 
			$this->clickandLoad(DRU_LOGIN_CLICK_BUT);
			
		try {
			$this->assertTrue($this->isTextPresent(DRU_LOGOUT_TEXT));
		    } 
		catch (PHPUnit_Framework_AssertionFailedError $e) {
		 	$this->doCreateScreenShot($testCaseName);
			
		}
		   
	}

	function DoLogout()
	{
        $this->clickandLoad(DRU_LOGOUT_TEXT);  
	    sleep(1);
		
	}
}
?>

