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
		
		$environment = $doc->getElementsByTagName("Server");
		
		$config = $doc->getElementsByTagName("Browser");
		$browser = $config->item(0)->nodeValue;
		
    	$this->webdriver = new WebDriver("localhost", 4444); 
		
       	$this->webdriver->connect($browser);
		
        $screenShotsPath = getcwd()."/surefire-reports/screenshots";
		
		if (!file_exists($screenShotsPath)) {
		
			mkdir($screenShotsPath);
		
		}
	}
	
	public function Title()
	{ 
	
		$doc = new DOMDocument();
		
		$doc->load('test-classes/phresco/tests/phresco-env-config.xml');
		
		$environment = $doc->getElementsByTagName("Server");
		
		foreach( $environment as $Server )
		{
			$protocols= $Server->getElementsByTagName("protocol");
			$protocol = $protocols->item(0)->nodeValue;
			
			$hosts = $Server->getElementsByTagName("host");
			$host = $hosts->item(0)->nodeValue;
			
			$ports = $Server->getElementsByTagName("port");
			$port = $ports->item(0)->nodeValue;
			
			$contexts = $Server->getElementsByTagName("context");
			$context = $contexts->item(0)->nodeValue;
		}
    	
        $serverUrl = $protocol . ':'.'//' . $host . ':' . $port . '/'. $context . '/';
		
		$this->webdriver->get($serverUrl);
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
		$doc->load('test-classes/phresco/tests/UserInfo.xml');
		$users = $doc->getElementsByTagName("user");
		foreach( $users as $user )
		{
			$names = $user->getElementsByTagName("username");
			$name = $names->item(0)->nodeValue;
			$passwords = $user->getElementsByTagName("password");
			$password = $passwords->item(0)->nodeValue;
		}
		    sleep(10);
		    $this->clickandLoad(DRU_LOGIN_TEXT);
			sleep(10);
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
		    sleep(5);
	}

	function DoLogout()
	{
        $this->clickandLoad(DRU_LOGOUT_TEXT);  
	    sleep(1);
		
	}
}
?>

