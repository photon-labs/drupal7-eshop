<?php
/*	

Author by {phresco} QA Automation Team	

*/

require 'tests/UserRole.php';

class UserRoleModules extends PHPUnit_Framework_TestSuite {

	protected function setUp() {
	}

	public static function suite()
	{
		$testSuite = new UserRoleModules('UserRoleModules');
		$testSuite->addTest(new UserRole("testGetUserRoles"));
		$testSuite->addTest(new UserRole("testDrupalGetOneRole"));
		return $testSuite;
	}
	protected function tearDown() {
	}

} 
?>