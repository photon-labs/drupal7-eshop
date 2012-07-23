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
	
	$testSuite=new CartAll();
	$testSuite->setName('CartTestSuite');
    $testSuite->addTestSuite('CartContent_Add');
	$testSuite->addTestSuite('CartContent_UserInfo');
	$testSuite->addTestSuite('CartContent_Delete');
	return $testSuite;
	}
	}
?>