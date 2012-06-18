<?php /*
 * ###
 * PHR_DrupalEshop
 * %%
 * Copyright (C) 1999 - 2012 Photon Infotech Inc.
 * %%
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ###
 */ ?>
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