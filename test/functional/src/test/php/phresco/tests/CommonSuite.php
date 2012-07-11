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