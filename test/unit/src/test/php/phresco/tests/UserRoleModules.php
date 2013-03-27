<?php
/*
 * PHR_DrupalEshop
 *
 * Copyright (C) 1999-2013 Photon Infotech Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *         http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/*	

Author by {phresco} QA Automation Team	

*/

require 'tests/UserRole.php';

class UserRoleModules extends PHPUnit_Framework_TestSuite {
	protected $backupGlobals = FALSE;

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