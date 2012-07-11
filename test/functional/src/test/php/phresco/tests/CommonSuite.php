<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'Home_Page.php';
require_once 'AboutUs_Product.php';
require_once 'Search_Products.php';
require_once 'Manufacturers.php';
require_once 'ContactDet_Sales.php';


class  CommonSuite extends PHPUnit_Framework_TestSuite
{
 
 protected function setUp()
    {
	parent::setUp();
	}
 public static function suite()
    {
	$testSuite = new CommonSuite();
	$testSuite->setName('CommonTestSuite');
    $testSuite->addTestSuite('Home_Page');
	$testSuite->addTestSuite('ContactDet_Sales');
	$testSuite->addTestSuite('AboutUs_Product');
	$testSuite->addTestSuite('Search_Products');
	$testSuite->addTestSuite('Manufacturers');
	return $testSuite;
	}
	}
?>