<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'UserCreate_NewAC.php';
require_once 'UserReq_NewPassword.php';
require_once 'Myaccount.php';
require_once 'WelcomePage.php';

class UserAll extends PHPUnit_Framework_TestSuite
{
 
 protected function setUp()
    {
		parent::setUp();
    }
 public static function suite()
    {
	$testSuite= new UserAll('UserTestSuite');
	$testSuite->addTest(new WelcomePage("testWelcomePage"));
	$testSuite->addTest(new UserCreate_NewAC("testNewAC"));
	$testSuite->addTest(new Myaccount("testMyAccount"));
	$testSuite->addTest(new UserReq_NewPassword("testReqPassword"));
	return $testSuite;
	}
	}
?>