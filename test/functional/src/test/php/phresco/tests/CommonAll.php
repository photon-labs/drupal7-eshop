<?php
/*

Author by {phresco} QA Automation Team

*/
require_once 'Home_Page.php';
require_once 'AboutUs_Product.php';
require_once 'Search_Products.php';
require_once 'Check_InvalidInfo.php';
require_once 'Manufacturers.php';
require_once 'ContactDet_Sales.php';


class  CommonAll extends PHPUnit_Framework_TestSuite
{
 
 protected function setUp()
    {
	parent::setUp();
	}
 public static function suite()
    {
	$testSuite = new CommonAll('CommonTestSuite');
    $testSuite->addTest(new Home_Page("testHome"));
	$testSuite->addTest(new ContactDet_Sales("testContact"));
	$testSuite->addTest(new AboutUs_Product("testAbout"));
	$testSuite->addTest(new Search_Products("testSearch"));
	$testSuite->addTest(new Manufacturers("testManufacturers"));
	$testSuite->addTest(new Check_InvalidInfo("testInvalid"));
	return $testSuite;
	}
	}
?>