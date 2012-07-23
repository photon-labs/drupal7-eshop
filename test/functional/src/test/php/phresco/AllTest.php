<?php

/*

Author by {phresco} QA Automation Team

*/

require_once 'tests/CommonSuite.php';
require_once 'tests/UserSuite.php';
require_once 'tests/CartAll.php';

class AllTest extends PHPUnit_Framework_TestSuite
{
 
 protected function setUp()
    {
		parent::setUp();
		}
 public static function suite()
    {
		$suite = new AllTest();
		$suite->setName('DrupalAllTestSuite');
 		$suite->addTestSuite(UserSuite::suite());
		$suite->addTestSuite(CommonSuite::suite());
		$suite->addTestSuite(CartAll::suite()); 
		return $suite;
    }
 protected function tearDown()
    {
		parent::tearDown();
    }
}
?>