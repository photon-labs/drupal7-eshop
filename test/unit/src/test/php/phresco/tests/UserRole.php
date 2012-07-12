<?php
/*	

Author by {phresco} QA Automation Team	

*/

require_once 'PHPUnit/Framework.php';
require_once 'DrupalBaseclass.php';

class UserRole extends DrupalBaseclass {
	
	function testGetUserRoles() {
		$this->connect();
		$roles = user_roles();
		$this->assertEquals(count($roles),3);
	}
	
	function testDrupalGetOneRole() {
		$this->connect();
		$roles = user_roles();
		$this->assertEquals(count($roles),3);
	}
}
?>