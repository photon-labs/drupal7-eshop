<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'CartContent_Delete.php';
require_once 'CartContent_Add.php';
require_once 'CartContent_UserInfo.php';

class  CartAll extends PHPUnit_Framework_TestSuite
{
 
 protected function setUp()
    {
	parent::setUp();
	}
 public static function suite()
    {
	
	$testSuite=new CartAll('CartTestSuite');
	$testSuite->addTest(new CartContent_Add("testCartContent"));
	$testSuite->addTest(new CartContent_UserInfo("testCartContentUser"));
	$testSuite->addTest(new CartContent_Delete("testRemove"));
	return $testSuite;
	}
	}
?>