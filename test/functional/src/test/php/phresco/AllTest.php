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

require_once 'tests/CommonAll.php';
require_once 'tests/UserAll.php';
require_once 'tests/CartAll.php';

class AllTest extends PHPUnit_Framework_TestSuite
{
 
 protected function setUp()
    {
		parent::setUp();
		}
 public static function suite()
    {
		$testSuite = new AllTest('DrupalAllTestSuite');
 		$testSuite->addTestSuite('UserAll');
		$testSuite->addTestSuite('CommonAll');
		$testSuite->addTestSuite('CartAll');
		return $testSuite;
    }
 protected function tearDown()
    {
		parent::tearDown();
    }
}
?>