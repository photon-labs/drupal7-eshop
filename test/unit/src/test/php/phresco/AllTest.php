<?php


require 'tests/NodeModules.php';
require 'tests/TaxonomyModules.php';
require 'tests/UserRoleModules.php';

class AllTest extends PHPUnit_Framework_TestSuite {

	protected function setUp() {
	}

	public static function suite()
	{
		$testSuite = new AllTest('Phpunittest');
		$testSuite->addTestSuite('NodeModules');
		$testSuite->addTestSuite('TaxonomyModules');
		$testSuite->addTestSuite('UserRoleModules');
		return $testSuite;
	}
	protected function tearDown() {
	}

} 

