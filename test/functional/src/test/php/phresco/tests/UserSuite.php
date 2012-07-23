<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'UserCreate_NewAC.php';
require_once 'UserReq_NewPassword.php';
require_once 'Myaccount.php';
require_once 'WelcomePage.php';

class UserSuite extends PHPUnit_Framework_TestSuite
{
 
 protected function setUp()
    {
		parent::setUp();
    }
 public static function suite()
    {
	$testSuite= new UserSuite();
	$testSuite->setName('UserTestSuite');
    $testSuite->addTestSuite('WelcomePage');
 	$testSuite->addTestSuite('UserCreate_NewAC');
	$testSuite->addTestSuite('Myaccount');
	$testSuite->addTestSuite('UserReq_NewPassword'); 
	
	return $testSuite;
	}
	}
?>